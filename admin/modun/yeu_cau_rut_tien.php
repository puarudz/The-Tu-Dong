<?php
require 'access_control.php';

$id = $kun->anti_sql($_POST['id']);
$type = $_POST['type'];

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_tien` WHERE `id`='".$id."'");
    $card = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $username = $card['from'];

    $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `username`='".$username."'");
    $row = mysqli_fetch_array($sel,MYSQLI_ASSOC);


$time = time();


switch ($type) {
	case 'true':
		mysqli_query($kun->connect_db(), "UPDATE rut_tien SET status = 'true' WHERE `id`='".$id."' ");
		$noidung = "Yêu cầu rút ".number_format($card['sotien'])." VND của bạn đã được phê duyệt!";
		    $kun->thong_bao('Rút Tiền', $username, $noidung);
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã duyệt yêu cầu'));
		break;


	case 'false':
		$user_nap = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM rut_tien WHERE `id`='".$id."' "));
		mysqli_query($kun->connect_db(), "UPDATE rut_tien SET status = 'false' WHERE `id`='".$id."' ");
		mysqli_query($kun->connect_db(), "UPDATE users SET `money` = `money`+'".$user_nap['sotien']."' WHERE `username`='".$user_nap['from']."' ");
		$noidung = "Yêu cầu rút ".number_format($card['sotien'])." VND của bạn bị lỗi, xin hãy kiểm tra lại thông tin yêu cầu! Số tiền của bạn sẽ sớm được cộng vào tài khoản của bạn!";
		    $kun->thong_bao('Rút Tiền', $username, $noidung);
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã đánh dấu lỗi'));
		break;


	case 'delete':
		mysqli_query($kun->connect_db(), "DELETE FROM rut_tien WHERE `id`='".$id."' ");
				$noidung = "Yêu cầu rút ".number_format($card['sotien'])." VND của bạn không được chấp nhận! Số tiền của bạn sẽ sớm được cộng vào tài khoản của bạn!";
		    $kun->thong_bao('Rút Tiền', $username, $noidung);
		echo json_encode(array('status' => 'true', 'code' => '200', 'message' => 'Đã xóa yêu cầu'));
		break;
	
	default:
		echo json_encode(array('status' => 'false', 'code' => '500', 'message' => 'Lỗi hệ thống'));
		break;
}

