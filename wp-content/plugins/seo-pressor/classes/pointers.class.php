<?php

if( !class_exists('WPPostsRateKeys_Pointers') )
{
	class WPPostsRateKeys_Pointers
	{
		
		static $usermeta_ignore_notice = 'seop_ignore_notice';
		static $usermeta_ignore_tour = 'seop_ignore_tour';
		static $pointer = array();
		
		public static function load_notice()
		{
			// skip if lower version, current user not admin, or already choose to ignore
			if( get_bloginfo( 'version' ) < '3.3' || !current_user_can( 'manage_options' ) || self::has_ignored_notice() )
				return;
			
			$pointer = self::get_pointer_content_arr();
			
			wp_enqueue_script( 'jquery-ui' );
			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );
			
			wp_enqueue_script( 'seop_pointer', WPPostsRateKeys::$plugin_url . 'templates/js/seops.pointer.js' );
			wp_localize_script( 'seop_pointer', 'seop_pointer', $pointer );
			
		}
		
		public static function has_ignored_notice()
		{
			$type = self::$usermeta_ignore_notice;
				
			$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

			return in_array($type, $dismissed);
		}
		
		public static function has_ignored_tour()
		{
			$type = self::$usermeta_ignore_tour;
				
			$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

			return in_array($type, $dismissed);
		}
		
		public static function get_pointer_content_arr() {
			$notice_pointer_content = '<h3>' . __( 'SEOPressor', 'seo-pressor' ) . '</h3>';
			$notice_pointer_content .= '<p>' . __( 'Thank you for installing SEOPressor. Click on the \'Start Tour\' button for an introduction to what you can do with SEOPressor.', 'seo-pressor' ) . '</p>';
			$notice_pointer_content .= '<p style="text-align:center;"><a id="seops_start_tour_action" style="font-size:13px; color:#FFF; padding:5px 12px; background:#0b77b1; display:inline-block; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; cursor:pointer; text-decoration:none;">Start Tour</a></p>';
			
			return array(
				'usermeta' => self::$usermeta_ignore_notice,
				'content' => $notice_pointer_content,
				'anchor_id' => '#toplevel_page_seo-pressor',
				'edge' => 'bottom',
				'align' => 'left',
				'tour_url' => admin_url('admin.php?page=seopressor-settings')
			);
		}
		
		
	}
}