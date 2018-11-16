<?php
/**
 * Include to show the plugin Homepage Settings
 *
 * @package admin-panel
 * @version v5.0
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'homepage_seo' ) ) 
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

if ($seopressor_is_active && $seopressor_has_permission) {
	// Settings data
	$data = WPPostsRateKeys_Settings::get_options();
}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_homepage_settings.php');
