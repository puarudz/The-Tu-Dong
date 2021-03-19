<?php
require('core.php');

$loaithe = $_POST['loaithe'];
$menhgia = $_POST['menhgia'];
$seri = str_replace('/[^0-9]/', '', $_POST['seri']);
$mathe = str_replace('/[^0-9]/', '', $_POST['mathe']);


$arr_loaithe = array("0", "1", "2", "3");
$arr_menhgia = array("0", "1", "2", "3", "4", "5", "6", "7", "8","9");

 if (!in_array($loaithe, $arr_loaithe)) show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!'));
 if (!in_array($menhgia, $arr_menhgia)) show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!')); 
 
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
    default:
		show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!'));
        break;
}

 switch ($menhgia) {
    case "0":
       show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng chọn mệnh giá phù hợp!'));
       break;
    case "1":
        $menhgia = "10000";
        break;
	case "2":
        $menhgia = "20000";
        break;
	case "3":
        $menhgia = "30000";
        break;
	case "4":
        $menhgia = "50000";
        break;
	case "5":
        $menhgia = "100000";
        break;
	case "6":
        $menhgia = "200000";
        break;
	case "7":
        $menhgia = "300000";
        break;
	case "8":
        $menhgia = "500000";
        break;
	case "9":
        $menhgia = "1000000";
        break;
	
    default:
		show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!'));
        break;
}

 if (!$seri) show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng nhập vào mã seri!'));
 if (!$mathe) show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng nhập vào mã thẻ!'));


if($kun->check_int($seri) == false) show(array('status' => 'false', 'code' => 400, 'message' => 'Mã Seri phải là dạng số!'));

if($kun->check_int($mathe) == false) show(array('status' => 'false', 'code' => 400, 'message' => 'Mã thẻ phải là dạng số!'));



if(strlen($seri) < 10) show(array('status' => 'false', 'code' => 400, 'message' => 'Độ dài mã Seri không hợp lệ!'));
if(strlen($mathe) < 10) show(array('status' => 'false', 'code' => 400, 'message' => 'Độ dài mã thẻ không hợp lệ!'));

//echo $loaithe.'<br>';
//echo $menhgia.'<br>';
//echo $seri.'<br>';
//echo $mathe.'<br>';

/*** Tính tiền thực nhận ****/

 switch ($_POST['loaithe']) {
    case "1":
        $percent = ($viettel[$menhgia] / 100) * $menhgia;
		$thuc_nhan = $menhgia - $percent;
        break;
	case "2":
        $percent = ($mobifone[$menhgia] / 100) * $menhgia;
		$thuc_nhan = $menhgia - $percent;
        break;
	case "3":
       $percent = ($vinaphone[$menhgia] / 100) * $menhgia;
		$thuc_nhan = $menhgia - $percent;
        break;
    default:
		show(array('status' => 'false', 'code' => 500, 'message' => 'Lỗi hệ thống!'));
        break;
}


		
$time = time();



    $noidung = "Bạn vừa gửi yêu cầu nạp thẻ ".$loaithe." mệnh giá ".number_format($menhgia)." VND. Yêu cầu của bạn sẽ được Admin xử lý!";

    $kun->thong_bao('Hệ thống', $user['username'], $noidung);
    





$rand = rand(0, 9999999);

    $cmd = "INSERT INTO nap_the (`maGD`, `from`, `name`, `loaithe`, `menhgia`, `tiennhanduoc`, `seri`, `mathe`, `status`, `time`) VALUES ('".$rand."', '".$user['username']."', '".$user['name']."', '".$loaithe."', '".$menhgia."', '".$thuc_nhan."', '".$seri."', '".$mathe."', 'delay', '".$time."')";
    mysqli_query($kun->connect_db(), $cmd);

// echo $cmd;
show(array('status' => 'delay', 'code' => 200, 'message' => 'Yêu cầu đổi thẻ của bạn đang được xử lý!'));




















