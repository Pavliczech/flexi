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

DIBI DB LAYER

*/

$dibi_file = $_SERVER["DOCUMENT_ROOT"] . "/app/core/dibi/dibi.php";
if(file_exists($dibi_file)){
	include_once($dibi_file);
	dibi::connect(array(
		'driver'	=>$config['database_type'],
		'host'		=>$config['database_server'],
		'username'	=>$config['database_user'],
		'password'	=>$config['database_password'],
		'database'	=>$config['database_name'],
	));
}
else {
	die($dibi_file . " not found!");
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
		
		
		$this->adminlogged = $this->fastload("login/login",1,"login")->checklogin();

		
		/* ADD THESE IN CONFIG FILE */
		if($this->core->get("admin")){
			if($this->adminlogged){
				$less_files = "/theme/admin/less/router.less";
			}
			else {
				$less_files = "/theme/admin/less/login.less";
			}
		}
		else {
			$less_files = "/theme/public/less/router.less";
		}
		/* IN DEV MODE LESS IS COMPILES BY JAVASCRIPT - ITS FASTER */
		if($this->config["version"]=="dev"){
			$this->tpl->assign("less",$less_files);
		}
		else {
			try{
				// ADD ARRAY SUPPORT FOR MORE FILES TO COMPILE (dont need that now)
				$less_files = $_SERVER["DOCUMENT_ROOT"] . $less_files;
				$less_files = array($less_files => "/");
				$css_file_name = Less_Cache::Get($less_files, $this->config['less_parser']);
				$this->tpl->assign("css",$css_file_name);
			}
			catch(Exception $e){
				core::debug($e->getMessage());
			}
		}
		
		
		if($this->core->get("admin")){
			
			
			if($this->adminlogged){
				if($this->core->post("admin_logout") || $this->core->get("admin_logout")){
					$this->adminlogged = $this->fastload("login/login",1,"login")->admin_logout();
				}
				echo $this->tpl->display("admin/index.tpl");
			}
			else {
				if($this->core->post("admin_login")){
					$this->adminlogged = $this->fastload("login/login",1,"login")->admin_login();
				}
				echo $this->tpl->display("admin/index-login.tpl");
			}
		}
		else {
			
			echo $this->tpl->display("public/index.tpl");
		}
		
		
		
		

		

		
		/*
		for($i = 2; $i<=100;$i++){
			echo "<br />" . $i . ". Hello world!";
		}*/
		
		/*
		
		MANY THINGS COMMING SOON :O
		
		*/
	}
	
	
	public function check($module,$admin){
		if($admin)
			$folder = $this->config['modules_admin_folder'];
		else
			$folder = $this->config['modules_public_folder'];
			
		$file = $_SERVER["DOCUMENT_ROOT"] . "/" .$folder . $module .".php";
		if(file_exists($file)){
			return true;
			$this->core->d_mess("Soubory modulu nalezeny - ". $file);
		}
		else {
			return false;
			$this->core->d_mess("Soubory modulu nenalezeny - ". $file);
		}
	}

	public function load($module,$admin){
		/** ADMIN OR PUBLIC FOLDER **/
		if($admin)
			$folder = $this->config['modules_admin_folder'];
		else
			$folder = $this->config['modules_public_folder'];
		$file = $folder.$module.".php";

		//$this->core->d_mess("<strong>LOAD</strong> - Kontroluji soubory modulu - ". $file);
		
		if($this->check($module,$admin)){ // CHECK IF EXISTS
			//$this->core->d_mess("<strong>LOAD</strong> - Soubor modulu nalezen, VKLÁDÁM - ". $file);
			include($file);
		}
		else {
			//$this->core->d_mess("<strong>LOAD</strong> - Soubor modulu nenalezen");
			return false;
		}
	}

	public function fastload($module,$admin,$class){

		$class_name = $class;
		/** ADMIN OR PUBLIC FOLER **/
		if($admin)
			$folder = $this->config['modules_admin_folder'];
		else
			$folder = $this->config['modules_public_folder'];
		$file = $folder.$module.".php";

		//$this->core->d_mess("<strong>FASTLOAT - </strong> Kontroluji soubory modulu - ". $file);

		if(file_exists($file)){
			//$this->core->d_mess("<strong>FASTLOAD</strong> - Soubor modulu $class ($file) NALEZEN");
			
			if(!isset($fastmodules[$class][$file])){
				$fastmodules[$class][$file] = true;
				include_once($file);
			}

			if(isset($this->modules->defined[$class])){
				//$this->core->d_mess("<strong>FASTLOAD</strong> - POUŽITA DEFINOVANÁ TŘÍDA - " . $class);
			}
			else {
				$box_data["class"][$class] = true;
				$this->modules->defined[$class] = new $class($this->config,$this->tpl,$this->core,$this->less);
			}
			
			$class = $this->modules->defined[$class];
			return $class;
		}
		else {
			return false;
		}
	}
	
	
	

	public function __destruct(){
		
	}
}


?>