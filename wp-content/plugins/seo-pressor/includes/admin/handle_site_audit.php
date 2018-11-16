<?php
/**
 * Include to show the Site Audit page
 *
 * @package admin-panel
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'site_audit' ) )
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

// Check if wp-cron is allowed
if( defined('DISABLE_WP_CRON') && DISABLE_WP_CRON == true )
{
	$msg_error[] = __('Site audit requires WordPress Cron to be enabled.','seo-pressor');
}

if ($seopressor_is_active && $seopressor_has_permission) {
	// Settings data
	//$data = WPPostsRateKeys_Settings::get_options();
	
	$is_auditing = WPPostsRateKeys_Site_Audit::audit_in_progress();
	if( $is_auditing )
	{
		$audit_ect = WPPostsRateKeys_Site_Audit::get_readable_ect( $is_auditing );
	}
	
	
	$audit = WPPostsRateKeys_Site_Audit::get_latest_site_audit();
	if( $audit != FALSE )
	{
		$audit_date = new DateTime( $audit->date_s );
		$listing = WPPostsRateKeys_Site_Audit::get_audit_result( $audit->id );
		
		$score = $audit->score;
		$health = $audit->health;
		
		$colors = array(
			'green' => '#4caf50',
			'blue' => '#0b77b1',
			'grey' => '#e3e3e3',
			'red' => '#f44336'
		);
		
		switch( $score )
		{
			case $score < 80: $score_color = $colors['blue']; $score_label_class = "seops_blue"; break;
			case $score <= 100: $score_color = $colors['green']; $score_label_class = "seops_green"; break;
			default: $score_color = $colors['red']; $score_label_class = "seops_red"; break;
		}
		switch( $health )
		{
			case $health < 80: $health_color = $colors['blue']; $health_label_class = "seops_blue"; break;
			case $health <= 100: $health_color = $colors['green']; $health_label_class = "seops_green"; break;
			default: $health_color = $colors['red']; $health_label_class = "seops_red"; break;
		}
	}
}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_site_audit.php');
