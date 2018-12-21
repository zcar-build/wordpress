<?php
/*  
 * THIS FILE IS PART OF THE wpDeploy PLUGIN. DO NOT REMOVE MANUALLY
 * TO REMOVE, PLEASE USE PLUGIN ADMINISTRATION MENU
 *  
 * 
 * Copyright 2010 Nick Downton  (email : nick@conditionalcomment.co.uk)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( defined('WP_CONTENT_DIR') ){
	$wpDeployInclude = WP_CONTENT_DIR . "/plugins/wordpressdeploy/wpdeploy.class.php";
} else if ( defined('WP_PLUGIN_DIR') ){
	$wpDeployInclude = WP_PLUGIN_DIR . "/wordpressdeploy/wpdeploy.class.php";
} else {
	$wpDeployInclude = 'wp-content/plugins/wordpressdeploy/wpdeploy.class.php'; 
}
	require_once($wpDeployInclude);

$wpDeployInstance = new WpDeployInstance($_SERVER['SERVER_NAME'],TRUE);

if(!defined('DB_NAME')) define('DB_NAME', $wpDeployInstance->DB_NAME);
if(!defined('DB_USER')) define('DB_USER', $wpDeployInstance->DB_USER);
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', $wpDeployInstance->DB_PASSWORD);
if(!defined('DB_HOST')) define('DB_HOST', $wpDeployInstance->DB_HOST);

if(!defined('WP_HOME')&& $wpDeployInstance->WP_HOME!="") define('WP_HOME', $wpDeployInstance->WP_HOME);
if(!defined('WP_SITEURL')&& $wpDeployInstance->WP_SITEURL!="") define('WP_SITEURL', $wpDeployInstance->WP_SITEURL);

define('WPDEPLOY_ACTIVATED',TRUE);