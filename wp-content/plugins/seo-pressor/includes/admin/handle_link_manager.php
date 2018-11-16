<?php
/**
 * Include to show the plugin Link Manager
 *
 * @package admin-panel
 * @version v5.0
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'link_manager' ) )
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

// Check if wp-cron is allowed
if( defined('DISABLE_WP_CRON') && DISABLE_WP_CRON == true )
{
	$msg_error[] = __('Link manager requires WordPress Cron to be enabled.','seo-pressor');
}

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

if ($seopressor_is_active && $seopressor_has_permission) {
	// Settings data
	$data = WPPostsRateKeys_Settings::get_options();
	global $wpdb;
	
	$crawl_status = WPPostsRateKeys_Settings::get_link_running_status();
	
	// prepare query to get total record
	$query_total = "select count(id) from ".$wpdb->prefix.WPPostsRateKeys::$db_prefix."link";
	
	// parameters
	$limit = isset( $_GET[ 'limit' ] ) ? intval( $_GET[ 'limit' ] ) : 10;
	$paged = isset( $_GET[ 'paged' ] ) ? intval( $_GET[ 'paged' ] ) : 1;
	$offset = ( $paged - 1 ) * $limit;
	$total = $wpdb->get_var( $query_total );
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
	
	// setup order by 
	$order = isset( $_GET['order'] ) ? trim($_GET['order']) : 'desc';
	$order_target = ( $order == 'asc' ? 'desc' : 'asc' );
	$order_by = isset( $_GET['order_by'] ) ? intval($_GET['order_by']) : 2;
	$order_by_query = '';
	switch( $order_by )
	{
		case 1: $order_by_col = 'last_checked'; break;
		case 2: $order_by_col = 'status_code'; break;
		default: $order_by_col = NULL; break;
	}
	if( !empty($order_by_col) )
	{
		if( $order_by == 2 )
			$order_by_query = " order by $order_by_col = 0 $order, $order_by_col $order";
		else
			$order_by_query = " order by $order_by_col $order ";
	}
	
	$query = "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . "link $order_by_query limit $offset, $limit";
	$result = $wpdb->get_results( $query );
	
	$adminPage = $_GET['page'];
	$sort_status = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 2, 
		'order' => ( $order_by == 2 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	$sort_last = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 1, 
		'order' => ( $order_by == 1 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	
	$class_status = ( $order_by == 2 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	$class_last = ( $order_by == 1 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_link_manager.php');