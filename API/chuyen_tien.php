<?php
require('core.php');


if($_POST['token']) {
        $token = str_replace('"',"\"",$_POST['token']);
        $token = str_replace("'","\'",$token);
if($kun->check_token_api($token) == true) {
$user = $kun->user_api($token);
}else {
	show(array('status' => 'false', 'code' => '400', 'message' => 'Lỗi Token'));
}

}else{
	show(array('status' => 'false', 'code' => '400', 'message' => 'Thiêú Token'));
}


$nguoinhan = $_POST['nguoinhan'];
$sotien = $_POST['sotien'];
$noidung = $_POST['noidung'];
$pass2 = $_POST['pass2'];




if ($user['money'] < 10000) show(array('status' => 'false', 'code' => 400, 'message' => 'Số dư trong tài khoản của bạn phải lớn hơn 10.000 VND mới có thể dùng được tính năng này!'));


if(!$nguoinhan || !$sotien || !$noidung || !$pass2) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Hãy điền đầy đủ thông tin!'));
}


$check_pass_2 = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `passcap2` WHERE `password`='".md5($pass2)."' AND `username`='".$user['username']."'"));

if(!$check_pass_2['username']) show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu cấp 2 không chính xác!'));


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');

foreach ($syntax as $key) {
	if($kun->tim_chuoi($nguoinhan,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tài khoản nhận tiền không được có kí tự lạ!'));
	}
	if($kun->tim_chuoi($noidung,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Nội dung chuyển tiền không được có kí tự lạ!'));
	}
}


if($kun->check_user_register($nguoinhan) == false) show(array('status' => 'false', 'code' => 400, 'message' => 'Tài khoản nhận tiền không tồn tại!'));
if(strlen($noidung) > 30 && strlen($noidung) < 6) show(array('status' => 'false', 'code' => 400, 'message' => 'Nội dung chuyển tiền phải lớn hơn 6 và nhỏ hơn 30 kí tự!'));

if (filter_var($sotien, FILTER_VALIDATE_INT)) {}else {show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần chuyển phải là dạng số và lớn hơn hoặc bằng 3.000 VND!'));};
if ($sotien < 3000) show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần chuyển phải lớn hơn hoặc bằng 3.000 VND!'));
if ($sotien > $user['money']) show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần chuyển phải nhỏ hơn hoặc bằng số dư hiện tại!'));



$time = time();

	$user2 = $kun->user_orther($nguoinhan);


    $noidung_thongbao = "Bạn vừa chuyển ".number_format($sotien)." VND cho tài khoản ".$user2['username']." (".$user2['name'].") thành công!";
    $noidung_thongbao2 = "Bạn vừa nhận được ".number_format($sotien)." VND từ tài khoản ".$user['username']." (".$user['name'].")";

    $kun->thong_bao('Hệ thống', $user['username'], $noidung_thongbao);
    $kun->thong_bao('Hệ thống', $user2['username'], $noidung_thongbao2);

    $kun->send_fb($user['username']." vừa chuyển ".number_format($sotien)." VND cho tài khoản ".$user2['username']." (".$user2['name'].")");

    $kun->send_email($kun->config('mail_from'), $user['email'], $kun->config('site_name').": Chuyển Tiền" ,$noidung_thongbao);
    $kun->send_email($kun->config('mail_from'), $user2['email'], $kun->config('site_name').": Nhận tiền từ ".$user['name'] ,$noidung_thongbao2." với lời nhắn \"".$noidung."\"");



    $phi = (1 * $sotien) / 100;
    $tru_phi = $sotien + $phi;
	$tru_tien = $user['money'] - $tru_phi;
	$cmd_3 = "UPDATE `users` SET money = '".$tru_tien."' WHERE `username`='".$user['username']."' ";
	mysqli_query($kun->connect_db(), $cmd_3);
	
	
	$cmd_2 = "INSERT INTO `chuyen_tien` (`from`, `name`, `nguoinhan`, `name_nguoinhan`, `sotien`, `messages`, `status`, `time`) VALUES ('".$user['username']."', '".$user['name']."', '".$user2['username']."', '".$user2['name']."', '".$sotien."', '".$noidung."', 'true', '".$time."')";
	mysqli_query($kun->connect_db(), $cmd_2);
	
	
	$cong_tien = $user2['money'] + $sotien;
	$cmd_x = "UPDATE `users` SET money = '".$cong_tien."' WHERE `username`='".$user2['username']."' ";
	mysqli_query($kun->connect_db(), $cmd_x);	
	
					sleep(1);
		
		show(array('status' => 'true', 'code' => 200, 'message' => 'Bạn vừa chuyển '.number_format($sotien).' VND tới tài khoản '.$user2['name'].'!'));
			
	
	



