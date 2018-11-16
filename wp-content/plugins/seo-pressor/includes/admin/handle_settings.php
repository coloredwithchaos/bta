<?php
/**
 * Include to show the plugin settings
 *
 * @package admin-panel
 * 
 */
// Check if user can access the list of Posts/Pages
$seopressor_has_permission = TRUE;
if( !WPPostsRateKeys_CustomRoles::user_can( 'plugin_setting' ) )
{
	$msg_error[] = __('You need permission to access this item. Please check with WordPress or SEOPressor plugin administrator.','seo-pressor');
	$seopressor_has_permission = FALSE;
}

$seopressor_is_active = TRUE;
if( !WPPostsRateKeys_Settings::get_active() )
{
	//$msg_error[] = __('Activate SEOPressor.', 'seo-pressor');
	$seopressor_is_active = FALSE;
}




/*
 * Code for server requirements checking
 */
$requirement_msg_arr = array();

// WordPress version
global $wp_version;
$requirement_msg_arr[] = array( version_compare( $wp_version, "3.4.2", "<" ) ? 0 : 1, __('This plugin requires WordPress version 3.4.2 or newer. <br/>Your current version is: ', 'seo-pressor') . $wp_version );

// PHP version
$phpversion = phpversion();
$requirement_msg_arr[] = array( version_compare( $phpversion, "5.3", "<" ) ? 0 : 1, __('This plugin requires PHP version 5.3 or newer. <br/>Your current version is: ', 'seo-pressor') . $phpversion );

// MultiByte support
if( !function_exists('mb_convert_encoding') ) 
{
	$message = __('Please install <a href="http://php.net/manual/en/book.mbstring.php" target="_blank">PHP Multibyte String extension</a> on your server.','seo-pressor');
	$requirement_msg_arr[] = array(0,$message);
	// Disable the option
	$settings_opts = WPPostsRateKeys_Settings::get_options();
	$settings_opts['support_multibyte'] = '0';
	WPPostsRateKeys_Settings::update_options($settings_opts);
}
else 
{
	$message = __('<a href="http://php.net/manual/en/book.mbstring.php" target="_blank">PHP Multibyte String extension</a> is installed on your server.','seo-pressor');
	$requirement_msg_arr[] = array(1,$message);
}

// Outgoing connections
if( !WPPostsRateKeys_Upgrade::check_for_outgoing_connections(TRUE) ) 
{
	$message = __('Oops, there seems to be a problem connecting to SEOPressor. Please try again later.', 'seo-pressor');
	$requirement_msg_arr[] = array(0,$message);
}
else 
{
	$message = __('You are connected to SEOPressor.','seo-pressor');
	$requirement_msg_arr[] = array(1,$message);
}





/*
 * Only execute if plugin is active and permission granted
 */
if( $seopressor_has_permission && $seopressor_is_active ) 
{
	
	/* 
	 * advanced setting 
	 */
	$data = WPPostsRateKeys_Settings::get_options();
	$data['special_characters_to_omit'] = implode("\n", explode(WPPostsRateKeys_Settings::SPEC_CHARS_DELIMITER, $data['special_characters_to_omit']));
	
	// Get available languages: all locales in files at /lang/ 
	$all_locales = array();
	$lang_dir = WPPostsRateKeys::$plugin_dir . '/lang/';
	if ($handle = opendir($lang_dir) ) 
	{
	    while (false !== ($file = readdir($handle))) 
		{
	    	if (!is_dir($lang_dir . $file) && $file!='.' && $file!='..' && substr_count($file,'.mo')>0 && $file!='default.mo') 
			{ // Only .mo files
	        	$domain = str_ireplace('seo-pressor-','',$file);
	        	$domain = str_ireplace('.mo','',$domain);
	        	
	        	$all_locales[] = $domain;
	    	}
	    }
	    closedir($handle);
	}
	
		
	/*
	 * Check Requirements to Auto-Upgrade
	 */
	// Check if is needed the upgrade
	if( !version_compare( $data['current_version'], $data['last_version'], "<" ) ) 
	{
		$need_upgrade = FALSE;
	}
	else
	{
		$need_upgrade = TRUE;
		$msg_error[] = __("New SEOPressor version is available. You can go to 'Plugin Update' tab or <a href='http://seopressor.com/download/download.php' target='_blank'>download the latest version</a> and update it manually.",'seo-pressor');
	}
	
	
	// Check if Class ZipArchive exists
	$zip_archive_requirement = TRUE;
	if( !WPPostsRateKeys_Upgrade::check_for_ziparchive_class() ) 
	{
		$zip_archive_requirement = FALSE;
	}
	
	// Check if allowed outgoing connection
	$outgoing_connection_requirement = TRUE;
	if( !WPPostsRateKeys_Upgrade::check_for_outgoing_connections() ) 
	{
		$outgoing_connection_requirement = FALSE;
	}
	
	// Check write permission
	$write_permission_requirement = TRUE;
	$check_for_write_permission = WPPostsRateKeys_Upgrade::check_for_write_permission();
	$file_list_msg = __('Write permission on plugin folder.', 'seo-pressor');
	$file_list = array();
	if( !$check_for_write_permission[0] ) 
	{
		$file_list_msg .= ' ' . __("Write permission on plugin folder is denied.",'seo-pressor');
		foreach( $check_for_write_permission[1] as $msg_item ) 
		{
			$file_list[] = $msg_item;
		}
		$write_permission_requirement = FALSE;
	}
	

}

include( WPPostsRateKeys::$plugin_dir . '/includes/admin/handle_introduction.php');
include( WPPostsRateKeys::$template_dir . '/includes/admin/handle_settings.php');
