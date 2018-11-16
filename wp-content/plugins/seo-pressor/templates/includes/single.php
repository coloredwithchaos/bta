<?php
echo PHP_EOL.'<!-- Begin SEOPressor Code -->' . PHP_EOL;


if( isset($box_setting['meta_description']) && !empty($box_setting['meta_description']) )
{
	echo '<meta name="description" content="' . esc_attr( trim($box_setting['meta_description']) ) . '" />' . PHP_EOL;
}
else
{
	if( $settings['on_page_automate_description'] == 1 )
		echo '<meta name="description" content="' . esc_attr( $meta_description ) . '" />' . PHP_EOL;
}

if( isset($box_setting['meta_rules']) && !empty($box_setting['meta_rules']) )
{
	$meta_rules_value = str_replace('#|#|#', ', ', $box_setting['meta_rules']);
	echo '<meta name="robots" value="' . esc_attr( $meta_rules_value ) . '" />' . PHP_EOL;
}

if( isset($box_setting['meta_canonical']) && !empty($box_setting['meta_canonical']) )
{
	echo '<link rel="canonical" href="' . esc_url(trim($box_setting['meta_canonical'])) . '" />' . PHP_EOL;
}
else
{
	if( $settings['on_page_automate_canonical'] == 1 )
		echo '<link rel="canonical" href="' . esc_url(get_permalink($post_id)) . '" />' . PHP_EOL;
}

// 301 redirect


