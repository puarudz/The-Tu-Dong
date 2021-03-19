<?php
 // Define Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file

error_reporting(1);
require 'Core.php';
use Core\System;

$kun = new System;
$user = $kun->user();

$title = $kun->config('name');

if($_SESSION['token']) {
  if($user['verify'] == "false") {
   header("Location: /verify.html");
    die();
  }
}

if(empty($_SESSION['token'])) {
  header('Location: /signin.html');
}else {
    require 'pages/header.php';
    require 'pages/main.php';
    require 'pages/footer.php';
}

