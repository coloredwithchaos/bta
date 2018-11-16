<?php
if (!class_exists('WPPostsRateKeys_Settings')) {
	class WPPostsRateKeys_Settings
	{
		static $api_default = '107.20.246.5';
	   /**
	    * The name for plugin options in the DB
	    *
	    * @var string
	    */
        static $db_option = 'WPPostsRateKeys_Options';

	   /**
	    * The name for plugin options in the DB
	    *
	    * @var string
	    */
        static $db_option_slugs_stop_words = 'WPPostsRateKeys_Slugs_StWords'; // deprecated at v6

	   /**
	    * The name for the option that stores the last time the external link was modified
	    *
	    * @var string
	    */
        static $db_option_last_ext_links_mod = 'WPPostsRateKeys_Ext_Link_Mod_dt'; // deprecated at v6

	   /**
	    * The name for the option that stores the last time the internal link was modified
	    *
	    * @var string
	    */
        static $db_option_last_int_links_mod = 'WPPostsRateKeys_Int_Link_Mod_dt'; // deprecated at v6

		static $db_option_v6_upgrade = 'WPPostsRateKeys_V6_Upgrade';

		static $db_option_link_running_status = 'WPPostsRateKeys_Link_Running_Status';

	   /**
	    * Separator for the list of special characters to omit
	    *
	    * @var string
	    */
        const SPEC_CHARS_DELIMITER = ',#,#,';

	   /**
	    * The URL for download
	    *
	    * @var string
	    */
        static $url_download = 'http://seopressor.com/download/download.php';

		/**
		 * Get number of posts to process at same time
		 *
		 * Use for bulk processing of posts with invalid cache
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_number_of_post_to_process_at_same_time() {
			$options = self::get_options();
			return $options['number_of_posts_for_bulk_requests'];
		}

		/**
		 * Get message to show to notify about new versions
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_msg_for_new_version() {
			return __('There is a new version of the SEOPressor Plugin. You can download the new version ','seo-pressor')
	        					. '<a href="' . self::get_download_url() . '">'
	        					. __('here','seo-pressor')
	        					. '</a>'
	        					. __(' or you can ','seo-pressor')
	        					. '<a href="' . get_bloginfo ( 'wpurl' )
	        					. '/wp-admin/admin.php?page=seo-pressor.php#seopressor-update">'
	        					. __(' automatically upgrade','seo-pressor')
	        					. '</a>';
		}

		/**
		 * Update setting value: last_version
		 *
		 * @static
		 * @param 	string	$new_value
		 * @access 	public
		 */
		static public function update_last_version($new_value) {
			if ($new_value!='') {
				$options = self::get_options();

				// Update the value in options
				$options['last_version'] = $new_value;

				self::update_options($options);
			}
		}

		/**
		 * Get setting value: last_version
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_last_version() {
			$options = self::get_options();
		   	return $options['last_version'];
		}

		/**
		 * Get setting value: seo_link
		 *
		 * @static
		 * @return string	HTML code
		 * @access public
		 */
		static public function get_seo_link() {
			$options = self::get_options();
		   	return $options['seo_link'];
		}

		/**
		 * Get setting value: name_link
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_name_link() {
			$options = self::get_options();
		   	return $options['name_link'];
		}

		/**
		 * Get setting value: allow_seopressor_footer
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_seopressor_footer() {
			$options = self::get_options();
		   	return $options['allow_seopressor_footer'];
		}

		/**
		 * Get setting value: allow_bold_style_to_apply
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_bold_style_to_apply() {
			$options = self::get_options();
		   	return $options['allow_bold_style_to_apply'];
		}

		/**
		 * Get setting value: allow_italic_style_to_apply
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_italic_style_to_apply() {
			$options = self::get_options();
		   	return $options['allow_italic_style_to_apply'];
		}

		/**
		 * Get setting value: allow_underline_style_to_apply
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_underline_style_to_apply() {
			$options = self::get_options();
		   	return $options['allow_underline_style_to_apply'];
		}

		/**
		 * Get setting value: bold_style_to_apply
		 *
		 * @static
		 * @return string	HTML code
		 * @access public
		 */
		static public function get_bold_style_to_apply() {
			$options = self::get_options();
		   	return $options['bold_style_to_apply'];
		}

		/**
		 * Get setting value: italic_style_to_apply
		 *
		 * @static
		 * @return string	HTML code
		 * @access public
		 */
		static public function get_italic_style_to_apply() {
			$options = self::get_options();
		   	return $options['italic_style_to_apply'];
		}

		/**
		 * Get setting value: underline_style_to_apply
		 *
		 * @static
		 * @return string	HTML code
		 * @access public
		 */
		static public function get_underline_style_to_apply() {
			$options = self::get_options();
		   	return $options['underline_style_to_apply'];
		}

		/**
		 * Get setting value: active
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_active() {
			$options = self::get_options();
			return $options['active'];
		}

		static public function get_license_type()
		{
			$options = self::get_options();
			return $options['license_type'];
		}

		/**
		 * Update activation by Central Server response
		 *
		 * @param	string	$response
		 * @param	bool	$user_submit		TRUE when user was who hit the activation button
		 * @static
		 * @return 	string	message for user
		 * @access 	public
		 */
		static public function update_active_by_server_response($response, $user_submit=FALSE) {

			$options = self::get_options();
			$tmp_msg = $options['last_activation_message'];

			// Ignored IF ACTIVE, because the activation is only when user click on button Activate
			if( $response == 'ACTIVE' )
			{
				if ($user_submit) { // Don't put this in previous IF to avoid that if ACTIVE enter in the last ELSE
					$options['active'] = 1;
					$options['allow_manual_reactivation'] = 0;
					$tmp_msg = __('The plugin is Active.','seo-pressor');
				}
			}

			if( $response == 'NODB' )
			{
				// $response == 'NODB'
				$options['active'] = 0;
				$options['allow_manual_reactivation'] = 1; // To avoid the user Re-active the plugin installing it again
				$tmp_msg = __('Your receipt number is inactive while running on-page analysis.','seo-pressor');
			}

			$options['last_activation_message'] = $tmp_msg;
			self::update_options($options);

			return $tmp_msg;
		}

		/**
		 * Get setting value: check_if_active_url
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_check_if_active_url() {
			return self::$url_check_if_active;
		}

		/**
		 * Get setting value: current_version
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_current_version() {
			$options = self::get_options();
		   	return $options['current_version'];
		}

		/**
		 * Get setting value: download_url
		 *
		 * @static
		 * @return string
		 * @access public
		 */
		static public function get_download_url() {
			return self::$url_download;
		}

		/**
		 * Get setting value: clickbank_id
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_clickbank_id() {
			$options = self::get_options();
		   	return $options['clickbank_id'];
		}

		/**
		 * Get setting value: allow_automatic_adding_alt_keyword
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_automatic_adding_alt_keyword() {
			$options = self::get_options();
		   	return $options['allow_automatic_adding_alt_keyword'];
		}

		/**
		 * Get setting value: allow_automatic_adding_rel_nofollow
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_automatic_adding_rel_nofollow() {
			$options = self::get_options();
		   	return $options['allow_automatic_adding_rel_nofollow'];
		}

		/**
		 * Get setting value: allow_add_keyword_in_titles
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_allow_add_keyword_in_titles() {
			$options = self::get_options();
		   	return $options['allow_add_keyword_in_titles'];
		}

		/**
		 * Get setting value: clickbank_receipt_number
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_clickbank_receipt_number() {
			$options = self::get_options();
		   	return $options['clickbank_receipt_number'];
		}

		/**
		 * Set setting value: last_activation_message
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function set_last_activation_message($msg) {
			$options = self::get_options();
		   	$options['last_activation_message'] = $msg;
		   	self::update_options($options);
		}

		/**
		 * Get setting value: locale
		 *
		 * @static
		 * @return bool
		 * @access public
		 */
		static public function get_locale() {
			$options = self::get_options();
		   	return $options['locale'];
		}

		/**
		 * Updates the General Settings of Plugin
		 *
		 * @return void
		 * @access public
		 */
        static function update_options($options) {
        	// Save Class variable
        	WPPostsRateKeys::$settings = $options;

        	return update_option(self::$db_option, $options);
	    }

	    /**
		 * Get array with the special characters to omit
		 *
		 * @static
		 * @return 	array
		 * @access 	public
		 */
		static public function get_special_characters_to_omit() {
			$data = self::get_options();
			return explode(self::SPEC_CHARS_DELIMITER, $data['special_characters_to_omit']);
		}

    	/**
		 * Return the Stop Words for Slugs
		 *
		 * @param	string	the words (one per line)
		 * @access 	public
		 */
        static function update_slugs_stop_words($words) {

        	$arr = explode("\n", $words);
        	update_option(self::$db_option_slugs_stop_words, $arr);
        }

    	/**
		 * Update external link modification time
		 *
		 * @param	int		timestamp
		 * @access 	public
		 */
        static function update_external_link_modification_time($datetime) {

        	update_option(self::$db_option_last_ext_links_mod, $datetime);
        }

    	/**
		 * Update internal link modification time
		 *
		 * @param	int		timestamp
		 * @access 	public
		 */
        static function update_internal_link_modification_time($datetime) {

        	update_option(self::$db_option_last_int_links_mod, $datetime);
        }

		/**
         * Default list for Stop Words for the filter of Post Slug
         *
         * @return 	string
         */
        static function get_default_filter_post_slugs_stop_words() {
        	$arr = array ("a", "able", "about", "above", "abroad", "according", "accordingly", "across"
        	, "actually", "adj", "after", "afterwards", "again", "against", "ago", "ahead", "ain't", "all"
        	, "allow", "allows", "almost", "alone", "along", "alongside", "already", "also", "although", "always"
        	, "am", "amid", "amidst", "among", "amongst", "an", "and", "another", "any", "anybody", "anyhow"
        	, "anyone", "anything", "anyway", "anyways", "anywhere", "apart", "appear", "appreciate"
        	, "appropriate", "are", "aren't", "around", "as", "a's", "aside", "ask", "asking", "associated"
        	, "at", "available", "away", "awfully", "b", "back", "backward", "backwards", "be", "became"
        	, "because", "become", "becomes", "becoming", "been", "before", "beforehand", "begin", "behind"
        	, "being", "believe", "below", "beside", "besides", "best", "better", "between", "beyond", "both"
        	, "brief", "but", "by", "c", "came", "can", "cannot", "cant", "can't", "caption", "cause", "causes"
        	, "certain", "certainly", "changes", "clearly", "c'mon", "co", "co.", "com", "come", "comes"
        	, "concerning", "consequently", "consider", "considering", "contain", "containing", "contains"
        	, "corresponding", "could", "couldn't", "course", "c's", "currently", "d", "dare", "daren't"
        	, "definitely", "described", "despite", "did", "didn't", "different", "directly", "do", "does"
        	, "doesn't", "doing", "done", "don't", "down", "downwards", "during", "e", "each", "edu", "eg"
        	, "eight", "eighty", "either", "else", "elsewhere", "end", "ending", "enough", "entirely"
        	, "especially", "et", "etc", "even", "ever", "evermore", "every", "everybody", "everyone"
        	, "everything", "everywhere", "ex", "exactly", "example", "except", "f", "fairly", "far", "farther"
        	, "few", "fewer", "fifth", "first", "five", "followed", "following", "follows", "for", "forever"
        	, "former", "formerly", "forth", "forward", "found", "four", "from", "further", "furthermore", "g"
        	, "get", "gets", "getting", "given", "gives", "go", "goes", "going", "gone", "got", "gotten"
        	, "greetings", "h", "had", "hadn't", "half", "happens", "hardly", "has", "hasn't", "have", "haven't"
        	, "having", "he", "he'd", "he'll", "hello", "help", "hence", "her", "here", "hereafter", "hereby"
        	, "herein", "here's", "hereupon", "hers", "herself", "he's", "hi", "him", "himself", "his", "hither"
        	, "hopefully", "how", "howbeit", "however", "hundred", "i", "i'd", "ie", "if", "ignored", "i'll"
        	, "i'm", "immediate", "in", "inasmuch", "inc", "inc.", "indeed", "indicate", "indicated", "indicates"
        			, "inner", "inside", "insofar", "instead", "into", "inward", "is", "isn't", "it", "it'd"
        			, "it'll", "its", "it's", "itself", "i've", "j", "just", "k", "keep", "keeps", "kept", "know"
        			, "known", "knows", "l", "last", "lately", "later", "latter", "latterly", "least", "less"
        			, "lest", "let", "let's", "like", "liked", "likely", "likewise", "little", "look", "looking"
        			, "looks", "low", "lower", "ltd", "m", "made", "mainly", "make", "makes", "many", "may"
        			, "maybe", "mayn't", "me", "mean", "meantime", "meanwhile", "merely", "might", "mightn't"
        			, "mine", "minus", "miss", "more", "moreover", "most", "mostly", "mr", "mrs", "much", "must"
        			, "mustn't", "my", "myself", "n", "name", "namely", "nd", "near", "nearly", "necessary"
        			, "need", "needn't", "needs", "neither", "never", "neverf", "neverless", "nevertheless"
        			, "new", "next", "nine", "ninety", "no", "nobody", "non", "none", "nonetheless", "noone"
        			, "no-one", "nor", "normally", "not", "nothing", "notwithstanding", "novel", "now", "nowhere"
        			, "o", "obviously", "of", "off", "often", "oh", "ok", "okay", "old", "on", "once", "one"
        			, "ones", "one's", "only", "onto", "opposite", "or", "other", "others", "otherwise", "ought"
        			, "oughtn't", "our", "ours", "ourselves", "out", "outside", "over", "overall", "own", "p"
        			, "particular", "particularly", "past", "per", "perhaps", "placed", "please", "plus"
        			, "possible", "presumably", "probably", "provided", "provides", "q", "que", "quite", "qv"
        			, "r", "rather", "rd", "re", "really", "reasonably", "recent", "recently", "regarding"
        			, "regardless", "regards", "relatively", "respectively", "right", "round", "s", "said"
        			, "same", "saw", "say", "saying", "says", "second", "secondly", "see", "seeing", "seem"
        			, "seemed", "seeming", "seems", "seen", "self", "selves", "sensible", "sent", "serious"
        			, "seriously", "seven", "several", "shall", "shan't", "she", "she'd", "she'll", "she's"
        			, "should", "shouldn't", "since", "six", "so", "some", "somebody", "someday", "somehow"
        			, "someone", "something", "sometime", "sometimes", "somewhat", "somewhere", "soon", "sorry"
        			, "specified", "specify", "specifying", "still", "sub", "such", "sup", "sure", "t", "take"
        			, "taken", "taking", "tell", "tends", "th", "than", "thank", "thanks", "thanx", "that"
        			, "that'll", "thats", "that's", "that've", "the", "their", "theirs", "them", "themselves",
        			 "then", "thence", "there", "thereafter", "thereby", "there'd", "therefore", "therein"
        			, "there'll", "there're", "theres", "there's", "thereupon", "there've", "these", "they"
        			, "they'd", "they'll", "they're", "they've", "thing", "things", "think", "third", "thirty"
        			, "this", "thorough", "thoroughly", "those", "though", "three", "through", "throughout"
        			, "thru", "thus", "till", "to", "together", "too", "took", "toward", "towards", "tried"
        			, "tries", "truly", "try", "trying", "t's", "twice", "two", "u", "un", "under", "underneath"
        			, "undoing", "unfortunately", "unless", "unlike", "unlikely", "until", "unto", "up", "upon"
        			, "upwards", "us", "use", "used", "useful", "username"
        			, "uses", "using", "usually", "v", "value"
        			, "various", "versus", "very", "via", "viz", "vs", "w", "want", "wants", "was", "wasn't"
        			, "way", "we", "we'd", "welcome", "well", "we'll", "went", "were", "we're", "weren't"
        			, "we've", "what", "whatever", "what'll", "what's", "what've", "when", "whence", "whenever"
        			, "where", "whereafter", "whereas", "whereby", "wherein", "where's", "whereupon", "wherever"
        			, "whether", "which", "whichever", "while", "whilst", "whither", "who", "who'd", "whoever"
        			, "whole", "who'll", "whom", "whomever", "who's", "whose", "why", "will", "willing", "wish"
        			, "with", "within", "without", "wonder", "won't", "would", "wouldn't", "x", "y", "yes"
        			, "yet", "you", "you'd", "you'll", "your", "you're", "yours", "yourself", "yourselves"
        			, "you've", "z", "zero");

        	return $arr;
        }

    	/**
		 * Return external link modification time
		 *
		 * @return int		with the timestamp
		 * @access public
		 */
        static function get_last_external_links_modification_time() {
        	// get saved options
			return get_option(self::$db_option_last_ext_links_mod,TRUE);
        }

    	/**
		 * Return internal link modification time
		 *
		 * @return int		with the timestamp
		 * @access public
		 */
        static function get_last_internal_links_modification_time() {
        	// get saved options
			return get_option(self::$db_option_last_int_links_mod,TRUE);
        }

    	/**
		 * Return the Stop Words for Slugs
		 *
		 * This values isn't in Settings general plugin value
		 * instead is saved in a different options value
		 *
		 * @return array	with all the Stop Words
		 * @access public
		 */
        static function get_slugs_stop_words() {
        	// default values
		    $option_default = self::get_default_filter_post_slugs_stop_words();

	        // get saved options
			$saved = get_option(self::$db_option_slugs_stop_words);

			// assign them
		    if (empty($saved)) {
		        update_option(self::$db_option_slugs_stop_words, $option_default);

		        return $option_default;
		    }
		    else {
		    	// Before returns it, parse_output it
		    	$saved_to_return = array();
		    	foreach ($saved as $item) {
		    		$saved_to_return[] = WPPostsRateKeys_Validator::parse_output(trim($item));
		    	}

		    	return $saved_to_return;
		    }
        }

        /**
         * Return if the support_multibyte is enable
         *
         * @return bool
         */
        static function support_multibyte() {
        	$options = self::get_options();
        	if ($options['support_multibyte']=='1' && function_exists('mb_strtolower')) {
        		return TRUE;
        	}
        	else {
        		return FALSE;
        	}
        }


		static function get_api_server()
		{
			$options = self::get_options();
			$api_url = '';
			if( empty($options['api_server']) )
			{
				$api_url = self::$api_default;
			}
			else
			{
				$key_rand = array_rand( $options['api_server'] );
				$api_url = $options['api_server'][$key_rand];
			}

			if( false === strpos($api_url, '://') ) {
				$api_url = 'http://' . $api_url;
			}

			return $api_url;
		}

		static function set_api_server( $api_servers = array() )
		{
			$options = self::get_options();
			$options['api_server'] = $api_servers;
			self::update_options( $options );
		}


    	/**
		 * Return the General Settings of Plugin, and set them to default values if they are empty
		 *
		 * @return array general options of plugin
		 * @access public
		 */
        static function get_options($parse_output=TRUE) {

        	// If isn't empty, return class variable
        	if (WPPostsRateKeys::$settings) {
        		return WPPostsRateKeys::$settings;
        	}

        	// default values
		    $options = array
		    (

		        'clickbank_receipt_number' => ''
					, 'license_type' => ''
	        , 'active' => 0
	        , 'allow_manual_reactivation' => 0
	        , 'last_activation_message' => ''
	        , 'current_version' => WPPostsRateKeys::VERSION
	        , 'last_version' => WPPostsRateKeys::VERSION

					// On-page analysis box automatic slide out
					, 'on_page_box_auto_slide' => 1

					// Switch to enable/disable auto analysis on page load
					, 'on_page_box_auto_analysis' => 1

					// On-page automation
					, 'on_page_automate_description' => 1
					, 'on_page_automate_canonical' => 1

					// List of api server
					, 'api_server' => array('107.20.246.5')

	        , 'allow_automatic_adding_rel_nofollow' => 1
	        , 'auto_add_rel_nofollow_img_links' => '1' // The same that previous setting but for Images tags, instead of Links tags

	        // Misc
	        , 'locale' => '' // '' is default => English

	        , 'enable_special_characters_to_omit' => '1'
	        // If below isn't specified the "\" like "\\\\" we get only one "\" added in database and when is retrieved appears as blank value
	        , 'special_characters_to_omit' => '/' . self::SPEC_CHARS_DELIMITER . '\\\\'
	        								. self::SPEC_CHARS_DELIMITER . '(' . self::SPEC_CHARS_DELIMITER . ')'
	        								. self::SPEC_CHARS_DELIMITER . '{' . self::SPEC_CHARS_DELIMITER . '}'
	        , 'minimum_score_to_publish' => ''
	        , 'enable_role_settings' => '0'

	        // Advanced / Misc
	        , 'analize_full_page' => '1'
	        , 'support_multibyte' => '1'

					// Sitemap Settings
					, 'seop_enable_sitemap' => 0
					, 'seop_sitemap_content_homepage' => 1
					, 'seop_sitemap_content_posts' => 1
					, 'seop_sitemap_content_pages' => 1
					, 'seop_sitemap_content_categories' => 1
					, 'seop_sitemap_frequency' => 3
					, 'seop_sitemap_priority_homepage' => 1
					, 'seop_sitemap_priority_posts' => 0.7
					, 'seop_sitemap_priority_pages' => 0.7
					, 'seop_sitemap_priority_categories' => 0.5

					// Local SEO
					, 'seop_local_name' => ''
					, 'seop_local_type' => ''
					, 'seop_local_address' => ''
					, 'seop_local_city' => ''
					, 'seop_local_state' => ''
					, 'seop_local_postcode' => ''
					, 'seop_local_country' => ''
					, 'seop_local_latitude' => ''
					, 'seop_local_longitude' => ''
					, 'seop_local_website' => ''
					, 'seop_local_contact' => array()
					, 'seop_local_fax' => ''
					, 'seop_local_email' => ''
					, 'seop_operating_hour' => array(
						'monday' => array(
							'from' => '',
							'to' => ''
						),
						'tuesday' => array(
							'from' => '',
							'to' => ''
						),
						'wednesday' => array(
							'from' => '',
							'to' => ''
						),
						'thursday' => array(
							'from' => '',
							'to' => ''
						),
						'friday' => array(
							'from' => '',
							'to' => ''
						),
						'saturday' => array(
							'from' => '',
							'to' => ''
						),
						'sunday' => array(
							'from' => '',
							'to' => ''
						)
				)


				// Link Policy
				, 'seop_allow_no_follow_external_link' => 1
				, 'seop_allow_no_follow_img' => 1


				// Homepage Settings
				, 'seop_home_title' => ''
				, 'seop_home_description' => ''
				, 'seop_home_canonical' => ''
				, 'seop_home_redirect' => ''
				, 'seop_home_robot' => array()
				, 'seop_home_logo' => ''
				, 'seop_home_contact' => array()
				, 'seop_home_social' => array()
				, 'seop_home_fb_enable' => 0
				, 'seop_home_fb_title' => ''
				, 'seop_home_fb_description' => ''
				, 'seop_home_fb_image' => ''
				, 'seop_home_fb_publisher' => ''
				, 'seop_home_fb_author' => ''
				, 'seop_home_tw_enable' => 0
				, 'seop_home_tw_title' => ''
				, 'seop_home_tw_description' => ''
				, 'seop_home_image' => ''
				, 'seop_home_profile' => ''

				// Sitewide Social Settings (FB)
				, 'sitewide_fb_enable' => 0
				, 'sitewide_fb_type' => ''
				, 'sitewide_fb_url' => ''
				, 'sitewide_fb_name' => ''
				, 'sitewide_fb_title' => ''
				, 'sitewide_fb_img' => ''
				, 'sitewide_fb_desc' => ''
				, 'sitewide_fb_publisher' => ''
				, 'sitewide_fb_author' => ''
				, 'sitewide_fb_admin' => ''
				, 'sitewide_fb_appid' => ''

				// Sitewide Social Settings (TW)
				, 'sitewide_tw_enable' => 0
				, 'sitewide_tw_type' => ''
				, 'sitewide_tw_site' => ''
				, 'sitewide_tw_creator' => ''
				, 'sitewide_tw_title' => ''
				, 'sitewide_tw_desc' => ''
				, 'sitewide_tw_img' => ''
		    );

	        // get saved options
			$saved = get_option(self::$db_option);

			// assign them
		    if (!empty($saved)) {
		        foreach ($saved as $key => $option) {
		        	$options[$key] = $option;
		        }
		    }

		    // update the options if necessary
	        if ($saved != $options) {
	        	update_option(self::$db_option, $options);
	        }

	        // Parse before output
        	foreach ($options as $key => $option) {
        		if ($key=='special_characters_to_omit') {
        			$arr = explode(self::SPEC_CHARS_DELIMITER,$option);
					$arr_to_return = array();
					foreach ($arr as $item) {
						$arr_to_return[] = WPPostsRateKeys_Validator::parse_output(trim($item));
					}

					$options[$key] = implode(self::SPEC_CHARS_DELIMITER, $arr_to_return);
        		}
        		else {
					if( gettype($options[$key]) == 'array' )
        				$options[$key] = WPPostsRateKeys_Validator::parse_array_output($option);
					else
						$options[$key] = WPPostsRateKeys_Validator::parse_output($option);
        		}
		    }

		    // Set values when empty
		    /*if (trim($options['footer_text_color'])==='') {
		    	$options['footer_text_color'] = '#21759B';
		    }*/

	        // Save class variable
        	WPPostsRateKeys::$settings = $options;

	        //return the options
	        return $options;
        }

		static function get_v6_migrate_status()
		{
			return get_option( self::$db_option_v6_upgrade );
		}

		static function update_v6_migrate_status( $datetime )
		{
			update_option( self::$db_option_v6_upgrade, $datetime );
		}

		static function update_v6_main_setting( $data )
		{
			// deprecated options list
			$deprecated_options = array(
				'allow_add_keyword_in_titles',
				'allow_bold_style_to_apply',
				'bold_style_to_apply',
				'allow_italic_style_to_apply',
				'italic_style_to_apply',
				'allow_underline_style_to_apply',
				'underline_style_to_apply',
				'allow_seopressor_footer',
				'seo_link_url',
				'seo_link_text',
				'name_link_url',
				'name_link_text',
				'footer_text_color',
				'clickbank_id',
				'footer_tags_before',
				'footer_tags_after',
				'allow_advertising_program',
				'number_of_posts_for_bulk_requests',
				'enable_tagging_using_google',
				'max_number_tags',
				'append_tags',
				'to_retrieve_keywords_use_post_title',
				'to_retrieve_keywords_use_post_content',
				'blacklisted_tags',
				'generic_tags',
				'allow_automatic_adding_alt_keyword',
				'image_alt_tag_decoration',
				'alt_attribute_structure',
				'image_title_tag_decoration',
				'title_attribute_structure',
				'enable_convertion_post_slug',
				'enable_rich_snippets',
				'enable_socialseo_facebook',
				'enable_socialseo_twitter',
				'enable_dublincore',
				'lsi_bing_api_key',
				'lsi_language',
				'lsi_bing_api_key_is_valid',
				'h1_tag_already_in_theme',
				'h2_tag_already_in_theme',
				'h3_tag_already_in_theme',
				'allow_automatic_adding_rel_nofollow',
				'auto_add_rel_nofollow_img_links'
			);

			// new options
			$new_options = array(

				// licensing
				'license_type' => ''

				// On-page analysis box automatic slide out
				, 'on_page_box_auto_slide' => 1

				// On-page analysis automation
				, 'on_page_automate_description' => 1
				, 'on_page_automate_canonical' => 1

				// List of api server
				, 'api_server' => array()

				// Sitemap Settings
				, 'seop_enable_sitemap' => 0
				, 'seop_sitemap_content_homepage' => 1
				, 'seop_sitemap_content_posts' => 1
				, 'seop_sitemap_content_pages' => 1
				, 'seop_sitemap_content_categories' => 1
				, 'seop_sitemap_frequency' => 3
				, 'seop_sitemap_priority_homepage' => 1
				, 'seop_sitemap_priority_posts' => 0.7
				, 'seop_sitemap_priority_pages' => 0.7
				, 'seop_sitemap_priority_categories' => 0.5

				// Local SEO
				, 'seop_local_name' => ''
				, 'seop_local_type' => ''
				, 'seop_local_address' => ''
				, 'seop_local_city' => ''
				, 'seop_local_state' => ''
				, 'seop_local_postcode' => ''
				, 'seop_local_country' => ''
				, 'seop_local_latitude' => ''
				, 'seop_local_longitude' => ''
				, 'seop_local_website' => ''
				, 'seop_local_contact' => array()
				, 'seop_local_fax' => ''
				, 'seop_local_email' => ''
				, 'seop_operating_hour' => array(
					'monday' => array(
						'from' => '',
						'to' => ''
					),
					'tuesday' => array(
						'from' => '',
						'to' => ''
					),
					'wednesday' => array(
						'from' => '',
						'to' => ''
					),
					'thursday' => array(
						'from' => '',
						'to' => ''
					),
					'friday' => array(
						'from' => '',
						'to' => ''
					),
					'saturday' => array(
						'from' => '',
						'to' => ''
					),
					'sunday' => array(
						'from' => '',
						'to' => ''
					)
				)

				// Link Policy
				, 'seop_allow_no_follow_external_link' => isset($data['allow_automatic_adding_rel_nofollow']) ? $data['allow_automatic_adding_rel_nofollow'] : 1
				, 'seop_allow_no_follow_img' => isset($data['auto_add_rel_nofollow_img_links']) ? $data['auto_add_rel_nofollow_img_links'] : 1

				// Homepage Settings
				, 'seop_home_title' => ''
				, 'seop_home_description' => ''
				, 'seop_home_canonical' => ''
				, 'seop_home_redirect' => ''
				, 'seop_home_robot' => array()
				, 'seop_home_logo' => ''
				, 'seop_home_contact' => array()
				, 'seop_home_social' => array()
				, 'seop_home_fb_enable' => 0
				, 'seop_home_fb_title' => ''
				, 'seop_home_fb_description' => ''
				, 'seop_home_fb_image' => ''
				, 'seop_home_fb_publisher' => ''
				, 'seop_home_fb_author' => ''
				, 'seop_home_tw_enable' => 0
				, 'seop_home_tw_title' => ''
				, 'seop_home_tw_description' => ''
				, 'seop_home_image' => ''
				, 'seop_home_profile' => ''
			);

			// loop through and remove those deprecated options
			foreach( $data as $key=>$value )
			{
				if( in_array($key, $deprecated_options) )
					unset( $data[$key] );
			}

			// loop through and add those new options
			foreach( $new_options as $key=>$value )
			{
				if( !array_key_exists($key, $data) )
					$data[$key] = $value;
			}

			$data['last_version'] = WPPostsRateKeys::VERSION;
			$data['enable_special_characters_to_omit'] = 1;

			return $data;
		}

		static function get_link_running_status()
		{
			$status = get_option( self::$db_option_link_running_status );
			if( $status === false )
			{
				self::update_link_running_status( current_time('timestamp') );
				$status = get_option( self::$db_option_link_running_status );
			}
			return $status;
		}

		static function update_link_running_status( $timestamp = '' )
		{
			update_option( self::$db_option_link_running_status, $timestamp );
		}

	}

}
