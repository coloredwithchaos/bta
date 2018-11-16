<?php
@set_time_limit(120);

// get global settings
$settings = WPPostsRateKeys_Settings::get_options();

$keywords = array();

if( isset($_REQUEST['seop_attr']['keyword']) )
{
	foreach( $_REQUEST['seop_attr']['keyword'] as $kw )
	{
		$kw = trim($kw);
		if( !empty($kw) )
			$keywords[] = $kw;
	}
}

$box_settings = $_REQUEST['seop_attr'];

unset( $box_settings['keyword'] );
if( !isset($box_settings['meta_rules']) )
{
	$box_settings['meta_rules'] = '';
}
else
{
	$box_settings['meta_rules'] = implode( '#|#|#', $box_settings['meta_rules'] );
}

if( !isset($box_settings['fb_enable']) )
{
	$box_settings['fb_enable'] = 0;
}
else
{
	$box_settings['fb_enable'] = ( $box_settings['fb_enable'] == 1 ? 1 : 0 );
}
$box_settings['fb_enable'] = strval($box_settings['fb_enable']);

if( !isset($box_settings['tw_enable']) )
{
	$box_settings['tw_enable'] = 0;
}
else
{
	$box_settings['tw_enable'] = ( $box_settings['tw_enable'] == 1 ? 1 : 0 );
}
$box_settings['tw_enable'] = strval($box_settings['tw_enable']);

if( !isset($box_settings['schema_enable']) )
{
	$box_settings['schema_enable'] = 0;
}
else
{
	$box_settings['schema_enable'] = ( $box_settings['schema_enable'] == 1 ? 1 : 0 );
}
$box_settings['schema_enable'] = strval($box_settings['schema_enable']);

if( !isset($box_settings['dc_enable']) )
{
	$box_settings['dc_enable'] = 0;
}
else
{
	$box_settings['dc_enable'] = ( $box_settings['dc_enable'] == 1 ? 1 : 0 );
}
$box_settings['dc_enable'] = strval($box_settings['dc_enable']);

// update keywords if user have permission to do on page analysis
if( WPPostsRateKeys_CustomRoles::user_can('on_page_analysis') )
{
	WPPostsRateKeys_WPPosts_New::save_seop_box_keywords( $post_id, $keywords );
}

// update keywords if user have mission on meta/social/schema setting
if( WPPostsRateKeys_CustomRoles::user_can('on_page_social_seo') || WPPostsRateKeys_CustomRoles::user_can('on_page_schema_setting') || WPPostsRateKeys_CustomRoles::user_can('on_page_meta_setting') )
{
	WPPostsRateKeys_WPPosts_New::save_seop_box_settings( $post_id, $box_settings );
}

$keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );

if( count($keywords) > 0 )
{
	WPPostsRateKeys_Central::check_update_post_data_in_cache_new($post_id);
}
else
{
	WPPostsRateKeys_WPPosts_New::reset_seop_analyze_result( $post_id );
}

// reset and push to link checker queue
WPPostsRateKeys_WPPosts_New::update_link_checking( $post_id, '' );


@set_time_limit(30);

