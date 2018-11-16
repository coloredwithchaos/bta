<?php
/**
 * Include to show the plugin Keyword Rank page
 *
 * @package admin-panel
 * @version v5.0
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'plugin_setting' ) ) 
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

$seopressor_is_active = TRUE;
if (!WPPostsRateKeys_Settings::get_active()) {
	$msg_error[] = __('Activate SEOPressor.','seo-pressor');
	$seopressor_is_active = FALSE;
}

if ($seopressor_is_active && $seopressor_has_permission) {
	// Settings data
	$data = WPPostsRateKeys_Settings::get_options();
	
	global $wpdb;
	
	$keyword_metadata[] = WPPostsRateKeys_WPPosts_New::$keyword_metadata;
	$keyword_metadata[] = WPPostsRateKeys_WPPosts_New::$keyword2_metadata;
	$keyword_metadata[] = WPPostsRateKeys_WPPosts_New::$keyword3_metadata;
	
	// query to get total record
	$query_total = "select count(*) from(
select group_concat(post_id), meta_value
from ".$wpdb->prefix."postmeta
where meta_value != ''
and meta_key in ('".implode("', '", $keyword_metadata)."')
group by meta_value
) groups";
	
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
	$order = isset( $_GET['order'] ) ? trim($_GET['order']) : 'asc';
	$order_target = ( $order == 'asc' ? 'desc' : 'asc' );
	$order_by = isset( $_GET['order_by'] ) ? intval($_GET['order_by']) : 1;
	$order_by_query = '';
	switch( $order_by )
	{
		case 1: $order_by_col = 'keyword'; break;
		default: $order_by_col = NULL; break;
	}
	if( !empty($order_by_col) )
	{
		$order_by_query = " order by $order_by_col $order ";
	}
	
	// current page result query
	$query = "
select group_concat(post_id) as post_ids, meta_value as keyword
from ".$wpdb->prefix."postmeta
left join ".$wpdb->prefix."posts
on ".$wpdb->prefix."posts.ID = ".$wpdb->prefix."postmeta.post_id
where meta_value != ''
and meta_key in ('".implode("', '", $keyword_metadata)."')
group by meta_value
$order_by_query
limit $offset, $limit
";
	
	$result = $wpdb->get_results( $query );
	
	// prepare sorting url
	$sort_keyword = get_admin_url() . "admin.php?page=seopressor-keyword-rank&paged=" . $paged . "&order_by=1&order=" . ( $order_by == 1 ? $order_target : 'asc' );
	
	// prepare sorting class
	$class_keyword = ( $order_by == 1 ) ? ' seops_order_active seops_order_'.$order.' ' : 'seops_order_inactive';
	
}

include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_keyword_rank.php');