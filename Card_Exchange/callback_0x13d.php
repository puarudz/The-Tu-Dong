<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;

$myfile = fopen("log/log.bat", "a");
$txt = $_GET['status']."|".number_format($_GET['value_receive'])."|".$_GET['pricesvalue']."|".$_GET['card_code']."|".$_GET['card_seri']."|".$_GET['requestid']."|".date('H:i:s d/m/y', time())."\n";
fwrite($myfile, $txt);
fclose($myfile);


if(isset($_GET['status'])) {

    $code = $_GET['status'];
    $tranid = $_GET['requestid'];
    $amount_guilen = $_GET['pricesvalue'];
    $amount_real = $_GET['value_receive'];

    $info = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `nap_the_api` WHERE `transid` = '".$tranid."' AND `status`='delay'"));

    if($info['daily']) {
    	$ck_viettel = $kun->user_setting_chietkhau($info['username'], 'VIETTEL');
    	$ck_vinaphone = $kun->user_setting_chietkhau($info['username'], 'VINAPHONE');
    	$ck_mobifone =$kun->user_setting_chietkhau($info['username'], 'MOBIFONE');
    	$ck_vietnamobile = $kun->user_setting_chietkhau($info['username'], 'VIETNAMOBILE');   	
    }else {
    	$ck_viettel = 0;
    	$ck_vinaphone = 0;
    	$ck_mobifone = 0;
    	$ck_vietnamobile = 0;
    }


    if ($code == 200) 
    {		

			 switch ($info['type']) {
			    case "VIETTEL":
			        $percent = ($viettel[$amount_real] / 100) * $amount_real;
			        $percent_daily = ($ck_viettel / 100) * $amount_real;
					$thuc_nhan = $amount_real - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
				case "MOBIFONE":
			        $percent = ($mobifone[$amount_real] / 100) * $amount_real;
					$percent_daily = ($ck_mobifone / 100) * $amount_real;
					$thuc_nhan = $amount_real - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
				case "VINAPHONE":
			       $percent = ($vinaphone[$amount_real] / 100) * $amount_real;
			       $percent_daily = ($ck_vinaphone / 100) * $amount_real;
					$thuc_nhan = $amount_real - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "VIETNAMOBILE":
			       $percent = ($vietnamobile[$amount_real] / 100) * $amount_real;
			       $percent_daily = ($ck_vietnamobile / 100) * $amount_real;
			        $thuc_nhan = $amount_real - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "ZING":
			       $percent = ($zing[$amount_real] / 100) * $amount_real;
			       $percent_daily = ($ck_mobifone / 100) * $amount_real;
			        $thuc_nhan = $amount_real - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "GATE":
			       $percent = ($gate[$amount_real] / 100) * $amount_real;
			       $percent_daily = 0;
			        $thuc_nhan = $amount_real - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "GARENA":
			       $percent = ($garena[$amount_real] / 100) * $amount_real;
			       $percent_daily = 0;
			        $thuc_nhan = $amount_real - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "VCOIN":
			       $percent = ($vcoin[$amount_real] / 100) * $amount_real;
			       $percent_daily = 0;
			        $thuc_nhan = $amount_real - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			}


    	mysqli_query($kun->connect_db(), "UPDATE users SET  `money` = `money` + '".$thuc_nhan_2."' WHERE `username` = '".$info['username']."'"); //cộng tiền
    	if($info['daily']) {
    		mysqli_query($kun->connect_db(), "UPDATE users SET  `money` = `money` + '".$percent_daily."' WHERE `username` = '".$info['daily']."'"); //cộng tiền hoa hồng cho đại lý
    	}
		mysqli_query($kun->connect_db(), "UPDATE nap_the_api SET `daily_nhan`='".$percent_daily."', `amount_real`='".$amount_real."', `tiennhanduoc`='".$thuc_nhan_2."',`status` = 'true' WHERE `transid` = '".$tranid."'");

		$data_send = array(
			'status' => $code,
			'pricesvalue' => $_GET['pricesvalue'],
			'value_receive' => $_GET['value_receive'],
			'card_code' => $_GET['card_code'],
			'card_seri' => $_GET['card_seri'],
			'requestid' => $tranid
		);

		send_callback($info['callback'], $data_send);
		echo '200 thành công';

    }
    else if ($code == 100) 
    {
        mysqli_query($kun->connect_db(), "UPDATE nap_the_api SET `status` = 'false' WHERE `transid` = '".$tranid."'");
        $data_send = array(
			'status' => $code,
			'pricesvalue' => $_GET['pricesvalue'],
			'value_receive' => $_GET['value_receive'],
			'card_code' => $_GET['card_code'],
			'card_seri' => $_GET['card_seri'],
			'requestid' => $tranid
		);

		send_callback($info['callback'], $data_send);
		echo '100 thẻ sai';
    } 
    else if ($code == 201) 
    {
        
    	if($amount_guilen != $amount_real) {
    			/*** Tính tiền thực nhận ****/
			if($amount_guilen < $amount_real) {
				$card_cacular = $amount_real;
			}else {
				$card_cacular = $amount_real;
			}

    		
			 switch ($info['type']) {
			    case "VIETTEL":
			        $percent = ($viettel[$card_cacular] / 100) * $card_cacular;
			        $percent_daily = ($ck_viettel / 100) * $card_cacular;
					$thuc_nhan = $card_cacular - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
				case "MOBIFONE":
			        $percent = ($mobifone[$card_cacular] / 100) * $card_cacular;
			        $percent_daily = ($ck_mobifone / 100) * $card_cacular;
					$thuc_nhan = $card_cacular - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
				case "VINAPHONE":
			       $percent = ($vinaphone[$card_cacular] / 100) * $card_cacular;
			        $percent_daily = ($ck_vinaphone / 100) * $card_cacular;
					$thuc_nhan = $card_cacular - $percent;
					$thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "VIETNAMOBILE":
			       $percent = ($vietnamobile[$card_cacular] / 100) * $card_cacular;
			        $percent_daily = ($ck_vietnamobile / 100) * $card_cacular;
			        $thuc_nhan = $card_cacular - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "ZING":
			       $percent = ($zing[$card_cacular] / 100) * $card_cacular;
			       $percent_daily = 0;
			        $thuc_nhan_2 = $card_cacular - $percent;
			        break;
			    case "GATE":
			       $percent = ($gate[$card_cacular] / 100) * $card_cacular;
			       $percent_daily = 0;
			        $thuc_nhan = $card_cacular - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "GARENA":
			       $percent = ($garena[$card_cacular] / 100) * $card_cacular;
			       $percent_daily = 0;
			        $thuc_nhan = $card_cacular - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			    case "VCOIN":
			       $percent = ($vcoin[$card_cacular] / 100) * $card_cacular;
			       $percent_daily = 0;
			        $thuc_nhan = $card_cacular - $percent;
			        $thuc_nhan_2 = $thuc_nhan - $percent_daily;
			        break;
			}

			$thucnhan = $thuc_nhan_2 / 2;
 
    	}

    	mysqli_query($kun->connect_db(), "UPDATE users SET  `money` = `money` + '".$thucnhan."' WHERE `username` = '".$info['username']."'"); //cộng tiền
    	if($info['daily']) {
    		mysqli_query($kun->connect_db(), "UPDATE users SET  `money` = `money` + '".$percent_daily."' WHERE `username` = '".$info['daily']."'"); //cộng tiền hoa hồng cho đại lý
    	}
		mysqli_query($kun->connect_db(), "UPDATE nap_the_api SET `daily_nhan`='".$percent_daily."', `amount_real`='".$amount_real."', `tiennhanduoc`='".$thucnhan."', `status` = 'smg' WHERE `transid` = '".$tranid."'");

		$data_send = array(
			'status' => $code,
			'pricesvalue' => $_GET['pricesvalue'],
			'value_receive' => $_GET['value_receive'],
			'card_code' => $_GET['card_code'],
			'card_seri' => $_GET['card_seri'],
			'requestid' => $tranid
		);

		send_callback($info['callback'], $data_send);
		echo '201 thẻ sai mệnh giá';
    }

                }



function send_callback($callback_url, $data) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $callback_url."?status=".$data['status']."&pricesvalue=".$data['pricesvalue']."&value_receive=".$data['value_receive']."&card_code=".$data['card_code']."&card_seri=".$data['card_seri']."&requestid=".$data['requestid']);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, "Callback TheTuDong");
	$exec = curl_exec($ch);
	curl_close($ch);
	return $exec;
}
?>
	
