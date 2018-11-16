<?php
/**
 * Include to show the plugin Sitewide Settings Page
 *
 * @package admin-panel
 * @version v5.0
 *
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'sitewide_seo' ) )
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

	// sitemap
	$path = trailingslashit( ABSPATH );
	$sitemap = $path.'sitemap.xml';
	if( file_exists($sitemap) )
	{
		$xmlcontent = file_get_contents($sitemap, true);
		if( !empty($xmlcontent) && strpos( $xmlcontent, '<!-- Powered by SEOPressor -->' ) != false)
		{
			$hasSitemap = true;
			$sitemapUrl = get_bloginfo('url').'/sitemap.xml';
			$sitemapCreationDate = date ("F d Y H:i:s.", filemtime($sitemap));
		}
	}

	// local
	$complete_address = true;
	$complete_contact = true;
	$complete_operating = false;
	if( empty( $data['seop_local_name'] )
		|| empty( $data['seop_local_type'] )
		|| empty( $data['seop_local_address'] )
		|| empty( $data['seop_local_city'] )
		|| empty( $data['seop_local_state'] )
		|| empty( $data['seop_local_postcode'] )
		|| empty( $data['seop_local_country'] )
	)
		$complete_address = false;

	if( count($data['seop_local_contact']) <= 0 )
		$complete_contact = false;

	foreach( $data['seop_operating_hour'] as $operating )
	{
		if( !empty($operating['from']) && !empty($operating['to']) )
		{
			$complete_operating = true;
			break;
		}
	}

	$business_types = WPPostsRateKeys_Miscellaneous::get_all_business_type();
	$countries = WPPostsRateKeys_Miscellaneous::get_all_country();

}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_sitewide_settings.php');
