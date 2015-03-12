<?php

//The part you change:
$fname = 'test/access.log';			//Path to the access.log file
$login_pwd = '1234';				//Password
$ffpath = 'filters.json';			//Path to the filter file
//session_save_path('sessions');	//Uncomment this line to use your own sessions folder.
									//Make sure to protect the folder with .htaccess
//error_reporting(0);				//Disable Error Reporting
date_default_timezone_set('America/Sao_Paulo');	//User Timezone




//The part you should think twice before change:
header('Content-Type: text/html; charset=utf-8');
session_start();
if(!isset($_SESSION['logged']) && !isset($isLoginPage)) {
	header('Location: login.php');
	die;
}