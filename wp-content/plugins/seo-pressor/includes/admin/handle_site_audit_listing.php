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
	$data = WPPostsRateKeys_Settings::get_options();
	global $wpdb;
	
	$errmsg = '';
	$type = isset( $_GET[ 'type' ] ) ? intval( $_GET[ 'type' ] ) : NULL;
	$aid = isset( $_GET['aid'] ) ? intval( $_GET['aid'] ) : NULL;
	if( is_null($type) || is_null($aid) )
	{
		$errmsg = __('No post found.', 'seo-pressor');
	}
	
	if( empty($errmsg) )
	{
		$db_crawler = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Crawler::$table_name;
		
		switch( $type )
		{
			case 1: // duplicate title
				$sql = "
select *, 
(
	select count(id) as total
	from $db_crawler b
	where a.title = b.title
	and audit_id = $aid
	group by b.title
) as dup
from $db_crawler a
where a.audit_id = $aid
having dup > 1";
				$listing_title = __('Duplicate Title', 'seo-pressor');
				break;
			case 2: // duplicate description
				$sql = "
select *, 
(
	select count(id) as total
	from $db_crawler b
	where a.description = b.description
	and audit_id = $aid
	and b.description != ''
	group by b.description
) as dup
from $db_crawler a
where a.audit_id = $aid
having dup > 1";
				$listing_title = __('Duplicate Meta Description', 'seo-pressor');
				break;
			case 3: // no title
				$sql = "
select *
from wp_seopressor_site_audit_crawler
where audit_id = $aid
and title = ''";
				$listing_title = __('No Title', 'seo-pressor');
				break;
			case 4: // no description
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and description = ''";
				$listing_title = __('No Meta Description', 'seo-pressor');
				break;
			case 5: // broken link
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and broken_link > 0";
				$listing_title = __('Broken Links', 'seo-pressor');
				break;
			case 6: // less word count
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and wordcount < 150";
				$listing_title = __('Low Word Count', 'seo-pressor');
				break;
			case 7: // no img alt
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and no_alt_images > 0";
				$listing_title = __('No Image ALT', 'seo-pressor');
				break;
			case 8: // no keyword
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and has_keyword = 0";
				$listing_title = __('No Targeted Keywords', 'seo-pressor');
				break;
			case 9: // no optimized
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and has_optimize = 0";
				$listing_title = __('Low Optimization', 'seo-pressor');
				break;
			case 10: // no schema
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and has_schema = 0";
				$listing_title = __('No Schema.org Markup', 'seo-pressor');
				break;
			case 11: // no fb
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and has_og = 0";
				$listing_title = __('No Facebook Open Graph', 'seo-pressor');
				break;
			case 12: // no twitter
				$sql = "
select *
from $db_crawler
where audit_id = $aid
and has_twitter = 0";
				$listing_title = __('No Twitter Card', 'seo-pressor');
				break;
			default:
				$sql = "";
				$listing_title = __('', 'seo-pressor');
				break;
		}
		
		// parameters
		$limit = 10;
		$paged = isset( $_GET[ 'paged' ] ) ? intval( $_GET[ 'paged' ] ) : 1;
		$offset = ( $paged - 1 ) * $limit;
		$result_total = $wpdb->get_results( $sql );
		$total = count($result_total);
		$total_pages = ceil( $total / $limit );
		
		// pagination
		$page_links = paginate_links
		(
			array (
				'base' => add_query_arg( 'paged', '%#%' ),
				'format' => '',
				'prev_text' => __( '&laquo;' ),
				'next_text' => __( '&raquo;' ),
				'total' => $total_pages,
				'current' => $paged
			) 
		);
		
		$query = $sql . " limit $offset, $limit";
		$result = $wpdb->get_results( $query );
		
	}
}

include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_site_audit_listing.php');
