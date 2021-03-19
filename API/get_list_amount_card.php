<?php
require('core.php');

$loaithe = $_POST['loaithe'];

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

require $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/Class.Order_Card.php';
$cardvip = new CardVip;
$cardvip->username = $config['cardvip_username'];
$cardvip->password = $config['cardvip_password'];
$cardvip->password2 = $config['cardvip_password2'];
$cardvip->cookie_path = $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/cookie.txt';
//echo $cardvip->post_order_card('vinaphone', 10000);
// echo var_dump($cardvip->get_last_card_ordered());
echo $cardvip->get_options_card($loaithe);