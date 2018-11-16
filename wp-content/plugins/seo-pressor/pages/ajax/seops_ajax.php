<?php
/**
 * Page to handle all Ajax requests for update Settings
 *
 */

$data_to_return = array(
	'message' => 'Wrong request.',
	'type' => 'error',
	'response' => array(),
	'do_reload' => false
);

if( $_REQUEST['object'] == 'sitewide_social' ) {
	$settings = WPPostsRateKeys_Settings::get_options();
	$response = array();

	if( array_key_exists( 'data', $_REQUEST ) ) {
		$data = $_REQUEST['data'];
		$settings['sitewide_fb_enable'] = array_key_exists( 'sitewide_fb_enable', $data ) ? $data['sitewide_fb_enable'] : 0;
		$settings['sitewide_fb_type'] = array_key_exists( 'sitewide_fb_type', $data ) ? trim($data['sitewide_fb_type']) : '';
		$settings['sitewide_fb_url'] = array_key_exists( 'sitewide_fb_url', $data ) ? trim($data['sitewide_fb_url']) : '';
		$settings['sitewide_fb_name'] = array_key_exists( 'sitewide_fb_name', $data ) ? trim($data['sitewide_fb_name']) : '';
		$settings['sitewide_fb_title'] = array_key_exists( 'sitewide_fb_title', $data ) ? trim($data['sitewide_fb_title']) : '';
		$settings['sitewide_fb_img'] = array_key_exists( 'sitewide_fb_img', $data ) ? trim($data['sitewide_fb_img']) : '';
		$settings['sitewide_fb_desc'] = array_key_exists( 'sitewide_fb_desc', $data ) ? trim($data['sitewide_fb_desc']) : '';
		$settings['sitewide_fb_publisher'] = array_key_exists( 'sitewide_fb_publisher', $data ) ? trim($data['sitewide_fb_publisher']) : '';
		$settings['sitewide_fb_author'] = array_key_exists( 'sitewide_fb_author', $data ) ? trim($data['sitewide_fb_author']) : '';
		$settings['sitewide_fb_admin'] = array_key_exists( 'sitewide_fb_admin', $data ) ? trim($data['sitewide_fb_admin']) : '';
		$settings['sitewide_fb_appid'] = array_key_exists( 'sitewide_fb_appid', $data ) ? trim($data['sitewide_fb_appid']) : '';

		$settings['sitewide_tw_enable'] = array_key_exists( 'sitewide_tw_enable', $data ) ? $data['sitewide_tw_enable'] : 0;
		$settings['sitewide_tw_type'] = array_key_exists( 'sitewide_tw_type', $data ) ? trim($data['sitewide_tw_type']) : '';
		$settings['sitewide_tw_site'] = array_key_exists( 'sitewide_tw_site', $data ) ? trim($data['sitewide_tw_site']) : '';
		$settings['sitewide_tw_creator'] = array_key_exists( 'sitewide_tw_creator', $data ) ? trim($data['sitewide_tw_creator']) : '';
		$settings['sitewide_tw_title'] = array_key_exists( 'sitewide_tw_title', $data ) ? trim($data['sitewide_tw_title']) : '';
		$settings['sitewide_tw_desc'] = array_key_exists( 'sitewide_tw_desc', $data ) ? trim($data['sitewide_tw_desc']) : '';
		$settings['sitewide_tw_img'] = array_key_exists( 'sitewide_tw_img', $data ) ? trim($data['sitewide_tw_img']) : '';

		WPPostsRateKeys_Settings::update_options($settings);
	}

	$data_to_return['message'] = __('Sitewide Social Setting has successfully updated.','seo-pressor');
	$data_to_return['type'] = 'notification';
}



