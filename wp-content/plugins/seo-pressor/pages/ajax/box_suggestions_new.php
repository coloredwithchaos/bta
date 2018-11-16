<?php
/**
 * Page to handle all Ajax requests from the Suggestions Box
 * All data will be returned using JSON format
 *
 * General variables:
 *
 * @uses	$_REQUEST['object']			required
 *
 * Return data
 *
 * @return	$data_to_return	if JSON format
 * @example	of data to return
 * 		$data_to_return = array(
				array('message'=>'Deleted successfully.', 'type'=>'notification')
		);
		$data_to_return = array(
				array('message'=>'Error in DB query.', 'type'=>'error')
		);

	http://<server test>/wp-content/plugins/seo-pressor/pages/ajax/box_suggestions.php?WPPostsRateKeys_keyword=seopressor&WPPostsRateKeys_keyword2=&WPPostsRateKeys_keyword3=&allow_keyword_overriding_in_sentences=&allow_meta_description=&allow_meta_keyword=&content=soy%20lety%0A&key_in_first_sentence=&key_in_last_sentence=&meta_description=&object=box&post_id=72&title=lety

 */

/** Loads the WordPress Environment */
if (!class_exists('WPPostsRateKeys')) {
	require(dirname(__FILE__) . '/../../../../../wp-load.php');
}

if (isset($_REQUEST['object'])) {
	/*
	 * Return the data that will be shown in the Box Content
	 */
	if ($_REQUEST['object']=='box') {

		$post_id = $_REQUEST['post_id'];

		// Include to process the request and store to database
		include(WPPostsRateKeys::$plugin_dir . '/includes/internal/process_post_data_ajax.php');


		$analysis_result = WPPostsRateKeys_WPPosts_New::get_seop_analyze_result( $post_id );


		if( !empty($analysis_result) )
		{
			// add suggestion message
			if( count($analysis_result['analysis']) > 0 )
			{
				$tmp = array();
				foreach( $analysis_result['analysis'] as $key=>$row )
				{
					$suggestion = WPPostsRateKeys_ContentRate::get_analysis_item_html( $row['code'], $row['status'], number_format( $row['value'], 2, '.', '' ) );

					if( !empty($suggestion['msg']) )
					{
						$tmp[] = array(
							'code' => $row['code'], // comment this when live
							'status' => $row['status'],
							'value' => $row['value'], // comment this when live
							'msg' => $suggestion['msg'],
							'sort' => $suggestion['priority'] // comment this when live
						);
					}
				}

				usort( $tmp, function($a, $b) {
					return $a['sort'] - $b['sort'];
				} );

				$analysis_result['analysis'] = $tmp;
			}


			// format output readability, density
			$analysis_result['readability'] = number_format( $analysis_result['readability'], 2 );
			$analysis_result['density'] = number_format( $analysis_result['density'], 2 );

			// add lsi message
			if( count($analysis_result['lsi_keywords']) > 0 )
			{
				foreach( $analysis_result['lsi_keywords'] as $key=>$lsi_keyword_arr )
				{
					if( count($lsi_keyword_arr['lsi']) > 0 )
					{
						$analysis_result['lsi_keywords'][$key]['message'] = '';
					}
					else
					{
						$analysis_result['lsi_keywords'][$key]['message'] = __('Opps, seems like there\'s no<br/>
LSI keyword for your keyword.', 'seo-pressor' );
					}
				}
			}


		}


		// compose message to frontend
		$message = array();
		if( count($keywords) <= 0 || $analysis_result == '' )
		{
			$message['analysis'] = __('Enter keyword for SEO analysis.', 'seo-pressor');
			$message['lsi'] = __('Enter keyword for LSI suggestion.', 'seo-pressor');
		}
		elseif( is_null($analysis_result) )
		{
			$message['analysis'] = __('Unable to connect to the server. Please try again later.', 'seo-pressor');
			$message['lsi'] = __('Unable to connect to the server. Please try again later.', 'seo-pressor');
		}
		else
		{
			if( count($analysis_result['analysis']) <= 0 )
			{
				$message['analysis'] = __('No suggestion.', 'seo-pressor');
			}
			else
			{
				$message['analysis'] = '';
			}
			if( $analysis_result['lsi_status'] == 1 )
			{
				$message['lsi'] = __('You\'ve exceeded your LSI analysis limit. For more analysis, <a href="http://seopressor.com/learn/#lsi_quota" target="_blank">visit here</a>.', 'seo-pressor');
			}
			else
			{
				$message['lsi'] = '';
			}
		}



		/* Ajax Return Data */
		$data_to_return = array(
			"box_settings" 		=> $box_settings,
			"keywords" 			=> $keywords,
			"analysis" 			=> $analysis_result,
			"message"			=> $message
		);



		$json = json_encode($data_to_return);
		echo $json;
		exit();
	}
}
