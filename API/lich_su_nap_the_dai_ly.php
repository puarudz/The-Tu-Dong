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
if($kun->check_token_api_tichhop($token) == true) {
$user = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `auth`='".$token."'"));
}else {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Lỗi Token'));
}

}else{
	show(array('status' => 'false', 'code' => '400', 'message' => 'Thiêú Token'));
}


    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `nap_the_api` WHERE `daily`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {

	            $data_history[$i++] = array(
				'from' => $row['username'],
				'name' => $row['name'],
				'loaithe' => htmlentities($row['type']),
				'menhgia' => htmlentities($row['amount']),
				'menhgiathuc' => htmlentities($row['amount_real']),
				'thucnhan' => $row['tiennhanduoc'],
				'hoahong' => $row['daily_nhan'],
				'seri' => htmlentities($row['serial']),
				'mathe' => htmlentities($row['pin']),
				'status' => $row['status'],
				'time' => date('d/m/Y H:i', $row['time'])
				);
            }
			
		$data = array(
		"status" => "true",
		"code" => 200,
		"message" => "Lấy lịch sử thành công",
		"data" => $data_history
		);
		
		show($data);