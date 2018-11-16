<?php
$data = WPPostsRateKeys_Settings::get_options();
if( version_compare( $data['current_version'], $data['last_version'], "<" ) ) 
{
	$msg_error[] = __("New SEOPressor version is available. You can go to 'Plugin Update' tab or <a href='http://seopressor.com/download/download.php' target='_blank'>download the latest version</a> and update it manually.",'seo-pressor');
}