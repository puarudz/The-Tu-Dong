<?php
require('core.php');

$pass2 = $_POST['pass2'];
$nganhang = $_POST['nganhang'];
$nguoinhan = strtoupper($_POST['nguoinhan']);
$chutaikhoan = strtoupper($_POST['chutaikhoan']);
$sotien = $_POST['sotien'];



if ($user['money'] < 50000) show(array('status' => 'false', 'code' => 400, 'message' => 'Số dư trong tài khoản của bạn phải lớn hơn 50.000 VND mới có thể dùng được tính năng này!'));

if(!$nganhang || !$nguoinhan || !$chutaikhoan || !$sotien || !$pass2) show(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng nhập đầy đủ thông tin!'));


$check_pass_2 = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `passcap2` WHERE `password`='".md5($pass2)."' AND `username`='".$user['username']."'"));

if(!$check_pass_2['username']) show(array('status' => 'false', 'code' => 400, 'message' => 'Mật khẩu cấp 2 không chính xác!'));



$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/', '-');

foreach ($syntax as $key) {
	if($kun->tim_chuoi($nganhang,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên ngân hàng thụ hưởng không được có kí tự lạ!'));
	}
	if($kun->tim_chuoi($nguoinhan,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên tài khoản không được có kí tự lạ!'));
	}
  	if($kun->tim_chuoi($chutaikhoan,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Tên chủ tài khoản không được có kí tự lạ!'));
	}
  	if($kun->tim_chuoi($sotien,$key) == true) {
	show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền muốn rút là dạng số và không được có kí tự lạ!'));
	}
  
}


if(strlen($nguoinhan) < 6) show(array('status' => 'false', 'code' => 400, 'message' => 'Độ dài tài khoản nhận không hợp lệ!'));
if(strlen($chutaikhoan) < 6) show(array('status' => 'false', 'code' => 400, 'message' => 'Độ dài chủ tài khoản không hợp lệ!'));
if(strlen($sotien) < 5) show(array('status' => 'false', 'code' => 400, 'message' => 'Độ dài số tiền rút không hợp lệ!'));



if (filter_var($sotien, FILTER_VALIDATE_INT)) {}else {show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần rút phải là dạng số và lớn hơn hoặc bằng 10.000 VND!'));};
if ($sotien < 10000) show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần rút phải lớn hơn hoặc bằng 10.000 VND!'));
if ($sotien > $user['money']) show(array('status' => 'false', 'code' => 400, 'message' => 'Số tiền cần rút phải nhỏ hơn hoặc bằng số dư hiện tại!'));



//echo $hinhthuc.'<br>';
//echo $nganhang.'<br>';
//echo $nguoinhan.'<br>';
//echo $chutaikhoan.'<br>';
//echo $sotien.'<br>';

$time = time();

    $noidung = "Bạn vừa gửi yêu cầu rút tiền trị giá ".number_format($sotien)." VND. Yêu cầu của bạn sẽ được Admin xử lý sớm nhất!";
    $noidung_admin = $user['name']."(".$user['username'].") vừa yêu cầu rút ".number_format($sotien)." VND về ngân hàng ".$nganhang.", vui lòng duyệt tiền cho thành viên!";

    $kun->thong_bao('Hệ thống', $user['username'], $noidung);
    $kun->send_fb($user['username']." vừa tạo yêu cầu rút ".number_format($sotien)." VND");
    $kun->send_email($kun->config('mail_from'), $user['email'], $kun->config('site_name').": Yêu cầu rút tiền" ,$noidung);
    $kun->send_email($kun->config('mail_from'), 'very@aro.vn', $kun->config('site_name').": Yêu cầu rút tiền" ,$noidung_admin);

	$tru_tien = $user['money'] - $sotien;
	$cmd_3 = "UPDATE `users` SET money = '".$tru_tien."' WHERE `username`='".$user['username']."' ";
	mysqli_query($kun->connect_db(), $cmd_3);

	$cmd_2 = "INSERT INTO `rut_tien` (`from`, `name`, `nguoinhan`, `chutaikhoan`, `type`, `nganhang`, `sotien`, `status`, `time`) VALUES ('".$user['username']."', '".$user['name']."', '".$nguoinhan."', '".$chutaikhoan."', 'Rút về ngân hàng', '".$nganhang."', '".$sotien."', 'delay', '".$time."');";

	mysqli_query($kun->connect_db(), $cmd_2);



					sleep(3);
		
		show(array('status' => 'true', 'code' => 200, 'message' => 'Bạn vừa gửi yêu cầu rút '.number_format($sotien).' VND. Yêu cầu của bạn sẽ được xử lý!'));
			









