<?php
require '../Core.php';
use Core\System;
$kun = new System;

/************
Danh sách trạng thái (status):
false => thất bại
delay => chờ xử lí
true => thành công

Danh sách code:
500 => lỗi từ máy chủ
403 => lỗi máy chủ không đáp ứng được yêu cầu
400 => lỗi do người dùng
300 => lỗi sai do tài khoản không đủ điều kiện
200 => thành công
*************/

function show($data) {
	 die(json_encode($data));
}

if($_POST['token']) {
        $token = str_replace('"',"\"",$_POST['token']);
        $token = str_replace("'","\'",$token);
if($kun->check_token_api($token) == true) {
$user = $kun->user_api($token);
}else {
	show(array('status' => false, 'code' => '400', 'message' => 'Lỗi Token'));
}

}else{
	show(array('status' => false, 'code' => '400', 'message' => 'Thiêú Token'));
}

$n = $_POST['name'];
$u = $_POST['username'];
$e = $_POST['email'];
$p = $_POST['password'];
$rp = $_POST['repassword'];
$ck_viettel = $_POST['viettel'];
$ck_mobifone = $_POST['mobifone'];
$ck_vinaphone = $_POST['vinaphone'];
$ck_vietnamobile = $_POST['vietnamobile'];



if(!$n || !$u || !$e || !$p || !$rp || !$ck_viettel || !$ck_mobifone || !$ck_vinaphone || !$ck_vietnamobile) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Vui Lòng Nhập Đầu Đủ Thông Tin!'));
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-', '^');


foreach ($syntax as $key) {
	if($kun->tim_chuoi($n,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên khách hàng không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($u,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($e,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Email không hợp lệ!'));
	}

	if($kun->tim_chuoi($p,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($rp,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu xác nhận không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($ck_viettel,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'lỗi chiết khấu nhà mạng!'));
	}

	if($kun->tim_chuoi($ck_mobifone,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'lỗi chiết khấu nhà mạng!'));
	}

	if($kun->tim_chuoi($ck_vinaphone,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'lỗi chiết khấu nhà mạng!'));
	}

	if($kun->tim_chuoi($ck_vietnamobile,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'lỗi chiết khấu nhà mạng!'));
	}

}


	if($kun->tim_chuoi($n,'.') == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không được có kí tự lạ!'));
	}

	if($kun->tim_chuoi($u,'.') == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không được có kí tự lạ! '));
	}



	if(strlen($n) > 30) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên khách hàng không được quá 30 kí tự! '));		
	}

	if(strlen($n) < 6) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên khách hàng không được nhỏ hơn 6 kí tự! '));
	}

	if(strlen($u) > 30) {
		show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không được quá 30 kí tự!'));	
	}

	if(strlen($u) < 6) {
		show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không nhỏ hơn 6 kí tự!'));	
	}


	if(strlen($p) < 6) {
		show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu phải lớn hơn 6 kí tự!  '));	
	}


	if($rp !== $p) {
		show(array('status' => 'false', 'code' => 400, 'message' => '2 mật khẩu bạn nhập không giống nhau! '));	
	}


	if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
	    show(array('status' => 'false', 'code' => 400, 'message' => 'Email không đúng định dạng!'));	
	}


    $result = mysqli_query($kun->connect_db(), "SELECT `email` FROM `users` WHERE `email`='".$e."' ");
	$rowcount = mysqli_num_rows($result);
	if($rowcount > 0) {
	    show(array('status' => 'false', 'code' => 400, 'message' => 'Email này đã tồn tại trên hệ thống!'));
	}


	$chiet_khau = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10');


	if(!in_array($ck_viettel, $chiet_khau)) show(array('status' => 'false', 'code' => 400, 'message' => 'Lỗi chiết khấu!'));
	if(!in_array($ck_mobifone, $chiet_khau)) show(array('status' => 'false', 'code' => 400, 'message' => 'Lỗi chiết khấu!'));
	if(!in_array($ck_vinaphone, $chiet_khau)) show(array('status' => 'false', 'code' => 400, 'message' => 'Lỗi chiết khấu!'));
	if(!in_array($ck_vietnamobile, $chiet_khau)) show(array('status' => 'false', 'code' => 400, 'message' => 'Lỗi chiết khấu!'));

	$setting_ck = json_encode(array(
		'VIETTEL' => $ck_viettel,
		'MOBIFONE' => $ck_mobifone,
		'VINAPHONE' => $ck_vinaphone,
		'VIETNAMOBILE' => $ck_vietnamobile
	));



if($kun->check_user_register($u) == false) {

$token = $kun->Creat_Token(30);
$auth =  $kun->Creat_Token(15);

$time = time();
  
	$verify_code = rand(10000, 99999);
	$mail_content = 'Mã xác thực tài khoản '.$u.' là: '.$verify_code;

	$kun->send_email($kun->config('mail_from'), $e, $kun->config('mail_title'), $mail_content);
 
 	$cmd = "INSERT INTO users (fbid, admin, name, username, add_by, email, money, chietkhau, password, token, auth, ip, verify_code, verify, time) VALUES ('0', 0, '".$n."', '".$u."', '".$user['username']."', '".$e."', 0, '".mysqli_real_escape_string($kun->connect_db(), $setting_ck)."', '".md5($p)."', '".$token."','".$auth."', '".$_SERVER['REMOTE_ADDR']."', '".$verify_code."', 'false', '".$time."')";

    $res = mysqli_query($kun->connect_db(), $cmd);

	show(array('status' => 'true', 'code' => 200, 'message' => 'Tạo khách hàng thành công!'));	

}else {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Khách hàng này đã tồn tại trên hệ thống!'));	
}