<?php
 // Define Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file
// die("<center><h1>Access Denied!!!</h1></center>");
error_reporting(1);
require '../Core.php';
use Core\System;

$kun = new System;
$user = $kun->user();


$kmess = $_SESSION['kmess'] > 5 && $_SESSION['kmess'] < 15 ? $_SESSION['kmess'] : 15;
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);



if(empty($_SESSION['token'])) {
 die('<center><h1>Login???</h1></center>');
}else {
	if($user['admin'] == '0') {
  die('<center><h1>Access Denied!!!</h1></center>');
 	}	
	if($user['admin'] == '1') {
	require 'include/header.php';
    require 'pages/main.php';
    require 'include/footer.php';
	}
}