if( $_REQUEST['object'] == 'local_seo' )
{
	$settings = WPPostsRateKeys_Settings::get_options();
	$response = array();

	// do update the $settings array
	if( array_key_exists( 'data', $_REQUEST ) )
	{
		$data = $_REQUEST['data'];
		$settings['seop_local_name'] = array_key_exists( 'name', $data ) ? trim($data['name']) : '';
		$settings['seop_local_type'] = array_key_exists( 'type', $data ) ? trim($data['type']) : '';
		$settings['seop_local_address'] = array_key_exists( 'address', $data ) ? trim($data['address']) : '';
		$settings['seop_local_city'] = array_key_exists( 'city', $data ) ? trim($data['city']) : '';
		$settings['seop_local_state'] = array_key_exists( 'state', $data ) ? trim($data['state']) : '';
		$settings['seop_local_postcode'] = array_key_exists( 'postcode', $data ) ? trim($data['postcode']) : '';
		$settings['seop_local_country'] = array_key_exists( 'country', $data ) ? trim($data['country']) : '';
		$settings['seop_local_latitude'] = array_key_exists( 'latitude', $data ) ? trim($data['latitude']) : '';
		$settings['seop_local_longitude'] = array_key_exists( 'longitude', $data ) ? trim($data['longitude']) : '';
		$settings['seop_local_website'] = array_key_exists( 'website', $data ) ? $data['website'] : '';
		$settings['seop_local_contact'] = array_key_exists( 'contact', $data ) ? $data['contact'] : array();
		$settings['seop_local_fax'] = array_key_exists( 'fax', $data ) ? trim($data['fax']) : '';
		$settings['seop_local_email'] = array_key_exists( 'email', $data ) ? trim($data['email']) : '';
		$settings['seop_operating_hour']['Mo']['from'] = array_key_exists( 'of_monday', $data ) ? trim($data['of_monday']) : '';
		$settings['seop_operating_hour']['Tu']['from'] = array_key_exists( 'of_tuesday', $data ) ? trim($data['of_tuesday']) : '';
		$settings['seop_operating_hour']['We']['from'] = array_key_exists( 'of_wednesday', $data ) ? trim($data['of_wednesday']) : '';
		$settings['seop_operating_hour']['Th']['from'] = array_key_exists( 'of_thursday', $data ) ? trim($data['of_thursday']) : '';
		$settings['seop_operating_hour']['Fr']['from'] = array_key_exists( 'of_friday', $data ) ? trim($data['of_friday']) : '';
		$settings['seop_operating_hour']['Sa']['from'] = array_key_exists( 'of_saturday', $data ) ? trim($data['of_saturday']) : '';
		$settings['seop_operating_hour']['Su']['from'] = array_key_exists( 'of_sunday', $data ) ? trim($data['of_sunday']) : '';
		$settings['seop_operating_hour']['Mo']['to'] = array_key_exists( 'ot_monday', $data ) ? trim($data['ot_monday']) : '';
		$settings['seop_operating_hour']['Tu']['to'] = array_key_exists( 'ot_tuesday', $data ) ? trim($data['ot_tuesday']) : '';
		$settings['seop_operating_hour']['We']['to'] = array_key_exists( 'ot_wednesday', $data ) ? trim($data['ot_wednesday']) : '';
		$settings['seop_operating_hour']['Th']['to'] = array_key_exists( 'ot_thursday', $data ) ? trim($data['ot_thursday']) : '';
		$settings['seop_operating_hour']['Fr']['to'] = array_key_exists( 'ot_friday', $data ) ? trim($data['ot_friday']) : '';
		$settings['seop_operating_hour']['Sa']['to'] = array_key_exists( 'ot_saturday', $data ) ? trim($data['ot_saturday']) : '';
		$settings['seop_operating_hour']['Su']['to'] = array_key_exists( 'ot_sunday', $data ) ? trim($data['ot_sunday']) : '';

		WPPostsRateKeys_Settings::update_options($settings);
	}

	$complete_address = true;
	$complete_contact = true;
	$complete_operating = false;
	if( empty( $settings['seop_local_name'] )
		|| empty( $settings['seop_local_type'] )
		|| empty( $settings['seop_local_address'] )
		|| empty( $settings['seop_local_city'] )
		|| empty( $settings['seop_local_state'] )
		|| empty( $settings['seop_local_postcode'] )
		|| empty( $settings['seop_local_country'] )
	)
		$complete_address = false;

	if( count($settings['seop_local_contact']) <= 0 )
		$complete_contact = false;

	foreach( $settings['seop_operating_hour'] as $operating )
	{
		if( !empty($operating['from']) && !empty($operating['to']) )
		{
			$complete_operating = true;
			break;
		}
	}
	$response['complete_address'] = $complete_address;
	$response['complete_contact'] = $complete_contact;
	$response['complete_operating'] = $complete_operating;

	$data_to_return['message'] = __('Local SEO has successfully updated.','seo-pressor');
	$data_to_return['type'] = 'notification';
	$data_to_return['response'] = $response;

}



