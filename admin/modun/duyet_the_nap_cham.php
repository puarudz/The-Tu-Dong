<?php
require 'access_control.php';

$id = $kun->anti_sql($_POST['id']);
$type = $_POST['type'];

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `nap_the` WHERE `id`='".$id."'");
    $card = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $username = $card['from'];

    $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `username`='".$username."'");
    $row = mysqli_fetch_array($sel,MYSQLI_ASSOC);

    $congtien = $row['money'] + $card['tiennhanduoc'];

switch ($type) {
	case 'true':
		mysqli_query($kun->connect_db(), "UPDATE nap_the SET status = 'true' WHERE `id`='".$id."' ");
		mysqli_query($kun->connect_db(), "UPDATE users SET money = '".$congtien."' WHERE `username`='".$username."' ");
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã duyệt thẻ'));
		break;


	case 'false':
		mysqli_query($kun->connect_db(), "UPDATE nap_the SET status = 'false' WHERE `id`='".$id."' ");
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã đánh dấu thẻ lỗi'));
		break;


	case 'delete':
		mysqli_query($kun->connect_db(), "DELETE FROM nap_the WHERE `id`='".$id."' ");
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã xóa thẻ'));
		break;
	
	default:
		echo json_encode(array('status' => 'false', 'code' => '500', 'message' => 'Lỗi hệ thống'));
		break;
}