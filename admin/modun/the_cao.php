<?php
require 'access_control.php';

$id = $kun->anti_sql($_POST['id']);
$type = $_POST['type'];

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `card_system` WHERE `id`='".$id."'");
    $card = mysqli_fetch_array($result,MYSQLI_ASSOC);



$time = time();


switch ($type) {

	case 'delete':
		mysqli_query($kun->connect_db(), "DELETE FROM card_system WHERE `id`='".$id."' ");
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã xóa thẻ cào'));
		break;
	
	default:
		echo json_encode(array('status' => 'false', 'code' => '500', 'message' => 'Lỗi hệ thống'));
		break;
}

