<?php
/*
Plugin Name: SEOPressor Connect
Plugin URI: http://www.seopressor.com
Description: SEOPressor Connect gives you maximum WordPress SEO control for top search ranking. Now powering more than 217K unique domains and 23 million WordPress pages. Join our <a href="http://seopressor.com/seopressor-connect-jv/" target="_blank">affiliate program</a>.
Version: 6.2
Author: SEOPressor on Facebook
Author URI: https://www.facebook.com/SEOPressorOfficial
*/

error_reporting(0);

// Avoid name collisions.
if (!class_exists('WPPostsRateKeys')) {
	class WPPostsRateKeys
    {
       /**
	    * The Plugin version
	    * @var string
	    */
        const VERSION = '6.2';

       /**
    	 * Determine if the actions must been Logged
    	 *
    	 * @var bool
    	 */
    	const LOG_ENABLE = FALSE;

       /**
    	 * Determine if the errors must been Logged
    	 *
    	 * @var bool
    	 */
    	const ERROR_LOG_ENABLE = TRUE;

       /**
	    * The url to the plugin
	    *
	    * @static
	    * @var string
	    */
        static $plugin_url;

       /**
	    * The path to the plugin
	    *
	    * @static
	    * @var string
	    */
        static $plugin_dir;

       /**
	    * The prefix to the Database tables
	    *
	    * @static
	    * @var string
	    */
        static $db_prefix;

       /**
	    * The path to the plugin templates files
	    *
	    * @static
	    * @var string
	    */
        static $template_dir;

       /**
	    * The Plugin settings
	    *
	    * @static
	    * @var string
	    */
        static $settings;

        /**
	    * Timeout for requests (in seconds)
	    *
	    * @static
	    * @var int
	    */
        static $timeout;

        /**
         * Post types to ignore
         *
         * @static
         * @var array
         */
        static $post_types_to_ignore;

       /**
         * Executes all initialization code for the plugin.
         *
         * @return void
         * @access public
		 */
        function WPPostsRateKeys() {

        	if( isset($_GET['page']) && ($_GET['page'] == 'seopressor-support' || $_GET['page'] == 'seopressor-tutorials') )
			{
        		// Allow redirect
        		ob_start();
        	}

        	// Add Post types to ignore
        	self::$post_types_to_ignore = array('thirstylink');

        	// Define static values
        	$dir_name = dirname( plugin_basename(__FILE__) );
        	self::$plugin_url = trailingslashit( plugins_url() . '/' . $dir_name);
        	self::$plugin_dir = trailingslashit( WP_PLUGIN_DIR . '/' . $dir_name);

        	self::$template_dir = self::$plugin_dir . 'templates';
        	self::$db_prefix = 'seopressor_';
        	self::$timeout = 50; // By default is 5

        	// Include all classes
        	include(self::$plugin_dir . '/includes/all_classes.php');

			// V6 upgrade
        	WPPostsRateKeys_WPPosts_New::update_non_hidden_metadata();
			//WPPostsRateKeys_SmartLinking::v6_migration();

			// Add one minute cron job
			add_filter( 'cron_schedules', array( $this, 'add_one_minute_cron' ) );

        	// Schedule jobs
			self::add_actions_for_schedule_jobs();

			self::update_main_options (FALSE);

			// Check is plugin is activated
			if( WPPostsRateKeys_Settings::get_active() )
			{
				// Add cron for link checker
				if( !wp_next_scheduled( 'seopressor_link_check' ) ){
					wp_schedule_event( current_time ( 'timestamp' ), 'in_per_minute', 'seopressor_link_check' );
				}

				// Add cron for site audit
				if( !wp_next_scheduled( 'seopressor_site_audit' ) ){
					wp_schedule_event( current_time ( 'timestamp' ), 'daily', 'seopressor_site_audit' );
				}

				// Add filter, link policy, smart linking
				add_filter( 'the_content', array($this, 'handle_automatic_stuff_post_content') );

	        	// Add actions to handle the Update of a POST or PAGE, in order to store the keyword
	           	add_action( 'save_post', array($this, 'handle_update_post_form'), 11, 2 );
	           	//add_action( 'save_page', array($this, 'handle_update_post_form'), 11, 2 );

	           	// Actions when post is published, usefull to compare score with minimum in settings
	           	//add_action( 'publish_post', array($this, 'handle_publish_post'), 11, 2 );
	           	//add_action( 'publish_page', array($this, 'handle_publish_post'), 11, 2 );

				// Add Local SEO Widget
				add_action( 'widgets_init', array( $this, 'regiter_local_widget' ) );

	           	// Add action to modify WordPress head
	           	add_action( 'wp_head', array($this, 'wp_head'), 1 ); // -99999 if want to make it before title tag

	           	// Add new user profile fields
	           	add_action( 'user_contactmethods', array($this, 'add_user_contactmethods') );

				// Allow redirect in single post setting
				add_action( 'template_redirect', array($this, 'manage_redirection') );

				// Allow smart linking to do cloaking
				add_action( 'wp_enqueue_scripts', array($this, 'front_enqueue_script') );

				// Overwrite title tag by using add_filter
				add_filter( 'pre_get_document_title', array( $this, 'overwrite_title' ), 16 );
				add_filter( 'wp_title', array( $this, 'overwrite_title' ), 16 );
				add_filter( 'thematic_doctitle', array( $this, 'overwrite_title' ), 16 );

				// Overwrite title tag by using output buffering
				add_action( 'template_redirect', array($this, 'before_header'), 0 );
				add_action( 'wp_head', array($this, 'after_header'), 9 );

			}
			else
			{
				// Disable cron for link checker
				if( wp_next_scheduled( 'seopressor_link_check' ) ){
					wp_clear_scheduled_hook('seopressor_link_check');
				}

				// Disable cron for site audit
				if( wp_next_scheduled( 'seopressor_site_audit' ) ){
					wp_clear_scheduled_hook('seopressor_site_audit');
				}

			}



			// Add AJAX support through native WP admin-ajax action
			add_action( 'wp_ajax_seopressor_box_new', 					array($this, 'ajax_box_new') );
			add_action( 'wp_ajax_seops_ajax', 							array( $this, 'seops_ajax' ) );

			// Remove related links when user delete a post
			add_action( 'delete_post', array($this, 'handle_delete_post') );

			// Remove from custom role when user is deleted
			add_action( 'delete_user', array($this, 'handle_delete_user') );

			// Add Menu Box in Admin Panel
     	add_action( 'admin_menu', array($this, 'admin_menu'), 1 );

			// Enqueue scripts
			add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'), 2);

	   	// If the plugin isn't activated by Aweber or can be upgrade, show message
	   	add_action( 'admin_notices', array($this, 'show_admin_notice') );

     	// If plugin can be upgrade, show message
			add_action( 'after_plugin_row', array($this, 'show_notice_plugins_page'), 10, 2 );

			// Add the widget in dashboard
			//add_action( 'wp_dashboard_setup', array($this, 'add_dashboard_widget') );

			// Update box suggestions data on rich text editor changes
			add_filter( 'tiny_mce_before_init', array($this, 'update_box_suggestions_data') );

			//add_action( 'admin_init', array( 'WPPostsRateKeys_Pointers', 'load_notice' ) );


			// Init actions
			add_filter('init', array($this, 'wp_init'));

			// Translations for plugin
			self::handle_load_domain();
        }


		static function seops_enqueue_script_common()
		{
			// WP media script
			wp_enqueue_media();

			// jQuery UI environment
			wp_enqueue_style( 'jquery_ui_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css' );
			wp_enqueue_script( 'jquery_ui_js', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js' );

			// LC Switch – jQuery Plugin, http://www.lcweb.it/lc-switch
			wp_enqueue_style( 'jquery_lc_switch_css', self::$plugin_url . 'templates/css/seops.lcswitch.css' );
			wp_enqueue_script( 'jquery_lc_switch_js', self::$plugin_url . 'templates/js/seops.lcswitch.js' );

			// jQuery AsPieProgress
			wp_enqueue_style( 'jquery_aspieprogress_css', self::$plugin_url . 'templates/css/seops_aspie.css' );
			wp_enqueue_script( 'jquery_aspieprogress_js', self::$plugin_url . 'templates/js/seops.aspie.js' );

			// SEOPressor script
			wp_enqueue_style( 'seops_css_box', self::$plugin_url . 'templates/css/seops.css', array(), '6.0.1' );
			wp_enqueue_script( 'seops_js_common', self::$plugin_url . 'templates/js/seops.common.js' );

			$var_js = array(
				'plugin_url' => self::$plugin_url,
				'update_text' => __('Update', 'seo-pressor')
			);
			wp_localize_script( 'seops_js_common', 'var_js', $var_js );
		}


        /*
         * Load admin JS and CSS
         *
         * Only if we are in any of the SEOPressor pages
         */
        function admin_enqueue_scripts() {

        	global $pagenow;

			// show pointer
			WPPostsRateKeys_Pointers::load_notice();

			// enqueue custom css to overwrite wp default
			wp_enqueue_style( 'seopressor_overwrite', self::$plugin_url . 'templates/css/seops_overwrite.css' );


        	if (in_array( $pagenow, array( 'post.php', 'post-new.php' )))
			{
				// jQuery UI
				wp_enqueue_style( 'jquery_ui_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css' );
				wp_enqueue_script( 'jquery_ui_js', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js' );

				// on/off switch library
				wp_enqueue_style( 'jquery_lc_switch_css', self::$plugin_url . 'templates/css/seops.lcswitch.css' );
				wp_enqueue_script( 'jquery_lc_switch_js', self::$plugin_url . 'templates/js/seops.lcswitch.js' );

				// custom scrollbar
				wp_enqueue_style( 'jquery_simplebar_css', self::$plugin_url . 'templates/css/seops.simplebar.css' );
				wp_enqueue_script( 'jquery_simplebar_js', self::$plugin_url . 'templates/js/seops.simplebar.js' );

				// seop box scripts
				wp_enqueue_style( 'seop_css_box', self::$plugin_url . 'templates/css/seop-box.css' );
				wp_enqueue_script( 'seop_js_box', self::$plugin_url . 'templates/js/seop-box.js' );

				// pass some variable to js
				$var_js = array(
					'plugin_url' => self::$plugin_url,
					'update_text' => __('Update', 'seo-pressor'),
					'auto_slide' => self::$settings['on_page_box_auto_slide'],
					'auto_analysis' => self::$settings['on_page_box_auto_analysis']
				);
				wp_localize_script( 'seop_js_box', 'var_js', $var_js );
        	}
			elseif( isset($_REQUEST['page']) )
			{
				// enqueue admin page script & css
				switch( $_REQUEST['page'] )
				{
					case 'seopressor-sitewide':
					case 'seopressor-score-manager':
					case 'seopressor-keyword-rank':
					case 'seopressor-link-manager':
					case 'seopressor-smart-linking':
					case 'seopressor-homepage-settings':
					case 'seopressor-logs':
					case 'seo-pressor.php':
					case 'seopressor-tutorials':
						self::seops_enqueue_script_common();
						break;

					case 'seopressor-role-settings':
					case 'seopressor-create-custom-role':
					case 'seopressor-edit-custom-role':
					case 'seopressor-apply-custom-role':
						self::seops_enqueue_script_common();
						wp_enqueue_script( 'role-manager', self::$plugin_url . 'templates/js/seops.custom.role.js' );
						break;

					case 'seopressor-site-audit':
					case 'seopressor-site-audit-listing':
						self::seops_enqueue_script_common();

						// Google Chart API
						wp_enqueue_script( 'google-chart-api', 'https://www.google.com/jsapi' );
						wp_enqueue_script( 'seops_site_audit_chart', self::$plugin_url . 'templates/js/seops.site.audit.js' );

						$params = WPPostsRateKeys_Site_Audit::get_audit_chart_data();
						if( $params === FALSE )
							$params = array();
						wp_localize_script( 'seops_site_audit_chart', 'chart', $params );
						break;

					case 'seopressor-settings':

						self::seops_enqueue_script_common();
						wp_enqueue_script( 'seops_paginate', self::$plugin_url . 'templates/js/seops.paginate.js' );
						wp_enqueue_script( 'seops_setting', self::$plugin_url . 'templates/js/seops.settings.js' );

						break;

				}
			}


        }

		function seops_ajax()
		{
			global $wpdb;
			include( self::$plugin_dir . 'pages/ajax/seops_ajax.php' );
		}

        /**
         * Handles the AJAX action for postbox settings
         *
         * @version	v5.0
         */
        function ajax_box() {
        	// This is how you get access to the database
        	global $wpdb;

        	include(self::$plugin_dir . 'pages/ajax/box_suggestions.php');
        }


		/**
         * Handles the AJAX action for postbox settings
         *
         * @version	v5.0
         */
        function ajax_box_new() {
        	// This is how you get access to the database
        	global $wpdb;

        	include(self::$plugin_dir . 'pages/ajax/box_suggestions_new.php');
        }


        function add_user_contactmethods( $user_contactmethods ) {

        	$facebook_icon = '<div style="position:relative"><img style="position:absolute;top:0.24em;right:-26.5em;" src="' . self::$plugin_url . 'templates/images/icons/social/facebook.png" alt="Facebook" height="16" />';
        	$user_contactmethods['seopressor_facebook_og_author'] = $facebook_icon . __( 'Facebook Profile URL', 'seopressor' ) . '</div>';

        	$twitter_icon = '<div style="position:relative"><img style="position:absolute;top:0.24em;right:-26.5em;" src="' . self::$plugin_url . 'templates/images/icons/social/twitter.png" alt="Twitter" height="16" />';
        	$user_contactmethods['seopressor_twitter_user_card'] = $twitter_icon . __( 'Twitter ID', 'seopressor' ) . '</div>';

        	$google_icon = '<div style="position:relative"><img style="position:absolute;top:0.24em;right:-26.5em;" src="' . self::$plugin_url . 'templates/images/icons/social/googleplus.png" alt="Google Plus" height="16" />';
        	$user_contactmethods['seopressor_google_plus_auth_url'] = $google_icon . __( 'Google Plus Profile URL', 'seopressor' ) . '</div>';

        	return $user_contactmethods;
        }

		function ajax_sitemap_generate() {
			$settings = WPPostsRateKeys_Settings::get_options();
			if( $settings['seop_enable_sitemap'] == 1 )
			{
				WPPostsRateKeys_Sitemap::GenerateXmlSitemap();
			}
		}

        /**
         * Init actions
         *
         */
    	function wp_init() {
    		$settings = WPPostsRateKeys_Settings::get_options();
    		// Check for advertisement setting
    		/*$allow_advertising_program = $settings['allow_advertising_program'];
    		if ($allow_advertising_program=='1') {
    			// Check visits, only when visits in front end
    			// Only if user choose participate
    			WPPostsRateKeys_Visits::check();
    		}*/
    	}

        /**
         * Change the header of the Pages
         *
         * For meta keywords and description
         */
    	function wp_head() {

			$settings = WPPostsRateKeys_Settings::get_options();
			if( is_front_page() || is_home() )
			{
				$blog_description = get_bloginfo('description');
				include( self::$template_dir . '/includes/home.php' );
			}
			elseif (is_single() || is_page())
			{
				$post_id = get_the_ID();
				if( empty($post_id) )
					return;

				$box_setting = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post_id );
				$keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );
				$post = get_post( $post_id );
				$twitter_user = get_the_author_meta( 'seopressor_twitter_user_card', $post->post_author );
				$facebook_user = get_the_author_meta( 'seopressor_facebook_og_author', $post->post_author );
				$google_plus_auth_url = trim(get_the_author_meta( 'seopressor_google_plus_auth_url', $post->post_author ));
				$author_info_arr = array( $google_plus_auth_url, $facebook_user, $twitter_user, get_author_posts_url($post->post_author) );
				$author_url = current( array_filter( $author_info_arr ) );
				$url = get_permalink( $post->ID );
				$meta_title = get_the_title();
				$date_published = new DateTime( $post->post_date );
				$date_modified = new DateTime( $post->post_modified );

				if ( has_excerpt( $post->ID ) ) {
					$meta_description = strip_tags( get_the_excerpt( ) );
				} else {
					if (WPPostsRateKeys_Settings::support_multibyte()) {
						$meta_description = str_replace( "\r\n", ' ' , mb_substr( strip_tags( strip_shortcodes( $post->post_content ) ), 0, 160,'UTF-8' ) );
					}
					else {
						$meta_description = str_replace( "\r\n", ' ' , substr( strip_tags( strip_shortcodes( $post->post_content ) ), 0, 160 ) );
					}
					$meta_description .= '(...)';
				}

				include( self::$template_dir . '/includes/single.php' );
			}

    	}

		function before_header()
		{
			ob_start( array( $this, 'change_title_tag' ) );
		}

		function after_header()
		{
			$handlers = ob_list_handlers();
			if( count($handlers) > 0 )
				ob_end_flush();
		}

		function change_title_tag( $head )
		{
			$title = '';

			if( is_front_page() || is_home() )
			{
				$settings = WPPostsRateKeys_Settings::get_options();
				if( isset($settings['seop_home_title']) && !empty($settings['seop_home_title']) )
					$title = esc_attr( trim($settings['seop_home_title']) );
			}
			elseif (is_single() || is_page())
			{
				$box_setting = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( get_the_ID() );
				if( isset($box_setting['meta_title']) && !empty($box_setting['meta_title']) )
					$title = esc_attr( trim($box_setting['meta_title']) );
			}

			if( empty($title) )
				return $head;
			else
				return preg_replace('/<title>[^<]*<\/title>/i', '<title>'.$title.'</title>', $head);
		}

		function overwrite_title( $title )
		{
			if( is_front_page() || is_home() )
			{
				$settings = WPPostsRateKeys_Settings::get_options();
				if( isset($settings['seop_home_title']) && !empty($settings['seop_home_title']) )
					return esc_attr( trim($settings['seop_home_title']) );
				else
					return $title;
			}
			elseif (is_single() || is_page())
			{
				$box_setting = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( get_the_ID() );
				if( isset($box_setting['meta_title']) && !empty($box_setting['meta_title']) )
					return esc_attr( trim($box_setting['meta_title']) );
				else
					return $title;
			}
		}

        /**
         * Update box suggestions data on rich text editor changes
         * @param array $initArray
         */
        function update_box_suggestions_data($initArray){
			$initArray['setup'] = <<<JS
[function(ed) {
    ed.onChange.add(function(ed, e) {
		// Update HTML view textarea (that is the one used to send the data to server).
		ed.save();
	});
}][0]
JS;

			return $initArray;
		}

        /**
         * Add the widget in dashboard
         *
         * @return void
         * @access public
         */
        function add_dashboard_widget() {

        	$message_from_server = WPPostsRateKeys_Central::get_specific_data_from_server('dashboard_box_message');

        	// Compare after strip tags to avoid show empty box to users
        	if (strip_tags($message_from_server)!='') {
	        	$_SESSION['seopressor_message_from_server'] = $message_from_server;
	        	wp_add_dashboard_widget('seopressor_dashboard_widget', 'SEOPressor', array($this, 'show_dashboard_widget'));

	        	// Globalize the metaboxes array, this holds all the widgets for wp-admin
				global $wp_meta_boxes;

				// Get the regular dashboard widgets array
				// (which has our new widget already but at the end)

				$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

				// Backup and delete our new dashbaord widget from the end of the array
				$seopressor_dashboard_widget_backup = array('seopressor_dashboard_widget' => $normal_dashboard['seopressor_dashboard_widget']);
				unset($normal_dashboard['seopressor_dashboard_widget']);

				// Merge the two arrays together so our widget is at the beginning
				$sorted_dashboard = array_merge($seopressor_dashboard_widget_backup, $normal_dashboard);

				// Save the sorted array back into the original metaboxes
				$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
        	}
        }

        /**
         * Show the widget in dashboard
         *
         * @return void
         * @access public
         */
        function show_dashboard_widget() {
        	/*
        	 * This will request the content of the message Box from Central Server.
        	 * If the direct request doesn't works, use the Ajax-method
        	 */
        	$result = $_SESSION['seopressor_message_from_server'];
        	if ($result) {
        		echo '<div id="text_in_seopressor_dashboard_widget">';
	        	echo $result;
	        	echo '</div>';
        	}
		}

        /**
         * Handles the translation of plugin
         *
         * @return void
         * @access public
		 */
        function handle_load_domain()
		{
			$plugin_domain = 'seo-pressor';

			// Get language in use from settings
			$locale = WPPostsRateKeys_Settings::get_locale();

			if ($locale!='') {
				// locate translation file
				//$mofile = self::$plugin_dir. '/lang/' . $plugin_domain . '-' . $locale . '.mo';
				$mofile = self::$plugin_dir. 'lang/' . $locale . '.mo';

				if (file_exists($mofile) && is_readable($mofile)) {
					// load translation
					load_textdomain($plugin_domain, $mofile);
				}
				else {
					// Store in log that the translation fail load fail
					$code = '211';
					$msg = "Fail loading MO file: $mofile";
					WPPostsRateKeys_Logs::add_error($code, $msg);
				}
			}
		}


		/**
		 * Display box in add/edit post/page page to Show the Score
		 * Manage on screen settings
		 *
		 * Call for functionality in Central Server
		 *
		 * @global	$post	POST Object
		 * @return 	void
		 * @access 	public
		 */
		function show_postbox_slide()
		{
			global $post;
        	$post_id = $post->ID;

			// Show include for template
        	include(self::$plugin_dir . '/includes/admin/seop_box.php');
		}

        /**
		 * Hooks to show admin notices if requires
		 *
		 * Only show message when is active
		 *
		 * @param	string	$links
		 * @param	string	$file
		 * @return 	void
		 * @access 	public
		 */
    	function show_notice_plugins_page($links, $file) {
			/*
			 * Don't show it to avoid duplicated message
			 *
        	if (substr_count($file['Name'],'SEOPressor') >0 && WPPostsRateKeys_Settings::get_active()==1) {
	        	// Show message only if user fulfill the requirements to upgrade and if versions mismatch
			    if ((version_compare(WPPostsRateKeys_Settings::get_current_version(), WPPostsRateKeys_Settings::get_last_version(), "<"))
			    		&& WPPostsRateKeys_Upgrade::all_checks_for_upgrade()
			    	) {
		        	$msg_error = WPPostsRateKeys_Settings::get_msg_for_new_version();
		        	include( WPPostsRateKeys::$template_dir . '/includes/msg_in_plugins_page.php');
	        	}
        	}
        	*/
        }

        /**
		 * Hooks to show admin notices if requires
		 *
		 * @return void
		 * @access public
		 */
        function show_admin_notice() {

	        // If isn't active show message
	        if (WPPostsRateKeys_Settings::get_active()==0) {
        		// Show in all pages except in Setting page when submit activate button
        		if (!isset($_POST['Submit_activation'])) {
	        		$msg_error[] = __('To use SEOPressor Plugin, it has to be activated. To do this, go to ','seo-pressor')
	        					. '<a href="' . get_bloginfo ( 'wpurl' ) . '/wp-admin/admin.php?page=seopressor-settings">' . __('Activation Settings','seo-pressor') . '</a>';
	        		include( WPPostsRateKeys::$template_dir . '/includes/msg.php');
			        unset($msg_error);
        		}
        	}
        	else { // Only check this if the plugin is active

	        	/*
        		 * Show upgrade message

        		// If isn't the plugins page
        		if (substr_count($_SERVER['REQUEST_URI'], 'wp-admin/plugins.php')==0) {
	        			// Show message only if user fulfill the requirements to upgrade and if versions mismatch
			        	if ((version_compare(WPPostsRateKeys_Settings::get_current_version(), WPPostsRateKeys_Settings::get_last_version(), "<"))
			        		&&  WPPostsRateKeys_Upgrade::all_checks_for_upgrade()
			        	) {
				        	$msg_error[] = WPPostsRateKeys_Settings::get_msg_for_new_version();
				        	include( WPPostsRateKeys::$template_dir . '/includes/msg.php');
				        	unset($msg_error);
			        	}
        		}
 				*/

        		// Show notifications messages if some basic requirements aren't fulfilled
	        	// WordPress version
				global $wp_version;
				if (version_compare($wp_version, "3.2", "<")) {
					$msg_error[] = __('SEOPressor plugin require WordPress 3.2 or newer','seo-pressor') . '. <a href="http://codex.wordpress.org/Upgrading_WordPress">' . __('Please update','seo-pressor').'</a>';
					include( WPPostsRateKeys::$template_dir . '/includes/msg.php');
				    unset($msg_error);
				}

        	}
        }

        /**
		 * Hooks the add of the main menu
		 *
		 * @return void
		 * @access public
		 */
      function admin_menu() {


			if( !WPPostsRateKeys_CustomRoles::enable_role_settings() )
			{
				// default only administrator can view the side menu
				$capability = 'manage_options';
			}
			else
			{
				// show side menu at least from contributor privilege
				$capability = 'edit_posts';
			}


			// main admin page
			add_menu_page(__('SEOPressor','seo-pressor'), __('SEOPressor','seo-pressor'), $capability, basename(__FILE__), array($this, 'handle_dashboard'),self::$plugin_url . 'templates/images/icons/seopressor-icon.png');


			// sub admin pages
			$page_dashboard = add_submenu_page( basename(__FILE__), __('Dashboard','seo-pressor'), __('Dashboard','seo-pressor'), $capability, basename(__FILE__), array($this, 'handle_dashboard') );
			$page_siteaudit = add_submenu_page( basename(__FILE__), __('Site Audit', 'seo-pressor'), __('Site Audit', 'seo-pressor'), $capability, 'seopressor-site-audit', array( $this, 'handle_site_audit' ) );
			$page_sitewide = add_submenu_page( basename(__FILE__), __('Sitewide SEO','seo-pressor'), __('Sitewide SEO','seo-pressor'), $capability, 'seopressor-sitewide', array($this, 'handle_sitewide_settings') );
			$page_home_setting = add_submenu_page( basename(__FILE__), __('Homepage Settings','seo-pressor'), __('Homepage Settings','seo-pressor'), $capability, 'seopressor-homepage-settings', array($this, 'handle_homepage_settings') );
			$page_link_manager = add_submenu_page( basename(__FILE__), __('Link Manager', 'seo-pressor'), __('Link Manager', 'seo-pressor'), $capability, 'seopressor-link-manager', array($this, 'handle_link_manager') );
			$page_score_manager = add_submenu_page( basename(__FILE__), __('Score Manager','seo-pressor'), __('Score Manager','seo-pressor'), $capability, 'seopressor-score-manager', array($this, 'handle_score_manager') );
			$page_role_settings	= add_submenu_page( basename(__FILE__), __('Role Settings','seo-pressor'), __('Role Settings','seo-pressor'), $capability, 'seopressor-role-settings', array($this, 'handle_role_settings') );
			$page_settings = add_submenu_page( basename(__FILE__), __('Plugin Settings','seo-pressor'), __('Plugin Settings','seo-pressor'), $capability, 'seopressor-settings', array($this, 'handle_settings') );
			$page_tutorial = add_submenu_page( basename(__FILE__), __('Tuts & Support', 'seo-pressor'), __('Tuts & Support', 'seo-pressor'), $capability, 'seopressor-tutorials', array($this, 'handle_tutorial') );




			// hidden admin pages
			$page_smart_linking = add_submenu_page( basename(__FILE__), 'Smart Linking', NULL, $capability, 'seopressor-smart-linking', array($this, 'handle_smart_linking') );
			$page_custom_role_create = add_submenu_page( basename(__FILE__), 'Create Custom Role', NULL, $capability, 'seopressor-create-custom-role', array($this, 'handle_custom_role_create') );
			$page_edit_custom_role = add_submenu_page( basename(__FILE__), 'Edit Custom Role', NULL, $capability, 'seopressor-edit-custom-role', array($this, 'handle_custom_role_edit') );
			$page_apply_custom_role = add_submenu_page( basename(__FILE__), 'Apply Custom Role', NULL, $capability, 'seopressor-apply-custom-role', array($this, 'handle_custom_role_apply') );
			$page_site_audit_listing = add_submenu_page( basename(__FILE__), 'SEOPressor Website Audit', NULL, $capability, 'seopressor-site-audit-listing', array($this, 'handle_site_audit_listing') );
			$page_log = add_submenu_page( basename(__FILE__), 'SEOPressor Logs', NULL, $capability, 'seopressor-logs', array($this, 'handle_log_page') );



			// On page analysis panel for post & pages
			// Check plugin is activated and have permission
			if( WPPostsRateKeys_Settings::get_active() )
			{
				if( !WPPostsRateKeys_CustomRoles::enable_role_settings() )
				{
					if( current_user_can( 'manage_options' ) )
						$permission_seopbox = true;
					else
						$permission_seopbox = false;
				}
				else
				{
					if( WPPostsRateKeys_CustomRoles::user_can('on_page_analysis') || WPPostsRateKeys_CustomRoles::user_can('on_page_social_seo') || WPPostsRateKeys_CustomRoles::user_can('on_page_schema_setting') || WPPostsRateKeys_CustomRoles::user_can('on_page_meta_setting') )
						$permission_seopbox = true;
					else
						$permission_seopbox = false;
				}

				if( $permission_seopbox )
				{

					$types_to_have_boxes = array_merge( array( 'post' , 'page' ) , get_post_types( array( '_builtin'=>false, 'public'=>true ), 'names' ) );
					foreach( $types_to_have_boxes as $types_to_have_boxes_name )
					{
						if (!in_array($types_to_have_boxes_name, self::$post_types_to_ignore))
						{
							$postbox_slide	= add_meta_box( 'seopressor_postbox', 'SEOPressor', array($this, 'show_postbox_slide'), $types_to_have_boxes_name, 'side', 'high' );
						}

					}

					// Modify the columns of Posts/Pages
					add_filter('manage_posts_columns', array($this, 'handle_add_columns'), 10, 2);
					add_action('manage_posts_custom_column', array($this, 'handle_show_columns_values'), 10, 2);
					add_filter('manage_pages_columns', array($this, 'handle_add_columns'), 10, 2);
					add_action('manage_pages_custom_column', array($this, 'handle_show_columns_values'), 10, 2);

					// Used "-edit.php" to add the styles associated to the List Posts and List Pages
					add_action( "admin_print_styles-edit.php", array($this, 'handle_list_posts_styles') );

				}
			}



        }

		/**
		 * handle_list_posts_styles
		 *
		 * @version	v5.0
		 */
		function handle_list_posts_styles() {
			wp_enqueue_style('seopressor-list', self::$plugin_url . 'templates/css/list.css');
		}

		/**
         * Add columns to Posts/Pages
         *
         * @param $posts_columns
		 * @version	v5.0
		 *
         */
	    function handle_add_columns($posts_columns) {
			$posts_columns['seopressor_keyword'] = __('SEOPressor Keywords', 'seo-pressor');
			$posts_columns['seopressor_score'] = __('SEOPressor Score (%)', 'seo-pressor');
			return $posts_columns;
		}

		/**
		 * Show values of new added columns of Posts/Pages
		 *
		 * @param $column_name
		 * @param $post_id
		 * @version v5.0
		 */
	    function handle_show_columns_values($column_name, $post_id) {
    		try {
	    		$keywords = WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id );

	    		// Show only if some keyword defined
	    		if( count($keywords) > 0 )
				{
		    		$score = WPPostsRateKeys_Central::get_score( $post_id );
	    		}
	    		else {
	    			$score = 0;
	    		}

		    	if( $column_name == 'seopressor_keyword' )
				{
					echo '<span class="seopressor-keyword-wrapper">';
					if( count($keywords) > 0 )
					{
						echo implode(', ', $keywords);
					}
					else
					{
						echo __('No keyword', 'seo-pressor');
					}
					echo '</span>';
				}
				elseif ( $column_name == 'seopressor_score' )
				{
					$score = number_format( $score, 2 );
					$html_to_output = '';
					$html_to_output = '<div class="seopressor-column-score-wrapper';

					if ($score >= 86 && $score <= 100) {
						$html_to_output .= ' seopressor-positive';
					}
					else {
						$html_to_output .= ' seopressor-negative';
					}

					$html_to_output .= '"><div class="seopressor-column-score-box-wrapper"><div class="seopressor-column-score-box"><span class="seopressor-column-icon"></span><span class="seopressor-text">';

					$html_to_output .= $score;

					$html_to_output .= '</span></div></div></div>';

					echo $html_to_output;

				}
				else
				{
						echo '';
				}
    		} catch (Exception $e) {
    			echo '';
    		}
		}

    	/**
		 * Runs when a post is published, or if it is edited and its status is "published".
		 *
		 * This is called only if: Post Status is Published
		 * Will check the Score and if is less than specified in "Minimum score before allow to publish"
		 * setting the Status will be set as Draft
		 *
		 * @param	int		$post_id
		 * @return 	void
		 * @access 	public
		 */
        function handle_publish_post($post_id) {

        	// Get Post Score stored in Cache
        	$post_score = WPPostsRateKeys_Central::get_score($post_id);

        	// Getting Settings
        	$settings = WPPostsRateKeys_Settings::get_options();
        	$minimun_score = $settings['minimum_score_to_publish'];

			echo $post_score . ' | ' . $minimun_score; exit();

        	// Only compare if is some value specified and if Post has Keyword
        	if( trim($minimun_score) != '' && count( WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id ) ) > 0 && $post_score < $minimun_score )
			{
        		// Set as Draft
        		wp_update_post( array(
					'ID' => $post_id,
					'post_status' => 'draft'
				));
        	}

        }


		function handle_delete_post( $post_id )
		{
			WPPostsRateKeys_Link::delete_links( $post_id );
		}

		function handle_delete_user( $user_id )
		{
			WPPostsRateKeys_CustomRoles::delete_user_custom_role_by_id( $user_id );
		}

    	/**
		 * Handle the Update of a POST or PAGE, in order to store the keyword
		 *
		 * This is in POSTs/PAGEs add/edit page
		 *
		 * @return void
		 * @access public
		 */
        function handle_update_post_form($new_post_id, $post) {
        	// Ignore autosaves, ignore quick saves (http://wordpress.org/support/topic/311761)
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        		return;

			if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
        		return;

			if ( !$_POST ) return $post;

			if ( !in_array( $_POST['action'], array('editpost', 'post') ) )
				return $post;

			$post_id = esc_attr($_POST['post_ID']);
			if ( !$post_id ) $post_id = $new_post_id;
			if ( !$post_id ) return $post;

			// Make sure we're saving the correct version
			// if ( $p = wp_is_post_revision($post_id)) $post_id = $p;

			// Include to process the request and store to database
			if( isset($_REQUEST['seop_attr']['fetch_ready']) )
				include(self::$plugin_dir . '/includes/internal/process_post_data_hook.php');

			// Minimum score algorithm
        	$settings = WPPostsRateKeys_Settings::get_options();
        	$minimun_score = $settings['minimum_score_to_publish'];
			if( !empty($minimun_score) )
			{
				$post_score = WPPostsRateKeys_Central::get_score( $post_id );
				if( count( WPPostsRateKeys_WPPosts_New::get_seop_box_keywords( $post_id ) ) > 0 && $post_score < $minimun_score )
				{
					global $wpdb;
					$wpdb->update( $wpdb->posts, array( 'post_status' => 'draft' ), array( 'ID' => $post_id ) );
				}
			}

        }

    	/**
		 * Handles the main menu options page for Posts rates
		 *
		 * @return void
		 * @access public
		 */

		function handle_dashboard()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_dashboard.php' );
		}

		function handle_site_audit()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_site_audit.php' );
		}

        function handle_settings() {
        	include(self::$plugin_dir . '/includes/admin/handle_settings.php');
        }

		function handle_sitewide_settings()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . "/includes/admin/handle_sitewide_settings.php" );
		}

		function handle_homepage_settings()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . "/includes/admin/handle_homepage_settings.php" );
		}

		function handle_link_manager()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . "/includes/admin/handle_link_manager.php" );
		}

		function handle_smart_linking()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_smart_linking.php' );
		}

		function handle_custom_role_create()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_custom_role_create.php' );
		}

		function handle_custom_role_edit()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_custom_role_edit.php' );
		}

		function handle_custom_role_apply()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_custom_role_apply.php' );
		}

		function handle_site_audit_listing()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_site_audit_listing.php' );
		}

		function handle_log_page()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_log_page.php' );
		}

		function handle_keyword_rank()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_keyword_rank.php' );
		}

		function handle_score_manager()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include( self::$plugin_dir . '/includes/admin/handle_score_manager.php' );
		}

        function handle_role_settings()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
        	include(self::$plugin_dir . '/includes/admin/handle_role_settings.php');
        }

		function handle_tutorial()
		{
			include( self::$plugin_dir . '/includes/version_upgrade.php' );
			include(self::$plugin_dir . '/includes/admin/handle_tutorials.php');
		}

        function handle_support()
		{
        	wp_redirect( 'http://seopressor.com/tutorials/#support' );
        	exit();
        }


    	/**
         * Get content to show in the Edit Post content page
         *
         * Return the original Content
         *
         * @param 	string		$content
         * @return 	string
         * @access 	public
         */
        static function get_content_to_edit($content,$post_id='') {
        	if ($post_id=='') {
        		// Is empty in case this function is called from filter
        		global $post;
        		$post_id = $post->ID;
        	}

        	$original = WPPostsRateKeys_Central::get_original_post_content($post_id);

        	if ($original!='') { // Still exist the old value, use it
        		// Already saved
        		return $original;
        	}
        	else {
        		// First time, so show the post content
        		return $content;
        	}
        }

    	/**
         *
         * Filter the POST content
         *
         * The filter will be applied only the first time the Post is showed after the v4.1 upgrade
         * that have the filtered content as the Post Content
         *
         * @global 	object		$post		WP object that store the current POST data
         * @param 	string		$content
         * @param 	string		$title
         * @return 	string
         * @access 	public
         */
        function filter_post_content($content,$post_id='') {
			// Only filter if is Single Page
			if (!((is_single()  || is_page() ) && !is_feed())) {
				return $content;
			}

        	if ($post_id=='') {
        		global $post;
				$post_id = $post->ID;
        	}

        	if (!isset($post)) {
        		$post = get_post($post_id);
        	}

        	// If is in some of the Post Type to ignore, just return as it is
        	if (in_array($post->post_type, self::$post_types_to_ignore)) {
        		return $content;
        	}

        	$filtered_content = WPPostsRateKeys_Central::get_update_content_cache($post_id, $content);

        	// Add Snippets
        	$filtered_content = WPPostsRateKeys_Filters::apply_code_snippets($filtered_content,$post_id);

        	// Check for Google Searchs and Tags
        	//WPPostsRateKeys_RelatedTags::add_tags_based_on_google_search($post_id);

        	return $filtered_content;
        }

		function regiter_local_widget()
		{
			register_widget( 'Local_SEO_Widget' );
		}


		function handle_automatic_stuff_post_content( $content, $post_id='' )
		{
			if (!((is_single()  || is_page() ) && !is_feed())) {
				return $content;
			}

        	if( $post_id == '' )
			{
        		global $post;
				$post_id = $post->ID;
        	}

        	if( !isset($post) )
			{
        		$post = get_post($post_id);
        	}

        	// If is in some of the Post Type to ignore, just return as it is
        	if( in_array( $post->post_type, self::$post_types_to_ignore ) )
			{
        		return $content;
        	}

			$settings = WPPostsRateKeys_Settings::get_options();

        	$filtered_content = WPPostsRateKeys_Filters::do_automatic_post_content( $post_id, $content, $settings );

        	// Add Snippets
        	// $filtered_content = WPPostsRateKeys_Filters::apply_code_snippets($filtered_content,$post_id);

        	// Check for Google Searchs and Tags
        	//WPPostsRateKeys_RelatedTags::add_tags_based_on_google_search($post_id);

        	return $filtered_content;
		}

    	/**
         *
         * Filter the POST title
         *
         * @global 	object		$post		WP object that store the current POST data
         * @param 	int			$post_id
         * @param 	string		$title
         * @return 	string
         * @access 	public
         */
        function filter_post_title($title,$post_id='') {

			if ($post_id=='') {
        		global $post;
				$post_id = $post->ID;
        	}

        	if (!isset($post)) {
        		$post = get_post($post_id);
        	}

        	// If is in some of the Post Type to ignore, just return as it is
        	if (in_array($post->post_type, self::$post_types_to_ignore)) {
				return $title;
        	}

        	// Only change the title when show list of posts in Archives, Index or Category pages

        	global $wp_version;
			if (version_compare($wp_version, "3.0", '<')) {
				// WP 2.9.2
				if (!is_numeric($post_id)) // Called from menus
        			return $title;

        		// Don't show in administration pages
        		if (is_admin())
        			return $title;
			}
        	else {
        		// WP 3.0
        		if (!in_the_loop())
        			return $title;
        	}

        	// Check if the filter must be applied
        	if (!WPPostsRateKeys_Settings::get_allow_add_keyword_in_titles())
        		return $title;

        	if ($title=='')
        		return __('(no title)','seo-pressor');

			return $title;

        	/*
			 * The filter will be done only if:
			 * - Cache is invalid
			 * - The method is Plugin-Request
			 * - The type of the post isn't 'auto-draft' or 'trash'
			 *
			 * If the Cache is valid, the cached value will be returned
			 * If the Cache is invalid and the method is Ajax-Request: the original value of Post will be returned
			 */

        	if ($post->post_status=='auto-draft' || $post->post_status=='trash'
        		 || $post->post_status=='inherit'
        		) {
				return $title;
			}

			$filtered_title = WPPostsRateKeys_Central::get_filtered_title($post_id,$title);

			// Changed for Headway Theme
			if (! isset ( $filtered_title ) || trim ( $filtered_title ) == '') {
				return $title;
			} else {
				return $filtered_title;
			}
		}



        /**
         * Schedule jobs
         *
         * @return void
         * @access public
         */
        function add_actions_for_schedule_jobs() {
        	// Add action to Schedule job to process posts with invalid cache data
			add_action( 'seopressor_get_last_version', array($this, 'schedule_get_last_version') );
			add_action( 'seopressor_onetime_check_active', array($this, 'schedule_onetime_check_active') );
			add_action( 'seopressor_link_check', array( $this, 'schedule_link_check' ) );
			add_action( WPPostsRateKeys_Site_Audit::$cron_event_name, array( $this, 'schedule_audit_cron' ) );
			add_action( 'seopressor_site_audit', array( $this, 'schedule_site_audit_weekly' ) );
			add_action( 'seopressor_daily_cron', array( $this, 'schedule_daily_cron' ) );
        }

        /**
		 * Add all schedule jobs
		 *
		 * @static
		 * @return void
		 * @access public
		 */
		static public function add_all_schedule_jobs() {

			// Link checker
			if( !wp_next_scheduled( 'seopressor_link_check' ) )
				wp_schedule_event( current_time ( 'timestamp' ), 'in_per_minute', 'seopressor_link_check' );
			// Site Audit
			if( !wp_next_scheduled( 'seopressor_site_audit' ) )
				wp_schedule_event( current_time ( 'timestamp' ), 'daily', 'seopressor_site_audit' );
			// Site Audit Crawler
			if( !wp_next_scheduled( WPPostsRateKeys_Site_Audit::$cron_event_name ) )
				wp_schedule_event( current_time ( 'timestamp' ), 'in_per_minute', WPPostsRateKeys_Site_Audit::$cron_event_name );
			// General cron
			if( !wp_next_scheduled( 'seopressor_daily_cron' ) )
				wp_schedule_event( current_time('timestamp'), 'daily', 'seopressor_daily_cron' );


			/*
			 * Delete old ones
			 */
			// This is totally unused now
			if( wp_get_schedule('seopressor_process_posts') )
        		wp_clear_scheduled_hook('seopressor_process_posts');
        	// Delete because isn't recurrent amymore
        	if( wp_get_schedule('seopressor_check_active') )
        		wp_clear_scheduled_hook('seopressor_check_active');
			// Deprecated at v6
			if( wp_next_scheduled('seopressor_send_visits') )
				wp_clear_scheduled_hook('seopressor_send_visits');
			// Deprecated at v6
			if( wp_next_scheduled('seopressor_get_last_version') )
				wp_clear_scheduled_hook('seopressor_get_last_version');
		}

		/**
		 * Add custom one minutes cron job
		 *
		 */
		function add_one_minute_cron( $schedules )
		{
			$schedules['in_per_minute'] = array(
				'interval' => 60,
				'display' => 'In every Mintue'
			);
			return $schedules;
		}

		/**
		 * Maily for Multi Blogs when the plugin is Network-Active
		 * but usefull for others users that doesn't deactive and active the
		 * plugin
		 *
		 */
		static function update_main_options($called_when_installing=TRUE)
		{

			$data = WPPostsRateKeys_Settings::get_options();

			// Specify new version. This is usefull for users that upgrades
			$data['current_version'] = WPPostsRateKeys::VERSION;

			// The follow is only done when is called when installing
			if( $called_when_installing )
			{
				// Do V6 data migration
				$data = WPPostsRateKeys_Settings::update_v6_main_setting( $data );

				// Update list of latest API server
				WPPostsRateKeys_Central::get_latest_api_servers();

				// Verify license status
				WPPostsRateKeys_Central::check_lincense_status();
			}

			WPPostsRateKeys_Settings::update_options( $data );

		}



    	/**
         * Schedule job to check if active, 80 days after first activation
		 * Deprecated in V6
         *
         * @return void
         * @access public
         */
        function schedule_onetime_check_active() {
        	$response = WPPostsRateKeys_Central::get_specific_data_from_server('if_active');

        	if ($response) {
	        	// We get some reply, so Update status and don't ask anymore
        		WPPostsRateKeys_Settings::update_active_by_server_response($response);
        	}
        	else {

				// Doesn't deactivate because was error in communication with Central Server
				// Schedule the check again
				$in_1_day = time() + 86400;
				wp_schedule_single_event($in_1_day, 'seopressor_onetime_check_active');

				/*
        		// Show user a button to reactivate the plugin manually
        		$data = WPPostsRateKeys_Settings::get_options();
        		$data['allow_manual_reactivation'] = '1';
        		$data['active'] = '0';
        		$data['last_activation_message'] = __('Automatic reactivation fails.','seo-pressor');
        		WPPostsRateKeys_Settings::update_options($data);
        		*/
        	}
        }

    	/**
         * Schedule job to get_last_version
         *
         * This will request the last version available to show in admin notice
         * Only used for Plugin-Request method
         *
         * @return void
         * @access public
         */
        function schedule_get_last_version() {
        	WPPostsRateKeys_Central::make_last_version_plugin_request();

        	// Send url
        	WPPostsRateKeys_Central::send_url ();
        }


		/**
         * Schedule job to seopressor_link_check
         *
         * @return void
         * @access public
         */
		function schedule_link_check()
		{
			WPPostsRateKeys_Link::cron_run_link_check();
		}

		function schedule_audit_cron()
		{
			WPPostsRateKeys_Site_Audit::cron_audit_process();
		}

		function schedule_site_audit_weekly()
		{
			WPPostsRateKeys_Site_Audit::cron_audit_initiator();
		}

		function schedule_daily_cron()
		{
			// Get last version
			WPPostsRateKeys_Central::make_last_version_plugin_request();

        	// Send url
        	WPPostsRateKeys_Central::send_url();

			// Update API Server list
			WPPostsRateKeys_Central::get_latest_api_servers();

			// Verify license status
			WPPostsRateKeys_Central::check_lincense_status();
		}

		function front_enqueue_script()
		{
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'seops_smart_linking', self::$plugin_url . '/templates/js/seops.smartlinking.js' );
		}

		function manage_redirection()
		{
			global $post;
			if( is_home() || is_front_page() )
			{
				$settings = WPPostsRateKeys_Settings::get_options();
				if( isset($settings['seop_home_redirect']) && !empty($settings['seop_home_redirect']) )
				{
					$url = trim($settings['seop_home_redirect']);
					$url_original = get_home_url();

					if (!preg_match("~^(?:f|ht)tps?://~i", $url))
					{
						$url = "http://".$url;
					}

					if( substr( $url, -1 ) == '/' )
					{
						$url = substr_replace( $url, '', -1 );
					}


					if( substr( $url_original, -1 ) == '/' )
					{
						$url_original = substr_replace( $url_original, '', -1 );
					}

					if( $url_original != $url )
					{
						wp_redirect( $url, 301 );
						exit();
					}
				}
			}
			elseif( is_single() || is_page() )
			{
				$box_setting = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post->ID );
				if( isset($box_setting) && !empty($box_setting['meta_redirect']) )
				{
					$url = trim($box_setting['meta_redirect']);
					$url_original = get_permalink( $post->ID );

					if (!preg_match("~^(?:f|ht)tps?://~i", $url))
					{
						$url = "http://".$url;
					}

					if( substr( $url, -1 ) == '/' )
					{
						$url = substr_replace( $url, '', -1 );
					}


					if( substr( $url_original, -1 ) == '/' )
					{
						$url_original = substr_replace( $url_original, '', -1 );
					}

					if( $url_original != $url )
					{
						wp_redirect( $url, 301 );
						exit();
					}
				}
			}
		}


		function compatibility_check()
		{
			$valid = true;
			$msg = '';

			if( version_compare( phpversion(), '5.3', '<' ) )
			{
				$valid = false;
				$msg .= __( 'SEOPressor Connect only supports PHP version 5.3 & above. You are using PHP version '.phpversion().'.<br/>', 'seo-pressor' );
			}

			if( version_compare( $GLOBALS['wp_version'], '3.4.2', '<' ) )
			{
				$valid = false;
				$msg .= __( 'SEOPressor Connect requires WordPress 3.4.2 or newer. Please <a href="http://codex.wordpress.org/Upgrading_WordPress" target="_blank">update</a>.<br/>', 'seo-pressor' );
			}

			if( !function_exists('mb_convert_encoding') )
			{
				$valid = false;
				$msg .= __( 'Please install <a href="http://php.net/manual/en/book.mbstring.php" target="_blank">PHP Multibyte String extension</a> on your server.<br/>', 'seo-pressor' );
			}

			if( !$valid )
			{
				self::maybe_deactivate_plugin( 'requirement' );
				wp_die( $msg );
				return;
			}

		}

		function maybe_deactivate_plugin( $reason )
		{
			if( is_plugin_active( plugin_basename( __FILE__ ) ) )
			{
				deactivate_plugins( plugin_basename( __FILE__ ) );
			}
		}

		function add_crawler_index()
		{
			global $wpdb;
			$table_crawler = $wpdb->prefix . self::$db_prefix . WPPostsRateKeys_Crawler::$table_name;
			$wpdb->query( "alter ignore table " . $table_crawler . " add constraint audit_post_id unique (audit_id, post_id)" );
		}

		/**
         *
         * Execute code in activation
         *
         * @return 	void
         * @access 	public
         */
        function install() {

			// environment checking
			self::compatibility_check();

			// create unique index for audit_id and post_id to avoid duplicated row
			self::add_crawler_index();

        	self::add_all_schedule_jobs();

        	// Check/Add/Update database tables for Capabilities/Custom Roles, etc
        	include(self::$plugin_dir . '/db/tables.php');

			WPPostsRateKeys_SmartLinking::v6_migration();

			WPPostsRateKeys_CustomRoles::v6_migration();

        	// Update Settings
        	self::update_main_options();

			// Remove site audit in progress
			WPPostsRateKeys_Site_Audit::deactivate_remove_siteaudit();

        	// Send url
        	WPPostsRateKeys_Central::send_url();
		}


		/**
         *
         * Execute code in deactivation
         *
         * @return 	void
         * @access 	public
         */
        function uninstall() {

			// Remove site audit in progress
			WPPostsRateKeys_Site_Audit::deactivate_remove_siteaudit();

        	// Clear all schedule jobs
        	if( wp_get_schedule('seopressor_get_last_version') )
        		wp_clear_scheduled_hook('seopressor_get_last_version');

			if( wp_get_schedule('seopressor_link_check') )
        		wp_clear_scheduled_hook('seopressor_link_check');

			if( wp_get_schedule('seopressor_daily_cron') )
        		wp_clear_scheduled_hook('seopressor_daily_cron');

			if( wp_get_schedule('seopressor_check_active') )
        		wp_clear_scheduled_hook('seopressor_check_active');

			if( wp_get_schedule('seopressor_send_visits') )
        		wp_clear_scheduled_hook('seopressor_send_visits');

			if( wp_get_schedule('seopressor_site_audit') )
        		wp_clear_scheduled_hook('seopressor_site_audit');

			if( wp_get_schedule(WPPostsRateKeys_Site_Audit::$cron_event_name) )
        		wp_clear_scheduled_hook(WPPostsRateKeys_Site_Audit::$cron_event_name);

        }
	}
}

try {
	// create new instance of the class
	$WPPostsRateKeys = new WPPostsRateKeys();
	if (isset($WPPostsRateKeys)) {
	    // register the activation function by passing the reference to our instance
	    register_activation_hook(__FILE__, array($WPPostsRateKeys, 'install'));
	    register_deactivation_hook(__FILE__, array($WPPostsRateKeys, 'uninstall'));
	}
} catch ( Exception $e ) {
	$exit_msg = 'Problem activating: ' . $e->getMessage ();
	exit ( $exit_msg );
}
?>
