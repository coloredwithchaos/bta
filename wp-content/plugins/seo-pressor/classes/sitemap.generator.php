<?php
if (!class_exists('WPPostsRateKeys_Sitemap')) 
{
	class WPPostsRateKeys_Sitemap 
	{
		
		public static $items = array();		
		
		public function __construct() 
		{
			global $wpdb;
			//self::RaiseMemory();
		}
		
		public static function GenerateXmlSitemap() 
		{
			
			$settings = WPPostsRateKeys_Settings::get_options();
			if( $settings['seop_enable_sitemap'] != 1 )
				return false;
			
			self::RaiseMemory();
			
			global $wpdb, $post, $wp_query, $wp_rewrite;
			$wp_rewrite = new WP_Rewrite();
			if (is_admin()) require_once(ABSPATH . 'wp-includes/pluggable.php');
			
			$settings = WPPostsRateKeys_Settings::get_options();
			//var_dump($settings);
			
			$path = trailingslashit( ABSPATH );
			$filename = $path.'sitemap.xml';
			
			if( file_exists($filename) )
			{
				$xmlcontent = file_get_contents($filename, true);
				if( !empty($xmlcontent) )
				{
					$find = strpos( $xmlcontent, '<!-- Powered by SEOPressor -->' );
					if( $find == false && !file_exists($path.'sitemap.seopbackup.xml') )
					{
						rename( $filename, $path.'sitemap.seopbackup.xml' );
					}
				}
			}
			
			if (!$handle = fopen($filename, 'w')) {
				WPPostsRateKeys_Logs::add_error('341',"Unable to create file $filename");
				return false;
			}
			
			// get front page id
			$frontpage_id = get_option('page_on_front');
			
			// home page
			if($settings['seop_sitemap_content_homepage'] == '1') {
				self::$items[] = array(
					"loc"			=> get_home_url()
					, "lastmod"		=> NULL
					, "changefreq"	=> self::get_freq_name($settings['seop_sitemap_frequency'])
					, "priority"	=> self::format_priority($settings['seop_sitemap_priority_homepage'])
				);
			}
			
			// Posts
			if($settings['seop_sitemap_content_posts'] == '1') 
			{
				$posts = get_posts( "post_type=post&post_status=publish&nopaging=true" );
				if( count($posts) > 0 )
				{
					foreach( $posts as $singlepost )
					{
						if( $frontpage_id == $singlepost->ID )
							continue;
							
						self::$items[] = array(
							"loc"			=> get_permalink( $singlepost->ID )
							, "lastmod"		=> date('Y-m-d', strtotime($singlepost->post_modified))
							, "changefreq"	=> self::get_freq_name($settings['seop_sitemap_frequency'])
							, "priority"	=> self::format_priority($settings['seop_sitemap_priority_posts'])
						);
					}
					
				}
			}
			
			// Static Pages
			if( $settings['seop_sitemap_content_pages'] == '1' )
			{
				$pages = get_posts( "post_type=page&post_status=publish&nopaging=true" );
				if( count($pages) > 0 )
				{
					foreach( $pages as $singlepage )
					{
						if( $frontpage_id == $singlepage->ID )
							continue;
						
						self::$items[] = array(
							"loc"			=> get_permalink( $singlepage->ID )
							, "lastmod"		=> date('Y-m-d', strtotime($singlepage->post_modified))
							, "changefreq"	=> self::get_freq_name($settings['seop_sitemap_frequency'])
							, "priority"	=> self::format_priority($settings['seop_sitemap_priority_pages'])
						);
					}
				}
			}
			
			// Categories
			if( $settings['seop_sitemap_content_categories'] == '1' )
			{
				$categories = get_categories( array('hide_empty' => 0,) );
				if( count($categories) > 0 )
				{
					foreach( $categories as $category )
					{
						self::$items[] = array(
							"loc"			=> get_category_link( $category->term_id )
							, "lastmod"		=> NULL
							, "changefreq"	=> self::get_freq_name($settings['seop_sitemap_frequency'])
							, "priority"	=> self::format_priority($settings['seop_sitemap_priority_categories'])
						);
					}
				}
			}
			
			
			// Populate XML Sitemap
			fwrite($handle, '<?xml version="1.0" encoding="UTF-8"?>'."\r\n");
			fwrite($handle, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\r\n");
			
			if(count(self::$items) > 0) {
				foreach(self::$items as $item) {
					fwrite($handle, '<url>');
						fwrite($handle, '<loc>'.$item['loc'].'</loc>'."\r\n");
						if( !empty($item['lastmod']) )
							fwrite($handle, '<lastmod>'.$item['lastmod'].'</lastmod>'."\r\n");
						fwrite($handle, '<changefreq>'.$item['changefreq'].'</changefreq>'."\r\n");
						fwrite($handle, '<priority>'.$item['priority'].'</priority>'."\r\n");
					fwrite($handle, '</url>');
				}
			}
			
			fwrite($handle, '</urlset>'."\r\n");
			fwrite($handle, '<!-- Powered by SEOPressor -->');
			fclose($handle);
			
			return true;
		}
		
		public static function deleteXmlSitemap()
		{
			$path = trailingslashit( ABSPATH );
			$filename = $path.'sitemap.xml';
			
			if( file_exists($filename) )
			{
				$xmlcontent = file_get_contents($filename, true);
				if( !empty($xmlcontent) && strpos( $xmlcontent, '<!-- Powered by SEOPressor -->' ) != false )
				{
					unlink($filename);
				}
			}
		}
		
		public static function restoreOriginalXmlSitemap()
		{
			$path = trailingslashit( ABSPATH );
			$filename = $path.'sitemap.xml';
			$filename_original = $path.'sitemap.seopbackup.xml';
			
			if( file_exists($filename) )
			{
				unlink($filename);
			}
			
			if( file_exists($filename_original) )
			{
				rename( $filename_original, $filename );
			}
		}
		
		private static function format_priority($val) {
			return number_format($val,1);
		}
		
		private static function get_freq_name($val = 1) {
			switch(intval($val)) {
				case 1: $name = 'always'; break;
				case 2: $name = 'hourly'; break;
				case 3: $name = 'daily'; break;
				case 4: $name = 'weekly'; break;
				case 5: $name = 'monthly'; break;
				case 6: $name = 'yearly'; break;
				case 7: $name = 'never'; break;
				default: $name = 'always'; break;
			}
			return $name;
		}
		
		private static function add_url($lists) {
			$str = '';
			foreach($lists as $list) {
				$str .= "\r\n<url>\r\n";
				$str .= "<loc>".$list['loc']."</loc>\r\n";
				$str .= "<lastmod>".$list['lastmod']."</lastmod>\r\n";
				$str .= "<changefreq>".$list['changefreq']."</changefreq>\r\n";
				$str .= "<priority>".$list['priority']."</priority>\r\n";
				$str .= "</url>";
			}
			return $str;
		}
		
		private static function RaiseMemory() {
			
			$mem = abs(intval(@ini_get('memory_limit')));
			if($mem && $mem < 128) {
				@ini_set('memory_limit', '128M');
			}

			$time = abs(intval(@ini_get("max_execution_time")));
			if($time != 0 && $time < 120) {
				@set_time_limit(120);
			}

		}
		
		
		
	}
}