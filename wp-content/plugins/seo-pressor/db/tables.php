<?php
/**
 * Create/Update database structure
 * 
 * Called in activation hook
 */

// Define plugin tables prefix
global $wpdb;
$prefix = $wpdb->prefix . WPPostsRateKeys::$db_prefix;

/*
 * Creating Table for the Relation between Roles and Capabilities
 */
$table_name = $prefix . WPPostsRateKeys_CustomRoles::$table_roles_capabilities;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
		`id` INT NOT NULL auto_increment ,
		`capabilities` text,
		`role_type` VARCHAR (255) NOT NULL DEFAULT 'wp',
		`role_name` VARCHAR (255) NOT NULL,
		PRIMARY KEY  ( `id` )) DEFAULT CHARSET=utf8");
	
	//WPPostsRateKeys_RolesCapabilities::add(array('capabilities'=>'admin','role_type'=>'wp','role_name'=>'administrator'));
}

/*
 * Creating Table for Relations between Users and Custom Roles
 * 
 * Only Users and Custom Roles relation because the relation between 
 * users and WordPress roles aren't concern of this plugin
 */
$table_name = $prefix . WPPostsRateKeys_CustomRoles::$table_users_custom_roles;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
		`id` INT NOT NULL auto_increment ,
		`user_id` INT ,
		`role_id` INT ,
		PRIMARY KEY  ( `id` )) DEFAULT CHARSET=utf8");
}


/*
 * Creating Table for Logs
*
* type can be: error, notification, request_to_central_server
*/
$table_name = $prefix . WPPostsRateKeys_Logs::$table_name;

if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
			`id` INT NOT NULL auto_increment ,
			`type` VARCHAR (255),
			`msg_code` VARCHAR (255),
			`message` TEXT,
			`dt` DATETIME,
		PRIMARY KEY ( `id` )) DEFAULT CHARSET=utf8");
}


/*
 * Creating Table for Links
*
*/
$table_name = $prefix . WPPostsRateKeys_Link::$table_name;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
			`id` INT NOT NULL auto_increment ,
			`post_id` int(11) NOT NULL,
			`url` text NOT NULL,
			`anchor_text` text,
			`status_code` int(11) NOT NULL,
			`last_checked` datetime NOT NULL,
		PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8");
}

/*
 * Creating Table for Smart Linking
*
*/
$table_name = $prefix . WPPostsRateKeys_SmartLinking::$table_name;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
		`id` INT NOT NULL auto_increment ,
		`keywords` VARCHAR (255) NOT NULL ,
		`cloaking_folder` VARCHAR (255) default NULL ,
		`url` VARCHAR (255) NOT NULL ,
		`how_many` INT NULL ,
		PRIMARY KEY ( `id` )) DEFAULT CHARSET=utf8");
}


/*
 * Creating Table for Site Audit
*
*/
$table_name = $prefix . WPPostsRateKeys_Site_Audit::$table_name;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query("CREATE TABLE `$table_name` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`score` int(11) DEFAULT NULL,
		`health` int(11) DEFAULT NULL,
		`dup_title` int(11) DEFAULT NULL,
		`dup_description` int(11) DEFAULT NULL,
		`no_title` int(11) DEFAULT NULL,
		`no_description` int(11) DEFAULT NULL,
		`t_post` int(11) DEFAULT NULL,
		`b_link` int(11) DEFAULT NULL,
		`t_link` int(11) DEFAULT NULL,
		`robot_meta` mediumtext,
		`xml_sitemap` text,
		`avg_post` float DEFAULT NULL,
		`robots_txt` text,
		`no_keyword` int(11) DEFAULT NULL,
		`no_optimize` int(11) DEFAULT NULL,
		`no_schema` int(11) DEFAULT NULL,
		`no_og` int(11) DEFAULT NULL,
		`no_twitter` int(11) DEFAULT NULL,
		`no_alt_img` int(11) DEFAULT NULL,
		`t_img` int(11) DEFAULT NULL,
		`wordcount` int(11) DEFAULT NULL COMMENT 'total post have lesser wc',
		`lang` text,
		`local_seo` int(11) DEFAULT NULL COMMENT '0=no, 1=yes',
		`date_s` datetime NOT NULL,
		`date_e` datetime DEFAULT NULL,
		`provision_task` int(11) DEFAULT NULL,
		`ect` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8");
}

/*
 * Creating Table for Crawler
*
*/
$table_name = $prefix . WPPostsRateKeys_Crawler::$table_name;
if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
	$wpdb->query( "CREATE TABLE IF NOT EXISTS `$table_name` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `audit_id` int(11) NOT NULL,
	  `post_id` int(11) NOT NULL,
	  `score` int(11) DEFAULT NULL,
	  `title` text NOT NULL,
	  `description` text NOT NULL,
	  `broken_link` int(11) NOT NULL,
	  `nice_link` int(11) NOT NULL,
	  `has_keyword` int(11) NOT NULL COMMENT '0=no, 1=yes',
	  `has_optimize` int(11) NOT NULL COMMENT '0=no, 1=yes',
	  `has_schema` int(11) NOT NULL COMMENT '0=no, 1=yes',
	  `has_og` int(11) NOT NULL COMMENT '0=no, 1=yes',
	  `has_twitter` int(11) NOT NULL COMMENT '0=no, 1=yes',
	  `no_alt_images` int(11) NOT NULL,
	  `total_images` int(11) NOT NULL,
	  `wordcount` int(11) NOT NULL,
	  `post_creation_date` datetime NOT NULL,
	  `creation_date` datetime NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `audit_post_id` (`audit_id`,`post_id`)
	) DEFAULT CHARSET=utf8; ");
}


