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
	$kun->ip_set_count(); // + 1 vote block người đang truy vấn
}

}else{
	show(array('status' => false, 'code' => '400', 'message' => 'Thiêú Token'));
}
