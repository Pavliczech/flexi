<?php

/**

	FLEXI CMS - OPEN SOURCE CONTENT MANAGEMENT SYSTEM

**/





/**

move to modules

include_once("core/mailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->From		= $config['mailer_from'];
$mail->FromName	= $config['mailer_from_name'];
$mail->CharSet	= $config['mailer_charset'];
$mail->IsHTML($config['mailer_global_html']);*/


/*

move to modules too

include("core/dibi/dibi.php");
dibi::connect(array(
	'driver'	=>$config['database_type'],
	'host'		=>$config['database_server'],
	'username'	=>$config['database_user'],
	'password'	=>$config['database_password'],
	'database'	=>$config['database_name'],
));

*/




/*

CONFIG

*/

$config_file = $_SERVER["DOCUMENT_ROOT"] . "/app/config.php";
if(file_exists($config_file)){
	include_once($config_file);
}
else {
	die($config_file . "not found!");
}

/*

SMARTY

*/

$smarty_file = $_SERVER["DOCUMENT_ROOT"] . "/app/core/smarty/Smarty.class.php";
if(file_exists($smarty_file)){
	include_once($smarty_file);
	$tpl = new Smarty();
	$tpl->setTemplateDir($config['smarty_templates_dir']);
	$tpl->setCompileDir($config['smarty_templates_compile']);
	$tpl->setConfigDir($config['smarty_configs'] );
	$tpl->setCacheDir($config['smarty_templates_cache']);
	$tpl->caching = 0;
	$tpl->debugging = $config['smarty_debug'];
}
else {
	die($smarty_file . " not found!");
}

/*

EXTRA FUNCTIONS (SOME CAN BE USED IN TEMPLATES)

*/

$functions_file = $_SERVER["DOCUMENT_ROOT"] . "/app/core/functions.php";
if(file_exists($functions_file)){
	include_once($functions_file);
	$core = new core($config);
}
else {
	die($functions_file . " not found!");
}

/*

LESS COMPILER (COMPILING LESS FILES INTO CSS)

*/
$less_compiler_file = $_SERVER["DOCUMENT_ROOT"] . "/app/core/less_compiler/Autoloader.php";
if(file_exists($less_compiler_file)){
	include_once($less_compiler_file);
	Less_Autoloader::register();
	$less = new Less_Parser($config["less_parser"]);
}
else {
	die($less_compiler_file . " not found!");
}



/*

LETS LOAD UP SYSTEM NOW

*/

$module = new module($config,$tpl,$core,$less);
$module->init();

class module {

	public function __construct($config,$tpl,$core,$less){

		// SET CONFIG 
		$this->config = $config;

		// SET CORE FUNCTIONS
		$this->core = $core;

		// SET TEMPLATE ENGINE
		$this->tpl = $tpl;
		
		// SET TEMPLATE ENGINE
		$this->less = $less;

	}

	public function init(){
		

		
		if($this->config["version"]=="dev"){
			$this->tpl->assign("less","router.less");
		}
		else {
			$this->tpl->assign("css","router.css");
		}
		
		
		if($this->core->get("admin")){
			
			echo $this->tpl->display("admin/index.tpl");
		}
		else {
			
			echo $this->tpl->display("public/index.tpl");
		}
		/*
	
		try{
			$less_file = $_SERVER["DOCUMENT_ROOT"] . "/theme/public/less/test.less";
	
			//$this->less->parseFile($less_file);
			//$css = $this->less->getCSS();

			//echo $css;
			
			$less_files = array($less_file => "/");
			$css_file_name = Less_Cache::Get($less_files, $this->config['less_parser']);
			$this->tpl->assign("css",$css_file_name);
			
			
		}
		catch(Exception $e){
			core::debug($e->getMessage());
		}*/
		
		
		

		

		
		/*
		for($i = 2; $i<=100;$i++){
			echo "<br />" . $i . ". Hello world!";
		}*/
		
		/*
		
		MANY THINGS COMMING SOON :O
		
		*/
	}

	public function __destruct(){
		
	}
}


?>