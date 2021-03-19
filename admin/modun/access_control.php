<?php
error_reporting(1);
require '../../Core.php';
use Core\System;
$kun = new System;


if($_POST[token]) {
        $token = str_replace('"',"\"",$_POST['token']);
        $token = str_replace("'","\'",$token);
if($kun->check_token_api($token) == true) {
$user = $kun->user_api($token);

if($user['admin'] == '0') {
	echo json_encode(array('status' => 'false', 'code' => '400', 'message' => 'Access Denied!'));
}

}else {
	echo json_encode(array('status' => 'false', 'code' => '400', 'message' => 'Lỗi Token'));
}

}else{
	echo json_encode(array('status' => 'false', 'code' => '400', 'message' => 'Lỗi Token'));
}