<?php
/**
 * Include to show the plugin error log
 *
 * @package admin-panel
 * @version v5.0
 *
 */

global $wpdb;

// prepare query to get total record
$query_total = "select count(id) from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Logs::$table_name;

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

$query = "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Logs::$table_name . " order by dt desc limit $offset, $limit";
$result = $wpdb->get_results( $query );

include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_log_page.php');