<?php
/**
 * Page to handle requests from Central Server
 * 
 */	

/** Loads the WordPress Environment */
require(dirname(__FILE__) . '/../../../../wp-load.php');

$response = WPPostsRateKeys_Upgrade::check_for_outgoing_connections(true);
var_dump($response);

$url = "WPPostsRateKeys_Settings::get_api_server() . WPPostsRateKeys_Central::$url_check_last_version";
echo 'Target URL: ' . $url . '<br/>';

$result = wp_remote_get(
	$url, 
	array(
		'timeout' => 120, 
		'httpversion' => '1.1'
	)
);
if( is_wp_error($result) )
{
	echo '<pre>';
	print_r($result);
	echo '</pre>';
}
else
{
	echo 'connected';
}



echo '<br/>try file_get_contents';
$res = file_get_contents( $url );
var_dump($res);
