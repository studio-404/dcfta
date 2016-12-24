<?php
session_start();
header('X-Frame-Options: DENY');
header("Content-type: text/html; charset=utf-8");
session_name("studio404");
date_default_timezone_set('Asia/Tbilisi');
error_reporting(E_ALL);
ini_set('memory_limit', '5120M');
ini_set('display_errors', 1);

try{
	require_once 'app/init.php';
	$app = new App;
}catch(Exception $e){
	die("Error");
}