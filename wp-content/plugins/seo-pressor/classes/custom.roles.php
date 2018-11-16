<?php
/**
 * Created to Manage the table of Users and Custom Roles
 * And to handle the users and WordPress Roles 
 */
if (!class_exists('WPPostsRateKeys_CustomRoles')) {
	class WPPostsRateKeys_CustomRoles
	{
		static $table_users_custom_roles = 'users_custom_roles';
		
		static $table_roles_capabilities = 'roles_capabilities';
		
		static $capabilities = array(
			'on_page_analysis', 
			'on_page_social_seo', 
			'on_page_schema_setting', 
			'on_page_meta_setting', 
			'score_manager', 
			'link_manager', 
			'sitewide_seo', 
			'homepage_seo', 
			'site_audit', 
			'role_setting',
			'plugin_setting'
		);
		
		
		static function check_for_wp_roles()
		{
			global $wp_roles, $wpdb; 
			
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_roles_capabilities;
			
			foreach( $wp_roles->roles as $role_key => $role_arr ) 
			{
				if( $role_key == 'subscriber' )
				{
					continue;
				}
				
				$role_id = $wpdb->get_var( "select id from " . $table_name . " where role_name = '".$role_key."' and role_type = 'wp'" );
				if( empty($role_id) )
				{
					self::manage_role( 'add', NULL, $role_key, 'wp', self::get_default_capabilities($role_key) );
				}
			}
		}
		
		
		static function get_default_capabilities( $wp_role )
		{
			$capabilities = array();
			
			switch( $wp_role )
			{
				case 'administrator':
					$capabilities = self::$capabilities;
					break;
				case 'editor':
					$capabilities = array_slice( self::$capabilities, 0, 6 );
					break;
				case 'author':
					$capabilities = array_slice( self::$capabilities, 0, 5 );
					break;
				case 'contributor':
					$capabilities = array_slice( self::$capabilities, 0, 4 );
					break;
			}
			
			return $capabilities;
		}
		
		
		static function manage_role( $action, $role_id=NULL, $role_name=NULL, $role_type=NULL, $capabilities = array() )
		{
			global $wpdb;
			
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_roles_capabilities;
			
			switch( $action )
			{
				case 'add':
					$exists = $wpdb->get_var( "select id from " . $table_name . " where role_name = '".$role_name."'" );
					if( empty($exists) )
					{
						// do insert only if role name not exist
						$wpdb->insert( $table_name, array(
							'capabilities' => implode(',', $capabilities),
							'role_type' => $role_type,
							'role_name' => $role_name
						), array(
							'%s', '%s', '%s'
						) );
						return true;
					}
					else
					{
						return false;
					}
					break;
				case 'update':
					$capabilities = empty($capabilities) ? '' : implode(',',$capabilities);
					$wpdb->update( $table_name, array( 'capabilities' => $capabilities ), array( 'id' => $role_id ), array( '%s' ), array( '%d' ) );
					break;
				case 'delete':
					$wpdb->delete( $table_name, array( 'id' => $role_id ), array( '%d' ) );
					self::delete_user_role( $role_id );
					break;
			}
		}
		
		
		static function apply_user_role( $role_id, $user_name )
		{
			global $wpdb;
			
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			$user_id = $wpdb->get_var( $wpdb->prepare( "select ID from " . $wpdb->prefix . "users where binary user_login = %s", $user_name ) );
			if( !empty($user_id) )
			{
				// check target user already exists in this custom role
				$exists = $wpdb->get_var( $wpdb->prepare( "select id from " . $table_name . " where user_id = %d and role_id = %d", $user_id, $role_id ) );
				
				// check target user is administrator
				$is_administrator = false;
				$user_info = get_userdata( $user_id );
				if( count($user_info->roles) > 0 )
				{
					foreach( $user_info->roles as $role )
					{
						if( strtolower($role) == 'administrator' )
						{
							$is_administrator = true;
							break;
						}
					}
				}
				
				if( $is_administrator )
				{
					return 'is admin';
				}
				
				if( empty($exists) )
				{
					$wpdb->insert( $table_name, array( 'user_id' => $user_id, 'role_id' => $role_id ), array( '%d', '%d' ) );
				}
				
				return true;
			}
			else
			{
				return 'not found';
			}

		}
		
		static function delete_user_role( $role_id, $user_name = NULL )
		{
			global $wpdb;
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			
			$where = array( 'role_id' => $role_id );
			
			if( !empty($user_name) )
			{
				$user_id = $wpdb->get_var( $wpdb->prepare( "select ID from " . $wpdb->prefix . "users where binary user_login = %s", $user_name ) );
				if( !empty($user_id) )
				{
					$where['user_id'] = $user_id;
				}
			}
						
			$wpdb->delete( $table_name, $where );
		}
		
		static function delete_user_custom_role_by_id( $user_id )
		{
			global $wpdb;
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			
			$wpdb->delete( $table_name, array( 'user_id' => $user_id ), array( '%d' ) );
		}
		
		
		static function get_custom_roles( $user_id )
		{
			global $wpdb;
			$roles_arr = array();
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			
			$roles = $wpdb->get_results( "select role_id from " . $table_name . " where user_id = " . $user_id );
			if( count($roles) > 0 )
			{
				foreach( $roles as $row )
				{
					$roles_arr[] = $row->role_id;
				}
			}
			return $roles_arr;
		}
		
		
		static function get_capabilities( $role_id = '', $role_name = '' )
		{
			global $wpdb;
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_roles_capabilities;
			$capabilities_arr = array();
			
			if( !empty($role_id) )
			{
				$capabilities = $wpdb->get_var( "select capabilities from " . $table_name . " where id = " . $role_id );
				if( !empty($capabilities) )
				{
					$capabilities_arr = explode( ',', $capabilities );
				}
			}
			
			if( !empty($role_name) )
			{
				$results = $wpdb->get_results( "select capabilities from " . $table_name . " where role_type = 'wp' and role_name = '" . $role_name . "'" );
				if( count($results) > 0 )
				{
					foreach( $results as $row )
					{
						$capabilities_arr = array_merge( $capabilities_arr,  explode( ',', $row->capabilities ) );
					}
				}
			}
			
			$capabilities_arr = array_unique($capabilities_arr);
			
			return $capabilities_arr;
		}
		
		
		static function enable_role_settings() {
			$settings = WPPostsRateKeys_Settings::get_options();
			if( $settings['enable_role_settings'] == '0' ) 
			{
				return FALSE;
			}
			else 
			{
				return TRUE;
			}
		}
		
		
		static function user_can( $capability, $user_id = '' )
		{
			$settings = WPPostsRateKeys_Settings::get_options();
			
			// check setting 
			if( !self::enable_role_settings() )
			{
				return true;
			}
			
			if( $user_id == '' ) {
				$user_id = WPPostsRateKeys_Users::get_current_user_id();
			}
			
			// check is super admin
			$is_super = is_super_admin( $user_id );
			if( $is_super === TRUE )
			{
				return true;
			}
			
			// check custom roles
			$custom_roles = self::get_custom_roles( $user_id );
			if( count($custom_roles) > 0 )
			{
				foreach( $custom_roles as $role_id )
				{
					$capabilities = self::get_capabilities( $role_id );
					if( in_array( $capability, $capabilities ) )
					{
						return true;
					}
				}
				
				return false;
			}
			
			// check wp default role
			$userdata = get_userdata( $user_id );
			if( $userdata->roles > 0 )
			{
				foreach( $userdata->roles as $role_name )
				{
					$capabilities = self::get_capabilities( NULL, $role_name );
					if( in_array( $capability, $capabilities ) )
						return true;
				}
			}
			
			return false;
			
		}
		
		static function user_search( $key=NULL, $role_id )
		{
			global $wpdb, $wp_version;
				
			$users = array();
			$user_to_exclude = array();
			
			// return if empty key
			$key = trim($key);
			if( empty($key) )
			{
				return $users;
			}
			
			// get list of user which already in this role
			$user_to_exclude = self::get_custom_user_list();
			
			// get all administrator list
			$administrators = get_users( array( 'role' => 'Administrator' ) );
			if( count($administrators) )
			{
				foreach( $administrators as $administrator )
				{
					$user_to_exclude[] = $administrator->ID;
				}
			}
			
			$subscribers = get_users( array( 'role' => 'Subscriber' ) );
			if( count($subscribers) )
			{
				foreach( $subscribers as $subscriber )
				{
					$user_to_exclude[] = $subscriber->ID;
				}
			}
			
			// query to search db
			if( version_compare( $wp_version, "4.0", "<" ) )
				$key = like_escape( esc_sql( $key ) );
			else
				$key = $wpdb->esc_like( $key );
			$search = $wpdb->get_results( 
				$wpdb->prepare(
					"select user_login from " . $wpdb->prefix . "users where user_login like %s " . ( count($user_to_exclude) > 0 ? ' and id not in (' . implode(',', $user_to_exclude) . ') ' : '' ) . " order by user_login asc",
					$key . '%'
				) 
			);
			
			if( count($search) > 0 )
			{
				foreach( $search as $row )
				{
					$users[] = $row->user_login;
				}
			}
			
			return $users;
			
		}
		
		static function get_user_list( $role_id, $return_name = false )
		{
			global $wpdb;
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			$table_user = $wpdb->prefix . 'users';
			$users = array();
			
			$sql = $wpdb->prepare( "select user_id, user_login from " . $table_name . " left join " . $table_user . " on user_id = " . $table_user . ".id where role_id = %d order by user_login asc", $role_id );
			$search = $wpdb->get_results( $sql );
			
			if( count($search) > 0 )
			{
				foreach( $search as $row )
				{
					if( $return_name )
					{
						if( !empty($row->user_login) )
							$users[] = $row->user_login;
					}
					else
					{
						$users[] = $row->user_id;
					}
				}
			}
			
			return $users;
		}
		
		static function get_custom_user_list()
		{
			global $wpdb;
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			$table_user = $wpdb->prefix . 'users';
			$users = array();
			
			$sql = $wpdb->prepare( "select user_id, user_login from " . $table_name . " left join " . $table_user . " on user_id = " . $table_user . ".id order by user_login asc", $role_id );
			$search = $wpdb->get_results( $sql );
			
			if( count($search) > 0 )
			{
				foreach( $search as $row )
				{
					$users[] = $row->user_id;
				}
			}
			
			return $users;
		}
		
		static function v6_migration()
		{
			global $wpdb;
			
			$table_name = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_roles_capabilities;
			$table_name_user = $wpdb->prefix . WPPostsRateKeys::$db_prefix . self::$table_users_custom_roles;
			$deprecated_capabilities = array( 'pages_and_posts', 'seo_box_on_edit', 'admin', 'set_min_score', 'setting_not_min_score', 'settings_tab' );
			$do_upgrade = false;
			
			// get all roles from table
			$roles = $wpdb->get_results( "select * from " . $table_name );
			if( count($roles) <= 0 )
			{
				// user nvr use seopressor before, do initialization
				self::check_for_wp_roles();
			}
			else
			{
				// used seopressor before, check there is a needed to upgrade db record
				foreach( $roles as $role )
				{
					if( !empty($role->capabilities) )
					{
						$capabilities = explode(',', $role->capabilities);
						foreach( $capabilities as $capability )
						{
							if( in_array($capability, $deprecated_capabilities) )
							{
								$do_upgrade = true;
								break;
							}
						}
					}
				}
			}
			
			if( $do_upgrade == true )
			{
				
				$wpdb->delete( $table_name, array( 'role_type' => 'wp' ) );
				self::check_for_wp_roles();
				
				$custom_roles = $wpdb->get_results( "select * from " . $table_name . " where role_type='custom'" );
				if( count($custom_roles) > 0 )
				{
					
					$custom_roles_arr = array();
					
					// update custom roles capabilities
					foreach( $custom_roles as $custom_role )
					{
						if( empty($custom_role->capabilities) )
						{
							$wpdb->update( $table_name, array( 'capabilities' => '' ), array( 'id' => $custom_role->id ) );
						}
						else
						{
							$capabilities_new = array();
							$capabilities_current = explode( ',', $custom_role->capabilities );
							
							if( in_array( 'pages_and_posts', $capabilities_current ) )
							{
								$capabilities_new[] = 'score_manager';
							}
							
							if( in_array( 'seo_box_on_edit', $capabilities_current ) )
							{
								$capabilities_new[] = 'on_page_analysis';
								$capabilities_new[] = 'on_page_social_seo';
								$capabilities_new[] = 'on_page_schema_setting';
								$capabilities_new[] = 'on_page_meta_setting';
							}
							
							if( in_array( 'admin', $capabilities_current ) )
							{
								$capabilities_new[] = 'score_manager';
								$capabilities_new[] = 'on_page_analysis';
								$capabilities_new[] = 'on_page_social_seo';
								$capabilities_new[] = 'on_page_schema_setting';
								$capabilities_new[] = 'on_page_meta_setting';
							}
							
							if( count($capabilities_new) > 0 )
							{
								$capabilities_new = array_unique($capabilities_new);
							}
							
							$wpdb->update( $table_name, array( 'capabilities' => (count($capabilities_new) > 0 ? implode(',', $capabilities_new) : '') ), array( 'id' => $custom_role->id ) );
						}
						
						$custom_roles_arr[] = $custom_role->id;
					}
					
					
					// remove user with admin privilege from custom roles
					$custom_roles_users = $wpdb->get_results( "select * from " . $table_name_user );
					if( count($custom_roles_users) > 0 )
					{
						foreach( $custom_roles_users as $user )
						{
							if( user_can($user->user_id, 'manage_options') || !user_can($user->user_id, 'edit_posts') )
							{
								$wpdb->delete( $table_name_user, array( 'user_id' => $user->user_id ), array( '%d' ) );
							}
						}
					}
					
				}
			}
			
			
		}
		
		
		
	}
}