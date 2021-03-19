<?php
error_reporting(0);
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;
$user = $kun->user();

if(!$_SESSION['token']) {
	die('<center><h1>Access Denied!</h1></center>');
}
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/pages/action/'.$_GET['path'].'.php')) {
   require $_SERVER['DOCUMENT_ROOT'].'/pages/action/'.$_GET['path'].'.php';
} else {
    die('<center><h1>404 - Not Found!</h1></center>');
}