if( $_REQUEST['object'] == 'sitemap' )
{
	$settings = WPPostsRateKeys_Settings::get_options();
	$response = array();

	if( array_key_exists( 'data', $_REQUEST ) )
	{
		$data = $_REQUEST['data'];
		$settings['seop_enable_sitemap'] = array_key_exists( 'enable', $data ) ? $data['enable'] : 0;
		$settings['seop_sitemap_frequency'] = array_key_exists( 'frequency', $data ) ? $data['frequency'] : 3;
		$settings['seop_sitemap_content_homepage'] = array_key_exists( 'enable_home', $data ) ? $data['enable_home'] : 0;
		$settings['seop_sitemap_content_posts'] = array_key_exists( 'enable_post', $data ) ? $data['enable_post'] : 0;
		$settings['seop_sitemap_content_pages'] = array_key_exists( 'enable_page', $data ) ? $data['enable_page'] : 0;
		$settings['seop_sitemap_content_categories'] = array_key_exists( 'enable_category', $data ) ? $data['enable_category'] : 0;

		WPPostsRateKeys_Settings::update_options($settings);
	}

	if( $settings['seop_enable_sitemap'] == 1 )
	{
		if( WPPostsRateKeys_Sitemap::GenerateXmlSitemap() )
		{
			$path = trailingslashit( ABSPATH );
			$sitemap = $path.'sitemap.xml';
			if( file_exists($sitemap) )
			{
				$xmlcontent = file_get_contents($sitemap, true);
				if( !empty($xmlcontent) && strpos( $xmlcontent, '<!-- Powered by SEOPressor -->' ) != false)
				{
					$response['sitemapurl'] = get_bloginfo('url').'/sitemap.xml';
					$response['creationdate'] = date ("F d Y H:i:s.", filemtime($sitemap));
				}
			}
		}
	}
	else
	{
		WPPostsRateKeys_Sitemap::deleteXmlSitemap();
		// Show message

	}

	$data_to_return['message'] = __('XML Sitemap has successfully updated.','seo-pressor');
	$data_to_return['type'] = 'notification';
	$data_to_return['response'] = $response;
}



if( $_REQUEST['object'] == 'link' )
{
	$settings = WPPostsRateKeys_Settings::get_options();

	if( array_key_exists( 'data', $_REQUEST ) )
	{
		$data = $_REQUEST['data'];
		$settings['seop_allow_no_follow_external_link'] = array_key_exists( 'external', $data ) ? $data['external'] : 0;
		$settings['seop_allow_no_follow_img'] = array_key_exists( 'img', $data ) ? $data['img'] : 0;
	}

	WPPostsRateKeys_Settings::update_options($settings);

	$data_to_return['message'] = __('Link policy has successfully updated.','seo-pressor');
	$data_to_return['type'] = 'notification';
}



