<?php
if(!defined('LOCAL_MODE')) {
	die('<span style="font-family: tahoma, arial; font-size: 11px">config file cannot be included directly');
}
if (LOCAL_MODE) {
    // Settings for local arvind server do not edit here	
	// database settings
    $ARR_CFGS["db_host"] = 'localhost';
	$ARR_CFGS["db_name"] = 'edudite';
    $ARR_CFGS["db_user"] = 'root';
    $ARR_CFGS["db_pass"] = '';
	define('REF',2);
	define('SITE_SUB_PATH', '/EDUDITE/');
} else {
    // Settings for live server edit whenever shifting site to different server 
	// database settings
    $ARR_CFGS["db_host"] = 'localhost';
	$ARR_CFGS["db_name"] = 'edudit_consult';
    $ARR_CFGS["db_user"] = 'consult123';
    $ARR_CFGS["db_pass"] = 'consult@2015';
	define('REF',1);
	// Path for site
	define('SITE_SUB_PATH', '');
}
define('SITE_WS_PATH', 'http://'.$_SERVER['HTTP_HOST'].SITE_SUB_PATH);

define('THUMB_CACHE_DIR', 'thumb_cache');
define('PLUGINS_DIR', 'includes/plugins');

define('UP_FILES_FS_PATH', SITE_FS_PATH.'/uploaded_files');
define('UP_FILES_WS_PATH', SITE_WS_PATH.'/uploaded_files');

define('DEFAULT_START_YEAR', 2010);
define('DEFAULT_END_YEAR', date('Y')+50);

define('SITE_NAME', 'http://www.edudite.in/');
define('TEST_MODE', false);

define('DEF_PAGE_SIZE', 25);
define('ADMIN_DIR', 'eduditwebadmin2018');
?>