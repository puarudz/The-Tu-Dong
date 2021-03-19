<?php
require '../../Core.php';
use Core\System;
$kun = new System;

if(isset($_POST)) {
	if($_POST['email'] && $_POST['captcha']) {

		$e = $_POST['email'];
		$c = $_POST['captcha'];

		require $_SERVER['DOCUMENT_ROOT'].'/lib/recaptcha/recaptchalib.php';

		$reCaptcha = new ReCaptcha('6LeOJiwaAAAAANsfcxgn-Fda9KiUBWlSk_tkDiAg');
		$response = null;
		    if ($c) {
		        $response = $reCaptcha->verifyResponse(
		          $_SERVER['REMOTE_ADDR'],
		          $c
		      );
		      
		      if ($response != null && $response->success) {
		      	// success catcha
		      } else {
		          die('<script>swal("Lỗi Captcha!", "Lỗi", "error");window.location = "/reset/password";</script>');
		      }
		    }

		$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');

		foreach ($syntax as $key) {

			if($kun->tim_chuoi($e,$key) == true) {
			die('<script>swal("Email không hợp lệ!", "Lỗi", "error");</script>');
			}
		}

		if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
		    die('<script>swal("Email không đúng định dạng!", "Lỗi", "error");</script>');
		 }

		$result = mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `email`='".$e."' ");
		$rowcount = mysqli_num_rows($result);
		if($rowcount <= 0) {
			die('<script>swal("Email này không tồn tại trên hệ thống!", "Lỗi", "error");</script>');
		}

		$user = mysqli_fetch_assoc($result);


		$newpass = strtoupper($kun->Creat_Token(10));
		$mail_content = "Bạn đã yêu cầu lấy lại mật khẩu cho tài khoản: ".$user['username']." (".$user['name'].")<br>";
		$mail_content .= "Mật khẩu mới của bạn là: <b>".$newpass."</b><br>";

		mysqli_query($kun->connect_db(), "UPDATE `users` SET `password` = '".md5($newpass)."' WHERE `username`='".$user['username']."'");

		$kun->send_email($kun->config('mail_from'), $e, $kun->config('mail_title'), $mail_content);

		die('<script>swal("Chúng tôi đã gửi mail đến tài khoản của bạn! Vui lòng kiểm tra email để lấy lại mật khẩu!", "Thông Báo!", "success");setTimeout(function(){ window.location = "/signin.html"; }, 2000);</script>');

	}else {
		die('<script>swal("Hãy điền đầy đủ thông tin!", "Lỗi", "error");</script>');
	}


}else {
	die(json_encode(array('status' => false, 'msg' => 'Lỗi!')));
}