if( $_REQUEST['object'] == 'home' )
{
	$settings = WPPostsRateKeys_Settings::get_options();

	if( array_key_exists( 'data', $_REQUEST ) )
	{
		$data = $_REQUEST['data'];
		$settings['seop_home_title'] = array_key_exists( 'title', $data ) ? trim($data['title']) : '';
		$settings['seop_home_description'] = array_key_exists( 'description', $data ) ? trim($data['description']) : '';
		$settings['seop_home_canonical'] = array_key_exists( 'canonical', $data ) ? trim($data['canonical']) : '';
		$settings['seop_home_redirect'] = array_key_exists( 'redirect', $data ) ? trim($data['redirect']) : '';
		$settings['seop_home_robot'] = array_key_exists( 'robot', $data ) ? $data['robot'] : array();
		$settings['seop_home_logo'] = array_key_exists( 'logo', $data ) ? trim($data['logo']) : '';
		$settings['seop_home_contact'] = array_key_exists( 'contact', $data ) ? $data['contact'] : array();
		$settings['seop_home_social'] = array_key_exists( 'social', $data ) ? $data['social'] : array();
		$settings['seop_home_fb_enable'] = array_key_exists( 'fb_enable', $data ) ? $data['fb_enable'] : 0;
		$settings['seop_home_fb_title'] = array_key_exists( 'fb_title', $data ) ? trim($data['fb_title']) : '';
		$settings['seop_home_fb_description'] = array_key_exists( 'fb_description', $data ) ? trim($data['fb_description']) : '';
		$settings['seop_home_fb_image'] = array_key_exists( 'fb_image', $data ) ? trim($data['fb_image']) : '';
		$settings['seop_home_fb_publisher'] = array_key_exists( 'fb_publisher', $data ) ? trim($data['fb_publisher']) : '';
		$settings['seop_home_fb_author'] = array_key_exists( 'fb_author', $data ) ? trim($data['fb_author']) : '';
		$settings['seop_home_tw_enable'] = array_key_exists( 'tw_enable', $data ) ? $data['tw_enable'] : 0;
		$settings['seop_home_tw_title'] = array_key_exists( 'tw_title', $data ) ? trim($data['tw_title']) : '';
		$settings['seop_home_tw_description'] = array_key_exists( 'tw_description', $data ) ? trim($data['tw_description']) : '';
		$settings['seop_home_image'] = array_key_exists( 'tw_image', $data ) ? trim($data['tw_image']) : '';
		$settings['seop_home_profile'] = array_key_exists( 'tw_profile', $data ) ? trim($data['tw_profile']) : '';
	}

	WPPostsRateKeys_Settings::update_options($settings);

	$data_to_return['message'] = __('Hompage settings has successfully updated','seo-pressor');
	$data_to_return['type'] = 'notification';

}



if( $_REQUEST['object'] == 'smart_linking' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];
	switch( $data['request'] )
	{
		case 'create':

			if( empty($data['keyword']) || empty($data['url']) || empty($data['times']) )
			{
				$data_to_return['message'] = __('Please fill up all required fields.','seo-pressor');
				$data_to_return['type'] = 'warning';
			}
			else
			{
				$result = WPPostsRateKeys_SmartLinking::create_smart_linking( $data );
				if( $result == 'exist' )
				{
					$data_to_return['message'] = __('A smart link for this keyword has already been created.','seo-pressor');
					$data_to_return['type'] = 'warning';
				}
				elseif( $result == false )
				{
					$data_to_return['message'] = __('There seems to be a problem creating your smart link. Please try again.','seo-pressor');
					$data_to_return['type'] = 'error';
				}
				else
				{
					$data_to_return['message'] = __('New smart link created.','seo-pressor');
					$data_to_return['type'] = 'notification';
					$data_to_return['do_reload'] = true;
				}
			}

			break;

		case 'get':

			if( !empty($data['id']) )
			{
				$result = WPPostsRateKeys_SmartLinking::get_smart_linking( $data['id'] );
				if( empty($result) )
				{
					$data_to_return['message'] = 'Add your smart linking.';
					$data_to_return['error'] = 'notification';
				}
				else
				{
					$result->keywords = esc_attr($result->keywords);
					$result->url = esc_url($result->url);
					$result->cloaking_folder = esc_attr($result->cloaking_folder);

					$data_to_return['message'] = '';
					$data_to_return['type'] = 'notification';
					$data_to_return['response'] = $result;
				}
			}

			break;

		case 'delete':

			if( !empty($data['id']) )
			{
				WPPostsRateKeys_SmartLinking::delete_smart_linking( $data['id'] );

				$data_to_return['message'] = '';
				$data_to_return['type'] = 'notification';
				$data_to_return['do_reload'] = true;
			}

			break;

		case 'update':

			if( empty($data['id']) || empty($data['keyword']) || empty($data['url']) || $data['times'] == '' )
			{
				$data_to_return['message'] = __('Please fill up all required fields.','seo-pressor');
				$data_to_return['type'] = 'warning';
			}
			else
			{
				$result = WPPostsRateKeys_SmartLinking::update_smart_linking( $data['id'], $data );
				if( $result === 'exist' )
				{
					$data_to_return['message'] = __('A smart link for this keyword has already been created.','seo-pressor');
					$data_to_return['type'] = 'warning';
				}
				else
				{
					$data_to_return['message'] = __('You\'ve updated your smart link.','seo-pressor');
					$data_to_return['type'] = 'notification';
					$data_to_return['do_reload'] = true;
				}
			}

			break;
	}
}

