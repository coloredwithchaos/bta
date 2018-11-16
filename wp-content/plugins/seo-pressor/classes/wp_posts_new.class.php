<?php
if (!class_exists('WPPostsRateKeys_WPPosts_New')) {
	class WPPostsRateKeys_WPPosts_New
	{

        static $keyword_metadata 	= '_seop_kw_1';
        static $keyword2_metadata 	= '_seop_kw_2';
        static $keyword3_metadata 	= '_seop_kw_3';
        static $settings_metadata 	= '_seop_settings';
		static $result_metadata 	= '_seop_cache_result';
		static $score_metadata 		= '_seop_cache_score';
		static $cache_md5_metadata 	= '_seop_cache_md5';
		static $upgrade_metadata	= '_seop_upgrade_v6';
		static $linkcheck_metadata 	= '_seop_link_last_check';
		static $audit_metadata		= '_seop_site_audit';

        /**
         * update_non_hidden_metadata
         */
        static function update_non_hidden_metadata() {
        	global $wpdb;
        	$table_meta =  $wpdb->postmeta;

        	$exist_v4 = $wpdb->get_var("select meta_key from $table_meta where meta_key='posts_rate_key' limit 1");

        	// If at least one, mean that the update wasn't done yet
        	if ($exist_v4) { // Else, is Null

        		$meta_key_old = 'posts_rate_key';
        		$meta_key_new = '_' . $meta_key_old;
        		$tmp_query = "update $table_meta set meta_key='$meta_key_new' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);

        		$meta_key_old = 'posts_rate_key2';
        		$meta_key_new = '_' . $meta_key_old;
        		$tmp_query = "update $table_meta set meta_key='$meta_key_new' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);

        		$meta_key_old = 'posts_rate_key3';
        		$meta_key_new = '_' . $meta_key_old;
        		$tmp_query = "update $table_meta set meta_key='$meta_key_new' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);

        		// Anything that begins with "google_rich_snippet_" or "seop_grs_"
        		$tmp_query = "update $table_meta set meta_key=CONCAT('_', meta_key)
        							where meta_key like 'google_rich_snippet_%' or meta_key like 'seop_grs_%'";
        		$wpdb->query($tmp_query);
        	}

			$exist_v5 = $wpdb->get_var("select meta_key from $table_meta where meta_key='_posts_rate_key' limit 1");
			if( $exist_v5 )
			{
				$meta_key_old = '_posts_rate_key';
        		$tmp_query = "update $table_meta set meta_key='".self::$keyword_metadata."' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);

				$meta_key_old = '_posts_rate_key2';
        		$tmp_query = "update $table_meta set meta_key='".self::$keyword2_metadata."' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);

				$meta_key_old = '_posts_rate_key3';
        		$tmp_query = "update $table_meta set meta_key='".self::$keyword3_metadata."' where meta_key='$meta_key_old'";
        		$wpdb->query($tmp_query);
			}
        }

        /*
         * Get permalink even for Draft posts
         *
         * @param	int	$post_id
         */
        static function get_permalink($post_id) {
        	$post = get_post( $post_id );

	        if (in_array($post->post_status, array('draft', 'pending', 'auto-draft'))) {
			    $my_post = clone $post;
			    $my_post->post_status = 'published';
			    $my_post->post_name = sanitize_title($my_post->post_name ? $my_post->post_name : $my_post->post_title, $my_post->ID);
			    $permalink = get_permalink($my_post);
			} else {
			    $permalink = get_permalink($post_id);
			}

			return $permalink;
        }

		static function get_seop_box_keywords( $post_id )
		{
			$to_return = array();

			$kw1 = get_post_meta( $post_id, self::$keyword_metadata, TRUE );
			$kw2 = get_post_meta( $post_id, self::$keyword2_metadata, TRUE );
			$kw3 = get_post_meta( $post_id, self::$keyword3_metadata, TRUE );

			if( !empty( $kw1 ) )
				$to_return[] = trim($kw1);
			if( !empty( $kw2 ) )
				$to_return[] = trim($kw2);
			if( !empty( $kw3 ) )
				$to_return[] = trim($kw3);

			return $to_return;
		}

		static function save_seop_box_keywords( $post_id, $keywords=array() )
		{

			// remove duplicated keyword opt-in
			$keywords = array_unique( $keywords );
			$keywords = array_values( $keywords );

			if( isset( $keywords[0] ) && !empty( $keywords[0] ) )
				update_post_meta( $post_id, self::$keyword_metadata, trim($keywords[0]) );
			else
				update_post_meta( $post_id, self::$keyword_metadata, '' );

			if( isset( $keywords[1] ) && !empty( $keywords[1] ) )
				update_post_meta( $post_id, self::$keyword2_metadata, trim($keywords[1]) );
			else
				update_post_meta( $post_id, self::$keyword2_metadata, '' );

			if( isset( $keywords[2] ) && !empty( $keywords[2] ) )
				update_post_meta( $post_id, self::$keyword3_metadata, trim($keywords[2]) );
			else
				update_post_meta( $post_id, self::$keyword3_metadata, '' );

		}

        static function get_seop_box_settings( $post_id )
		{
			$_settings = get_post_meta( $post_id, self::$settings_metadata, TRUE );
			$_settings = maybe_unserialize( $_settings );
			$_v6_upgrade = get_post_meta( $post_id, self::$upgrade_metadata, TRUE );

			if( empty($_settings) && empty($_v6_upgrade) )
			{
				if( empty($_v6_upgrade) )
				{
					self::do_upgrade_v6_custom_meta( $post_id );
					$_settings = get_post_meta( $post_id, self::$settings_metadata, TRUE );
				}
				else
				{
					$_settings = self::get_default_box_setting( $post_id );
				}
			}

			$_settings = self::filter_seop_box_setting_uneditable( $post_id, $_settings );

			return $_settings;
		}

		static function save_seop_box_settings( $post_id, $data=array() )
		{
			$current_data = self::get_seop_box_settings( $post_id );

			// do force data filter
			$data = self::filter_seop_box_setting_uneditable( $post_id, $data );

			// trim all value
			if( count($data) > 0 )
			{
				foreach($data as $key=>$row)
				{
					$data[$key] = !empty($row) ? trim($row) : $row;
				}
			}

			if( WPPostsRateKeys_CustomRoles::user_can('on_page_meta_setting') )
			{
				$current_data['meta_title'] = $data['meta_title'];
				$current_data['meta_description'] = $data['meta_description'];
				$current_data['meta_canonical'] = $data['meta_canonical'];
				$current_data['meta_redirect'] = $data['meta_redirect'];
				$current_data['meta_rules'] = $data['meta_rules'];
			}

			if( WPPostsRateKeys_CustomRoles::user_can('on_page_social_seo') )
			{
				$current_data['fb_enable'] = $data['fb_enable'];
				$current_data['fb_type'] = $data['fb_type'];
				$current_data['fb_url'] = $data['fb_url'];
				$current_data['fb_site_name'] = $data['fb_site_name'];
				$current_data['fb_title'] = $data['fb_title'];
				$current_data['fb_img'] = $data['fb_img'];
				$current_data['fb_description'] = $data['fb_description'];
				$current_data['fb_publisher'] = $data['fb_publisher'];
				$current_data['fb_author'] = $data['fb_author'];
				$current_data['fb_admin'] = $data['fb_admin'];
				$current_data['fb_appid'] = $data['fb_appid'];
				$current_data['tw_enable'] = $data['tw_enable'];
				$current_data['tw_type'] = $data['tw_type'];
				$current_data['tw_site'] = $data['tw_site'];
				$current_data['tw_creator'] = $data['tw_creator'];
				$current_data['tw_title'] = $data['tw_title'];
				$current_data['tw_description'] = $data['tw_description'];
				$current_data['tw_image'] = $data['tw_image'];
			}

			if( WPPostsRateKeys_CustomRoles::user_can('on_page_schema_setting') )
			{
				$current_data['schema_enable'] = $data['schema_enable'];
				$current_data['schema_type'] = $data['schema_type'];
				$current_data['schema_NewsArticle_type'] = $data['schema_NewsArticle_type'];
				$current_data['schema_NewsArticle_headline'] = $data['schema_NewsArticle_headline'];
				$current_data['schema_NewsArticle_description'] = $data['schema_NewsArticle_description'];
				$current_data['schema_NewsArticle_image'] = $data['schema_NewsArticle_image'];
				$current_data['schema_NewsArticle_pubname'] = $data['schema_NewsArticle_pubname'];
				$current_data['schema_NewsArticle_publogo'] = $data['schema_NewsArticle_publogo'];
				$current_data['schema_Product_name'] = $data['schema_Product_name'];
				$current_data['schema_Product_image'] = $data['schema_Product_image'];
				$current_data['schema_Product_description'] = $data['schema_Product_description'];
				$current_data['schema_Product_brand'] = $data['schema_Product_brand'];
				$current_data['schema_Product_rating'] = $data['schema_Product_rating'];
				$current_data['schema_Product_review'] = $data['schema_Product_review'];
				$current_data['schema_Product_price'] = $data['schema_Product_price'];
				$current_data['schema_Product_currency'] = $data['schema_Product_currency'];
				$current_data['schema_Product_availability'] = $data['schema_Product_availability'];
				$current_data['schema_Product_condition'] = $data['schema_Product_condition'];
				$current_data['schema_Service_type'] = $data['schema_Service_type'];
				$current_data['schema_Service_provider_name'] = $data['schema_Service_provider_name'];
				$current_data['schema_Service_provider_type'] = $data['schema_Service_provider_type'];
				$current_data['schema_Service_rating'] = $data['schema_Service_rating'];
				$current_data['schema_Service_review'] = $data['schema_Service_review'];
				$current_data['schema_Recipe_name'] = $data['schema_Recipe_name'];
				$current_data['schema_Recipe_category'] = $data['schema_Recipe_category'];
				$current_data['schema_Recipe_image'] = $data['schema_Recipe_image'];
				$current_data['schema_Recipe_description'] = $data['schema_Recipe_description'];
				$current_data['schema_Recipe_rating'] = $data['schema_Recipe_rating'];
				$current_data['schema_Recipe_review'] = $data['schema_Recipe_review'];
				$current_data['schema_Recipe_time_preparation'] = $data['schema_Recipe_time_preparation'];
				$current_data['schema_Recipe_time_cook'] = $data['schema_Recipe_time_cook'];
				$current_data['schema_Recipe_time_total'] = $data['schema_Recipe_time_total'];
				$current_data['schema_Recipe_calories'] = $data['schema_Recipe_calories'];
				$current_data['schema_Recipe_size'] = $data['schema_Recipe_size'];
				$current_data['schema_Recipe_yield'] = $data['schema_Recipe_yield'];
				$current_data['schema_Recipe_ingredients'] = $data['schema_Recipe_ingredients'];
				$current_data['schema_Review_item'] = $data['schema_Review_item'];
				$current_data['schema_Review_rating'] = $data['schema_Review_rating'];
				$current_data['schema_Review_review'] = $data['schema_Review_review'];
				$current_data['schema_Review_article_headline'] = $data['schema_Review_article_headline'];
				$current_data['schema_Review_article_image'] = $data['schema_Review_article_image'];
				$current_data['schema_Review_article_author'] = $data['schema_Review_article_author'];
				$current_data['schema_Review_article_publisher'] = $data['schema_Review_article_publisher'];
				$current_data['schema_Review_article_publisherlogo'] = $data['schema_Review_article_publisherlogo'];
				$current_data['schema_Review_book_author'] = $data['schema_Review_book_author'];
				$current_data['schema_Review_book_authorsameas'] = $data['schema_Review_book_authorsameas'];
				$current_data['schema_Review_book_isbn'] = $data['schema_Review_book_isbn'];
				$current_data['schema_Review_book_description'] = $data['schema_Review_book_description'];
				$current_data['schema_Review_book_publisher'] = $data['schema_Review_book_publisher'];
				$current_data['schema_Review_movie_sameas'] = $data['schema_Review_movie_sameas'];
				$current_data['schema_Review_movie_description'] = $data['schema_Review_movie_description'];
				$current_data['schema_Review_movie_publisher'] = $data['schema_Review_movie_publisher'];
				$current_data['schema_Review_software_category'] = $data['schema_Review_software_category'];
				$current_data['schema_Review_software_os'] = $data['schema_Review_software_os'];
				$current_data['schema_Event_name'] = $data['schema_Event_name'];
				$current_data['schema_Event_location'] = $data['schema_Event_location'];
				$current_data['schema_Event_address'] = $data['schema_Event_address'];
				$current_data['schema_Event_date'] = $data['schema_Event_date'];
				$current_data['schema_SoftwareApplication_name'] = $data['schema_SoftwareApplication_name'];
				$current_data['schema_SoftwareApplication_category'] = $data['schema_SoftwareApplication_category'];
				$current_data['schema_SoftwareApplication_rating'] = $data['schema_SoftwareApplication_rating'];
				$current_data['schema_SoftwareApplication_review'] = $data['schema_SoftwareApplication_review'];
				$current_data['schema_SoftwareApplication_price'] = $data['schema_SoftwareApplication_price'];
				$current_data['schema_SoftwareApplication_currency'] = $data['schema_SoftwareApplication_currency'];
				$current_data['schema_SoftwareApplication_os'] = $data['schema_SoftwareApplication_os'];
				$current_data['schema_Video_name'] = $data['schema_Video_name'];
				$current_data['schema_Video_description'] = $data['schema_Video_description'];
				$current_data['schema_Video_thumbnail'] = $data['schema_Video_thumbnail'];
				$current_data['schema_Video_date'] = $data['schema_Video_date'];
				$current_data['schema_Video_duration'] = $data['schema_Video_duration'];
				$current_data['schema_Video_url'] = $data['schema_Video_url'];
				$current_data['schema_Video_url_embed'] = $data['schema_Video_url_embed'];
				$current_data['dc_enable'] = $data['dc_enable'];
				$current_data['dc_type'] = $data['dc_type'];
				$current_data['dc_title'] = $data['dc_title'];
				$current_data['dc_description'] = $data['dc_description'];
				$current_data['dc_creator'] = $data['dc_creator'];
			}

			ksort( $current_data );
			update_post_meta( $post_id, self::$settings_metadata, $current_data );
		}

		static function filter_seop_box_setting_uneditable( $post_id, $data=array() )
		{
			$post = get_post( $post_id );
			$twitter_user = trim( get_the_author_meta( 'seopressor_twitter_user_card', $post->post_author ) );
			$google_plus_auth_url = trim( get_the_author_meta( 'seopressor_google_plus_auth_url', $post->post_author ) );

			if( empty($data['fb_site_name']) ) $data['fb_url'] = get_permalink( $post_id );
			if( empty($data['fb_url']) ) $data['fb_site_name'] = get_bloginfo('name');
			if( empty($data['tw_site']) ) $data['tw_site'] = $twitter_user;
			if( empty($data['tw_creator']) ) $data['tw_creator'] = $twitter_user;
			if( empty($data['dc_creator']) ) $data['dc_creator'] = $google_plus_auth_url;

			return $data;
		}

		static function update_seop_analyze_result( $post_id, $md5, $analyze_result )
		{
			update_post_meta( $post_id, self::$cache_md5_metadata, $md5 );
			update_post_meta( $post_id, self::$result_metadata, serialize($analyze_result) );
			update_post_meta( $post_id, self::$score_metadata, $analyze_result['score'] );
		}

		static function reset_seop_analyze_result( $post_id )
		{
			update_post_meta( $post_id, self::$result_metadata, '' );
			update_post_meta( $post_id, self::$score_metadata, '');
			update_post_meta( $post_id, self::$cache_md5_metadata, '' );
		}

		static function get_seop_analyze_result( $post_id )
		{
			return maybe_unserialize( get_post_meta( $post_id, self::$result_metadata, true ) );
		}

		static function get_seop_analyze_score( $post_id )
		{
			return get_post_meta( $post_id, self::$score_metadata, true );
		}

		static function do_upgrade_v6_custom_meta( $post_id )
		{
			$default_box_setting = self::get_default_box_setting( $post_id );
			if( get_post_meta( $post_id, '_seopressor_og_image_use', true ) == 1 && has_post_thumbnail( $post_id ) )
			{
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ) );
				if( isset($thumb[0]) && !empty($thumb[0]) )
					$fb_img = $thumb[0];
			}

			// meta setting
			$default_box_setting['meta_title'] = get_post_meta( $post_id, '_seopressor_meta_title', true );
			$default_box_setting['meta_description'] = get_post_meta( $post_id, '_seopressor_meta_description', true );

			$default_box_setting['fb_enable'] = ( get_post_meta( $post_id, '_enable_socialseo_facebook', true ) == 1 ? 1 : 0 );
			$default_box_setting['fb_type'] = 'Article';
			$default_box_setting['fb_title'] = get_post_meta( $post_id, '_socialseo_facebook_title', true );
			$default_box_setting['fb_publisher'] = get_post_meta( $post_id, '_socialseo_facebook_publisher', true );
			$default_box_setting['fb_description'] = get_post_meta( $post_id, '_socialseo_facebook_description', true );
			$default_box_setting['fb_author'] = get_post_meta( $post_id, '_socialseo_facebook_author', true );
			$default_box_setting['fb_img'] = isset($fb_img) ? $fb_img : '';


			// twitter
			$default_box_setting['tw_enable'] = ( get_post_meta( $post_id, '_enable_socialseo_twitter', true ) == 1 ? 1 : 0 );
			$default_box_setting['tw_title'] = get_post_meta( $post_id, '_socialseo_twitter_title', true );
			$default_box_setting['tw_description'] = get_post_meta( $post_id, '_socialseo_twitter_description', true );

			// dublin core
			$default_box_setting['dc_enable'] = ( get_post_meta( $post_id, '_enable_dublincore', true ) == 1 ? 1 : 0 );
			$default_box_setting['dc_title'] = get_post_meta( $post_id, '_dublincore_title', true );
			$default_box_setting['dc_description'] = get_post_meta( $post_id, '_dublincore_description', true );
			$default_box_setting['dc_type'] = 'Article';

			// schema
			$default_box_setting['schema_enable'] = ( get_post_meta( $post_id, '_enable_rich_snippets', true ) == 1 ? 1 : 0 );
			$default_box_setting['schema_Event_name'] = get_post_meta( $post_id, '_seop_grs_event_name', true );
			$default_box_setting['schema_Event_date'] = get_post_meta( $post_id, '_seop_grs_event_startdate', true );
			$default_box_setting['schema_Event_location'] = get_post_meta( $post_id, '_seop_grs_event_location_name', true );
			$default_box_setting['schema_Event_address'] = trim( get_post_meta( $post_id, '_seop_grs_event_location_address_streetaddress', true ) . ' ' . get_post_meta( $post_id, '_seop_grs_event_location_address_addresslocality', true ) . ' ' . get_post_meta( $post_id, '_seop_grs_event_location_address_addressregion', true ) );
			$default_box_setting['schema_Product_name'] = get_post_meta( $post_id, '_seop_grs_product_name', true );
			$default_box_setting['schema_Product_image'] = get_post_meta( $post_id, '_seop_grs_product_image', true );
			$default_box_setting['schema_Product_description'] = get_post_meta( $post_id, '_seop_grs_product_description', true );
			$default_box_setting['schema_Recipe_name'] = get_post_meta( $post_id, '_seop_grs_recipe_name', true );
			$default_box_setting['schema_Recipe_yield'] = get_post_meta( $post_id, '_seop_grs_recipe_yield', true );
			$default_box_setting['schema_Recipe_image'] = get_post_meta( $post_id, '_seop_grs_recipe_photo', true );
			$default_box_setting['schema_Recipe_calories'] = get_post_meta( $post_id, '_seop_grs_recipe_nutrition_calories', true );
			$default_box_setting['schema_Recipe_time_total'] = get_post_meta( $post_id, '_seop_grs_recipe_total_time_minutes', true );
			$default_box_setting['schema_Recipe_time_cook'] = get_post_meta( $post_id, '_seop_grs_recipe_cook_time_minutes', true );
			$default_box_setting['schema_Recipe_time_preparation'] = get_post_meta( $post_id, '_seop_grs_recipe_prep_time_minutes', true );
			$default_box_setting['schema_Recipe_ingredients'] = get_post_meta( $post_id, '_seop_grs_recipe_ingredient', true );

			// must update metadata first to avoid infinate loop
			ksort( $default_box_setting );
			update_post_meta( $post_id, self::$settings_metadata, $default_box_setting );
			update_post_meta( $post_id, self::$upgrade_metadata, 1 );

			//self::save_seop_box_settings( $post_id, $default_box_setting );
		}

		static function get_default_box_setting( $post_id )
		{

			$post = get_post( $post_id );
			$twitter_user = trim( get_the_author_meta( 'seopressor_twitter_user_card', $post->post_author ) );
			$google_plus_auth_url = trim( get_the_author_meta( 'seopressor_google_plus_auth_url', $post->post_author ) );

			$default_box_setting = array(
				"meta_title" => "",
				"meta_description" => "",
				"meta_canonical" => "",
				"meta_redirect" => "",
				"meta_rules" => array(),
				"fb_enable" => 0,
				"fb_type" => "",
				"fb_url" => get_permalink( $post_id ),
				"fb_site_name" => get_bloginfo('name'),
				"fb_title" => "",
				"fb_img" => "",
				"fb_description" => "",
				"fb_publisher" => "",
				"fb_author" => "",
				"fb_admin" => "",
				"fb_appid" => "",
				"tw_enable" => 0,
				"tw_type" => "",
				"tw_site" => $twitter_user,
				"tw_creator" => $twitter_user,
				"tw_title" => "",
				"tw_description" => "",
				"tw_image" => "",
				"schema_enable" => 0,
				"schema_type" => "",
				"schema_NewsArticle_type" => "",
				"schema_NewsArticle_headline" => "",
				"schema_NewsArticle_description" => "",
				"schema_NewsArticle_image" => "",
				"schema_NewsArticle_pubname" => "",
				"schema_NewsArticle_publogo" => "",
				"schema_Product_name" => "",
				"schema_Product_image" => "",
				"schema_Product_description" => "",
				"schema_Product_brand" => "",
				"schema_Product_rating" => "",
				"schema_Product_review" => "",
				"schema_Product_price" => "",
				"schema_Product_currency" => "",
				"schema_Product_availability" => "",
				"schema_Product_condition" => "",
				"schema_Service_type" => "",
				"schema_Service_provider_name" => "",
				"schema_Service_provider_type" => "",
				"schema_Service_rating" => "",
				"schema_Service_review" => "",
				"schema_Recipe_name" => "",
				"schema_Recipe_category" => "",
				"schema_Recipe_image" => "",
				"schema_Recipe_description" => "",
				"schema_Recipe_rating" => "",
				"schema_Recipe_review" => "",
				"schema_Recipe_time_preparation" => "",
				"schema_Recipe_time_cook" => "",
				"schema_Recipe_time_total" => "",
				"schema_Recipe_calories" => "",
				"schema_Recipe_size" => "",
				"schema_Recipe_yield" => "",
				"schema_Recipe_ingredients" => "",
				"schema_Review_item" => "",
				"schema_Review_rating" => "",
				"schema_Review_review" => "",
				"schema_Review_article_headline" => "",
				"schema_Review_article_image" => "",
				"schema_Review_article_author" => "",
				"schema_Review_article_publisher" => "",
				"schema_Review_article_publisherlogo" => "",
				"schema_Review_book_author" => "",
				"schema_Review_book_authorsameas" => "",
				"schema_Review_book_isbn" => "",
				"schema_Review_book_description" => "",
				"schema_Review_book_publisher" => "",
				"schema_Review_movie_sameas" => "",
				"schema_Review_movie_description" => "",
				"schema_Review_movie_publisher" => "",
				"schema_Review_software_category" => "",
				"schema_Review_software_os" => "",
				"schema_Event_name" => "",
				"schema_Event_location" => "",
				"schema_Event_address" => "",
				"schema_Event_date" => "",
				"schema_SoftwareApplication_name" => "",
				"schema_SoftwareApplication_category" => "",
				"schema_SoftwareApplication_rating" => "",
				"schema_SoftwareApplication_review" => "",
				"schema_SoftwareApplication_price" => "",
				"schema_SoftwareApplication_currency" => "",
				"schema_SoftwareApplication_os" => "",
				"schema_Video_name" => "",
				"schema_Video_description" => "",
				"schema_Video_thumbnail" => "",
				"schema_Video_date" => "",
				"schema_Video_duration" => "",
				"schema_Video_url" => "",
				"schema_Video_url_embed" => "",
				"dc_enable" => 0,
				"dc_type" => "",
				"dc_title" => "",
				"dc_description" => "",
				"dc_creator" => $google_plus_auth_url
			);

			return $default_box_setting;
		}


		static function get_link_checking_status( $post_id )
		{
			$status = get_post_meta( $post_id, self::$linkcheck_metadata, TRUE );
			if( empty($status) )
				return false;
			else
				return $status;
		}

		static function update_link_checking( $post_id, $time )
		{
			if( empty($time) )
				delete_post_meta( $post_id, self::$linkcheck_metadata );
			else
				update_post_meta( $post_id, self::$linkcheck_metadata, $time );
		}

		static function get_audit_status( $post_id )
		{
			$status = get_post_meta( $post_id, self::$audit_metadata, TRUE );
			if( empty($status) )
				return false;
			else
				return $status;
		}

		static function update_audit_status( $post_id, $audit_id )
		{
			update_post_meta( $post_id, self::$audit_metadata, $audit_id );
		}

		static function get_wp_post_title_content( $post_id, $raw=true )
		{
        	global $wpdb;
			$post_data = $wpdb->get_row( "SELECT post_title,post_content FROM $wpdb->posts where ID = $post_id" );
			if($post_data)
			{
				if( $raw == true )
				{
					return array( $post_data->post_title, $post_data->post_content );
				}
				else
				{
					$post_title = $post_data->post_title;
					$post_content = do_shortcode( $post_data->post_content );

					return array( $post_title, $post_content );
				}
			}
        }


	}
}
