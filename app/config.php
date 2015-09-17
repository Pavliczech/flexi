<?php

/*

MAIN CONFIGURATION

*/


// SET TIMEZONE
date_default_timezone_set('Europe/Prague');
setlocale(LC_ALL, 'cs_CZ');
ini_set('memory_limit', '256M');

// USE UTF-8 OR RIOT
mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=utf-8');


header('X-Frame-Options: SAMEORIGIN');
header("X-XSS-Protection: 1; mode=block");

/** DEBUG MODE **/
define("CORE_DEBUG",true);

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$config = array();
$config["build"] = "0001";


// LOGIN TIMEOUTS
/*
ini_set("session.cookie_lifetime","36000");
ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);
*/


$config['modules_admin_folder']		= $_SERVER["DOCUMENT_ROOT"] . "/app/modules/admin/";
$config['modules_public_folder']	= $_SERVER["DOCUMENT_ROOT"] . "/app/modules/public/";

$config['modules_admin_default']	= "homepage";
$config['modules_public_default']	= "homepage";

// SMARTY CONFIGURATION
$config['smarty_templates_dir']			= $_SERVER["DOCUMENT_ROOT"] . "/tpl/";
$config['smarty_templates_compile']		= $_SERVER["DOCUMENT_ROOT"] . "/data/cache/tpl_c/";
$config['smarty_configs']				= $_SERVER["DOCUMENT_ROOT"] . "/data/cache/tpl_conf/";
$config['smarty_templates_cache']		= $_SERVER["DOCUMENT_ROOT"] . "/data/cache/tpl/";
$config['smarty_debug']					= false;

// SECURITY KEYS
$config['db_pswsalt']				= "TO DO";


// DATABASE CONNECTION
/*

MOVE TO MODULE SETTINGS

$config['database_type']		='mysql';
$config['database_server']		='localhost';
$config['database_name']		='database';
$config['database_user']		='db_user';
$config['database_password']	='password';

*/

// PHP MAILER CONFIGURATION
/*

MOVE TO MODULE SETTINGS

$config['mailer_from']			= "noreply@wufr.net";
$config['mailer_from_name']		= "FLEXI CMS";
$config['mailer_charset']		= "UTF-8";
$config['mailer_global_html']	= TRUE;

*/




?>