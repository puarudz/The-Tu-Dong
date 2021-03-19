<?php
require '../../Core.php';
use Core\System;
$kun = new System;

function show($data) {
	 die(json_encode($data));
}

if($_POST['captcha'] != $_SESSION['captcha']) show(array('status' => 'false', 'code' => '400', 'message' => 'Mã bảo vệ không đúng!'));


if(!$_SESSION['token']) show(array('status' => 'false', 'code' => '400', 'message' => 'Bạn chưa đăng nhập!'));

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

$newpass = strtoupper($kun->Creat_Token(10));
$mail_content = 'Mật khẩu cấp 2 mới của bạn là: <b>'.$newpass.'</b>';

$res = mysqli_query($kun->connect_db(), "UPDATE `passcap2` SET `password` = '".md5($newpass)."' WHERE `username`='".$user['username']."'");

$kun->send_email($kun->config('mail_from'), $user['email'], $kun->config('mail_title'), $mail_content);

show(array('status' => 'true', 'code' => '200', 'message' => 'Mật khẩu cấp 2 mới vừa được gửi vào email của bạn!'));  