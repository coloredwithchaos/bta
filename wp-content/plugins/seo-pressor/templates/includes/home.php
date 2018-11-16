<?php
echo PHP_EOL.'<!-- Begin SEOPressor Code -->' . PHP_EOL;
				
// Meta Settings
if( isset($settings['seop_home_description']) && !empty($settings['seop_home_description']) )
{
	echo '<meta name="description" content="' . esc_attr( trim($settings['seop_home_description']) ) . '" />' . PHP_EOL;
}
else
{
	if( $settings['on_page_automate_description'] == 1 )
		echo '<meta name="description" content="' . esc_attr( trim($blog_description) ) . '" />' . PHP_EOL;
}
if( isset($settings['seop_home_canonical']) && !empty($settings['seop_home_canonical']) )
{
	echo '<link rel="canonical" href="' . esc_url(trim($settings['seop_home_canonical'])) . '" />' . PHP_EOL;
}
else
{
	if( $settings['on_page_automate_canonical'] == 1 )
		echo '<link rel="canonical" href="' . esc_url(get_bloginfo('wpurl')) . '" />' . PHP_EOL;
}
if( isset($settings['seop_home_robot']) && !empty($settings['seop_home_robot']) )
	echo '<meta name="robots" value="' . esc_attr( implode(', ', $settings['seop_home_robot']) ) . '" />' . PHP_EOL;

// Schema Snippets
$schema = array();
$schema['@context'] 	= "http://schema.org";
$schema['@type'] 		= "Organization";
$schema['url']			= get_bloginfo( 'url' );
$schema['name']			= get_bloginfo( 'name' );
if( isset($settings['seop_home_logo']) && !empty($settings['seop_home_logo']) )
	$schema['logo']		= $settings['seop_home_logo'];
if( isset($settings['seop_home_contact']) && count($settings['seop_home_contact']) > 0 )
{
	$tmp_contact = array();
	foreach( $settings['seop_home_contact'] as $contact_item )
	{
		$tmp_contact[] = array(
			'@type' 		=> 'ContactPoint',
			'telephone' 	=> '+' . $contact_item['contact'],
			'contactType' 	=> $contact_item['contact_type']
		);
	}
	$schema['contactPoint'] = $tmp_contact;
}
if( isset($settings['seop_home_social']) && count($settings['seop_home_social']) > 0 )
{
	$tmp_social = array();
	foreach( $settings['seop_home_social'] as $social_item )
	{
		$tmp_social[] = $social_item['social'];
	}
	$schema['sameAs'] = $tmp_social;
}
echo PHP_EOL . '<!-- Schema.Org -->' . PHP_EOL;
echo '<script type="application/ld+json">' . PHP_EOL;
echo json_encode( $schema ) . PHP_EOL;
echo '</script>' . PHP_EOL;

// Facebook Open Graph
if( isset($settings['seop_home_fb_enable']) && intval($settings['seop_home_fb_enable']) == 1 )
{
	echo PHP_EOL . '<!-- Facebook Open Graph Tags -->' . PHP_EOL;
	echo '<meta property="og:type" content="Website" />' . PHP_EOL;
	if( isset($settings['seop_home_fb_title']) && !empty($settings['seop_home_fb_title']) )
		echo '<meta property="og:title" content="' . esc_attr( $settings['seop_home_fb_title'] ) . '" />' . PHP_EOL;
	else
		echo '<meta property="og:title" content="' . esc_attr( get_bloginfo('name') ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_fb_description']) && !empty($settings['seop_home_fb_description']) )
		echo '<meta property="og:description" content="' . esc_attr( $settings['seop_home_fb_description'] ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_fb_image']) && !empty($settings['seop_home_fb_image']) )
		echo '<meta property="og:image" content="' . esc_attr( $settings['seop_home_fb_image'] ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_fb_publisher']) && !empty($settings['seop_home_fb_publisher']) )
		echo '<meta property="article:publisher" content="' . esc_attr( $settings['seop_home_fb_publisher'] ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_fb_author']) && !empty($settings['seop_home_fb_author']) )
		echo '<meta property="article:author" content="' . esc_attr( $settings['seop_home_fb_author'] ) . '" />' . PHP_EOL;
	
}

// Twittr Card
if( isset($settings['seop_home_tw_enable']) && intval($settings['seop_home_tw_enable']) == 1 )
{
	echo PHP_EOL . '<!-- Twitter Cards -->' . PHP_EOL;
	echo '<meta property="twitter:card" content="summary" />' . PHP_EOL;
	if( isset($settings['seop_home_profile']) && !empty($settings['seop_home_profile']) )
		echo '<meta property="twitter:site" content="' . esc_attr( $settings['seop_home_profile'] ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_tw_title']) && !empty($settings['seop_home_tw_title']) )
		echo '<meta property="twitter:title" content="' . esc_attr( $settings['seop_home_tw_title'] ) . '" />' . PHP_EOL;
	else
		echo '<meta property="twitter:title" content="' . esc_attr( get_bloginfo('name') ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_tw_description']) && !empty($settings['seop_home_tw_description']) )
		echo '<meta property="twitter:description" content="' . esc_attr( $settings['seop_home_tw_description'] ) . '" />' . PHP_EOL;
	if( isset($settings['seop_home_image']) && !empty($settings['seop_home_image']) )
		echo '<meta property="twitter:image" content="' . esc_attr( $settings['seop_home_image'] ) . '" />' . PHP_EOL;
}
	
echo '<!-- End SEOPressor Code -->' . PHP_EOL . PHP_EOL;