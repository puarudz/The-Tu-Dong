<?php
require '../../Core.php';
use Core\System;
$kun = new System;

function show($data) {
	 die(json_encode($data));
}


if($_POST['token']) {
        $token = str_replace('"',"\"",$_POST['token']);
        $token = str_replace("'","\'",$token);
if($kun->check_token_api($token) == true) {
	$user = $kun->user_api($token);
}else {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Lỗi Token'));
}

}else{
	show(array('status' => 'false', 'code' => '400', 'message' => 'Thiêú Token'));
}

$op = $_POST['oldpassword'];
$p = $_POST['password'];
$rp = $_POST['repassword'];


if(!$op || !$p || !$rp) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng điền đầy đủ 3 mật khẩu!'));
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/');


foreach ($syntax as $key) {

	if($kun->tim_chuoi($op,$key) == true) {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Mật khẩu cũ không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($p,$key) == true) {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Mật khẩu không được có kí tự lạ!'));
	}

}

$check = mysqli_query($kun->connect_db(), "SELECT `password` FROM `passcap2` WHERE `password`='".md5($op)."' AND `username`='".$user['username']."' ");
$count = mysqli_num_rows($check);

if($count < 1) show(array('status' => 'false', 'code' => '400', 'message' => 'Mật khẩu cũ của bạn không đúng!'));


if(strlen($p) < 6) {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Mật khẩu phải lớn hơn 6 kí tự!'));  
}


if($rp !== $p) {
  	show(array('status' => 'false', 'code' => '400', 'message' => '2 mật khẩu bạn nhập không giống nhau!'));  
}

$res = mysqli_query($kun->connect_db(), "UPDATE `passcap2` SET `password` = '".md5($p)."' WHERE `username`='".$user['username']."'");
  
sleep(2);
  	show(array('status' => 'true', 'code' => '200', 'message' => 'Đổi mật khẩu cấp 2 thành công!'));  