if( $_REQUEST['object'] == 'site_audit' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];
	switch( $data['request'] )
	{
		case 'do_analyze':
			$audit_ect = WPPostsRateKeys_Site_Audit::init_audit();
			if( $audit_ect !== FALSE )
			{
				$data_to_return['message'] = __('We\'re now analyzing your website. This may take a while...','seo-pressor');
				$data_to_return['type'] = 'notification';
				$data_to_return['ect'] = WPPostsRateKeys_Site_Audit::get_readable_ect( $audit_ect );
			}
			else
			{
				$data_to_return['message'] = __('Oops! We can\'t process your request right now. Please try again later.','seo-pressor');
				$data_to_return['type'] = 'warning';
			}
			break;
		case 'cancelaudit':
			WPPostsRateKeys_Site_Audit::deactivate_remove_siteaudit();
			$data_to_return['type'] = 'notification';
			$data_to_return['do_reload'] = true;
			break;
	}
}


if( $_REQUEST['object'] == 'role' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];

	switch( $data['request'] )
	{
		case 'enable':

			$settings = WPPostsRateKeys_Settings::get_options();
			$settings['enable_role_settings'] = intval($data['status']);
			WPPostsRateKeys_Settings::update_options($settings);

			$data_to_return['message'] = __('', 'seo-pressor');
			$data_to_return['type'] = 'notification';

			break;

		case 'update':

			if( !empty($data['id']) )
			{
				WPPostsRateKeys_CustomRoles::manage_role( 'update', $data['id'], NULL, NULL, (isset($data['capabilities']) ? $data['capabilities'] : array()) );
				$data_to_return['message'] = __('', 'seo-pressor');
				$data_to_return['type'] = 'notification';
			}

			break;

		case 'create':

			if( empty($data['name']) )
			{
				$data_to_return['message'] = __('Please fill up custom role name.', 'seo-pressor');
				$data_to_return['type'] = 'warning';
			}
			else
			{
				$inserted = WPPostsRateKeys_CustomRoles::manage_role( 'add', NULL, $data['name'], 'custom', (isset($data['capabilities']) ? $data['capabilities'] : array()) );
				if( $inserted )
				{
					$data_to_return['message'] = __('You\'ve created a new custom role.', 'seo-pressor');
					$data_to_return['type'] = 'notification';
				}
				else
				{
					$data_to_return['message'] = __('This custom role name has already been used. Try a different name.', 'seo-pressor');
					$data_to_return['type'] = 'warning';
				}
			}

			break;

		case 'delete':

			if( !empty($data['id']) )
			{
				WPPostsRateKeys_CustomRoles::manage_role( 'delete', $data['id'] );
				$data_to_return['message'] = __('Custom role has been successfully removed.', 'seo-pressor');
				$data_to_return['type'] = 'notification';
				$data_to_return['response'] = array(
					'id' => $data['id']
				);
			}

			break;

		case 'search_user':

			if( !empty($data['role_id']) && !empty($data['search_term']) )
			{
				$users = WPPostsRateKeys_CustomRoles::user_search( $data['search_term'], $data['role_id'] );
				if( count($users) > 0 )
				{
					$data_to_return['message'] = __('', 'seo-pressor');
					$data_to_return['type'] = 'notification';
					$data_to_return['response'] = $users;
				}
				else
				{
					$data_to_return['message'] = __('User not found.', 'seo-pressor');
					$data_to_return['type'] = 'notification';
					$data_to_return['response'] = array();
				}

			}

			break;

		case 'apply':

			if( empty($data['role_id']) || empty($data['user_name']) )
			{
				$data_to_return['message'] = __('Please enter a user\'s name.', 'seo-pressor');
				$data_to_return['type'] = 'warning';
			}
			else
			{
				$do_insert = WPPostsRateKeys_CustomRoles::apply_user_role( $data['role_id'], $data['user_name'] );
				if( $do_insert === true )
				{
					$data_to_return['message'] = __('User has successfully added.', 'seo-pressor');
					$data_to_return['type'] = 'notification';
					$data_to_return['response'] = array(
						'role_id' => $data['role_id'],
						'active_users' => WPPostsRateKeys_CustomRoles::get_user_list( $data['role_id'], true )
					);
				}
				else
				{
					$data_to_return['message'] = $do_insert == 'not found' ? __('User not found.', 'seo-pressor') : __('Unable to add administrator to custom role.', 'seo-pressor');
					$data_to_return['type'] = 'warning';
					$data_to_return['response'] = array(
						'role_id' => $data['role_id']
					);
				}
			}

			break;

		case 'delete_user':

			if( !empty($data['role_id']) && !empty($data['user_name']) )
			{
				WPPostsRateKeys_CustomRoles::delete_user_role( $data['role_id'], $data['user_name'] );
				$data_to_return['message'] = __('', 'seo-pressor');
				$data_to_return['type'] = 'notification';
				$data_to_return['response'] = array(
					'role_id' => $data['role_id'],
					'active_users' => WPPostsRateKeys_CustomRoles::get_user_list( $data['role_id'], true )
				);
			}

			break;
	}

}


