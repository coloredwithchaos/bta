<?php
if (!class_exists('WPPostsRateKeys_Central'))
{
	class WPPostsRateKeys_Central
	{

		/*
		 * URL to process on page analysis
		 */
		static $path_analyze = '/api_v6/getdata_b64.php';

		/*
		 * URL to get site audit result with same license
		 */
		static $path_audit_report = '/api_v6/getaudit.php';

		/*
		 * URL to send site audit information to API server
		 */
		static $path_pingeduler = '/pingeduler/api/';

		/*
		 * URL to report unknown domains
		 */
		static $path_report_domain = '/api_v6/reportdomain.php';

		/*
		 * URL to update API server address
		 */
		static $url_server_list = 'http://seopressor.com/api_sl.php';

	    /**
         * The url to central script that receive the reported Url
         */
        static $url_nu = '/api_v6/nu.php';

	    /**
	     * The url to central script that returns the Box message
	     */
        static $url_box_msg = '/api_v6/get_msg_for_plugin_box.php';

	    /**
	     * The URL to check if active
	     */
        static $url_check_if_active_v6 = '/api_v6/activate_v6.php';

	   /**
	    * The URL to check last version
	    */
        static $url_check_last_version = '/api_v6/lvc.php';

	   /**
	    * The URL to do the automatic download and upgrade
	    */
        static $url_to_automatic_upgrade = 'http://seopressor.com/lv_down.php';

	   /**
	    * The meta value cached seopressor_original_post_content
	    *
	    * @static
	    * @var string
	    */
        static $original_post_content = '_seopressor_original_post_content';

	   /**
	    * The meta value cached score
	    *
	    * @static
	    * @var string
	    */
        static $cache_score = '_seop_cache_score';


	   /**
	    * The meta value to check cache valid
	    *
	    * @static
	    * @var string
	    */
        static $cache_md5 = '_seo_cache_md5';

	   /**
	    * The meta value to check cache valid for filter the title
	    *
	    * @static
	    * @var string
	    */
        static $cache_filtered_title = '_seo_cached_filtered_title';

	   /**
	    * The meta value to store filtered content
	    *
	    * @static
	    * @var string
	    */
        static $cache_filtered_content_new = '_seo_cached_filtered__content_new';

	   /**
	    * The meta value to check cache valid for filter the content
	    *
	    * @static
	    * @var string
	    */
        static $cache_md5_for_filter_content = '_seo_cache_md5_filter_content';

	   /**
	    * The meta value to store the last time the cache for filter the content was modified
	    *
	    * @static
	    * @var string
	    */
        static $cache_md5_filter_content_last_mod_time = '_seo_cache_filter_content_last_mod_time';

		/**
         * Check if the cache is valid, and if isn't update it
         * Not the Filter Content Cache, only the Score Cache
         *
         * @param int $post_id
         */
		static function check_update_post_data_in_cache_new( $post_id )
		{

			$cache_valid = FALSE;

			// get cache md5
			$cache_md5 = get_post_meta( $post_id, WPPostsRateKeys_WPPosts_New::$cache_md5_metadata, true );

			$post_permalink = get_permalink( $post_id );
			$seop_keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );
			$seop_results = WPPostsRateKeys_WPPosts_New::get_seop_analyze_result( $post_id );

			// Post Data
			$data_arr = WPPostsRateKeys_WPPosts_New::get_wp_post_title_content( $post_id, false );
        	$post_title = $data_arr[0];
        	$post_content = $data_arr[1];

			// Global settings
        	$settings = self::get_md5_settings(TRUE);
        	$settings_str = implode('',$settings);

			// Per Post Setting
			$post_setting = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post_id );

			// update $post_content if full page analysis selected
			$from_url = FALSE;
			if( $settings['analize_full_page'] == 1 )
			{
				$post_whole_page_to_analyze = WPPostsRateKeys_ContentRate::get_post_whole_page_to_analyze( $post_id, $settings, $post_permalink );

				if( $post_whole_page_to_analyze !== FALSE )
				{
					$post_content = $post_whole_page_to_analyze;
					$from_url = TRUE;
				}
			}

			// current md5 value
			$current_md5 = md5(
				$post_permalink
				.$post_title
				.$post_content
				.$settings_str
				.json_encode($post_setting)
				.json_encode($seop_keywords)
			);

			if ( $current_md5 == $cache_md5 ) {
				$cache_valid = TRUE;
			}

			// Update Scoring if cache outdated
			if( !$cache_valid || is_null($seop_results) )
			{
				$analyze_result = WPPostsRateKeys_ContentRate::get_all_post_data_new( $post_id, $seop_keywords, $post_title, $post_content, $from_url );
				WPPostsRateKeys_WPPosts_New::update_seop_analyze_result( $post_id, $current_md5, $analyze_result );
			}
		}


        /**
         * Return the filtered title
         *
         * @param int 		$post_id
         * @param string 	$post_title
         * @return string
         */
        static function get_filtered_title($post_id,$post_title='') {
        	// Keywords
        	$post_keyword = WPPostsRateKeys_WPPosts::get_keyword($post_id);
        	$post_keyword2 = WPPostsRateKeys_WPPosts::get_keyword2($post_id);
        	$post_keyword3 = WPPostsRateKeys_WPPosts::get_keyword3($post_id);

        	$keyword_arr = array($post_keyword);
        	if ($post_keyword2!='') $keyword_arr[] = $post_keyword2;
        	if ($post_keyword3!='') $keyword_arr[] = $post_keyword3;

        	$settings = WPPostsRateKeys_Settings::get_options();

        	if ($post_title=='') {
        		// Get Post title
        		$data_arr = WPPostsRateKeys_WPPosts::get_wp_post_title_content($post_id);
        		$post_title = $data_arr[0];
        	}

        	// Since the calculation of the new title is simple, don't need a cached md5
        	$new_title = WPPostsRateKeys_Filters::filter_post_title($post_title,$keyword_arr,$settings);

        	return $new_title;
        }

		static function check_lincense_status( $license = '' )
		{
			$data = WPPostsRateKeys_Settings::get_options();

			if( !empty($license) )
			{
				$license = md5(trim($license));
				$from_cron = false;
			}
			else
			{
				$license = WPPostsRateKeys_Settings::get_clickbank_receipt_number();
				$from_cron = true;
			}

			if( empty($license) )
			{
				//$data['active'] = 0;
				//$data['license_type'] = '';
				//$data['last_activation_message'] = '';
				return false;
			}
			else
			{

				$url_to_request = WPPostsRateKeys_Settings::get_api_server() . self::$url_check_if_active_v6 . '?clickbank_receipt_number=' . urlencode($license) . '&plugin_domain=' . urlencode(get_bloginfo('wpurl'));
				$response = wp_remote_get( $url_to_request, array( 'timeout' => WPPostsRateKeys::$timeout ) );

				if( !is_wp_error($response) && wp_remote_retrieve_response_code($response) == 200 )
				{
					$response = json_decode($response['body'], true);
					if( $response['status'] == 'ACTIVE' )
					{
						$data['clickbank_receipt_number'] = $license;
						$data['active'] = 1;
						$data['license_type'] = $response['type'];
						$data['last_activation_message'] = '';
					}
					elseif( $response['status'] == 'NODB' )
					{
						$data['clickbank_receipt_number'] = '';
						$data['active'] = 0;
						$data['license_type'] = '';
						if( $from_cron )
						{
							$data['last_activation_message'] = __('Your receipt number is inactive.','seo-pressor');
							WPPostsRateKeys_Logs::add_error( '500', "check_lincense_status, run via daily cron was deactivated license number " . $license );
						}
						else
						{
							$data['last_activation_message'] = __('Your receipt number is inactive, please try again in 10 minutes or contact support at <a href="http://seopressor.com/tutorials/#support" target="_blank">http://seopressor.com/tutorials/#support</a> with your receipt number.','seo-pressor');
							WPPostsRateKeys_Logs::add_error( '501', "check_lincense_status, run via ajax was deactivated license number " . $license );
						}
					}
					else
					{
						WPPostsRateKeys_Logs::add_error( '503', "check_lincense_status, run via " . ($from_cron ? 'daily cron' : 'ajax') . " was receiving unexpected content, license number " . $license . " Body " . $response['body'] );
					}

				}
				else
				{
					WPPostsRateKeys_Logs::add_error( '372', "check_lincense_status, Url: " . $url_to_request );
					return false;
				}

			}

			WPPostsRateKeys_Settings::update_options( $data );

		}

        /**
         * Get the settings that change the rate-suggestion-filters actions
         *
         * Are the settings that affect the md5 calculation
         *
         * @param	bool	$as_array		True when data must be returned as array
         * @return 	string
         */
        static function get_md5_settings($as_array=FALSE) {
        	$options = WPPostsRateKeys_Settings::get_options();

        	$return = array();

	        //$return['h1_tag_already_in_theme'] = $options['h1_tag_already_in_theme'];
	        //$return['h2_tag_already_in_theme'] = $options['h2_tag_already_in_theme'];
	        //$return['h3_tag_already_in_theme'] = $options['h3_tag_already_in_theme'];
	        //$return['allow_add_keyword_in_titles'] = $options['allow_add_keyword_in_titles'];

        	//$return['allow_bold_style_to_apply'] = $options['allow_bold_style_to_apply'];
	        //$return['bold_style_to_apply'] = $options['bold_style_to_apply'];

	        //$return['allow_italic_style_to_apply'] = $options['allow_italic_style_to_apply'];
	        //$return['italic_style_to_apply'] = $options['italic_style_to_apply'];

	        //$return['allow_underline_style_to_apply'] = $options['allow_underline_style_to_apply'];
	        //$return['underline_style_to_apply'] = $options['underline_style_to_apply'];

	        $return['allow_automatic_adding_rel_nofollow'] = $options['allow_automatic_adding_rel_nofollow'];

	        $return['enable_special_characters_to_omit'] = $options['enable_special_characters_to_omit'];
	        $return['special_characters_to_omit'] = $options['special_characters_to_omit'];

	        //$return['image_alt_tag_decoration'] = $options['image_alt_tag_decoration'];
	        //$return['alt_attribute_structure'] = $options['alt_attribute_structure'];

	        $return['analize_full_page'] = $options['analize_full_page'];

	        /*
	         * The follow values only modify filtered Post Content, not Score or Suggestions
	         */
	        //$return['image_title_tag_decoration'] = $options['image_title_tag_decoration'];
	        //$return['title_attribute_structure'] = $options['title_attribute_structure'];

	        $return['auto_add_rel_nofollow_img_links'] = $options['auto_add_rel_nofollow_img_links'];


        	if ($as_array)
        		return $return;
        	else // As string
        		return implode('',$return);
        }

        static function get_data( $request_params ) {

        	$request_params = json_encode( $request_params, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );

			$request_params = base64_encode($request_params);

        	$receipt_number = urlencode( trim( WPPostsRateKeys_Settings::get_clickbank_receipt_number() ) );

			$url_to_request = WPPostsRateKeys_Settings::get_api_server() . self::$path_analyze . '?pd=' . urlencode(get_bloginfo('wpurl')) . '&pl=' . $receipt_number;


        	// Request from server
        	$response = wp_remote_post( $url_to_request, array(
				'timeout' 	=> WPPostsRateKeys::$timeout
        		,'body' 	=> array( 'p' => $request_params)
			));

        	if (!is_wp_error($response)) { // Else, was an object(WP_Error)

        		$response_params = $response['body'];
        		$response = json_decode($response_params,TRUE);

        		// Check if the Trial overdue
        		if (!$response['is_active']) {
        			// Isn't active
					WPPostsRateKeys_Logs::add_error( '502',"get_data, running via on-page analysis was deactivated license number " . WPPostsRateKeys_Settings::get_clickbank_receipt_number() );
        			WPPostsRateKeys_Settings::update_active_by_server_response('NODB');
        		}

        		return $response;
        	}
        	else {

        		/*@var $response WP_Error*/
        		WPPostsRateKeys_Logs::add_error('372',"get_data from API, Url: " . $url_to_request
        		. ', Error Msg: ' . $response->get_error_message());
        		return FALSE;
        	}
        }

        /**
         * Get the settings that change the content filter
         *
         * Only the settings that impact in new Content generation
         *
         * @param	bool	$as_array		True when data must be returned as array
         * @return 	string
         */
        static function get_md5_settings_for_filter_content($as_array=FALSE) {
        	$options = WPPostsRateKeys_Settings::get_options();

        	$return = array();

        	// Bold to keywords
        	$return['allow_bold_style_to_apply'] = $options['allow_bold_style_to_apply'];
	        $return['bold_style_to_apply'] = $options['bold_style_to_apply'];

	        // Italic to keywords
	        $return['allow_italic_style_to_apply'] = $options['allow_italic_style_to_apply'];
	        $return['italic_style_to_apply'] = $options['italic_style_to_apply'];

	        // Underline to keywords
	        $return['allow_underline_style_to_apply'] = $options['allow_underline_style_to_apply'];
	        $return['underline_style_to_apply'] = $options['underline_style_to_apply'];

	        // Add nofollow attribute to links
	        $return['allow_automatic_adding_rel_nofollow'] = $options['allow_automatic_adding_rel_nofollow'];

	        // Characters to omit
	        $return['enable_special_characters_to_omit'] = $options['enable_special_characters_to_omit'];
	        $return['special_characters_to_omit'] = $options['special_characters_to_omit'];

	        // Image attributes
	        $return['image_alt_tag_decoration'] = $options['image_alt_tag_decoration'];
	        $return['alt_attribute_structure'] = $options['alt_attribute_structure'];

	        $return['image_title_tag_decoration'] = $options['image_title_tag_decoration'];
	        $return['title_attribute_structure'] = $options['title_attribute_structure'];

	        // No follow for images links
	        $return['auto_add_rel_nofollow_img_links'] = $options['auto_add_rel_nofollow_img_links'];

        	if ($as_array)
        		return $return;
        	else // As string
        		return implode('',$return);
        }

        /**
         * Return the $original_post_content
         */
        static function get_original_post_content($post_id) {
        	return get_post_meta($post_id, self::$original_post_content, TRUE);
        }

        /**
         * Update the $original_post_content
         * @access 	public
         */
        static function update_original_post_content($post_id,$original_post_content) {
        	// Update Content
	        update_post_meta($post_id, self::$original_post_content, $original_post_content);
        }

        /**
         * Return the $cache_filtered_content_new
         */
        static function get_cache_filtered_content_new($post_id) {
        	return get_post_meta($post_id, self::$cache_filtered_content_new, TRUE);
        }

        /**
         * Update the $cache_filtered_content_new
         * @access 	public
         */
        static function update_cache_filtered_content_new($post_id,$cache_filtered_content_new) {
        	// Update Content
	        update_post_meta($post_id, self::$cache_filtered_content_new, $cache_filtered_content_new);
        }

        /**
         *
         * Return the score
         *
         * @param 	int			$post_id	Used when the function is called from this plugin
         * @return 	string
         * @access 	public
         */
        static function get_score($post_id) {
        	$return = get_post_meta($post_id, self::$cache_score, TRUE);
        	if ($return=='')
        		$return = 0;

        	return $return;
        }

        /**
         *
         * Get specific information from Server:
         * - message to show in dashboard Box
         * - if plugin is active
         *
         * This request is made by the plugin code
         *
         * @param	string		$info_to_request	Can be: dashboard_box_message, if_active
         * @access 	public
         * @return	string|bool						returns the information or FALSE on fails
         */
        static function get_specific_data_from_server($info_to_request,$request_params='') {

        	if ($info_to_request=='dashboard_box_message') {
        		$url_to_request = WPPostsRateKeys_Settings::get_api_server() . self::$url_box_msg;
        	}
        	elseif ($info_to_request=='if_active') {
        		$url_to_request = self::$url_check_if_active . '?clickbank_receipt_number='
								. urlencode(WPPostsRateKeys_Settings::get_clickbank_receipt_number())
								. '&plugin_domain=' . urlencode(get_bloginfo('wpurl'));
        	}
        	else // If none of the availables options was selected
        		return FALSE;

        	// Request from server
        	$response = wp_remote_get($url_to_request,array('timeout'=>WPPostsRateKeys::$timeout));

        	if (!is_wp_error($response)) { // Else, was an object(WP_Error)
        		$response = $response['body'];
        		return $response;
        	}
        	else {
        		WPPostsRateKeys_Logs::add_error('372',"get_specific_data_from_server, Url: " . $url_to_request);
        		return FALSE;
        	}
        }

		/**
		 * Get remote value: last version
		 *
		 * @static
		 * @return bool		TRUE on success, FALSE on fails
		 * @access public
		 */
		static public function make_last_version_plugin_request() {
			// Use WordPress function to get content of a remote URL
			$response = wp_remote_get( WPPostsRateKeys_Settings::get_api_server() . self::$url_check_last_version,array('timeout'=>WPPostsRateKeys::$timeout));

			if (!is_wp_error($response)) { // Else, was an object(WP_Error)
				$body = $response['body'];
				WPPostsRateKeys_Settings::update_last_version($body);
				return TRUE;
			}
			else {
				WPPostsRateKeys_Logs::add_error('373',"make_last_version_plugin_request, Url: " . self::$url_check_last_version);
        		return FALSE;
			}
		}

        /*
         * Will return the content from cache or get/save the new one
         *
         */
        static function get_content_cache_current_md5($post_id,$settings=array(),$keywords=array(),$post_content='') {

        	// Keywords
        	if (count($keywords)==0) {
        		$post_keyword = WPPostsRateKeys_WPPosts::get_keyword($post_id);
	        	$post_keyword2 = WPPostsRateKeys_WPPosts::get_keyword2($post_id);
	        	$post_keyword3 = WPPostsRateKeys_WPPosts::get_keyword3($post_id);
        	}
        	else {
        		$post_keyword = $keywords[0];

        		if (count($keywords)>1) {
        			$post_keyword2 = $keywords[1];
        		}
        		else {
        			$post_keyword2 = '';
        		}

        		if (count($keywords)>2) {
        			$post_keyword3 = $keywords[2];
        		}
        		else {
        			$post_keyword3 = '';
        		}
        	}

        	// Post Data
        	if ($post_content=='') {
        		$data_arr = WPPostsRateKeys_WPPosts::get_wp_post_title_content($post_id);
	        	// Use the Original Content (saved in postmeta)
    	    	$post_content = WPPostsRateKeys::get_content_to_edit($data_arr[1],$post_id);
        	}

        	if (count($settings)==0) {
        		$settings = self::get_md5_settings_for_filter_content(TRUE);
        	}

        	$settings_str = implode('', $settings);

        	$current_md5 = md5($post_keyword
        			.$post_keyword2
        			.$post_keyword3
        			.$post_content.$settings_str
        	);

        	return $current_md5;
        }

        /*
         * Will return the content from cache or get/save the new one
         *
         */
        static function get_update_content_cache($post_id,$current_content_in_filter) {

        	// Keywords
        	$post_keyword = WPPostsRateKeys_WPPosts::get_keyword($post_id);
        	$post_keyword2 = WPPostsRateKeys_WPPosts::get_keyword2($post_id);
        	$post_keyword3 = WPPostsRateKeys_WPPosts::get_keyword3($post_id);

        	$settings = self::get_md5_settings_for_filter_content(TRUE);

        	// Post Data
        	$data_arr = WPPostsRateKeys_WPPosts::get_wp_post_title_content($post_id);
        	// Use the Original Content (saved in postmeta)
        	$post_content = WPPostsRateKeys::get_content_to_edit($data_arr[1],$post_id);

        	$current_md5 = self::get_content_cache_current_md5($post_id,$settings
        							,array($post_keyword,$post_keyword2,$post_keyword3),$current_content_in_filter);

        	// Check for last date of the cache and last date where internal or external links were modified
        	$invalid_ext_or_int_links = FALSE;

        	// Check Cache invalid, if still Original: must be replaced
        	$cache_filtered_content_new = WPPostsRateKeys_Central::get_cache_filtered_content_new($post_id);
        	if ($cache_filtered_content_new=='') {
        		$cache_need_update = TRUE;
        	}
        	else {
        		$cache_need_update = FALSE;
        	}

        	$last_dt_cache_mod = get_post_meta($post_id, self::$cache_md5_filter_content_last_mod_time, TRUE);
        	if (WPPostsRateKeys_Settings::get_last_external_links_modification_time()>=$last_dt_cache_mod
        			|| WPPostsRateKeys_Settings::get_last_internal_links_modification_time()>=$last_dt_cache_mod
        			) {
        		$invalid_ext_or_int_links = TRUE;
        	}

        	if ($current_md5==get_post_meta($post_id, self::$cache_md5_for_filter_content, TRUE)
        			&& !$invalid_ext_or_int_links
        		    && !$cache_need_update) {
        		// Return the same content received because we already have a valid Content in Database
        		return $cache_filtered_content_new;
        	}
        	else {
        		$keyword_arr = array($post_keyword);
        		if ($post_keyword2!='') $keyword_arr[] = $post_keyword2;
        		if ($post_keyword3!='') $keyword_arr[] = $post_keyword3;

        		// The follow function get and save the filtered content
        		// Is used $current_content to avoid lose some change made for others plugins/themes
        		$filtered_content = WPPostsRateKeys_Filters::filter_post_content($keyword_arr,$post_content,$settings,$post_id,$current_md5,$current_content_in_filter);

        		return $filtered_content;
        	}
        }

		/**
         * Send url
         *
         */
        static function send_url() {
        	$receipt_number = urlencode(trim(WPPostsRateKeys_Settings::get_clickbank_receipt_number()));
        	$plugin_url = urlencode(WPPostsRateKeys::$plugin_url);

        	// Send
        	$response = wp_remote_get( WPPostsRateKeys_Settings::get_api_server() . self::$url_nu . "?cbc=$receipt_number&url=$plugin_url",array('timeout'=>WPPostsRateKeys::$timeout) );

        	if (is_wp_error($response)) { // Is an object(WP_Error)
        		WPPostsRateKeys_Logs::add_error('374',"send_url, Url: " . self::$url_nu . "?cbc=$receipt_number&url=$plugin_url");
        	}

        }

        /**
         * Return current domain with no dir
         *
         * @return string
         */
        static function get_current_domain() {
        	if (WPPostsRateKeys_Settings::support_multibyte()) {
        		$current_domain = mb_strtolower(get_bloginfo('wpurl'),'UTF-8');
        	}
        	else {
        		$current_domain = strtolower(get_bloginfo('wpurl'));
        	}

        	$current_domain_arr = parse_url($current_domain);
        	/*
        	 * Take in care that must be compatible with subdomains and directories, so user can
        	* install at something.somesite.com/blog/ with just somesite.com as the domain
        	*
        	* so, get domain without subdirectories and wihout protocol part ex: http://
        	*/
        	$current_domain_no_dir = $current_domain_arr['host'];

        	return $current_domain_no_dir;
        }

		static public function connect_pingeduler( $audit_id, $type='subscribe', $score=0, $health=0 )
		{

			$params = array(
				'receipt' => trim(WPPostsRateKeys_Settings::get_clickbank_receipt_number()),
				'type' => $type,
				'domain' => get_site_url(),
				'plugin_url' => WPPostsRateKeys::$plugin_url,
				'audit_id' => $audit_id,
				'score' => $score,
				'health' => $health
			);

			$url_request = WPPostsRateKeys_Settings::get_api_server() . self::$path_pingeduler;

			$response = wp_remote_post( $url_request, array(
				'timeout' => WPPostsRateKeys::$timeout,
				'body' => $params
			) );

			if ( !is_wp_error( $response ) )
			{
				$str = wp_remote_retrieve_body( $response );
				return true;
			}
			else
			{
				return false;
			}

		}

		static public function get_other_domain_audit_report()
		{
			$url_to_request = WPPostsRateKeys_Settings::get_api_server() . self::$path_audit_report . '?receipt=' . urlencode(WPPostsRateKeys_Settings::get_clickbank_receipt_number()) . '&wpurl=' . urlencode(get_bloginfo('wpurl'));

			$response = wp_remote_get( $url_to_request, array('timeout'=>WPPostsRateKeys::$timeout));
			if( !is_wp_error( $response ) )
			{
				$response_code = wp_remote_retrieve_response_code( $response );
				if( isset($response['body']) && !empty($response['body']) && $response_code == 200 )
				{
					$report = json_decode( $response['body'], true );
					return $report;
				}
				else
				{
					return array();
				}
			}
			else
			{
				return array();
			}
		}

		static public function get_latest_api_servers()
		{
			$url_to_request = self::$url_server_list;
			$response = wp_remote_get( $url_to_request, array(
				'timeout' => WPPostsRateKeys::$timeout
			) );
			if( !is_wp_error( $response ) )
			{
				if( isset($response['body']) && !empty($response['body']) )
				{
					$lists = json_decode( $response['body'], true );
					if( count($lists) > 0 )
					{
						WPPostsRateKeys_Settings::set_api_server($lists);
					}
				}
			}
		}

		static public function submit_domain_report( $domain, $reason, $message = '' )
		{
			$params = array(
				'receipt' => trim(WPPostsRateKeys_Settings::get_clickbank_receipt_number()),
				'wpurl' => trim(get_bloginfo('wpurl')),
				'domain' => trim($domain),
				'reason' => $reason,
				'message' => $message
			);

			$url_request = WPPostsRateKeys_Settings::get_api_server() . self::$path_report_domain;

			$response = wp_remote_post( $url_request, array(
				'timeout' => WPPostsRateKeys::$timeout,
				'body' => $params
			) );

			if ( !is_wp_error( $response ) )
			{
				$str = wp_remote_retrieve_body( $response );
				return true;
			}
			else
			{
				return false;
			}
		}

	}
}
