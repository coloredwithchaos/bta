<?php
/**
 * Include to show the plugin Score Manager Page
 *
 * @package admin-panel
 * @version v5.0
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'score_manager' ) )
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
	
	global $wpdb;
	
	$types_to_have_boxes = array_merge( array( 'post' , 'page' ) , get_post_types( array( '_builtin'=>false, 'public'=>true ), 'names' ) );
	
	// query to get total record
	$query_total = "select count(ID)
from ".$wpdb->prefix."posts
where post_type in ('" . implode('\',\'', $types_to_have_boxes) . "')
and post_status in ('publish', 'future', 'draft', 'pending', 'private')
	";
	
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
	$order_by = isset( $_GET['order_by'] ) ? intval($_GET['order_by']) : 4;
	$order_by_query = '';
	switch( $order_by )
	{
		case 1: $order_by_col = 'post_title'; break;
		case 2: $order_by_col = 'post_type'; break;
		case 3: $order_by_col = 'post_date'; break;
		case 4: $order_by_col = 'ABS(score)'; break;
		default: $order_by_col = NULL; break;
	}
	if( !empty($order_by_col) )
	{
		$order_by_query = " order by $order_by_col $order ";
	}
	
	// current page result query
	$query = "
select ID, post_title, post_type, post_date, post_author, IFNULL((
select meta_value
from ".$wpdb->prefix."postmeta
where post_id = ".$wpdb->prefix."posts.ID
and meta_key = '_seop_cache_score'
limit 0,1
),0) as score
from ".$wpdb->prefix."posts
where post_type in ('" . implode('\',\'', $types_to_have_boxes) . "')
and post_status in ('publish', 'future', 'draft', 'pending', 'private')
$order_by_query
limit $offset, $limit
	";
	$result = $wpdb->get_results( $query );
	
	// refine some parameter for output
	if( count($result) > 0 )
	{
		foreach($result as $key=>$row)
		{
			$result[$key]->score = $row->score == '' ? 0 : $row->score;
			$date = new DateTime($row->post_date);
			$result[$key]->post_date = $date->format('Y/m/d');
			$result[$key]->keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $row->ID );
		}
	}
	
	// prepare sorting url
	$adminPage = $_GET['page'];
	$sort_title = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 1, 
		'order' => ( $order_by == 1 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	$sort_type = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 2, 
		'order' => ( $order_by == 2 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	$sort_date = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 3, 
		'order' => ( $order_by == 3 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	$sort_score = get_admin_url() . "admin.php?" . http_build_query( array( 
		'page' => $adminPage, 
		'paged' => $paged, 
		'order_by' => 4, 
		'order' => ( $order_by == 4 ? $order_target : 'asc' ),
		'limit' => $limit
	) );
	
	// prepare sorting class
	$class_title = ( $order_by == 1 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	$class_type = ( $order_by == 2 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	$class_date = ( $order_by == 3 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	$class_score = ( $order_by == 4 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
		
}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_score_manager.php');