// FACEBOOK OG TAG
if( isset($box_setting['fb_enable']) && intval($box_setting['fb_enable']) == 1 )
{
	
	echo PHP_EOL . '<!-- Facebook Open Graph Tags -->' . PHP_EOL;
	
	if( isset($box_setting['fb_type']) && !empty($box_setting['fb_type']) )
		echo '<meta property="og:type" content="' . esc_attr( $box_setting['fb_type'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_title']) && !empty($box_setting['fb_title']) )
		$og_title = $box_setting['fb_title'];
	else
		$og_title = $meta_title;
	echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . PHP_EOL;
		
	if( isset($box_setting['fb_site_name']) && !empty($box_setting['fb_site_name']) )
		echo '<meta property="og:site_name" content="' . esc_attr( $box_setting['fb_site_name'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_url']) && !empty($box_setting['fb_url']) )
		echo '<meta property="og:url" content="' . esc_url( $box_setting['fb_url'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_description']) && !empty($box_setting['fb_description']) )
		$og_description = $box_setting['fb_description'];
	else
		$og_description = $meta_description;
	echo '<meta property="og:description" content="' . esc_attr( $og_description ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_img']) && !empty($box_setting['fb_img']) )
		echo '<meta property="og:image" content="' . esc_attr( $box_setting['fb_img'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_publisher']) && !empty($box_setting['fb_publisher']) )
		$og_publisher = $box_setting['fb_publisher'];
	else
		$og_publisher = get_the_author_meta( 'seopressor_facebook_og_author', $post->post_author );
	echo '<meta property="article:publisher" content="' . esc_attr( $og_publisher ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_author']) && !empty($box_setting['fb_author']) )
		$og_author = $box_setting['fb_author'];
	else
		$og_author = get_the_author_meta( 'seopressor_facebook_og_author', $post->post_author );
	echo '<meta property="article:author" content="' . esc_attr( $og_author ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['fb_admin']) && !empty($box_setting['fb_admin']) )
	{
		$fb_admin_arr = explode("\n", $box_setting['fb_admin']);
		if( count($fb_admin_arr) > 0 )
		{
			foreach($fb_admin_arr as $fb_admin)
			{
				$fb_admin = trim($fb_admin);
				if( !empty($fb_admin) )
					echo '<meta property="fb:admins" content="' . esc_attr( $fb_admin ) . '" />' . PHP_EOL;
			}
		}
	}
	
	if( isset($box_setting['fb_appid']) && !empty($box_setting['fb_appid']) )
		echo '<meta property="fb:app_id" content="' . esc_attr( $box_setting['fb_appid'] ) . '" />' . PHP_EOL;

}


// TWITTER CARD
if( isset($box_setting['tw_enable']) && intval($box_setting['tw_enable']) == 1 )
{
	
	echo PHP_EOL . '<!-- Twitter Cards -->' . PHP_EOL;
	
	if( isset($box_setting['tw_type']) && !empty($box_setting['tw_type']) )
		echo '<meta property="twitter:card" content="' . esc_attr( $box_setting['tw_type'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['tw_site']) && !empty($box_setting['tw_site']) )
		echo '<meta property="twitter:site" content="@' . esc_attr( $box_setting['tw_site'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['tw_creator']) && !empty($box_setting['tw_creator']) )
		echo '<meta property="twitter:creator" content="@' . esc_attr( $box_setting['tw_creator'] ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['tw_title']) && !empty($box_setting['tw_title']) )
		$tw_title = $box_setting['tw_title'];
	else
		$tw_title = $meta_title;
	echo '<meta property="twitter:title" content="' . esc_attr( $tw_title ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['tw_description']) && !empty($box_setting['tw_description']) )
		$tw_description = $box_setting['tw_description'];
	else
		$tw_description = $meta_description;
	echo '<meta property="twitter:description" content="' . esc_attr( $tw_description ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['tw_image']) && !empty($box_setting['tw_image']) )
		echo '<meta property="twitter:image" content="' . esc_attr( $box_setting['tw_image'] ) . '" />' . PHP_EOL;

}


// DUBLIN CORE
if( isset($box_setting['dc_enable']) && intval($box_setting['dc_enable']) == 1 )
{
	
	echo PHP_EOL . '<!-- Dublin Core -->' . PHP_EOL;
	
	if( isset($box_setting['dc_type']) && !empty($box_setting['dc_type']) )
		echo '<meta name="DC.Type" content="' . esc_attr( $box_setting['dc_type'] ) . '" />' . PHP_EOL;
		
	if( isset($box_setting['dc_title']) && !empty($box_setting['dc_title']) )
		$dc_title = $box_setting['dc_title'];
	else
		$dc_title = $meta_title;
	echo '<meta name="DC.Title" content="' . esc_attr( $dc_title ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['dc_description']) && !empty($box_setting['dc_description']) )
		$dc_description = $box_setting['dc_description'];
	else
		$dc_description = $meta_description;
	echo '<meta name="DC.Description" content="' . esc_attr( $dc_description ) . '" />' . PHP_EOL;
	
	if( isset($box_setting['dc_creator']) && !empty($box_setting['dc_creator']) )
		echo '<meta name="DC.Creator" content="' . esc_attr( $box_setting['dc_creator'] ) . '" />' . PHP_EOL;
	
	$post_date = new DateTime( $post->post_date );
	$post_date_iso = $post_date->format(DateTime::ISO8601);
	echo '<meta name="DC.Date" content="' . $post_date_iso . '" />' . PHP_EOL;
	
}


// SCHEMA.ORG
if( isset($box_setting['schema_enable']) && intval($box_setting['schema_enable']) == 1 )
{
	if( isset($box_setting['schema_type']) && !empty($box_setting['schema_type']) )
	{
		$schema = array();
		$schema['@context'] 	= "http://schema.org";
		$schema['@type'] 		= $box_setting['schema_type'];
		switch( $box_setting['schema_type'] )
		{
			case "NewsArticle":
				
				if( isset($box_setting['schema_NewsArticle_type']) && !empty($box_setting['schema_NewsArticle_type']) )
					$schema['@type'] = $box_setting['schema_NewsArticle_type'];
				
				$schema['mainentityofpage'] = array(
					'@type' => 'webpage',
					'@id' => get_permalink($post->ID)
				);
				
				if( isset($box_setting['schema_NewsArticle_headline']) && !empty($box_setting['schema_NewsArticle_headline']) )
					$schema['headline'] = $box_setting['schema_NewsArticle_headline'];
				else
					$schema['headline'] = $meta_title;
				
				if( isset($box_setting['schema_NewsArticle_description']) && !empty($box_setting['schema_NewsArticle_description']) )
					$schema['description'] = $box_setting['schema_NewsArticle_description'];
				else
					$schema['description'] = $meta_description;
				
				$schema['author'] = get_the_author_meta( 'display_name', $post->post_author );
				
				$schema['datePublished'] = $date_published->format('Y-m-d');
				
				$schema['dateModified'] = $date_modified->format('Y-m-d');
				
				if( isset($box_setting['schema_NewsArticle_image']) && !empty($box_setting['schema_NewsArticle_image']) )
				{
					list( $width, $height, $type, $attr ) = @getimagesize($box_setting['schema_NewsArticle_image']);
					$schema['image'] = array(
						'@type' => 'ImageObject',
						'url' => $box_setting['schema_NewsArticle_image'],
						'width' => $width,
						'height' => $height
					);
				}
				
				$schema['publisher']['@type'] = 'Organization';
				if( isset($box_setting['schema_NewsArticle_pubname']) && !empty($box_setting['schema_NewsArticle_pubname']) )
					$schema['publisher']['name'] = $box_setting['schema_NewsArticle_pubname'];
				
				if( isset($box_setting['schema_NewsArticle_publogo']) && !empty($box_setting['schema_NewsArticle_publogo']) )
				{
					$schema['publisher']['logo'] = array(
						'@type' => 'ImageObject',
						'url' => $box_setting['schema_NewsArticle_publogo']
					);
				}

				break;
			case "Product":
				
				if( isset($box_setting['schema_Product_name']) && !empty($box_setting['schema_Product_name']) )
					$schema['name'] = $box_setting['schema_Product_name'];
				else
					$schema['name'] = $meta_title;
				
				if( isset($box_setting['schema_Product_image']) && !empty($box_setting['schema_Product_image']) )
					$schema['image'] = $box_setting['schema_Product_image'];
				
				if( isset($box_setting['schema_Product_description']) && !empty($box_setting['schema_Product_description']) )
					$schema['description'] = $box_setting['schema_Product_description'];
				else
					$schema['description'] = $meta_description;
				
				if( isset($box_setting['schema_Product_brand']) && !empty($box_setting['schema_Product_brand']) )
				{
					$schema['brand']['@type'] = "Thing";
					$schema['brand']['name'] = $box_setting['schema_Product_brand'];
				}
				
				$aggregateRating = array();
				if( isset($box_setting['schema_Product_rating']) && !empty($box_setting['schema_Product_rating']) )
				{
					$aggregateRating['ratingValue'] = $box_setting['schema_Product_rating'];
				}
				if( isset($box_setting['schema_Product_review']) && !empty($box_setting['schema_Product_review']) )
				{
					$aggregateRating['reviewCount'] = $box_setting['schema_Product_review'];
				}
				if( count($aggregateRating) > 0 )
				{
					$aggregateRating['@type'] = "AggregateRating";
					$schema['aggregateRating'] = $aggregateRating;
				}
				
				$offers = array();
				if( isset($box_setting['schema_Product_price']) && !empty($box_setting['schema_Product_price']) )
				{
					$offers['price'] = $box_setting['schema_Product_price'];
				}
				if( isset($box_setting['schema_Product_currency']) && !empty($box_setting['schema_Product_currency']) )
				{
					$offers['priceCurrency'] = $box_setting['schema_Product_currency'];
				}
				if( isset($box_setting['schema_Product_availability']) && !empty($box_setting['schema_Product_availability']) )
				{
					$offers['availability'] = $box_setting['schema_Product_availability'];
				}
				if( isset($box_setting['schema_Product_condition']) && !empty($box_setting['schema_Product_condition']) )
				{
					$offers['itemCondition'] = $box_setting['schema_Product_condition'];
				}
				if( count($offers) > 0 )
				{
					$offers['@type'] = "Offer";
					$schema['offers'] = $offers;
				}
				
				break;
			case 'Service':
				if( isset($box_setting['schema_Service_type']) && !empty($box_setting['schema_Service_type']) )
				{
					$schema['serviceType'] = $box_setting['schema_Service_type'];
				}
				
				$provider = array();
				if( isset($box_setting['schema_Service_provider_type']) && !empty($box_setting['schema_Service_provider_type']) )
				{
					$provider['@type'] = $box_setting['schema_Service_provider_type'];
				}
				if( isset($box_setting['schema_Service_provider_name']) && !empty($box_setting['schema_Service_provider_name']) )
				{
					$provider['name'] = $box_setting['schema_Service_provider_name'];
				}
				if( count($provider) > 0 )
				{
					$schema['provider'] = $provider;
				}
				
				$aggregateRating = array();
				if( isset($box_setting['schema_Service_rating']) && !empty($box_setting['schema_Service_rating']) )
				{
					$aggregateRating['ratingValue'] = $box_setting['schema_Service_rating'];
				}
				if( isset($box_setting['schema_Service_review']) && !empty($box_setting['schema_Service_review']) )
				{
					$aggregateRating['reviewCount'] = $box_setting['schema_Service_review'];
				}
				if( count($aggregateRating) > 0 )
				{
					$aggregateRating['@type'] = "AggregateRating";
					$schema['aggregateRating'] = $aggregateRating;
				}
				break;
			case "Recipe":
				
				if( isset($box_setting['schema_Recipe_name']) && !empty($box_setting['schema_Recipe_name']) )
					$schema['name'] = $box_setting['schema_Recipe_name'];
				else
					$schema['name'] = $meta_title;
				
				if( isset($box_setting['schema_Recipe_category']) && !empty($box_setting['schema_Recipe_category']) )
					$schema['recipeCategory'] = $box_setting['schema_Recipe_category'];
				
				if( isset($box_setting['schema_Recipe_image']) && !empty($box_setting['schema_Recipe_image']) )
					$schema['image'] = $box_setting['schema_Recipe_image'];
				
				if( isset($box_setting['schema_Recipe_description']) && !empty($box_setting['schema_Recipe_description']) )
					$schema['description'] = $box_setting['schema_Recipe_description'];
				else
					$schema['description'] = $meta_description;
				
				$schema['author']['@type'] = "Person";
				$schema['author']['name'] = get_the_author_meta( 'display_name', $post->post_author );
				$schema['datePublished'] = $post->post_date;
				
				$aggregateRating = array();
				if( isset($box_setting['schema_Recipe_rating']) && !empty($box_setting['schema_Recipe_rating']) )
				{
					$aggregateRating['ratingValue'] = $box_setting['schema_Recipe_rating'];
				}
				if( isset($box_setting['schema_Recipe_review']) && !empty($box_setting['schema_Recipe_review']) )
				{
					$aggregateRating['reviewCount'] = $box_setting['schema_Recipe_review'];
				}
				if( count($aggregateRating) > 0 )
				{
					$aggregateRating['@type'] = "AggregateRating";
					$schema['aggregateRating'] = $aggregateRating;
				}
				
				if( isset($box_setting['schema_Recipe_time_preparation']) && !empty($box_setting['schema_Recipe_time_preparation']) )
				{
					$recipe_prepTime = WPPostsRateKeys_Miscellaneous::time_to_iso8601_duration( intval($box_setting['schema_Recipe_time_preparation']) * 60 );
					if( $recipe_prepTime !== false )
					{
						$schema['prepTime'] = $recipe_prepTime;
					}
				}
				
				if( isset($box_setting['schema_Recipe_time_cook']) && !empty($box_setting['schema_Recipe_time_cook']) )
				{
					$recipe_cookTime = WPPostsRateKeys_Miscellaneous::time_to_iso8601_duration( intval($box_setting['schema_Recipe_time_cook']) * 60 );
					if( $recipe_cookTime !== false )
					{
						$schema['cookTime'] = $recipe_cookTime;
					}
				}
				
				if( isset($box_setting['schema_Recipe_time_total']) && !empty($box_setting['schema_Recipe_time_total']) )
				{
					$recipe_totalTime = WPPostsRateKeys_Miscellaneous::time_to_iso8601_duration( intval($box_setting['schema_Recipe_time_total']) * 60 );
					if( $recipe_totalTime !== false )
					{
						$schema['totalTime'] = $recipe_totalTime;
					}
				}
				
				$NutritionInformation = array();
				if( isset($box_setting['schema_Recipe_calories']) && !empty($box_setting['schema_Recipe_calories']) )
					$NutritionInformation['calories'] = $box_setting['schema_Recipe_calories'];
				if( isset($box_setting['schema_Recipe_size']) && !empty($box_setting['schema_Recipe_size']) )
					$NutritionInformation['servingSize'] = $box_setting['schema_Recipe_size'];
				if( count($NutritionInformation) > 0 )
				{
					$NutritionInformation['@type'] = "NutritionInformation";
					$schema['nutrition'] = $NutritionInformation;
				}
				
				if( isset($box_setting['schema_Recipe_yield']) && !empty($box_setting['schema_Recipe_yield']) )
					$schema['recipeYield'] = $box_setting['schema_Recipe_yield'];
				
				if( isset($box_setting['schema_Recipe_ingredients']) && !empty($box_setting['schema_Recipe_ingredients']) )
				{
					$ingredients = trim( $box_setting['schema_Recipe_ingredients'] );
					$ingredients_arr = explode( "\n", $ingredients );
					$ingredients_arr = array_filter( $ingredients_arr, 'trim' );
					if( count($ingredients_arr) > 0 ) 
					{
						$schema['ingredients'] = $ingredients_arr;
					}
				}
				
				break;
			case "Review":
				
				if( isset($box_setting['schema_Review_item']) && !empty($box_setting['schema_Review_item']) )
				{
					$schema['itemReviewed']['@type'] = $box_setting['schema_Review_item'];
					$schema['itemReviewed']['name'] = $meta_title;
					
					switch( $box_setting['schema_Review_item'] )
					{
						case 'Article':
							$schema['itemReviewed']['author'] = $box_setting['schema_Review_article_author'];
							$schema['itemReviewed']['headline'] = $box_setting['schema_Review_article_headline'];
							list( $width, $height, $type, $attr ) = @getimagesize($box_setting['schema_Review_article_image']);
							$schema['itemReviewed']['image'] = array(
								'@type' => 'ImageObject',
								'url' => $box_setting['schema_Review_article_image'],
								'width' => $width,
								'height' => $height
							);
							$schema['itemReviewed']['publisher'] = array(
								'@type' => 'Organization',
								'name' => $box_setting['schema_Review_article_publisher'],
								'logo' => array(
									'@type' => 'ImageObject',
									'url' => $box_setting['schema_Review_article_publisherlogo']
								)
							);
							$schema['itemReviewed']['datePublished'] = $date_published->format('Y-m-d');
							$schema['itemReviewed']['dateModified'] = $date_modified->format('Y-m-d');
							$schema['itemReviewed']['mainEntityOfPage'] = 'webpage';
							break;
						
						case 'Book':
							$schema['itemReviewed']['author'] = array(
								'name' => $box_setting['schema_Review_book_author'],
								'sameAs' => $box_setting['schema_Review_book_authorsameas']
							);
							$schema['itemReviewed']['isbn'] = $box_setting['schema_Review_book_isbn'];
							$schema['description'] = $box_setting['schema_Review_book_description'];
							$schema['publisher'] = $box_setting['schema_Review_book_publisher'];
							$schema['datePublished'] = $date_published->format('Y-m-d');
							$schema['url'] = $url;
							break;
						
						case 'Movie':
							$schema['itemReviewed']['sameAs'] = $box_setting['schema_Review_movie_sameas'];
							$schema['datePublished'] = $date_published->format('Y-m-d');
							$schema['description'] = $box_setting['schema_Review_movie_description'];
							$schema['publisher'] = $box_setting['schema_Review_movie_publisher'];
							break;
							
						case 'SoftwareApplication':
							$schema['itemReviewed']['applicationCategory'] = $box_setting['schema_Review_software_category'];
							$schema['itemReviewed']['operatingSystem'] = $box_setting['schema_Review_software_os'];
							break;
					}
				}
				
				if( isset($box_setting['schema_Review_rating']) && !empty($box_setting['schema_Review_rating']) )
				{
					$schema['reviewRating']['@type'] = "Rating";
					$schema['reviewRating']['ratingValue'] = $box_setting['schema_Review_rating'];
				}
				
				$schema['name'] = $meta_title;
				$schema['reviewBody'] = $meta_description;
				$schema['author']['@type'] = "Person";
				$schema['author']['name'] = get_the_author_meta( 'display_name', $post->post_author );
				$schema['author']['sameAs'] = $author_url;
				
				break;
			case "Event":
				
				if( isset($box_setting['schema_Event_name']) && !empty($box_setting['schema_Event_name']) )
					$schema['name'] = $box_setting['schema_Event_name'];
				else
					$schema['name'] = $meta_title;
				
				$location = array();
				if( isset($box_setting['schema_Event_location']) && !empty($box_setting['schema_Event_location']) )
					$location['name'] = $box_setting['schema_Event_location'];
				if( isset($box_setting['schema_Event_address']) && !empty($box_setting['schema_Event_address']) )
					$location['address'] = $box_setting['schema_Event_address'];
				if( count($location) > 0 )
				{
					$location['@type'] = "Place";
					$schema['location'] = $location;
				}
				
				if( isset($box_setting['schema_Event_date']) && !empty($box_setting['schema_Event_date']) )
					$schema['startDate'] = $box_setting['schema_Event_date'];
				
				$schema['url'] = $url;
				
				break;
			case "SoftwareApplication":
				
				if( isset($box_setting['schema_SoftwareApplication_name']) && !empty($box_setting['schema_SoftwareApplication_name']) )
					$schema['name'] = $box_setting['schema_SoftwareApplication_name'];
				else
					$schema['name'] = $meta_title;
				
				if( isset($box_setting['schema_SoftwareApplication_category']) && !empty($box_setting['schema_SoftwareApplication_category']) )
					$schema['applicationCategory'] = $box_setting['schema_SoftwareApplication_category'];
					
				$aggregateRating = array();
				if( isset($box_setting['schema_SoftwareApplication_rating']) && !empty($box_setting['schema_SoftwareApplication_rating']) )
				{
					$aggregateRating['ratingValue'] = $box_setting['schema_SoftwareApplication_rating'];
				}
				if( isset($box_setting['schema_SoftwareApplication_review']) && !empty($box_setting['schema_SoftwareApplication_review']) )
				{
					$aggregateRating['reviewCount'] = $box_setting['schema_SoftwareApplication_review'];
				}
				if( count($aggregateRating) > 0 )
				{
					$aggregateRating['@type'] = "AggregateRating";
					$schema['aggregateRating'] = $aggregateRating;
				}
				
				$offers = array();
				if( isset($box_setting['schema_SoftwareApplication_price']) && !empty($box_setting['schema_SoftwareApplication_price']) )
				{
					$offers['price'] = $box_setting['schema_SoftwareApplication_price'];
				}
				if( isset($box_setting['schema_SoftwareApplication_currency']) && !empty($box_setting['schema_SoftwareApplication_currency']) )
				{
					$offers['priceCurrency'] = $box_setting['schema_SoftwareApplication_currency'];
				}
				if( count($offers) > 0 )
				{
					$offers['@type'] = "Offer";
					$schema['offers'] = $offers;
				}
				
				if( isset($box_setting['schema_SoftwareApplication_os']) && !empty($box_setting['schema_SoftwareApplication_os']) )
				{
					$schema['operatingSystem'] = $box_setting['schema_SoftwareApplication_os'];
				}
				
				break;
			case "VideoObject":
				
				if( isset($box_setting['schema_Video_name']) && !empty($box_setting['schema_Video_name']) )
					$schema['name'] = $box_setting['schema_Video_name'];
				else
					$schema['name'] = $meta_title;
				
				if( isset($box_setting['schema_Video_description']) && !empty($box_setting['schema_Video_description']) )
					$schema['description'] = $box_setting['schema_Video_description'];
				else
					$schema['description'] = $meta_description;
				
				if( isset($box_setting['schema_Video_thumbnail']) && !empty($box_setting['schema_Video_thumbnail']) )
					$schema['thumbnailUrl'] = $box_setting['schema_Video_thumbnail'];
				
				if( isset($box_setting['schema_Video_date']) && !empty($box_setting['schema_Video_date']) )
					$schema['uploadDate'] = $box_setting['schema_Video_date'];
				
				if( isset($box_setting['schema_Video_duration']) && !empty($box_setting['schema_Video_duration']) )
				{
					$duration = WPPostsRateKeys_Miscellaneous::time_to_iso8601_duration( intval($box_setting['schema_Video_duration']) * 60 );
					if( $duration !== false )
					{
						$schema['duration'] = $duration;
					}
				}
					
				if( isset($box_setting['schema_Video_url']) && !empty($box_setting['schema_Video_url']) )
					$schema['contentUrl'] = $box_setting['schema_Video_url'];
				
				if( isset($box_setting['schema_Video_url_embed']) && !empty($box_setting['schema_Video_url_embed']) )
					$schema['embedUrl'] = $box_setting['schema_Video_url_embed'];
				
				break;
		}
		
		
		echo PHP_EOL . '<!-- Schema.Org -->' . PHP_EOL;
		echo '<script type="application/ld+json">' . PHP_EOL;
		echo json_encode( $schema ) . PHP_EOL;
		echo '</script>' . PHP_EOL;
	}
	
	
	
}

echo '<!-- End SEOPressor Code -->' . PHP_EOL . PHP_EOL;