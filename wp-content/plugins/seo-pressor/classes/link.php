<?php

if (!class_exists('WPPostsRateKeys_Link')) {
	
	class WPPostsRateKeys_Link
	{
		static $table_name = 'link';
		static $task_limit = 5;
		static $recheck_days = 7;
		
		static function cron_run_link_check()
		{
			global $wpdb;
			$sql = "select ID
from ".$wpdb->posts."
where post_type in ('post','page')
and post_status = 'publish'
and ( (
  select meta_value
  from ".$wpdb->postmeta."
  where post_id = ID
  and meta_key = '".WPPostsRateKeys_WPPosts_New::$linkcheck_metadata."'
  order by meta_value desc
  limit 0,1
) is null or (
  select meta_value
  from ".$wpdb->postmeta."
  where post_id = ID
  and meta_key = '".WPPostsRateKeys_WPPosts_New::$linkcheck_metadata."'
  order by meta_value desc
  limit 0,1
)+".(self::$recheck_days * 24 * 60 * 60)." < ".current_time('timestamp')." )
limit 0,".self::$task_limit;
	
			$result = $wpdb->get_results( $sql );
			
			// query post/page which haven't run or need to re-check
			/*$args = array(
				'post_type' => array( 'post', 'page' ),
				'post_status' => array( 'publish' ),
				'posts_per_page' => self::$task_limit,
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => WPPostsRateKeys_WPPosts_New::$linkcheck_metadata,
						'compare' => 'NOT EXISTS'
					),
					array(
						'key' => WPPostsRateKeys_WPPosts_New::$linkcheck_metadata,
						'value' => current_time('timestamp') - (self::$recheck_days * 24 * 60 * 60),
						'meta_type' => 'DATETIME',
						'compare' => '<'
					)
				)
			);
			
			$result = get_posts( $args );*/
			
			if( count($result) > 0 )
			{
				foreach( $result as $single )
				{
					self::analyze_post( $single->ID );
				}
				WPPostsRateKeys_Settings::update_link_running_status( current_time('timestamp') );
			}
			else
			{
				WPPostsRateKeys_Settings::update_link_running_status();
			}
			
		}
		
		
		static function analyze_post( $post_id )
		{
			
			global $wpdb;
			
			$post = get_post( $post_id );
			
			// get site url
			$wp_url = get_site_url();
			$wp_url_clean = str_replace('http://www.','',$wp_url);
			$wp_url_clean = str_replace('https://www.','',$wp_url_clean);
			$wp_url_clean = str_replace('https://','',$wp_url_clean);
			$wp_url_clean = str_replace('http://','',$wp_url_clean);
			
			$time = time();
			$post_content = trim( $post->post_content );
			$post_content = do_shortcode( $post->post_content );
			
			// delete outdated link on this post
			self::delete_links( $post_id );
			
			// skip if empty post content
			if( empty($post_content) )
			{
				WPPostsRateKeys_WPPosts_New::update_link_checking( $post_id, $time );
				return;
			}
			
			// get all link via regular expression
			$matches = array();
			preg_match_all('/<a\s[^>]*href=\"([^\"#]*)\"[^>]*>(.*)<\/a>/siU', $post_content, $matches, PREG_SET_ORDER);
			
			// skip if no link in post content
			if( !$matches || count($matches) <= 0 )
			{
				WPPostsRateKeys_WPPosts_New::update_link_checking( $post_id, $time );
				return;
			}
			
			$return = array();
			
			// loop all link
			foreach( $matches as $row )
			{
				$url = trim($row[1]);
				
				// remove html tag in anchor text
				$anchor_text = self::strip_html_tags($row[2]);
				
				$match = preg_match( "/^mailto:([^\?]*)/", $url );
				if( $match )
				{
					// skip mailto
					$status_code = 200;
				}
				else
				{
					// append wpurl for internal link
					$url = self::process_url( $url, $post_id );
									
					// get http status code
					$status_code = self::get_http_status_code( $url );
				}

				$params = array(
					'post_id' => $post_id,
					'url' => $url,
					'anchor_text' => $anchor_text,
					'status_code' => $status_code,
					'last_checked' => current_time('mysql')
				);
				$return[] = $params;
				self::add( $params );
				
				WPPostsRateKeys_WPPosts_New::update_link_checking( $post_id, $time );
			}
			
			return $return;
			
		}
		
		
		static function get_http_status_code( $url )
		{
			$scheme = 'http://';
			$url = parse_url( $url, PHP_URL_SCHEME ) === null ? $scheme . $url : $url;
			
			$url = str_replace( ' ', '%20', $url );
			
			// first method: use get_headers function
			$headers = @get_headers($url);
			$httpcode = substr($headers[0], 9, 3);
			
			if( !empty($httpcode) && $httpcode < 400 )
				return $httpcode;
			
			// second method: use curl
			if( function_exists('curl_version') )
			{
				$handle = curl_init($url);
				curl_setopt($handle, CURLOPT_NOBODY, TRUE);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($handle, CURLOPT_HEADER, 1);
				curl_exec($handle);
				$httpcode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
				curl_close($handle);
				
				if( !empty($httpcode) && $httpcode < 400 )
					return $httpcode;
			}
			
			// third method: use wp_remote_get
			$response = wp_remote_get( $url );
			if( is_wp_error( $response ) ) 
			{
				$httpcode = 0;
			}
			else
			{
				$httpcode = wp_remote_retrieve_response_code( $response );
			}
			
			$httpcode = ($httpcode == '' ? 0 : $httpcode);
		
			return $httpcode;
		}
		
		static function process_url( $url, $post_id )
		{
			if( !preg_match("~^(?:f|ht)tps?://~i", $url) ) 
			{
				// no http
				$firstword = substr($url, 0, 1);
				if( $firstword == '/' )
				{
					// prepand wpurl
					$url = site_url() . $url;
				}
				else
				{
					// prepand permalink of the post
					$url = get_permalink($post_id) . $url;
				}
			}
			return $url;
		}
		
		static function reset_all_links()
		{
			global $wpdb;
			$wpdb->query( "truncate " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name );
			$wpdb->query( "delete from $wpdb->postmeta where meta_key = '" . WPPostsRateKeys_WPPosts_New::$linkcheck_metadata . "'" );
		}
		
		static function reset_single_link( $id )
		{
			global $wpdb;
			$url = $wpdb->get_var( "select url from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where id = " . $id );
			$httpcode = self::get_http_status_code( $url );
			$wpdb->update( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, array( 'status_code' => $httpcode ), array( 'id' => $id ) );
			
			return $httpcode;
		}
				
		static function delete_links( $post_id )
		{
			global $wpdb;
			$wpdb->delete( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, array( 'post_id' => $post_id ) );
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
		
		
		static function endswith($string, $ends_to_test) {
			if (WPPostsRateKeys_Settings::support_multibyte()) 
			{
				$strlen = mb_strlen($string,'UTF-8');
				$testlen = mb_strlen($ends_to_test,'UTF-8');
			}
			else
			{
				$strlen = strlen($string,'UTF-8');
				$testlen = strlen($ends_to_test,'UTF-8');
			}
			
			if ($testlen > $strlen) return false;
			return substr_compare($string, $ends_to_test, -$testlen) === 0;
		}
		
		
		
		/*
		 * except "WPPostsRateKeys" that is the name of the class of the plugin
		 * Begin Common Code
		 * This can be avoid since PHP 5.3 (http://www.php.net/manual/en/language.oop5.late-static-bindings.php)
		 */
		
		/**
		 * The Object to access DB
		 * @static
		 * @var GpcKits_DBO
		 */
		static $db_obj;
		
		/**
		 * Set DB Object
		 *
		 * @static 
		 * @global $wpdb used to access to WordPress Object that manage DB
		 * @param string $table optional value of the table
		 * @access public
		 */
		static public function set_db_obj($table='')
		{
		   	global $wpdb;
		   	if ($table=='') $table = self::$table_name;
		   	$full_table_name =  $wpdb->prefix . WPPostsRateKeys::$db_prefix . $table;
		   	
		   	if (class_exists('WPPostsRateKeys_DBO'))
				self::$db_obj = new WPPostsRateKeys_DBO($full_table_name);
		}
		
		/**
		 * Get all items from DB
		 * 
		 * @static
		 * @param int $id value of the field to filter
		 * @param string $field name of the column to filter
		 * @param string $order_by name of the column to order by
		 * @param string $field_type type of the column to filter (can be '%s' for strings or '%d' for numeric values)
		 * @return array
		 * @access public
		 */
		static public function get_all($id='', $field='', $order_by='', $field_type='')
		{
	   		self::set_db_obj();
	   		if (self::$db_obj!=NULL)
	   			return self::$db_obj->get_all($id, $field, $order_by, $field_type);
	   		else
	   			return array();
		}
		
		/**
		 * Get item from DB
		 * 
		 * @static
		 * @param int $id value of the field to filter
		 * @param string $field name of the column to filter
		 * @param string $field_type type of the column to filter (can be '%s' for strings or '%d' for numeric values)
		 * @return array|NULL data when query was executed succesfully, else return NULL
		 * @access public
		 */
		static public function get($id, $field='', $field_type='')
		{
			self::set_db_obj();
			if (self::$db_obj!=NULL)
	   			return self::$db_obj->get($id, $field, $field_type);
	   		else
	   			return NULL;
		}
		
		/**
		 * Update item DB
		 * 
		 * @static
		 * @param array $data with all the key/values to be updated in the table
		 * @param array $where with all the key/values to filter the update
		 * @return bool true when query was executed succesfully, else return FALSE
		 * @access public
		 */
		static public function update($data,$where)
		{
		   	self::set_db_obj();
		   	if (self::$db_obj!=NULL) {
	   			WPPostsRateKeys_Settings::update_internal_link_modification_time(time());
	   			return self::$db_obj->update($data,$where);
		   	}
	   		else 
	   			return FALSE;
		}
		
		/**
		 * Add item DB
		 * 
		 * @static
		 * @param array $data with all the key/values to be added to table
		 * @return int|bool ID generated for an AUTO_INCREMENT column by the most recent INSERT query 
		 * 					or FALSE when the query wasn't executed succesfully
		 * @access public
		 */
		static public function add($data)
		{
			self::set_db_obj();
			if (self::$db_obj!=NULL) {
	   			WPPostsRateKeys_Settings::update_internal_link_modification_time(time());
	   			return self::$db_obj->add($data);
			}
	   		else 
	   			return FALSE;
		}
		
		/**
		 * Delete item DB
		 * 
		 * @static
		 * @param int $id value of the field of the data to delete
		 * @param string $field name of the column to filter
		 * @param string $field_type type of the column to filter (can be '%s' for strings or '%d' for numeric values)
		 * @return bool true when query was executed succesfully, else return FALSE
		 * @access public
		 */
		static public function delete($id, $field='', $field_type='')
		{
			self::set_db_obj();
			if (self::$db_obj!=NULL) {
	   			WPPostsRateKeys_Settings::update_internal_link_modification_time(time());
	   			return self::$db_obj->delete($id,$field,$field_type);
			}
	   		else 
	   			return FALSE;
		}
		
		/*
		 * End Common Code
		 * This can be avoid since PHP 5.3 (http://www.php.net/manual/en/language.oop5.late-static-bindings.php)
		 */
		
		
	}
	
}