if( $_REQUEST['object'] == 'advanced' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];
	$settings = WPPostsRateKeys_Settings::get_options();

	$settings['locale'] = trim($data['locale']);
	$settings['analize_full_page'] = $data['analyze_full_page'];
	$settings['on_page_box_auto_slide'] = $data['on_page_box_auto_slide'];
	$settings['on_page_box_auto_analysis'] = $data['on_page_box_auto_analysis'];
	$settings['on_page_automate_description'] = $data['on_page_automate_description'];
	$settings['on_page_automate_canonical'] = $data['on_page_automate_canonical'];
	$settings['special_characters_to_omit'] = implode( WPPostsRateKeys_Settings::SPEC_CHARS_DELIMITER, explode("\n", trim($data['special_characters_to_omit'])));
	$settings['minimum_score_to_publish'] = trim($data['minimum_score_to_publish']);
	$settings['support_multibyte'] = $data['support_multibyte'];

	WPPostsRateKeys_Settings::update_options($settings);

	$data_to_return['message'] = __('You\'ve updated your plugin settings.', 'seo-pressor');
	$data_to_return['type'] = 'notification';
}


if( $_REQUEST['object'] == 'upgrade' )
{
	if( WPPostsRateKeys_Settings::get_active() == 0 )
	{
		$data_to_return['message'] = __('Activate your plugin.', 'seo-pressor');
		$data_to_return['type'] = 'warning';
		WPPostsRateKeys_Logs::add_error('229',"Automatic Update fails: " . $data_to_return['message']);
	}
	else
	{
		$current_options = WPPostsRateKeys_Settings::get_options();

		if( !WPPostsRateKeys_Upgrade::check_for_ziparchive_class() )
		{
			$data_to_return['message'] = __("ZipArchive PHP library is not installed.",'seo-pressor');
			$data_to_return['type'] = 'warning';
			WPPostsRateKeys_Logs::add_error('228',"Automatic Update fails: " . $data_to_return['message']);
		}
		elseif( !WPPostsRateKeys_Upgrade::check_for_outgoing_connections() )
		{
			$data_to_return['message'] = __("Connection to SEOPressor not established.",'seo-pressor');
			$data_to_return['type'] = 'warning';
			WPPostsRateKeys_Logs::add_error('227',"Automatic Update fails: " . $data_to_return['message']);
		}
		else
		{
			$check_for_write_permission = WPPostsRateKeys_Upgrade::check_for_write_permission();

			if( !$check_for_write_permission[0] )
			{
				$data_to_return['message'] = __('Write permission on plugin folder is denied.','seo-pressor');
				$data_to_return['type'] = 'warning';
				WPPostsRateKeys_Logs::add_error('226',"Automatic Update fails: " . $data_to_return['message']);
			}
			else // Proceed with Upgrade
			{
				$file_name = WPPostsRateKeys::$plugin_dir . '/seo_pressor_last_ver.zip';

				$last_ver_url = WPPostsRateKeys_Central::$url_to_automatic_upgrade . '?cbc=' . $current_options['clickbank_receipt_number'];
				$response = wp_remote_get( $last_ver_url, array( 'timeout' => WPPostsRateKeys::$timeout ) );

				if( !is_wp_error($response) )
				{
		        	$zip_content = $response['body'];
		        	if( $zip_content == 'INVALID_LICENSE' )
					{
		        		$data_to_return['message'] = __('Your license is invalid.', 'seo-pressor');
						$data_to_return['type'] = 'warning';
						WPPostsRateKeys_Logs::add_error('225', "Automatic Update fails: " . $data_to_return['message']);
		        	}
		        	else
					{
		        		if( file_put_contents($file_name, $zip_content) )
						{
		        			// Unzip the files
							$zip = new ZipArchive;
							if( $zip->open($file_name) === TRUE )
							{
								@$zip->extractTo(WPPostsRateKeys::$plugin_dir . '..');

								// Used because extractTo can return True if one file could be extracted but other not!
								$last_error = error_get_last();
								if( key_exists( 'message', $last_error ) )
								{
									if( substr_count( $last_error['message'], 'failed to open stream: Permission denied' ) > 0 && substr_count( $last_error['message'], 'ZipArchive::extractTo' ) > 0 )
										{

										$data_to_return['message'] = __('Unable to upgrade. Check the web server, user has permission to rewrite the content on plugin folder ','seo-pressor')
								    		. WPPostsRateKeys::$plugin_dir
								    		. '<br><br>'
									        . __(' Details: ','seo-pressor')
									        . $last_error['message'];
										$data_to_return['type'] = 'warning';
										WPPostsRateKeys_Logs::add_error('224',"Automatic Update fails: " . $data_to_return['type']);
									}
								}

							    $zip->close();

							    // Delete Zip
							    @unlink($file_name);
							}
							else
							{
								$data_to_return['message'] = __('The upgrade fails. Check the permission to rewrite the content of the plugin folder ','seo-pressor') . WPPostsRateKeys::$plugin_dir;
								$data_to_return['type'] = 'warning';
								WPPostsRateKeys_Logs::add_error('223',"Automatic Update fails: " . $data_to_return['message']);
							}
		        		}
		        		else
						{
		        			$data_to_return['message'] = __('Your plugin folder needs to have write permission.','seo-pressor');
							$data_to_return['type'] = 'warning';
							WPPostsRateKeys_Logs::add_error('222',"Automatic Update fails: " . $data_to_return['message']);
		        		}
		        	}
		        }
		        else {
		        	/*@var WP_Error $response*/
		        	$data_to_return['message'] = __('Oops! We\'re unable to connect to SEOPressor. Error: ','seo-pressor')
								. $response->get_error_message($response->get_error_code());
					$data_to_return['type'] = 'warning';
					WPPostsRateKeys_Logs::add_error('221',"Automatic Update fails: " . $data_to_return['message']);
		        }

				if( $data_to_return['type'] != 'warning' )
				{ // In this case all cases for not empty $msg_type imply that the upgrade fails
					// Deactivate and Activate the plugin calling the upgrade script
					include( WPPostsRateKeys::$plugin_dir . '/includes/upgrade.php');

					// If successfully, notification user
					$data_to_return['message'] = __('You\'ve successfully updated SEOPressor.','seo-pressor');
					$data_to_return['type'] = 'notification';
				}
			}
		}
	}
}

