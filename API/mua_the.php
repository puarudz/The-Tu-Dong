<?php
require('core.php');

$loaithe = $_POST['loaithe'];
$menhgia = $_POST['menhgia'];
$pass2 = $_POST['pass2'];
 
 switch ($loaithe) {
    case "0":
       show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng chọn nhà mạng phù hợp!'));
       break;
    case "1":
        $loaithe = "Viettel";
        break;
	case "2":
        $loaithe = "Mobifone";
        break;
	case "3":
        $loaithe = "Vinaphone";
        break;
    case "4":
        $loaithe = "Vietnamobile";
        break;
    case "5":
        $loaithe = "Zing";
        break;
    case "6":
        $loaithe = "Gate";
        break;    
    case "7":
        $loaithe = "Garena";
        break;

    default:
        show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!'));
        break;
}


if(!$pass2) show(array('status' => 'false', 'code' => 300, 'message' => 'Vui lòng nhập mật khẩu cấp 2!'));


$check_pass_2 = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `passcap2` WHERE `password`='".md5($pass2)."' AND `username`='".$user['username']."'"));

if(!$check_pass_2['username']) show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu cấp 2 không chính xác!'));



if($user['money'] < $menhgia) show(array('status' => 'false', 'code' => 300, 'message' => 'Tài khoản của bạn hiện không đủ tiền để mua thẻ này!'));

$time = time();
$cmd_insf = "INSERT INTO mua_the (`from`, `name`, `loaithe`, `menhgia`, `seri`, `mathe`, `status`, `time`) VALUES ('".$user['username']."', '".$user['name']."', '".$loaithe."', '".$menhgia."', '', '', 'delay', '".$time."')";
mysqli_query($kun->connect_db(), $cmd_insf);

$last_id = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `mua_the` ORDER BY `time` DESC LIMIT 0, 1"));

require $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/Class.Order_Card.php';

$cardvip = new CardVip;
$cardvip->username = $config['cardvip_username'];
$cardvip->password = $config['cardvip_password'];
$cardvip->password2 = $config['cardvip_password2'];
$cardvip->cookie_path = $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/cookie.txt';
$cardvip->post_order_card($loaithe, $menhgia);


sleep(10);

$last_card = $cardvip->get_last_card_ordered();


if($last_card['id']) {
    $cmd_2 = "UPDATE `mua_the` SET `seri` = '".$last_card['serial']."', `mathe`='".$last_card['pin']."', `status`='true' WHERE `id` = '".$last_id['id']."'";
    mysqli_query($kun->connect_db(), $cmd_2);
}


		$data = array(
		'loaithe' => $loaithe,
		'menhgia' => $menhgia,
		'seri' => $last_card['serial'],
		'mathe' => $last_card['pin']
		);
		

	$tru_tien = $user['money'] - $menhgia;
	$cmd_3 = "UPDATE `users` SET money = '".$tru_tien."' WHERE `username`='".$user['username']."' ";
	mysqli_query($kun->connect_db(), $cmd_3);
	
	$noidung = "Bạn vừa mua mã thẻ cào ".$loaithe." mệnh giá ".number_format($menhgia)." VND thành công!";
    $kun->thong_bao('Hệ thống', $user['username'], $noidung);
    $kun->send_fb($user['username']." vừa mua mã thẻ cào ".$loaithe." mệnh giá ".number_format($menhgia)." VND");
    $kun->send_email($kun->config('mail_from'), $user['email'], $kun->config('site_name').": Mua Thẻ Cào" ,$noidung." Xem chi tiết thẻ cào tại lịch sử mua thẻ trên website.");
	
	
		show(array('status' => 'true', 'code' => 200, 'message' => 'Mua thẻ thành công!', 'data' => $data));
			
		










