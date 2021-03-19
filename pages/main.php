<?php
define("KUNKEYPR", true);

$pass2 = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `passcap2` WHERE `username`='".$user['username']."'"));

if(!$pass2['username']) {
	require 'action/pass2.php';
}else {
	if(!$_GET['act']) {
		require 'main_contents.php';
	}else {
	$act = $_GET['act'];

		if(array_search($act, $action_array) !== false) {
			require 'action/'.$act.'.php';
		}else {
			echo("<center><h1>YOU CAN'T NOT BUG MY WEBSITE!</h1></center>");
		}
	}
}
?>