if( $_REQUEST['object'] == 'activate' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];

	if( empty($data['receipt']) )
	{
		$data_to_return['message'] = __('Please enter your receipt number for activation.','seo-pressor');
		$data_to_return['type'] = 'warning';
	}
	else
	{
		WPPostsRateKeys_Central::check_lincense_status( trim($data['receipt']) );
		$settings = WPPostsRateKeys_Settings::get_options();

		if( WPPostsRateKeys_Settings::get_active() == 1 )
		{
			$data_to_return['message'] = __('You\'ve successfully activated SEOPressor. Welcome onboard!','seo-pressor');
			$data_to_return['type'] = 'notification';
			$data_to_return['do_reload'] = true;
		}
		else
		{
			$data_to_return['type'] = 'warning';
			if( !empty($settings['last_activation_message']) )
				$data_to_return['message'] = $settings['last_activation_message'];
			else
			{
				$data_to_return['message'] = __('Your receipt number is not activated, please try again later or contact <a href="http://seopressor.com/tutorials/#support" target="_blank">support</a> with your receipt number.','seo-pressor');
			}
		}
	}
}


if( $_REQUEST['object'] == 'linkmanager' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];
	switch($data['request'])
	{
		case 'refreshall':
			WPPostsRateKeys_Link::reset_all_links();
			WPPostsRateKeys_Settings::update_link_running_status( current_time('timestamp') );
			$data_to_return['type'] = 'notification';
			$data_to_return['message'] = __('Links has been successfully refreshed. ', 'seo-pressor');
			$data_to_return['do_reload'] = true;
			break;
		case 'refreshsingle':
			$httpcode = WPPostsRateKeys_Link::reset_single_link( $data['id'] );
			$data_to_return['type'] = 'notification';
			$data_to_return['message'] = __('', 'seo-pressor');
			$data_to_return['response'] = array(
				'id' => $data['id'],
				'httpcode' => $httpcode
			);
			break;
	}
}


if( $_REQUEST['object'] == 'report_domain' && array_key_exists( 'data', $_REQUEST ) )
{
	$data = $_REQUEST['data'];
	if( $data['request'] == 'report' )
	{
		if( !empty($data['reason']) && !empty($data['domain']) )
		{
			$message = isset($data['message']) ? $data['message'] : '';
			$response = WPPostsRateKeys_Central::submit_domain_report( $data['domain'], $data['reason'], $message );
			if( $response )
			{
				$data_to_return['type'] = 'notification';
				$data_to_return['message'] = __('Successfully reported, we will process your request as soon as possible. Thank you.', 'seo-pressor');
			}
			else
			{
				$data_to_return['type'] = 'warning';
				$data_to_return['message'] = __('Unable to connect to SEOPressor server, please try again later', 'seo-pressor');
			}
		}
		else
		{
			$data_to_return['type'] = 'warning';
			$data_to_return['message'] = __('Oops! We can\'t process your request right now. Please try again later.', 'seo-pressor');
		}
	}
}








$json = json_encode($data_to_return);
echo $json;
exit();
