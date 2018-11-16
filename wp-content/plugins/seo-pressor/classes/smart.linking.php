<?php
if( !class_exists('WPPostsRateKeys_SmartLinking') )
{
	class WPPostsRateKeys_SmartLinking
	{
		static $table_name = 'smart_linking';
		
		static function create_smart_linking( $data )
		{
			global $wpdb;
			
			$params = array(
				'keywords' => $data['keyword'],
				'url' => $data['url'],
				'how_many' => $data['times']
			);
			$format = array( '%s', '%s', '%d' );
			if( !empty($data['cloaking']) )
			{
				$params['cloaking_folder'] = $data['cloaking'];
				$format[] = '%s';
			}
			
			$exists = $wpdb->get_var( $wpdb->prepare(
				"select id from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where keywords = %s",
				$params['keywords']
			) );
			if( !empty($exists) )
			{
				return 'exist';
			}
			
			$wpdb->insert( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, $params, $format );
			return $wpdb->insert_id;
		}
		
		static function get_smart_linking( $id )
		{
			global $wpdb;
			
			if( empty($id) )
			{
				return NULL;
			}
			
			$result = $wpdb->get_row( "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where id = " . $id );
			return $result;
		}
		
		static function delete_smart_linking( $id )
		{
			global $wpdb;
			
			if( !empty($id) )
			{
				$wpdb->delete( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, array( 'id' => $id ), array( '%d' ) );
			}
		}
		
		static function update_smart_linking( $id, $data )
		{
			global $wpdb;

			if( !empty($id) )
			{
				$exists = $wpdb->get_var( $wpdb->prepare(
					"select id from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where keywords = %s and id <> %d",
					$data['keyword'], $id
				) );
				if( !empty($exists) )
				{
					return 'exist';
				}
				
				$params = array(
					'keywords' => $data['keyword'],
					'url' => $data['url'],
					'how_many' => $data['times'],
					'cloaking_folder' => (!empty($data['cloaking']) ? $data['cloaking'] : '')
				);
				$format = array( '%s', '%s', '%d', '%s' );
				
				$result = $wpdb->update( $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name, $params, array('id' => $id), $format );
				return $result;
			}
		}
		
		static function get_all_smart_linking()
		{
			global $wpdb;
			
			$result = $wpdb->get_results( "select * from " . $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name . " where how_many > 0" );
			
			return $result;
			
		}
		
		static function v6_migration()
		{
			
			if( WPPostsRateKeys_Settings::get_v6_migrate_status() !== FALSE )
				return;

			global $wpdb, $post;
			
			$table_internal = $wpdb->prefix . WPPostsRateKeys::$db_prefix . 'automatic_internal_links';
			$table_external = $wpdb->prefix . WPPostsRateKeys::$db_prefix . 'external_cloacked_links';
			$table_smartlinking = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_name;
			
			
			// migrate from internal link
			if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_internal . "'") == $table_internal ) 
			{
				$all_internal_links = $wpdb->get_results( "select * from " . $table_internal );
				if( count($all_internal_links) > 0 )
				{
					foreach($all_internal_links as $internal_link_item) 
					{
						$full_link = get_the_guid( $internal_link_item->post_id );
						if( empty($full_link) )
							continue;
						$wpdb->insert( $table_smartlinking, array(
							'keywords' => $internal_link_item->keywords,
							'url' => $full_link,
							'how_many' => $internal_link_item->how_many
						), array(
							'%s',
							'%s',
							'%d'
						) );
					}
				}
			}
			
			
			// migrate from external link
			if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_external . "'") == $table_external ) 
			{
				$all_external_links = $wpdb->get_results( "select * from " . $table_external );
				if( count($all_external_links) > 0 )
				{
					foreach($all_external_links as $external_link_item) 
					{
						$params = array(
							'keywords' => $external_link_item->keywords,
							'url' => $external_link_item->external_url,
							'how_many' => $external_link_item->how_many
						);
						$filters = array(
							'%s',
							'%s',
							'%d'
						);
						if( !empty($external_link_item->cloaking_folder) )
						{
							$params['cloaking_folder'] = $external_link_item->cloaking_folder;
							$filters[] = '%s';
						}
						$wpdb->insert( $table_smartlinking, $params, $filters);
						
					}
				}
			}
			
			
			// remove duplicated keywords after migrated
			$list = $wpdb->get_results( "select * from " . $table_smartlinking );
			if( count($list) > 0 )
			{
				$keywords = array();
				foreach( $list as $row )
				{
					if( !in_array($row->keywords, $keywords) )
					{
						$keywords[] = $row->keywords;
					}
					else
					{
						$wpdb->delete( $table_smartlinking, array( 'id' => $row->id ) );
					}
				}
			}
			

			WPPostsRateKeys_Settings::update_v6_migrate_status( time() );
			
		}
		
		
	}
}