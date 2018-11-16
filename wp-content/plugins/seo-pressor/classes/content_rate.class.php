<?php
if (!class_exists('WPPostsRateKeys_ContentRate')) {
	class WPPostsRateKeys_ContentRate
	{
		/**
		 * Retrieve the list of Suggestions IDs per section
		 *
		 * The sections are: decoration, url and content
		 *
		 * @return 	array
		 */
		static function get_suggestions_per_sections() {
			return array(
				'decoration'=>array('msg_101','msg_102','msg_103','msg_104','msg_105','msg_106'
									,'msg_119','msg_120','msg_121','msg_122','msg_123','msg_124'
								)
				,'url'=>array('msg_112', 'msg_113','msg_114','msg_115','msg_130','msg_131','msg_132'
									,'msg_133','msg_134'
								)
				,'content'=>array('msg_107', 'msg_108', 'msg_109', 'msg_110', 'msg_111'
									, 'msg_116', 'msg_117','msg_118'
									, 'msg_125', 'msg_126', 'msg_127', 'msg_128'
									, 'msg_129', 'msg_135', 'msg_136', 'msg_137'
									, 'msg_149', 'msg_150', 'msg_151', 'msg_152'
								)
			);
		}

		/**
		 * Retrieve the list of Suggestions for the Box
		 *
		 * @return array
		 */
		static function get_suggestions_for_box() {
			return array(
					// Positives
					/* translators: <<N>> and <<(s)>> should be ignored when translate */
					'msg_101' => array(__('You have <<N>> keyword<<(s)>> in bold.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Bold your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_102' => array(__('You have <<N>> keyword<<(s)>> in italic.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Italize your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_103' => array(__('You have <<N>> keyword<<(s)>> in underline.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Underline your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_104' => array(__('You have keyword in <<N>> H1 tag<<(s)>>.','seo-pressor')
									,__('Most themes have H1 tag on the title. If not, always make sure you have a H1 tag in your content. An example is: <h1>Your title here</h1>','seo-pressor')
							)
					, 'msg_105' => array(__('You have keyword in <<N>> H2 tag<<(s)>>.','seo-pressor')
									,__('You should always section your content with sub-headings. An example of the tag in HTML: <h2>Your sub-heading</h2>','seo-pressor')
							)
					, 'msg_106' => array(__('You have keyword in <<N>> H3 tag<<(s)>>.','seo-pressor')
									,__('You should always section your content with sub-headings. An example of the tag in HTML: <h3>Your sub-heading</h3>','seo-pressor')
							)
					, 'msg_107' => array(__('You have keyword in <<N>> image ALT<<(s)>>.','seo-pressor')
									,__("ALT tag describes what an image is about. It's good to have keyword in your image's ALT tag. An example in HTML: " . '"<img src="http://yoursite.com/image.jpg" ALT="YOUR KEYWORD" />"','seo-pressor')
							)
					, 'msg_108' => array(__('You have keyword in first 100 words.','seo-pressor')
									,''
							)
					, 'msg_109' => array(__('You have keyword in last 100 words.','seo-pressor')
									,''
							)
					, 'msg_110' => array(__('You have keyword in the first sentence.','seo-pressor')
									,''
							)
					, 'msg_111' => array(__('You have keyword in the last sentence.','seo-pressor')
									,''
							)
					, 'msg_112' => array(__('Keyword in anchor text of an internal link.','seo-pressor')
									,__('Add a link to your other pages within the same website using your keyword as the anchor text. An example in HTML: <a href="http://yoursite.com/anotherpage/" >YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_113' => array(__('Keyword in anchor text of an external link.','seo-pressor')
									,__('Add a link to another reputable source of information with your keyword as the anchor text. An example in HTML: <a href="http://wikipedia.org/relatedtopic">YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_114' => array(__('Keyword found in domain name.','seo-pressor')
									,__('Your domain name is found to contain your keyword which is a good boost to your scoring.','seo-pressor')
							)
					, 'msg_115' => array(__('Keyword found in Post/Page URL.','seo-pressor')
									,__('Your main keyword should always appear in the URL of this content.','seo-pressor')
							)
					, 'msg_116' => array(__('<<N>> LSI Keyword<<(s)>> found.','seo-pressor')
									,__('Using more LSI keywords will help you rank better. Click on the LSI tab to see what other words you should include in your content. Include the ones which are most relevant to your content.','seo-pressor')
							)
					, 'msg_117' => array(__('Keyword density is OK.','seo-pressor')
									,__('The best keyword density is between 2% to 4%. There is no rule on this. Having less than 2%, your content will most likely be unfocused. Having it higher than 4% will most probably make your content unreadable. Try to adjust accordingly, focus on pleasing the readers, not the search engine.','seo-pressor')
							)

					// Negatives
					, 'msg_118' => array(__('Increase the length of the content.','seo-pressor')
									,__('Longer content tends to rank better. The reason is that longer content is perceived to contain more useful information. Try to increase the length of your content and make sure they are useful to the readers and not fillers.','seo-pressor')
							)
					, 'msg_119' => array(__('You do not have keyword(s) in bold.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Bold your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_120' => array(__('You do not have keyword(s) in italic.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Italize your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_121' => array(__('You do not have keyword(s) in underline.','seo-pressor')
									,__('Keywords decorations are important. It tells search engines what your content is all about. Underline your keywords few times but do not overdo it.','seo-pressor')
							)
					, 'msg_122' => array(__('You do not have keyword in H1 tag.','seo-pressor')
									,__('Most themes have H1 tag on the title. If not, always make sure you have a H1 tag in your content. An example is: <h1>Your title here</h1>','seo-pressor')
							)
					, 'msg_123' => array(__('You do not have keyword in H2 tag.','seo-pressor')
									,__('You should always section your content with sub-headings. An example of the tag in HTML: <h2>Your sub-heading</h2>','seo-pressor')
							)
					, 'msg_124' => array(__('You do not have keyword in H3 tag.','seo-pressor')
									,__('You should always section your content with sub-headings. An example of the tag in HTML: <h3>Your sub-heading</h3>','seo-pressor')
							)
					, 'msg_125' => array(__('You do not have keyword in Image ALT tag.','seo-pressor')
									,__("ALT tag describes what an image is about. It's good to have keyword in your image's ALT tag. An example in HTML: " . '"<img src="http://yoursite.com/image.jpg" ALT="YOUR KEYWORD" />"','seo-pressor')
							)
					, 'msg_126' => array(__('Keyword not found in first 100 words.','seo-pressor')
									,''
							)
					, 'msg_127' => array(__('Keyword not found in last 100 words.','seo-pressor')
									,''
							)
					, 'msg_128' => array(__('Keyword not found in first sentence.','seo-pressor')
									,''
							)
					, 'msg_129' => array(__('Keyword not found in last sentence.','seo-pressor')
									,''
							)
					, 'msg_130' => array(__('Link pointing to an internal page not found.','seo-pressor')
									,__('Add a link to your other pages within the same website using your keyword as the anchor text. An example in HTML: <a href="http://yoursite.com/anotherpage/" >YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_131' => array(__('Keyword not found in anchor text of internal link.','seo-pressor')
									,__('Add a link to your other pages within the same website using your keyword as the anchor text. An example in HTML: <a href="http://yoursite.com/anotherpage/" >YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_132' => array(__('Link pointing to an external reputable source not found.','seo-pressor')
									,__('Add a link to another reputable source of information with your keyword as the anchor text. An example in HTML: <a href="http://wikipedia.org/relatedtopic">YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_133' => array(__('keyword not found in anchor text of an external link.','seo-pressor')
									,__('Add a link to another reputable source of information with your keyword as the anchor text. An example in HTML: <a href="http://wikipedia.org/relatedtopic">YOUR KEYWORD</a>','seo-pressor')
							)
					, 'msg_134' => array(__('Keyword not found in Post/Page URL.','seo-pressor')
									,__('Your main keyword should always appear in the URL of this content.','seo-pressor')
							)
					, 'msg_135' => array(__('No LSI Keyword used.','seo-pressor')
									,__('Using more LSI keywords will help you rank better. Click on the LSI tab to see what other words you should include in your content. Include the ones which are most relevant to your content.','seo-pressor')
							)
					, 'msg_136' => array(__('Keyword density is high.','seo-pressor')
									,__('The best keyword density is between 2% to 4%. There is no rule on this. Having less than 2%, your content will most likely be unfocused. Having it higher than 4% will most probably make your content unreadable. Try to adjust accordingly, focus on pleasing the readers, not the search engine.','seo-pressor')
							)
					, 'msg_137' => array(__('Keyword density is too low.','seo-pressor')
									,__('The best keyword density is between 2% to 4%. There is no rule on this. Having less than 2%, your content will most likely be unfocused. Having it higher than 4% will most probably make your content unreadable. Try to adjust accordingly, focus on pleasing the readers, not the search engine.','seo-pressor')
							)

					// Related to meta values
					, 'msg_149' => array(__('Keyword is found in META Keyword.','seo-pressor')
									,''
							)
					, 'msg_150' => array(__('Keyword is found in META description.','seo-pressor')
									,''
							)
					, 'msg_151' => array(__('You need to have Keyword in Meta Keywords.','seo-pressor')
									,''
							)
					, 'msg_152' => array(__('You need to have Keywords in META Description.','seo-pressor')
									,''
							)

					// If not 100%, suggest: Get your 100% easily:
					, 'msg_138' => __('Use more LSI keywords.','seo-pressor')
					, 'msg_139' => __('Add more images with ALT tag.','seo-pressor')
					, 'msg_140' => __('Section your content using more headings.','seo-pressor')
					, 'msg_141' => __('Longer content ranks better.','seo-pressor')
					, 'msg_153' => __('You can target up to 3 keywords per content.','seo-pressor')

					// If more than 100%, suggest:
					, 'msg_142' => __('Your score may be too high, try to reduce to 100% by adjusting decorated keywords, keyword density and LSIs or increase your content length.','seo-pressor')

					// Over-Optimization Warning:
					, 'msg_143' => __('You are safe. No over-optimization is detected.','seo-pressor')
					, 'msg_144' => __('Keywords are bolded too many times.','seo-pressor')
					, 'msg_145' => __('Keywords are italized too many times.','seo-pressor')
					, 'msg_146' => __('Keywords are underlined too many times.','seo-pressor')
					, 'msg_147' => __('Keyword density is too high. Try replace some of your keywords with LSI keywords.','seo-pressor')
					, 'msg_148' => __('Too many LSI keywords are used.','seo-pressor')

					, 'msg_154' => __('Too many H1 tags contain your keyword.','seo-pressor')
					, 'msg_155' => __('Too many H2 tags contain your keyword.','seo-pressor')
					, 'msg_156' => __('Too many H3 tags contain your keyword.','seo-pressor')
					, 'msg_157' => __('Keyword appear in image ALTs too many times.','seo-pressor')
					, 'msg_158' => __('Keywords are used too many times as anchor text in links.','seo-pressor')
				);
		}


		static function get_post_whole_page_to_analyze($post_id,$settings,$post_permalink) {
			// For drafts (or pending) we return False to analyze only the Post Content
			if ($post_id!='' && $settings['analize_full_page']=='1') {

				// Add "internal_call" parameter to avoid recursive call
				if (substr_count($post_permalink, '?')>0) {
					$post_permalink .= '&internal_call=true';
				}
				else {
					$post_permalink .= '?internal_call=true';
				}

				if (get_post_status($post_id) == 'publish') {
					$response = wp_remote_get($post_permalink,array('timeout'=>WPPostsRateKeys::$timeout));
					if (!is_wp_error($response)) { // Else, was an object(WP_Error) and the Post Content is used
						$whole_post_page = $response['body'];

						return $whole_post_page;
					}
					else {
						$error_msg = $response->get_error_message($response->get_error_code());
						WPPostsRateKeys_Logs::add_error('391',"get_post_whole_page_to_analyze Published, error: " . $error_msg);
					}
				}
				else {
					$preview_link = set_url_scheme( $post_permalink );
					$preview_link = esc_url( apply_filters( 'preview_post_link', add_query_arg( 'preview', 'true', $preview_link ) ) );
					$cookies      = array();

					foreach ( $_COOKIE as $name => $value ) {
						$cookies[] = new WP_Http_Cookie( array( 'name' => $name, 'value' => $value ) );
					}

					$response = wp_remote_get( $preview_link, array( 'cookies' => $cookies ) );
					if (!is_wp_error($response)) { // Else, was an object(WP_Error) and the Post Content is used
						$body    = wp_remote_retrieve_body( $response );
						return $body;
					}
					else {
						$error_msg = $response->get_error_message($response->get_error_code());
						WPPostsRateKeys_Logs::add_error('392',"get_post_whole_page_to_analyze Preview, error: " . $error_msg);
					}
				}
			}

			return FALSE;
		}

        /**
         * Function to the get all the POST data
         *
         * This return:
         *  the Scrore in percet
         *  the Suggestions for the page
         *  and the Suggestion box data
         *
         * @param	int		$post_id
         * @param	array	$keyword_arr
         * @param	string	$content_to_analize			is the whole page content or the filtered content
         * @param	string	$filtered_title
         * @param	array	$settings
         * @param	string	$from_url
         * @param	string	$post_content_filtered		Only Post Content to Edit: used for first and last sentence detection
         * @return 	array
         * @static
         */
        static function get_all_post_data_new( $post_id, $seop_keywords, $post_title, $post_content, $from_url )
		{

			$analyze_result = array(
				"score" 		=> 0,
				"word_count" 	=> 0,
				"readibility" 	=> 0,
				"density" 		=> 0,
				"opportunity" 	=> 0,
				"analysis"		=> array()
			);


			if( count($seop_keywords) > 0 )
			{
				$post_content = str_replace( '&#039;', "'", $post_content );
        		$post_content = str_replace( '&#8217;', "'", $post_content );
        		// Removing Html
        		if( WPPostsRateKeys_Settings::support_multibyte() )
				{
        			// Avoid problem of converting &lt; into <, Part 1
        			$post_content = str_replace( '&lt;', 'A&A-*lAtA;', $post_content );

        			// Convert html entities
        			$post_content = html_entity_decode( $post_content, ENT_COMPAT, "UTF-8" );

        			// Avoid problem of converting &lt; into <, Part 2
        			$post_content = str_replace( 'A&A-*lAtA;','&lt;', $post_content );
        		}

        		$global_settings = WPPostsRateKeys_Settings::get_options();
        		$post_settings = WPPostsRateKeys_WPPosts_New::get_seop_box_settings( $post_id );
        		$post_url = WPPostsRateKeys_WPPosts::get_permalink( $post_id );

        		$wp_url = get_bloginfo('wpurl');

        		// Call Central Server
	        	$request_params = compact(
					'seop_keywords',
					'post_title',
					'post_content',
					'post_url',
					'global_settings',
					'post_settings',
					'from_url',
					'post_id',
					'wp_url'
				);

	        	$response_params = WPPostsRateKeys_Central::get_data( $request_params );
				$analyze_result = $response_params['analysis'];

			}

			return $analyze_result;

        }

        /**
         * Function to the get all the POST data
         *
         * This return:
         *  the Scrore in percet
         *  the Suggestions for the page
         *  and the Suggestion box data
         *
         * @param	int		$post_id
         * @param	array	$keyword_arr
         * @param	string	$content_to_analize			is the whole page content or the filtered content
         * @param	string	$filtered_title
         * @param	array	$settings
         * @param	string	$from_url
         * @param	string	$post_content_filtered		Only Post Content to Edit: used for first and last sentence detection
         * @return 	array
         * @static
         */
        static function get_all_post_data($post_id,$keyword_arr,$new_content,$filtered_title
        									,$settings,$from_url,$post_content_filtered) {

        	$total_score = 0;
        	$box_suggestions = array('box_keyword_density'=>0,'box_suggestions_arr'=>array());
        	$special_suggestions_arr = array();
        	$box_suggestions_arr = array();
        	$keyword_density_pointer = 0;

        	if ($keyword_arr[0]!='') { // Only checks if is some keyword defined
        		/*
        		 * Processing/Preparing Post Content
        		 *
        		 * For example, when the Content is getted from Url, the WP returns the ' characters
        		 * as &#039; or &#8217;
        		 */
        		$new_content = str_replace('&#039;', "'", $new_content);
        		$new_content = str_replace('&#8217;', "'", $new_content);
        		// Removing Html
        		if (WPPostsRateKeys_Settings::support_multibyte()) {

        			// Avoid problem of converting &lt; into <, Part 1
        			$new_content = str_replace('&lt;', 'A&A-*lAtA;', $new_content);
        			$post_content_filtered = str_replace('&lt;', 'A&A-*lAtA;', $post_content_filtered);

        			// Convert html entities
        			$new_content = html_entity_decode($new_content,ENT_COMPAT,"UTF-8");
        			$post_content_filtered = html_entity_decode($post_content_filtered,ENT_COMPAT,"UTF-8");

        			// Avoid problem of converting &lt; into <, Part 2
        			$new_content = str_replace( 'A&A-*lAtA;','&lt;', $new_content);
        			$post_content_filtered = str_replace('A&A-*lAtA;','&lt;',  $post_content_filtered);
        		}

        		$settings_options = WPPostsRateKeys_Settings::get_options();
        		$post_all_meta = get_post_meta($post_id);
        		$post_url = WPPostsRateKeys_WPPosts::get_permalink($post_id);

        		$lsi_keywords = array();
        		foreach ($keyword_arr as $keyword_arr_item) {
        			$lsi_keywords = array_merge($lsi_keywords, WPPostsRateKeys_LSI::get_lsi_by_keyword($keyword_arr_item));
        		}

        		$post_tags = wp_get_post_tags($post_id, array( 'fields' => 'names' ));
        		$post_categories = wp_get_post_categories($post_id, array( 'fields' => 'names' ));
        		$wp_url = get_bloginfo('wpurl');

        		// Call Central Server
	        	$request_params = compact('keyword_arr','new_content'
	        					,'filtered_title','settings_options'
	        					,'post_content_filtered','from_url'
	        					,'post_all_meta','post_url'
	        					,'lsi_keywords','post_tags'
	        					,'post_categories','post_id'
	        					,'wp_url');

	        	$response_params = WPPostsRateKeys_Central::get_data($request_params);
				if( $response_params )
				{
					extract($response_params);

					$special_suggestions_arr['score_less_than_100'] = $suggestions_score_less_than_100;
					$special_suggestions_arr['score_more_than_100'] = $suggestions_score_more_than_100;
					$special_suggestions_arr['score_over_optimization'] = array($over_optimization_flag,$suggestions_score_over_optimization);
				}
        	}

        	$box_suggestions = array('box_keyword_density'=>$keyword_density_pointer,'box_suggestions_arr'=>$box_suggestions_arr);

        	return array($total_score, $box_suggestions, $special_suggestions_arr);
        }


		static function get_analysis_item_html( $code, $status, $value = NULL )
		{
			$msg = '';
			$priority = 0;
			switch( $code )
			{

				// Scope: Total Score
				case 101:
					$msg = sprintf( __( 'Your score is <span>too low</span>. You can improve it by following our suggestions below.', 'seo-pressor' ) );
					$priority = 1;
					break;
				case 102:
					$msg = sprintf( __( 'Your score is <span>low</span>. You can improve it by following our suggestions below.', 'seo-pressor' ) );
					$priority = 1;
					break;
				case 103:
					$msg = sprintf( __( 'Your content is <span>well optimized</span>. Great job!', 'seo-pressor' ) );
					$priority = 1;
					break;
				case 104:
					$msg = sprintf( __( 'Your content maybe <span>over optimized</span>, keep it in the green zone.', 'seo-pressor' ) );
					$priority = 1;
					break;


				// Scope: Content Word Count
				case 111:
					$msg = sprintf( __( 'Increase the <span>length of content</span>, your word count is <span>too low</span>. <span>(%d words)</span>', 'seo-pressor' ), $value );
					$priority = 2;
					break;
				case 112:
					$msg = sprintf( __( 'Increase the <span>length of content</span>, your word count is <span>low</span>. <span>(%d words)</span>', 'seo-pressor' ), $value );
					$priority = 2;
					break;
				case 113:
					$msg = sprintf( __( 'Increase the <span>length of content</span>, your word count is <span>unsatisfactory</span>. <span>(%d words)</span>', 'seo-pressor' ), $value );
					$priority = 2;
					break;
				case 114:
					$msg = sprintf( __( 'Increase the <span>length of content</span>, your word count is <span>alright</span>, but could still be improved. <span>(%d words)</span>', 'seo-pressor' ), $value );
					$priority = 2;
					break;
				case 115:
					$msg = sprintf( __( 'Your word count is excellent, awesome! (%d words)', 'seo-pressor' ), $value );
					$priority = 2;
					break;


				// Scope: Readability
				case 121:
					$msg = sprintf( __( 'Simplify your content, your <span>readability score</span> is <span>too low</span>. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 4;
					break;
				case 122:
					$msg = sprintf( __( 'Simplify your content, your <span>readability score</span> is <span>low</span>. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 4;
					break;
				case 123:
					$msg = sprintf( __( 'Simplify your content, your <span>readability score</span> is <span>alright</span>, but could be improved. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$type = 1;
					$priority = 4;
					break;
				case 124:
					$msg = sprintf( __( 'Content <span>readability</span> is <span>good</span>, but could still be improved. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 4;
					break;
				case 125:
					$msg = sprintf( __( 'Content <span>readability</span> is <span>excellent</span>. Great Job! <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 4;
					break;


				// Scope: SemantiQ Density
				case 131:
					$msg = sprintf( __( 'Use more keywords related to your context, your <span>SemantiQ Density</span> is <span>too low</span>. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 3;
					break;
				case 132:
					$msg = sprintf( __( 'Your <span>SemantiQ Density</span> is <span>excellent</span>. Great job! <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 3;
					break;
				case 133:
					$msg = sprintf( __( 'Reduce keywords related to your context, <span>SemantiQ Density</span> is <span>slighty too high</span>. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 3;
					break;
				case 134:
					$msg = sprintf( __( 'Reduce keywords related to your context, <span>SemantiQ Density</span> is <span>too high</span>. <span>(%g%%)</span>', 'seo-pressor' ), $value );
					$priority = 3;
					break;


				// Scope: Picture to Text Ratio
				case 141:
					$msg = sprintf( __( '<span>Use relevant images</span> in your content.', 'seo-pressor' ) );
					$priority = 12;
					break;
				case 142:
					$msg = sprintf( __( 'Use more images, your <span>image to text ratio</span> is <span>too low</span>.', 'seo-pressor' ) );
					$priority = 12;
					break;
				case 143:
					$msg = sprintf( __( 'Add more relevant images, your <span>image to text ratio</span> is <span>alright</span>, but could be improved.', 'seo-pressor' ) );
					$priority = 12;
					break;
				case 144:
					$msg = sprintf( __( '<span>Image to text ratio</span> is <span>excellent</span>. Great job!', 'seo-pressor' ) );
					$priority = 12;
					break;
				case 145:
					$msg = sprintf( __( 'Reduce the number of images, your <span>image to text ratio</span> is <span>too high</span>.', 'seo-pressor' ) );
					$priority = 12;
					break;


				// Scope: Length of title
				case 151:
					$msg = sprintf( __( 'Increase the <span>length of your title</span>, it is <span>too short</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 8;
					break;
				case 152:
					$msg = sprintf( __( 'Increase the <span>length of your title</span>, it is <span>slighty too short</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 8;
					break;
				case 153:
					$msg = sprintf( __( 'The <span>length of title</span> is <span>excellent</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 8;
					break;
				case 154:
					$msg = sprintf( __( 'Reduce the <span>length of your title</span>, it is <span>slighty too long</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 8;
					break;
				case 155:
					$msg = sprintf( __( 'Reduce the <span>length of your title</span>, it is <span>too long</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 8;
					break;


				// Scope: Keyword in Title
				case 161:
					$msg = sprintf( __( 'Keyword(s) found in title', 'seo-pressor' ) );
					$priority = 7;
					break;
				case 162:
					$msg = sprintf( __( 'Include <span>keyword(s)</span> in your <span>title</span>', 'seo-pressor' ) );
					$priority = 7;
					break;


				// Scope: Position of Primary Keyword in Title
				case 171:
					$msg = sprintf( __( '<span>Keyword(s)</span> found at the <span>beginning</span> of your <span>title</span>. Great job!', 'seo-pressor' ) );
					$priority = 9;
					break;
				case 172:
					$msg = sprintf( __( 'Move your <span>keyword(s)</span> from the <span>middle to the front</span> of your <span>title</span>.', 'seo-pressor' ) );
					$priority = 9;
					break;
				case 173:
					$msg = sprintf( __( 'Move your <span>keyword(s)</span> from the <span>back to the front</span> of your <span>title</span>.', 'seo-pressor' ) );
					$priority = 9;
					break;
				case 174:
					$msg = sprintf( __( 'No keyword(s) found in title.', 'seo-pressor' ) );
					$priority = 9;
					break;


				// Scope: Length of Meta Description
				case 181:
					$msg = sprintf( __( '<span>Increase</span> the length of your <span>meta description</span>, longer description can describe your content better. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 11;
					break;
				case 182:
					$msg = sprintf( __( 'The length of <span>meta description</span> is <span>excellent</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 11;
					break;
				case 183:
					$msg = sprintf( __( '<span>Shorten</span> your <span>meta description</span>, keep it within 200 characters (%d characters)', 'seo-pressor' ), $value );
					$priority = 11;
					break;


				// Scope: Keyword in Meta Description
				case 191:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in your <span>meta description</span>.', 'seo-pressor' ) );
					$priority = 10;
					break;
				case 192:
					$msg = sprintf( __( 'Add <span>keyword(s)</span> in your <span>meta description</span>.', 'seo-pressor' ) );
					$priority = 10;
					break;


				// Scope: Keyword in First 100 Words
				case 201:
					$msg = sprintf( __( 'Keyword(s) found in first 100 words.', 'seo-pressor' ) );
					$priority = 19;
					break;
				case 202:
					$msg = sprintf( __( 'Add your keyword(s) in the first 100 words.', 'seo-pressor' ) );
					$priority = 19;
					break;


				// Scope: Keyword in Last 100 Words
				case 211:
					$msg = sprintf( __( 'Keyword(s) found in last 100 words.', 'seo-pressor' ) );
					$priority = 20;
					break;
				case 212:
					$msg = sprintf( __( 'Add your keyword(s) in the last 100 words.', 'seo-pressor' ) );
					$priority = 20;
					break;


				// Scope: Keyword in First Sentence
				case 221:
					$msg = sprintf( __( 'Keyword(s) found in first sentence.', 'seo-pressor' ) );
					$priority = 21;
					break;
				case 222:
					$msg = sprintf( __( 'No keyword(s) found in first sentence.', 'seo-pressor' ) );
					$priority = 21;
					break;


				// Scope: Keyword in Last Sentence
				case 231:
					$msg = sprintf( __( 'Keyword(s) found in last sentence.', 'seo-pressor' ) );
					$priority = 22;
					break;
				case 232:
					$msg = sprintf( __( 'No keyword(s) found in last sentence.', 'seo-pressor' ) );
					$priority = 22;
					break;


				// Scope: Keyword in URL
				case 241:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in <span>URL</span>.', 'seo-pressor' ) );
					$priority = 5;
					break;
				case 242:
					$msg = sprintf( __( 'Add your <span>keyword(s)</span> in <span>URL</span>', 'seo-pressor' ) );
					$priority = 5;
					break;


				// Scope: Length of URL
				case 251:
					$msg = sprintf( __( 'URL length is excellent. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 6;
					break;
				case 252:
					$msg = sprintf( __( 'Reduce your <span>URL length</span>, it is <span>slightly too long</span>. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 6;
					break;
				case 253:
					$msg = sprintf( __( 'Reduce your <span>URL length</span>, it is <span>too long</span> and may be truncated. <span>(%d characters)</span>', 'seo-pressor' ), $value );
					$priority = 6;
					break;


				// Scope: Primary Decoration
				case 261:
					$msg = sprintf( __( 'Decorate your keywords to improve reading experience.', 'seo-pressor' ) );
					$priority = 17;
					break;
				case 262:
					$msg = sprintf( __( '<span>(%d) keyword(s)</span> is <span>decorated</span>.', 'seo-pressor' ), $value );
					$priority = 17;
					break;
				case 263:
					$msg = sprintf( __( 'Reduce the amount of keyword decorations. Using <span>too many keyword decorations</span> may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ) );
					$priority = 17;
					break;


				// Scope: Primary Heading Main
				case 271:
					$msg = sprintf( __( 'Include <span>keyword(s)</span> in your <span>H1 tag</span>.', 'seo-pressor' ) );
					$priority = 13;
					break;
				case 272:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in <span>H1 tag</span>', 'seo-pressor' ) );
					$priority = 13;
					break;
				case 273:
					$msg = sprintf( __( 'Reduce the amount of keywords in H1 tag. Using <span>too many keywords in H1 tag</span> may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ) );
					$priority = 13;
					break;


				// Scope: Primary Heading Minor
				case 281:
					$msg = sprintf( __( 'Include <span>keyword(s)</span> in your <span>H2</span> and <span>H3 tag</span>.', 'seo-pressor' ) );
					$priority = 15;
					break;
				case 282:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in <span>H2</span> and <span>H3 tag</span>.', 'seo-pressor' ) );
					$priority = 15;
					break;
				case 283:
					$msg = sprintf( __( 'Reduce the amount of keywords in H2 and H3 tags. Using <span>too many keywords</span> in <span>H2</span> and <span>H3</span> tags may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ) );
					$priority = 15;
					break;


				// Scope: Primary Images Alt
				case 291:
					$msg = sprintf( __( 'Include <span>keyword(s)</span> in your <span>image\'s ALT</span>.', 'seo-pressor' ) );
					$priority = 16;
					break;
				case 292:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in <span>image\'s ALT</span>.', 'seo-pressor' ) );
					$priority = 16;
					break;
				case 293:
					$msg = sprintf( __( 'Reduce the amount of keywords in image\'s ALT. Using <span>too many keywords in image\'s ALT</span> may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ) );
					$priority = 16;
					break;


				// Scope: Primary Link
				case 301:
					$msg = sprintf( __( 'Include <span>keyword(s)</span> in your <span>anchored link</span>.', 'seo-pressor' ) );
					$priority = 18;
					break;
				case 302:
					$msg = sprintf( __( '<span>Keyword(s)</span> found in <span>anchored link</span>.', 'seo-pressor' ) );
					$priority = 18;
					break;
				case 303:
					$msg = sprintf( __( 'Reduce the usage of keywords in anchored link. Using <span>too many keywords in anchored link</span> may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ) );
					$priority = 18;
					break;


				// Scope: Primary LSI
				case 311:
					$msg = sprintf( __( 'Use different LSI Keywords, using <span>too many</span> of the <span>same LSI keyword</span> may be treated as <span>unnatural optimization</span>.', 'seo-pressor' ), $value );
					$priority = 14;
					break;
				case 312:
					$msg = sprintf( __( '<span>Include LSI keywords</span> in your content to improve semantic value.', 'seo-pressor' ) );
					$priority = 14;
					break;
				case 313:
					$msg = sprintf( __( '<span>LSI Keyword(s) found</span> in your content. Great job!', 'seo-pressor' ) );
					$priority = 14;
					break;


			}

			return array(
				'msg' => $msg,
				'priority' => $priority
			);
		}

	}
}
