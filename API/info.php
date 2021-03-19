<?php
require('core.php');

if($user['admin'] == 1){
	$level = 'Admin'; 	
}else if(!$user['add_by']) {
	$level = 'Đại Lý';
}else if($user['add_by']) {
	$level = 'Khách';
}

$data = array(
'status' => true,
'code' => 200,
'id' => $user['id'],
'apikey' => $user['auth'],
'name' =>  $user['name'],
'username' => htmlentities($user['username']),
'email' => htmlentities($user['email']),
'money' => htmlentities($user['money']),
'register_time' => date('d/m/Y', $user['time']),
'level' => $level
);


show($data);


