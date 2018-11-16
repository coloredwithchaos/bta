<?php
/**
 * Include to show the plugin Role Settings page
 *
 * @package admin-panel
 * @version v5.0
 *
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'role_setting' ) )
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$seopressor_is_active = FALSE;
}

if ($seopressor_is_active && $seopressor_has_permission) {
	
	global $wpdb;
	
	// prepare query to get total record
	$query_total = "select count(id) from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_CustomRoles::$table_roles_capabilities . " where role_type = 'custom'";
	
	// parameters
	$limit = 10;
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
		case 1: $order_by_col = 'role_name'; break;
		default: $order_by_col = NULL; break;
	}
	if( !empty($order_by_col) )
	{
		$order_by_query = " order by $order_by_col $order ";
	}
	
	// query current page listing
	$query = "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_CustomRoles::$table_roles_capabilities . " where role_type='custom' $order_by_query limit $offset, $limit";
	$result = $wpdb->get_results( $query );
	
	foreach( $result as $key=>$row )
	{
		$result[$key]->users = WPPostsRateKeys_CustomRoles::get_user_list( $row->id, true );
	}
	
	$sort = get_admin_url() . "admin.php?page=seopressor-edit-custom-role&paged=" . $paged . "&order_by=1&order=" . ( $order_by == 1 ? $order_target : 'asc' );
	$class = ( $order_by == 1 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	
}

include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_custom_role_apply.php');
