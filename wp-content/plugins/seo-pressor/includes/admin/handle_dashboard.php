<?php
/**
 * Include to show the plugin settings
 *
 * @package admin-panel
 * 
 */
// Check if user can access the list of Posts/Pages

$seopressor_has_permission_site_audit = WPPostsRateKeys_CustomRoles::user_can( 'site_audit' );

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

// Get RSS News from SEOPressor
include_once( ABSPATH . WPINC . '/class-simplepie.php' );

$rss = new SimplePie();
$rss->set_feed_url( 'http://seopressor.com/feed/news' );
$rss->set_item_class( 'seops_simple_items' );
$rss->force_feed( true );
$rss->set_autodiscovery_level( SIMPLEPIE_LOCATOR_ALL );
$rss->enable_cache( false );
$rss->set_timeout( 20 );
$rss->init();
$rss->handle_content_type();
if ( !$rss->error() )
{
	$maxitems = $rss->get_item_quantity( 3 ); 
	$rss_items = $rss->get_items( 0, $maxitems );
}


// Default Score & Health
$score = 0;
$health = 0;

$colors = array(
	'green' => '#4caf50',
	'blue' => '#0b77b1',
	'grey' => '#e3e3e3',
	'red' => '#f44336'
);
	

if ($seopressor_is_active && $seopressor_has_permission_site_audit) {
	// Settings data
	$data = WPPostsRateKeys_Settings::get_options();
	
	$audit = WPPostsRateKeys_Site_Audit::get_latest_site_audit();
	if( $audit != FALSE )
	{
		$score = $audit->score;
		$health = $audit->health;
	}
}

switch( $score )
{
	case $score < 40: $score_color = $colors['grey']; $score_label_class = "seops_grey"; break;
	case $score < 80: $score_color = $colors['blue']; $score_label_class = "seops_blue"; break;
	case $score <= 100: $score_color = $colors['green']; $score_label_class = "seops_green"; break;
	default: $score_color = $colors['red']; $score_label_class = "seops_red"; break;
}
switch( $health )
{
	case $health < 40: $health_color = $colors['grey']; $health_label_class = "seops_grey"; break;
	case $health < 80: $health_color = $colors['blue']; $health_label_class = "seops_blue"; break;
	case $health <= 100: $health_color = $colors['green']; $health_label_class = "seops_green"; break;
	default: $health_color = $colors['red']; $health_label_class = "seops_red"; break;
}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_dashboard.php');
