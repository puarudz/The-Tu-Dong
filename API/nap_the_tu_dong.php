<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;
$user = $kun->user();


 if (!isset($_POST['loaithe']) || !isset($_POST['seri']) || !isset($_POST['mathe']) || !isset($_POST['menhgia']) || !isset($_POST['token'])) {
       die(json_encode(array('status' => false, 'message' => 'Bạn cần nhập đầy đủ thông tin!')));
 }

    $type_post = $_POST['loaithe'];
    $serial = $_POST['seri'];
    $serial = preg_replace('/[\s]+.*/', '', $serial);
    $pin = $_POST['mathe'];
    $pin = preg_replace('/[\s]+.*/', '', $pin);
    $amount_post = $_POST['menhgia'];

    switch ($type_post) {
    	case 1:
    		$type = 'VIETTEL';
    		break;
    	case 2:
    		$type = 'MOBIFONE';
    		break;
    	case 3:
    		$type = 'VINAPHONE';
    		break;
    	case 4:
    		$type = 'VIETNAMOBILE';
    		break;
    	case 5:
    		$type = 'ZING';
    		break;
    	case 6:
    		$type = 'GATE';
    		break;
    	case 7:
    		$type = 'GARENA';
    		break;
    	case 8:
    		$type = 'VCOIN';
    		break;
    	
    	default:
    		die(json_encode(array('status' => false, 'message' => 'Lỗi nhà mạng!')));
    		break;
    }


    switch ($amount_post) {
    	case 1:
    		$amount = '10000';
    		break;
    	case 2:
    		$amount = '20000';
    		break;
    	case 3:
    		$amount = '50000';
    		break;
    	case 4:
    		$amount = '100000';
    		break;
    	case 5:
    		$amount = '200000';
    		break;
    	case 6:
    		$amount = '300000';
    		break;
    	case 7:
    		$amount = '500000';
    		break;
    	case 8:
    		$amount = '1000000';
    		break;
    	
    	default:
    		die(json_encode(array('status' => false, 'message' => 'Lỗi mệnh giá!')));
    		break;
    }


    $tranid = rand(100000, 999999);
    $callback = $config['site_url'].'/API/nap_tu_dong/callback.php';
    
	$api = $config['site_url'].'/Card_Exchange/?key='.urlencode($_POST['token']).'&card_type='.urlencode($type).'&card_code='.urlencode($pin).'&card_seri='.urlencode($serial).'&card_amount='.urlencode($amount).'&callback='.urlencode($callback).'&request_id='.urlencode($tranid);

    $ch = curl_init($api);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($ch);
    curl_close($ch);

    $post = json_decode($res, true);


    if ($post['status'] == 200) {
		die(json_encode(array('status' => true, 'message' => $post['message'])));
    } else if ($post['status'] == 401) {
        die(json_encode(array('status' => false, 'message' => $post['message'])));
    } else if ($post['status'] == 400) {
        die(json_encode(array('status' => false, 'message' => $post['message'])));
    } else if ($post['status'] == 100) {
        die(json_encode(array('status' => false, 'message' => $post['message'])));
    } else {
        die(json_encode(array('status' => false, 'message' => $post['message'])));
    }