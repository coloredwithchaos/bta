<?php
/**
 * Page to handle requests from Central Server
 * 
 */	

/** Loads the WordPress Environment */
require(dirname(__FILE__) . '/../../../../wp-load.php');

$error = '';
$response = array();

if( !isset( $_REQUEST['secret_key'] ) || !isset( $_REQUEST['action'] ) )
{
	$error = 'No script kiddies please!';
}
else
{
	$data = WPPostsRateKeys_Settings::get_options();
	$secret_key = urldecode(trim($_REQUEST['secret_key']));
	if( $secret_key != $data['clickbank_receipt_number'] ) 
	{
		$error = 'Wrong key!';
	}
	else
	{
		global $wpdb;
		switch( $_REQUEST['action'] )
		{
			case 'get_status':
				if( !isset($_REQUEST['id']) )
				{
					$error = 'Wrong request!';
				}
				else
				{
					$audit_table = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Site_Audit::$table_name;
					$audit = $wpdb->get_row( $wpdb->prepare( "select * from " . $audit_table . " where id = %d", $_REQUEST['id'] ) );
					if( empty($audit) )
					{
						$response['status'] = "not exists";
					}
					else
					{
						if( $audit->date_e == NULL )
						{
							$response['status'] = "running";
						}
						else
						{
							$response['status'] = $audit->date_e;
						}
					}
				}
				break;
			case 'get_list':
				$audit_table = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Site_Audit::$table_name;
				$audits = $wpdb->get_results( "select * from $audit_table order by id desc limit 0,100" );
				$tmp = array();
				if( !empty($audits) )
				{
					foreach($audits as $audit)
					{
						$tmp[] = array(
							'id' => $audit->id,
							'score' => $audit->score,
							'health' => $audit->health,
							'totalpost' => $audit->t_post,
							'task' => $audit->provision_task,
							'ect' => $audit->ect,
							'start' => $audit->date_s,
							'end' => $audit->date_e
						);
					}
				}
				$response['list'] = $tmp;
				break;
			case 'delete_single':
				if( !isset($_REQUEST['id']) )
				{
					$error = 'Wrong request!';
				}
				else
				{
					$audit_table = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Site_Audit::$table_name;
					$audit = $wpdb->get_row( $wpdb->prepare( "select * from " . $audit_table . " where id = %d", $_REQUEST['id'] ) );
					if( empty($audit) )
					{
						$response['status'] = 'not exist';
					}
					else
					{
						if( $audit->date_e != NULL )
						{
							$response['status'] = 'complete';
						}
						else
						{
							$delete_action = $wpdb->delete( $audit_table, array( 'id' => $_REQUEST['id'] ), array( '%d' ) );
							if( $delete_action === FALSE )
								$response['status'] = 'failed to delete';
							else
								$response['status'] = 'deleted';
						}
					}
				}
				break;
			case 'get_detail':
				if( !isset($_REQUEST['id']) )
				{
					$error = 'Wrong request!';
				}
				else
				{
					$audit_table = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Site_Audit::$table_name;
					$audit = $wpdb->get_row( $wpdb->prepare( "select * from " . $audit_table . " where id = %d", $_REQUEST['id'] ) );
					if( empty($audit) )
					{
						$response['status'] = 'not exist';
					}
					else
					{
						$audit_data_table = $wpdb->prefix . WPPostsRateKeys::$db_prefix . WPPostsRateKeys_Crawler::$table_name;
						$audit_data = $wpdb->get_results( $wpdb->prepare( "select * from " . $audit_data_table . " where audit_id = %d", $_REQUEST['id'] ) );
						$response['data'] = $audit_data;
					}
				}
				break;
			default:
				$error = 'Wrong request!';
				break;
		}
	}
}


echo json_encode( array( 'error' => $error, 'data' => $response ) );