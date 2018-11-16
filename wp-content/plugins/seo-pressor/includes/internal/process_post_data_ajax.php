<?php

@set_time_limit(120);
global $wpdb;

// get global settqings
$settings = WPPostsRateKeys_Settings::get_options();

$first_query = $_REQUEST['first_query'];
$keywords = array();
$title = (isset($_REQUEST['post_title'])) ? $_REQUEST['post_title'] : $_REQUEST['title'];
$content = $_REQUEST['post_content'];
$content = str_replace( "\n", "\r\n", $content ); // Simulate WP save post processing
$post_name = $_REQUEST['post_name'];
$auto_analysis = $_REQUEST['auto_analysis'];
$post_args = array(
	'ID' => $post_id,
	'post_title' => $title,
	'post_content' => $content
);

// save post title, content, slug
if( $post_name != '' )
{
	// Update all, including Post name
	$post_args['post_name'] =  sanitize_title($post_name); // WP same processing
}
remove_action( 'save_post', array($this, 'handle_update_post_form') );
wp_update_post( $post_args );
add_action( 'save_post', array($this, 'handle_update_post_form') );


// save keywords & box settings
if( $first_query == 'false' )
{
	if( isset($_REQUEST['keywords']) && count($_REQUEST['keywords']) > 0 )
	{
		foreach( $_REQUEST['keywords'] as $kw )
		{
			$keywords[] = trim($kw);
		}
	}

	// update keywords if user have permission to do on page analysis
	if( WPPostsRateKeys_CustomRoles::user_can('on_page_analysis') )
	{
		WPPostsRateKeys_WPPosts_New::save_seop_box_keywords( $post_id, $keywords );
	}

	// update keywords if user have mission on meta/social/schema setting
	if( WPPostsRateKeys_CustomRoles::user_can('on_page_social_seo') || WPPostsRateKeys_CustomRoles::user_can('on_page_schema_setting') || WPPostsRateKeys_CustomRoles::user_can('on_page_meta_setting') )
	{
		WPPostsRateKeys_WPPosts_New::save_seop_box_settings( $post_id, $_REQUEST['settings'] );
	}
}


$keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );
$box_settings = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post_id );

// check social settings on box settings
// update box's social settings with sitewide social settings
// if both box and sitewide social settings are not empty
if ($settings['sitewide_fb_enable']
// && empty($box_settings['fb_url'])
// && empty($box_settings['fb_site_name'])
&& empty($box_settings['fb_title'])
&& empty($box_settings['fb_img'])
&& empty($box_settings['fb_description'])
&& empty($box_settings['fb_publisher'])
&& empty($box_settings['fb_author'])
&& empty($box_settings['fb_admin'])
&& empty($box_settings['fb_appid'])
)
{

	$box_settings['fb_enable'] 			= $settings['sitewide_fb_enable'];
	$box_settings['fb_type'] 				= $settings['sitewide_fb_type'];
	$box_settings['fb_url'] 				= $settings['sitewide_fb_url'];
	$box_settings['fb_site_name'] 	= $settings['sitewide_fb_name'];
	$box_settings['fb_title'] 			= $settings['sitewide_fb_title'];
	$box_settings['fb_img'] 				= $settings['sitewide_fb_img'];
  $box_settings['fb_description'] = $settings['sitewide_fb_desc'];
	$box_settings['fb_publisher']		= $settings['sitewide_fb_publisher'];
	$box_settings['fb_author'] 			= $settings['sitewide_fb_author'];
	$box_settings['fb_admin'] 			= $settings['sitewide_fb_admin'];
	$box_settings['fb_appid'] 			= $settings['sitewide_fb_appid'];
}

if ($settings['sitewide_tw_enable']
&& empty($box_settings['tw_site'])
&& empty($box_settings['tw_creator'])
&& empty($box_settings['tw_title'])
&& empty($box_settings['tw_description'])
&& empty($box_settings['tw_image'])
)
{
	$box_settings['tw_enable']			= $settings['sitewide_tw_enable'];
	$box_settings['tw_type'] 				= $settings['sitewide_tw_type'];
	$box_settings['tw_site'] 				= $settings['sitewide_tw_site'];
	$box_settings['tw_creator'] 		= $settings['sitewide_tw_creator'];
	$box_settings['tw_title'] 		  = $settings['sitewide_tw_title'];
	$box_settings['tw_description']	= $settings['sitewide_tw_desc'];
	$box_settings['tw_image'] 			= $settings['sitewide_tw_img'];
}

// update or reset score data
if( count($keywords) > 0 )
{
	if ($auto_analysis == true) {
		WPPostsRateKeys_Central::check_update_post_data_in_cache_new($post_id);
	}
}
else
{
	WPPostsRateKeys_WPPosts_New::reset_seop_analyze_result( $post_id );
}

@set_time_limit(30);
