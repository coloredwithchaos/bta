<?php
if (!class_exists('WPPostsRateKeys_Crawler')) {
	class WPPostsRateKeys_Crawler
	{
		
		static $table_name = 'site_audit_crawler';
		
		static function do_crawl( $audit_id, $post_id )
		{
			if( empty($post_id) || empty($audit_id) )
				return;
				
			global $wpdb;
			
			// define table variable
			$table_link = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Link::$table_name;
			$table_crawler = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			
			// delete row if already exists
			$wpdb->delete( $table_crawler, array(
				'audit_id' => $audit_id,
				'post_id' => $post_id
			), array(
				'%d', '%d'
			) );
			
			// post object
			$post = get_post( $post_id );
			
			// do link crawling if not yet
			$already_check_link = WPPostsRateKeys_WPPosts_New::get_link_checking_status( $post_id );
			if( $already_check_link == false || empty($already_check_link) )
				WPPostsRateKeys_Link::analyze_post( $post_id );
			
			// get post meta setting
			$keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );
			$settings = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post_id );
			$score = WPPostsRateKeys_WPPosts_New::get_seop_analyze_score( $post_id );
			
			// exclude from crawl if noindex found in robot rules
			if( !empty($settings['meta_rules']) && strpos( $settings['meta_rules'], 'noindex' ) !== false )
			{
				WPPostsRateKeys_WPPosts_New::update_audit_status( $post_id, $audit_id );
				return;
			}
			
			// prepare variable to insert
			$post_title = empty($settings['meta_title']) ? $post->post_title : $settings['meta_title'];
			$post_description = $settings['meta_description'];
			$broken_link = $wpdb->get_var( "select count(id) from " . $table_link . " where post_id = " . $post_id . " and ( status_code = 0 or status_code >= 400) " );
			$nice_link = $wpdb->get_var( "select count(id) from " . $table_link . " where post_id = " . $post_id . " and status_code > 0 and status_code < 400" );
			$has_keyword = count($keywords) > 0 ? 1 : 0;
			if( count($keywords) > 0 && $score >= 40 )
				$has_optimize = 1;
			else
				$has_optimize = 0;
			$has_schema = $settings['schema_enable'] == 1 ? 1 : 0;
			$has_og = $settings['fb_enable'] == 1 ? 1 : 0;
			$has_twitter = $settings['tw_enable'] == 1 ? 1 : 0;
			$total_images = self::get_images_in_content( $post->post_content );
			$no_alt_images = $total_images - self::get_images_in_content_alt( $post->post_content );
			$wordcount = self::get_word_count( $post->post_content );
			
			$params = array(
				'post_id' => $post_id,
				'audit_id' => $audit_id,
				'title' => $post_title,
				'description' => $post_description,
				'broken_link' => $broken_link,
				'nice_link' => $nice_link,
				'has_keyword' => $has_keyword,
				'has_optimize' => $has_optimize,
				'has_schema' => $has_schema,
				'has_og' => $has_og,
				'has_twitter' => $has_twitter,
				'no_alt_images' => $no_alt_images,
				'total_images' => $total_images,
				'wordcount' => $wordcount,
				'post_creation_date' => $post->post_date,
				'creation_date' => current_time('mysql')
			);
			$formats = array( '%d', '%d', '%s', '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%s', '%s' );
			if( $score != NULL )
			{
				$params['score'] = $score;
				$formats[] = '%d';
			}
			
			$wpdb->insert( $table_crawler, $params, $formats );
			WPPostsRateKeys_WPPosts_New::update_audit_status( $post_id, $audit_id );
					
		}
		
		static function get_images_in_content( $content='' )
		{
			$matches = array();
        	preg_match_all( '/<img\s[^>]*>/siU', $content, $matches, PREG_SET_ORDER );
			
			return count($matches);
			
		}
		
		static function get_images_in_content_alt( $content='' )
		{
			$matches = array();
        	preg_match_all( '/<img\s[^>]*alt=\"([^\"]*)\"[^>]*>/siU', $content, $matches, PREG_SET_ORDER );
			
			return count($matches);
		}
		
		static function get_word_count( $content='' ) {
        	$content_no_html = self::strip_html_tags( $content );
        	return count( self::sanitize_words( $content_no_html ) );
        }
		
		static function sanitize_words( $string='' ) {
        	preg_match_all( "/\p{L}[\p{L}\p{Mn}\p{Pd}'\x{2019}]*/u", $string, $matches, PREG_PATTERN_ORDER );
        	return $matches[0];
        }
		
		static function strip_html_tags( $text )
		{
			$text = str_replace('<?php', 'mphpB', $text);
			$text = str_replace( '?>', 'mphpE',$text);
			
			$text = preg_replace(
					array(
							// Remove invisible content
							'@<head[^>]*?>.*?</head>@siu',
							'@<style[^>]*?>.*?</style>@siu',
							'@<script[^>]*?.*?</script>@siu',
							'@<object[^>]*?.*?</object>@siu',
							'@<embed[^>]*?.*?</embed>@siu',
							'@<applet[^>]*?.*?</applet>@siu',
							'@<noframes[^>]*?.*?</noframes>@siu',
							'@<noscript[^>]*?.*?</noscript>@siu',
							'@<noembed[^>]*?.*?</noembed>@siu',
							// Add line breaks before and after blocks
							'@</?((address)|(blockquote)|(center)|(del))@iu',
							'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
							'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
							'@</?((table)|(th)|(td)|(caption))@iu',
							'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
							'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
							'@</?((frameset)|(frame)|(iframe))@iu',
					),
					array(
							' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
							"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
							"\n\$0", "\n\$0",
					),
					$text );
			return strip_tags( $text );
		}
	}
}

