<?php
/**
 * Include to show the Suggestions
 *
 * @uses	int		$post_id
 *
 * @package admin-panel
 *
 */
// Check if user can access
$seopressor_has_permission_analysis = WPPostsRateKeys_CustomRoles::user_can( 'on_page_analysis' );
$seopressor_has_permission_meta = WPPostsRateKeys_CustomRoles::user_can( 'on_page_meta_setting' );
$seopressor_has_permission_social = WPPostsRateKeys_CustomRoles::user_can( 'on_page_social_seo' );
$seopressor_has_permission_schema = WPPostsRateKeys_CustomRoles::user_can( 'on_page_schema_setting' );

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

if ($seopressor_is_active) {
	// Get settings
	$settings = WPPostsRateKeys_Settings::get_options();
}

if ( has_excerpt( $post_id ) ) {
	$meta_description = strip_tags( get_the_excerpt( ) );
} else {
	global $post;
	if (WPPostsRateKeys_Settings::support_multibyte()) {
		$meta_description = str_replace( "\r\n", ' ' , mb_substr( strip_tags( strip_shortcodes( $post->post_content ) ), 0, 160,'UTF-8' ) );
	}
	else {
		$meta_description = str_replace( "\r\n", ' ' , substr( strip_tags( strip_shortcodes( $post->post_content ) ), 0, 160 ) );
	}
	$meta_description .= '(...)';
}

// Include Html template
include( WPPostsRateKeys::$template_dir . '/includes/admin/seop-box.php');

