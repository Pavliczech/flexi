<?php

/*
	(C) 2013, Jiří Bělský
*/

/* MOVE SOMEWHERE ELSE */
//ini_set("session.cookie_lifetime","36000");
//ini_set('session.gc_maxlifetime', 36000);
//session_set_cookie_params(36000);

session_start();
//ob_start();

$reactor = $_SERVER["DOCUMENT_ROOT"] . "/app/reactor.php";
if(file_exists($reactor))
	include_once($reactor);
else
	die($reactor . " not found!")

?>