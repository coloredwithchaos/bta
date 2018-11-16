<?php
if (!class_exists('WPPostsRateKeys_Site_Audit')) {
	class WPPostsRateKeys_Site_Audit 
	{
		static $table_name = 'site_audit';
		static $cron_event_name = 'seopressor_audit_cron';
		static $provision_task_min = 5;
		static $provision_task_max = 50;
		
		static function init_audit()
		{
			global $wpdb;
			$check_valid = $wpdb->get_var( "select id from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where date_e is null order by date_e desc limit 0,1" );
			if( empty($check_valid) )
			{
				
				$wpdb->insert( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, array(
					'date_s' => current_time('mysql'),
					'provision_task' => self::calc_recommend_task_per_cron()
				), array(
					'%s',
					'%d'
				) );
				$audit_id = $wpdb->insert_id;
				
				if( empty($audit_id) )
				{
					return false;
				}
				
				$audit_ect = self::estimate_completion_time( $audit_id );
				$wpdb->update( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, array( 'ect' => $audit_ect ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
				
				// Init cron to process crawling
				if( !wp_next_scheduled( self::$cron_event_name ) )
				{
					wp_schedule_event( current_time ( 'timestamp' ), 'in_per_minute', self::$cron_event_name );
				}
				
				// Subscribe to pingeduler
				WPPostsRateKeys_Central::connect_pingeduler( $audit_id, 'subscribe' );
				
				return $audit_ect;
				
			}
			else
			{
				$audit_id = $check_valid;
				
				if( !wp_next_scheduled( self::$cron_event_name ) )
				{
					wp_schedule_event( current_time ( 'timestamp' ), 'in_per_minute', self::$cron_event_name );
				}
				
				// Subscribe to pingeduler
				WPPostsRateKeys_Central::connect_pingeduler( $audit_id, 'subscribe' );
				
				// audit in progress
				return false;
			}
		}
		
		
		static function deactivate_remove_siteaudit()
		{
			global $wpdb;
			
			// remove site audit which in progress
			$wpdb->query( "delete from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where date_e is null" );
		}
		
		
		static function calc_recommend_task_per_cron()
		{
			$total_posts = wp_count_posts('post')->publish + wp_count_posts('page')->publish;
			$provision_task = $total_posts/5/60; // task per cron, based on 5 hours
			
			$provision_task = (round($provision_task) < self::$provision_task_min) ? self::$provision_task_min : round($provision_task);
			$provision_task = (round($provision_task) > self::$provision_task_max) ? self::$provision_task_max : round($provision_task);
			
			return $provision_task;
		}
		
		
		static function estimate_completion_time( $audit_id )
		{
			global $wpdb;
			
			$table_audit = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			$posts_in_queue = self::get_total_post_in_queue( $audit_id );
			$task_per_cron = $wpdb->get_var( "select provision_task from " . $table_audit . " where id = " . $audit_id );
			$ect = $posts_in_queue / $task_per_cron;
			$ect += ( $ect*0.2 ); // add extra 10% for buffering
			$ect += 3; // add extra 3 minutes for summarize
			$ect = round( $ect ); // round the decimal point
						
			return $ect;
		}
		
		
		static function get_total_post_in_queue( $audit_id )
		{
			$params = array(
				'posts_per_page' => 1,
				'post_status' => 'publish',
				'post_type' => array('post', 'page'),
				'order' => 'ASC',
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key'     => WPPostsRateKeys_WPPosts_New::$audit_metadata,
						'value'   => '',
						'compare' => 'NOT EXISTS',
					),
					array(
						'key'     => WPPostsRateKeys_WPPosts_New::$audit_metadata,
						'value'	  => $audit_id,
						'compare' => '!=',
						'type'	  => 'NUMERIC'
					),
				)
			);
			$query = new WP_Query( $params );
			$total_posts = $query->found_posts;
			
			return $total_posts;
		}
		
		
		static function cron_audit_initiator()
		{
			global $wpdb;
			$table_audit = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			
			$check_valid = $wpdb->get_var( "select id from " . $table_audit . " where date_e is null limit 0,1" );
			if( !empty($check_valid) )
			{
				return;
			}
			
			$date_to_check = new DateTime( current_time('mysql') );
			$date_to_check->modify( '-7 day' );
			
			$last_audit = $wpdb->get_var( "select id from " . $table_audit . " where date_e > '" . $date_to_check->format('Y-m-d H:i:s') . "' order by date_e limit 0,1" );
			
			if( !empty($last_audit) )
			{
				return;
			}
			
			self::init_audit();
			
		}
		
		static function cron_audit_process()
		{
			
			global $wpdb;
			
			$table_audit = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			$table_crawler = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Crawler::$table_name;
				
			$audit_obj = $wpdb->get_row( "select * from " . $table_audit . " where date_e is null order by id desc limit 0,1" );
			
			// remove schedule cron if already finish audit
			if( $audit_obj == NULL )
			{
				/*if( wp_next_scheduled( self::$cron_event_name ) )
				{
					wp_clear_scheduled_hook( self::$cron_event_name );
				}*/
				
				// get last audit id and unsubscribe from pingeduler
				/*$audit_last_obj = $wpdb->get_row( "select id, score, health from " . $table_audit . " where date_e is not null order id desc limit 0,1" );
				if( $audit_last_obj != NULL )
				{
					WPPostsRateKeys_Central::connect_pingeduler( $audit_last_obj->id, 'unsubscribe', $audit_last_obj->score, $audit_last_obj->health );
				}*/
				
				return;
			}
			
			$audit_ect = self::estimate_completion_time( $audit_obj->id );
			$wpdb->update( $table_audit, array( 'ect' => $audit_ect ), array( 'id' => $audit_obj->id ), array( '%d' ), array( '%d' ) );
			
			// check attribute score, to avoid new post add into audit
			if( $audit_obj->score == NULL )
			{
				$ids = self::get_posts_to_crawl( $audit_obj->id, $audit_obj->provision_task );
				if( count($ids) > 0 )
				{
					// crawling in progress, do crawl
					foreach( $ids as $id )
					{
						WPPostsRateKeys_Crawler::do_crawl( $audit_obj->id, $id );
					}
				}
				else
				{
					// crawling complete, do summarize 
					self::summarize_audit( $audit_obj );
				}
			}
			else
			{
				// crawling complete, do summarize 
				self::summarize_audit( $audit_obj );
			}
			
		}
		
		
		static function summarize_audit( $audit_obj )
		{

			global $wpdb;
			
			$lesser_wordcount = 150;
			$table_audit = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			$table_crawler = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Crawler::$table_name;
			$audit_id = $audit_obj->id;
			
			if( 
				$audit_obj->score !== NULL
				&& $audit_obj->dup_title !== NULL
				&& $audit_obj->dup_description !== NULL
				&& $audit_obj->no_title !== NULL
				&& $audit_obj->no_description !== NULL
				&& $audit_obj->t_post !== NULL
				&& $audit_obj->b_link !== NULL
				&& $audit_obj->t_link !== NULL
				&& $audit_obj->robot_meta !== NULL
				&& $audit_obj->xml_sitemap !== NULL
				&& $audit_obj->avg_post !== NULL
				&& $audit_obj->robots_txt !== NULL
				&& $audit_obj->no_keyword !== NULL
				&& $audit_obj->no_optimize !== NULL
				&& $audit_obj->no_schema !== NULL
				&& $audit_obj->no_og !== NULL
				&& $audit_obj->no_twitter !== NULL
				&& $audit_obj->no_alt_img !== NULL
				&& $audit_obj->t_img !== NULL
				&& $audit_obj->wordcount !== NULL
				&& $audit_obj->lang !== NULL
				&& $audit_obj->local_seo !== NULL
			)
			{
				$health = 100;
				$health -= $audit_obj->dup_title;
				$health -= $audit_obj->dup_description;
				$health -= ( $audit_obj->no_title * 2 );
				$health -= $audit_obj->no_description;
				$health -= $audit_obj->b_link;
				$health -= ( !empty($audit_obj->robot_meta) ? 20 : 0 );
				$health -= ( empty($audit_obj->xml_sitemap) ? 10 : 0 );
				$health -= ( $audit_obj->avg_post <= 8 ? 10 : 0 );
				$health = max( $health, 0 );
				
				$wpdb->update( $table_audit, array( 'health' => $health, 'date_e' => current_time('mysql') ), array( 'id' => $audit_id ), array( '%d', '%s' ), array( '%d' ) );
				
				/*if( wp_next_scheduled( self::$cron_event_name ) )
				{
					wp_clear_scheduled_hook( self::$cron_event_name );
				}*/
				
				// unsubscribe from pingeduler
				WPPostsRateKeys_Central::connect_pingeduler( $audit_id, 'unsubscribe', $audit_obj->score, $health );
				
				return;
			}
			
			
			if( $audit_obj->score == NULL )
			{
				$result = $wpdb->get_row( "
					select sum(score) as total_score, count(id) as total_post
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and score is not null
				" );
				if( $result == NULL )
				{
					$score = 0;
				}
				else
				{
					$score = round( ($result->total_score / $result->total_post) );
				}
				$wpdb->update( $table_audit, array( 'score' => $score ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->dup_title == NULL )
			{
				$dup_title = $wpdb->get_var( "
					select ifnull(sum(dup_table.dup),0) from 
					(
						select count(id) as dup
						from " . $table_crawler . "
						where title is not null
						and title != ''
						and audit_id = " . $audit_id . "
						group by title
						having dup > 1
					) dup_table
				" );
				$wpdb->update( $table_audit, array( 'dup_title' => $dup_title ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->dup_description == NULL )
			{
				$dup_description = $wpdb->get_var( "
					select ifnull(sum(dup_table.dup),0) from 
					(
						select count(id) as dup
						from " . $table_crawler . "
						where description is not null
						and description != ''
						and audit_id = " . $audit_id . "
						group by description
						having dup > 1
					) dup_table
				" );
				$wpdb->update( $table_audit, array( 'dup_description' => $dup_description ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_title == NULL )
			{
				$no_title = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and (title is null or title = '')
				" );
				$wpdb->update( $table_audit, array( 'no_title' => $no_title ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_description == NULL )
			{
				$no_description = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and (description is null or description = '')
				" );
				$wpdb->update( $table_audit, array( 'no_description' => $no_description ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}

			
			if( $audit_obj->t_post == NULL )
			{
				$t_post = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
				" );
				$wpdb->update( $table_audit, array( 't_post' => $t_post ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}

			
			if( $audit_obj->b_link == NULL )
			{
				$b_link = $wpdb->get_var( "
					select sum(broken_link)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
				" );
				$wpdb->update( $table_audit, array( 'b_link' => $b_link ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}

			
			if( $audit_obj->t_link == NULL )
			{
				$t_link = $wpdb->get_var( "
					select sum(nice_link)+sum(broken_link)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
				" );
				$wpdb->update( $table_audit, array( 't_link' => $t_link ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}

			
			if( $audit_obj->robot_meta == NULL )
			{
				$tags = self::get_meta_robots_tag();
				if( count($tags) > 0 )
				{
					$robot_meta = implode(', ', $tags);
				}
				else
				{
					$robot_meta = '';
				}
				$wpdb->update( $table_audit, array( 'robot_meta' => $robot_meta ), array( 'id' => $audit_id ), array( '%s' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->xml_sitemap == NULL )
			{
				$xml = self::get_xml_sitemap();
				if( $xml === false )
				{


					$xml_sitemap = '';
				}
				else
				{
					$xml_sitemap = $xml;
				}
				$wpdb->update( $table_audit, array( 'xml_sitemap' => $xml_sitemap ), array( 'id' => $audit_id ), array( '%s' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->avg_post == NULL )
			{
				$now = current_time('timestamp');
				$two_months_before = $now - (60*60*24*60);
				$total_post = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and post_creation_date > '".date('Y-m-d H:i:s', $two_months_before)."'
				" );
				$avg_post = round($total_post / 2);
				$wpdb->update( $table_audit, array( 'avg_post' => $avg_post ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->robots_txt == NULL )
			{
				$robot = self::get_robot_txt_file();
				if( $robot === false )
				{
					$robots_txt = '';
				}
				else
				{
					$robots_txt = $robot;
				}
				$wpdb->update( $table_audit, array( 'robots_txt' => $robots_txt ), array( 'id' => $audit_id ), array( '%s' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_keyword == NULL )
			{
				$no_keyword = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and has_keyword = 0
				" );
				$wpdb->update( $table_audit, array( 'no_keyword' => $no_keyword ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_optimize == NULL )
			{
				$no_optimize = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and has_optimize = 0
				" );
				$wpdb->update( $table_audit, array( 'no_optimize' => $no_optimize ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_schema == NULL )
			{
				$no_schema = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and has_schema = 0
				" );
				$wpdb->update( $table_audit, array( 'no_schema' => $no_schema ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_og == NULL )
			{
				$no_og = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and has_og = 0
				" );
				$wpdb->update( $table_audit, array( 'no_og' => $no_og ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_twitter == NULL )
			{
				$no_twitter = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and has_twitter = 0
				" );
				$wpdb->update( $table_audit, array( 'no_twitter' => $no_twitter ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->no_alt_img == NULL )
			{
				$no_alt_img = $wpdb->get_var( "
					select sum(no_alt_images)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
				" );
				$wpdb->update( $table_audit, array( 'no_alt_img' => $no_alt_img ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->t_img == NULL )
			{
				$t_img = $wpdb->get_var( "
					select sum(total_images)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
				" );
				$wpdb->update( $table_audit, array( 't_img' => $t_img ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->wordcount == NULL )
			{
				$wordcount = $wpdb->get_var( "
					select count(id)
					from " . $table_crawler . "
					where audit_id = " . $audit_id . "
					and wordcount < " . $lesser_wordcount . "
				" );
				$wpdb->update( $table_audit, array( 'wordcount' => $wordcount ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->lang == NULL )
			{
				// get the html output
				$lang = self::get_website_lang();
				$wpdb->update( $table_audit, array( 'lang' => $lang ), array( 'id' => $audit_id ), array( '%s' ), array( '%d' ) );
			}
			
			
			if( $audit_obj->local_seo == NULL )
			{
				$active_local_seo = is_active_widget( FALSE, NULL, 'seops_local_seo' );
				if( $active_local_seo === FALSE )
					$local_seo = 0;
				else
					$local_seo = 1;
				$wpdb->update( $table_audit, array( 'local_seo' => $local_seo ), array( 'id' => $audit_id ), array( '%d' ), array( '%d' ) );
			}

		}
		
		
		static function get_website_lang()
		{
			$response = wp_remote_get( get_site_url() );
			$lang = '';
			if( !is_wp_error( $response ) ) {
				$body = wp_remote_retrieve_body($response);
				$matches = array();
				preg_match_all('/<html\s[^>]*lang=\"([^\"]*)\"[^>]*>/siU', $body, $matches, PREG_SET_ORDER);
				
				if( isset($matches[0][1]) && !empty($matches[0][1]) )
				{
					$lang = $matches[0][1];
				}
			}
			return $lang;
		}
		
		
		static function get_robot_txt_file()
		{
			$robot_url = get_site_url().'/robots.txt';
			$status_code = WPPostsRateKeys_Link::get_http_status_code( $robot_url );
			if( $status_code == 200 )
				return $robot_url;
			else
				return false;
		}
		
		
		static function get_xml_sitemap()
		{
			$sitemap_url = get_site_url().'/sitemap.xml';
			$status_code = WPPostsRateKeys_Link::get_http_status_code( $sitemap_url );
			if( $status_code == 200 )
				return $sitemap_url;
			else
				return false;
		}
		
		
		static function get_meta_robots_tag()
		{
			$unfriendly_list = array( 'noindex', 'nofollow', 'none', 'noarchive', 'nosnippet', 'noodp', 'noimageindex' );
			$own_list = array();
			
			// check from setting
			$settings = WPPostsRateKeys_Settings::get_options();
			if( isset($settings['seop_home_robot']) && count($settings['seop_home_robot']) > 0 )
			{
				foreach( $unfriendly_list as $row )
				{
					if( in_array($row, $settings['seop_home_robot']) )
						$own_list[] = $row;
				}
			}
			
			// check from x robot tags
			$response = wp_remote_get( get_site_url() );
			if( !is_wp_error( $response ) ) {
				$robot_tag_str = wp_remote_retrieve_header( $response, 'x-robots-tag' );
				if( !empty($robot_tag_str) )
				{
					$str_meta_exp = explode(',', $robot_tag_str);
					if( count($str_meta_exp) > 0 )
					{
						foreach( $str_meta_exp as $single_meta )
						{
							$single_meta = trim($single_meta);
							if( !empty($single_meta) )
								$own_list[] = $single_meta;
						}
					}
				}
			}
			
			return array_unique($own_list);
		}
		
		
		static function get_posts_to_crawl( $audit_id, $provision_task )
		{
			$params = array(
				'posts_per_page' => $provision_task,
				'post_status' => 'publish',
				'post_type' => array('post', 'page'),
				'order' => 'ASC',
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key'     => WPPostsRateKeys_WPPosts_New::$audit_metadata,
						'value'   => '',
						'compare' => 'NOT EXISTS',
					),
					array(
						'key'     => WPPostsRateKeys_WPPosts_New::$audit_metadata,
						'value'	  => $audit_id,
						'compare' => '!=',
						'type'	  => 'NUMERIC'
					),
				)
			);
			
			$posts = get_posts( $params );
			$ids = array();
			
			if( count($posts) > 0 )
			{
				foreach( $posts as $post )
				{
					$ids[] = $post->ID;
				}
			}
			
			return $ids;
		}
		
		
		static function audit_in_progress()
		{
			global $wpdb;
			$audit_ect = $wpdb->get_var( "select ect from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where date_e is null limit 0,1" );
			if( !empty($audit_ect) )
			{
				return $audit_ect;
			}
			else
			{
				return false;
			}
		}
		
		
		static function get_latest_site_audit()
		{
			global $wpdb;
			$latest = $wpdb->get_row( "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where score is not null and health is not null and date_e is not null order by date_e desc limit 0,1" );
			return $latest;
		}
		
		
		static function get_audit_result( $audit_id )
		{
			global $wpdb; 
			
			$result = $wpdb->get_row( "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where id = " . $audit_id );
			
			$response = array(
				'error' => array(
					'red' => array(),
					'green' => array()
				),
				'warning' => array(
					'red' => array(),
					'green' => array()
				)
			);
			
			
			// Duplicate Title Found
			if( $result->dup_title > 0 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . $result->dup_title . __( ' pages/posts</span> title found duplicated', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->dup_title / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=1'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'No page/post</span> has duplicated title', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">0% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=1'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Duplicate Description Found
			if( $result->dup_description > 0 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . $result->dup_description . __( ' pages/posts</span> meta description found duplicated', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->dup_description / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=2'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'No page/post</span> has duplicated meta description', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">0% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=2'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// No Title Found
			if( $result->no_title > 0 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . $result->no_title . __( ' pages/posts</span> missing title', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_title / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=3'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts </span> have title', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=3'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// No Description Found
			if( $result->no_description > 0 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . $result->no_description . __( ' pages/posts</span> missing meta description', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_description / $result->t_post * 100), 2, '.', '' ) . '% of total pages</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=4'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have meta description', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=4'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Broken Link
			if( $result->b_link > 0 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . $result->b_link . __( ' broken links</span> found', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->b_link / $result->t_link * 100), 2, '.', '' ) . '% ' . __('of total links', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-link-manager'),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => __( 'All links are <span>healthy</span>', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">0% ' . __('of total links', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-link-manager'),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Robot Meta Found in Header
			if( !empty($result->robot_meta) )
			{
				$robot_meta = esc_attr($result->robot_meta);
				$robot_meta = wp_trim_words( $robot_meta, 3, '...' );
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . __( 'Homepage</span> has low crawlability', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . $robot_meta . '</span>',
					'url' => admin_url( 'admin.php?page=seopressor-homepage-settings' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'Homepage</span> is crawler friendly', 'seopressor' ),
					'msg_s' => '',
					'url' => '',
					'target' => '',
					'label' => __('', 'seo-pressor')
				);
			}
			
			
			// XML Sitemap
			if( empty($result->xml_sitemap) )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . __( 'Sitemap</span> file not found', 'seopressor' ),
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-sitewide#1'),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'Sitemap</span> file found', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . esc_url($result->xml_sitemap) . '</span>',
					'url' => admin_url('admin.php?page=seopressor-sitewide#1'),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Average Post Creation
			if( $result->avg_post < 8 )
			{
				$response['error']['red'][] = array(
					'msg' => '<span class="seops_red">' . __( 'Frequency</span> of posting is too low', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . __('Average of ', 'seo-pressor') . $result->avg_post . __(' posts per month') . '</span>',
					'url' => admin_url( 'post-new.php' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['error']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'Frequency</span> of posting is good', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . __('Average of ', 'seo-pressor') . $result->avg_post . __(' posts per month') . '</span>',
					'url' => '',
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Robots.txt file
			/*if( !empty($result->robots_txt) )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_red">' . __( 'Robots.txt</span> found', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . __('Robots.txt might conflicts with SEOPressor\'s robot rules', 'seo-pressor') . '</span>',
					'url' => '',
					'target' => '',
					'label' => __('', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'Robots.txt</span> not found', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . __('Robots.txt might conflicts with SEOPressor\'s robot rules', 'seo-pressor') . '</span>',
					'url' => '',
					'target' => '',
					'label' => __('', 'seo-pressor')
				);
			}*/
			
			
			// SEOPressor Keyword Emphasis
			if( $result->no_keyword > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_keyword . __( ' pages/posts</span> missing targeted keyword', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_keyword / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=8'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have targeted keyword', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=8'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// SEOPressor Optimize
			if( $result->no_optimize > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_optimize . __( ' pages/posts</span> not optimized', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_optimize / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=9'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> optimized', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=9'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Schema.org Setup
			if( $result->no_schema > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_schema . __( ' pages/posts</span> missing schema markup', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_schema / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=10'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have setup schema markup', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=10'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Facebook OpenGraph Setup
			if( $result->no_og > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_og . __( ' pages/posts</span> missing Facebook Open Graph', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_og / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=11'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have setup Facebook Open Graph', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=11'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Twitter Setup
			if( $result->no_twitter > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_twitter . __( ' pages/posts</span> missing Twitter Card', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_twitter / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=12'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have setup Twitter Card', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=12'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Image ALT Tag
			if( $result->no_alt_img > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->no_alt_img . __( ' images</span> missing ALT tag', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->no_alt_img / $result->t_img * 100), 2, '.', '' ) . '% ' . __('of total images', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=7'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All images</span> have ALT tag', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">' . '100% ' . __('of total images', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=7'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Word Count
			if( $result->wordcount > 0 )
			{
				$response['warning']['red'][] = array(
					'msg' => '<span class="seops_yellow">' . $result->wordcount . __( ' pages/posts</span> low word count', 'seopressor' ),
					'msg_s' => '<span class="seops_note">' . number_format( (float)($result->wordcount / $result->t_post * 100), 2, '.', '' ) . '% ' . __('of total pages', 'seo-pressor') . '</span>',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=6'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => '<span class="seops_green">' . __( 'All pages/posts</span> have good word count', 'seopressor' ),
					//'msg_s' => '<span class="seops_note">100% ' . __('of total pages', 'seo-pressor') . '</span>',
					'msg_s' => '',
					'url' => admin_url('admin.php?page=seopressor-site-audit-listing&aid=' . $audit_id . '&type=6'),
					'target' => '',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Website Language
			if( empty($result->lang) )
			{
				$response['warning']['red'][] = array(
					'msg' => __('Website has <span class="seops_yellow">no defined language</span>', 'seo-pressor'),
					'msg_s' => __('<span class="seops_note">Having defined language is good for SEO</span>', 'seo-pressor'),
					'url' => admin_url( 'theme-editor.php' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => __('Website has <span class="seops_green">defined language</span>', 'seo-pressor'),
					'msg_s' => '<span class="seops_note">' . esc_attr($result->lang) . '</span>',
					'url' => admin_url( 'theme-editor.php' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			
			
			// Local SEO
			if( $result->local_seo != 1 )
			{
				$response['warning']['red'][] = array(
					'msg' => __('Website missing <span class="seops_yellow">local SEO</span>', 'seo-pressor'),
					'msg_s' => '<span class="seops_note">' . __('Local SEO improves local search ranking', 'seo-pressor') . '</span>',
					'url' => admin_url( 'widgets.php' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}
			else
			{
				$response['warning']['green'][] = array(
					'msg' => __('Website has <span class="seops_green">setup local SEO</span>', 'seo-pressor'),
					'msg_s' => '<span class="seops_note">' . __('Local SEO improves local search ranking', 'seo-pressor') . '</span>',
					'url' => admin_url( 'widgets.php' ),
					'target' => '_blank',
					'label' => __('Fix This', 'seo-pressor')
				);
			}

			return $response;
			
		}
		
		
		static function get_audit_chart_data( $months = 6 )
		{
			global $wpdb;
			
			$data = array();
			$cache_score = 0;
			$cache_health = 0;
			
			// Get the first and last audit date
			$res = $wpdb->get_row( "select min(date_e) as min_date, max(date_e) as max_date
from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name );
			if( $res == NULL || $res->min_date == NULL )
			{
				return false;
			}
			$min_date = $res->min_date;
			$max_date = $res->max_date;
			
			// List the months between first and last audit date
			$start = new DateTime( $min_date );
			$start->modify( 'first day of this month' );
			$end = new DateTime( $max_date );
			$end->modify( 'first day of next month' );
			$interval = DateInterval::createFromDateString( '1 month' );
			$period = new DatePeriod( $start, $interval, $end );
			
			// loop months and get the average score & health from db
			foreach( $period as $dt ) 
			{
				$dt->modify( 'first day of this month' );
				$start_date = $dt->format( 'Y-m-d 00:00:00' );
				$dt->modify( 'last day of this month' );
				$end_date = $dt->format( 'Y-m-d 23:59:59' );
				
				$avg = $wpdb->get_row( "select sum(score)/count(id) as avg_score, sum(health)/count(id) as avg_health from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where date_e between '".$start_date."' and '".$end_date."'" );
				if( $avg !== NULL )
				{
					// if current month no audit record, use last month result
					$score = $avg->avg_score == NULL ? $cache_score : $avg->avg_score;
					$health = $avg->avg_health == NULL ? $cache_health : $avg->avg_health;
				}
				
				$data[$dt->format("M 'y")] = array(
					//'date_start' => $start_date,
					//'date_end' => $end_date,
					'avg_score' => $score,
					'avg_health' => $health
				);
				
				$cache_score = $score;
				$cache_health = $health;
			}
			
			// remove future month
			if( count($data) > 1 )
			{
				$data = array_slice( $data, 0, count($data)-1  );
			}
				
			// Remove if exceed request months, we need the latest $months data only
			if( count($data) > $months )
			{
				$data = array_slice( $data, count($data) - $months, $months  );
			}
						
			return $data;

		}
		
		
		static function get_readable_ect( $minutes )
		{
			$str = '';
	
			$dtF = new DateTime("@0");
			$dtT = new DateTime("@".($minutes*60));
			$interval = $dtF->diff($dtT);
			
			$day = $interval->format('%a');
			$hour = $interval->format('%h');
			$minute = $interval->format('%i');
			
			if( $day > 0 )
				$str .= $day . ' ' . __('day(s)' ,'seo-pressor') . ' ';
			if( $hour > 0 )
				$str .= $hour . ' ' . __('hour(s)' ,'seo-pressor') . ' ';
			if( $minute > 0 )
				$str .= $minute . ' ' . __('minute' ,'seo-pressor') . ' ';
			
			return $str;
		}
		
		
	}
}