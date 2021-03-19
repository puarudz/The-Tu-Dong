<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;
require $_SERVER['DOCUMENT_ROOT'].'/lib/recaptcha/recaptchalib.php';

switch ($_POST['type']) {
	case 'login':
		$kun->check_login();

$u = $_POST['username'];
$p = $_POST['password'];
$c =  $_POST['captcha'];

if(!$u || !$p || !$c) {
	die('<script>Notiflix.Notify.Failure("Vui Lòng Nhập Đầy Đủ Thông Tin!")</script>');
}


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
          die('<script>Notiflix.Notify.Failure("Lỗi Captcha!"); window.location = "/signin.html";</script>');
      }
    }


if($kun->check_user($u,$p) == true) {

$token = $kun->Creat_Token(200);
    
    $res = mysqli_query($kun->connect_db(), "UPDATE users SET token = '".$token."', ip = '".$_SERVER['REMOTE_ADDR']."' WHERE `username`='".$u."'");

    $_SESSION['token'] = $token;
    
	echo '<script>Notiflix.Notify.Success("Đăng Nhập Thành Công!")</script>';
	echo '<meta http-equiv="refresh" content="0;URL=home" />';

}else {
	die('<script>Notiflix.Notify.Failure("Thông tin đăng nhập không chính xác!")</script>');		
}




		break;

	case 'register':
	$kun->check_login();

$n = $_POST['name'];
$u = $_POST['username'];
$e = $_POST['email'];
$p = $_POST['password'];
$rp = $_POST['repassword'];


if(!$n || !$u || !$e || !$p || !$rp) {
	die('<script>Notiflix.Notify.Failure("Hãy điền đầy đủ thông tin! ")</script>');
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');


foreach ($syntax as $key) {
	if($kun->tim_chuoi($n,$key) == true) {
	die('<script>Notiflix.Notify.Failure("Tên của bạn không được có kí tự lạ! ")</script>');
	}

	if($kun->tim_chuoi($u,$key) == true) {
	die('<script>Notiflix.Notify.Failure("Tên tài khoản không được có kí tự lạ! ")</script>');
	}

	if($kun->tim_chuoi($e,$key) == true) {
	die('<script>Notiflix.Notify.Failure("Email không hợp lệ! ")</script>');
	}

	if($kun->tim_chuoi($p,$key) == true) {
	die('<script>Notiflix.Notify.Failure("Mật khẩu không được có kí tự lạ! ")</script>');
	}


}

	if($kun->tim_chuoi($n,'.') == true) {
	die('<script>Notiflix.Notify.Failure("Tên của bạn không được có kí tự lạ! ")</script>');
	}

	if($kun->tim_chuoi($u,'.') == true) {
	die('<script>Notiflix.Notify.Failure("Tên tài khoản không được có kí tự lạ! ")</script>');
	}

if(strlen($n) > 30) {
	die('<script>Notiflix.Notify.Failure("Tên của bạn không được quá 30 kí tự! ")</script>');
}

if(strlen($n) < 6) {
	die('<script>Notiflix.Notify.Failure("Tên của bạn không được nhỏ hơn 6 kí tự! ")</script>');
}

if(strlen($u) > 30) {
	die('<script>Notiflix.Notify.Failure("Tên tài khoản không được quá 30 kí tự! ")</script>');
}

if(strlen($u) < 6) {
	die('<script>Notiflix.Notify.Failure("Tên tài khoản không nhỏ hơn 6 kí tự! ")</script>');
}


if(strlen($p) < 6) {
	die('<script>Notiflix.Notify.Failure("Mật khẩu phải lớn hơn 6 kí tự! ")</script>');
}


if($rp !== $p) {
	die('<script>Notiflix.Notify.Failure("2 mật khẩu bạn nhập không giống nhau! ")</script>');
}


if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    die('<script>Notiflix.Notify.Failure("Email không đúng định dạng!")</script>');
  }

    $result = mysqli_query($kun->connect_db(), "SELECT `email` FROM `users` WHERE `email`='".$e."' ");
	$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
    die('<script>Notiflix.Notify.Failure("Email này đã tồn tại trên hệ thống!")</script>');
}


if($kun->check_user_register($u) == false) {

$token = $kun->Creat_Token(200);
$auth =  $kun->Creat_Token(15);

$time = time();
  
  
$verify_code = rand(10000, 99999);
$mail_content = 'Mã xác thực tài khoản '.$u.' là: '.$verify_code;

$kun->send_email($kun->config('mail_from'), $e, $kun->config('mail_title'), $mail_content);
 
 $cmd = "INSERT INTO users (fbid, admin, name, username, add_by, email, money, chietkhau, password, token, auth, ip, verify_code, verify, time) VALUES ('0', 0, '".$n."', '".$u."', '', '".$e."', 0, '', '".md5($p)."', '".$token."','".$auth."', '".$_SERVER['REMOTE_ADDR']."', '".$verify_code."', 'false', '".$time."')";


    $res = mysqli_query($kun->connect_db(), $cmd);

    $_SESSION['token'] = $token;


	echo '<script>Notiflix.Notify.Success("Đăng kí thành công!")</script>';
	echo '<meta http-equiv="refresh" content="0;URL=home" />';

}else {
	echo '<script>Notiflix.Notify.Failure("Tên tài khoản đã có người sử dụng! ", "Thông Báo")</script>';
}

		break;
		

	case 'verify':
   

    $code = $_POST['code'];
    
        if(!$code) {
	die(json_encode(array('status' => 'false', 'code' => 400, 'message' => 'Vui lòng nhập mã xác thực!')));
}
    
    if(strlen($code) > 5 || strlen($code) < 5) {
	die(json_encode(array('status' => 'false', 'code' => 400, 'message' => 'Mã xác nhận gồm 5 chữ số!')));
}
 if(filter_var($code, FILTER_VALIDATE_INT)) {}else {die(json_encode(array('status' => 'false', 'code' => 400, 'message' => 'Mã xác thực phải là dạng số!')));};
    
     $user = $kun->user_api($_POST['token']);   
    
    if($code == $user['verify_code']) {
      $res = mysqli_query($kun->connect_db(), "UPDATE users SET verify = 'true' WHERE `username`='".$user['username']."'");
      die(json_encode(array('status' => 'true', 'code' => 200, 'message' => 'Xác thực tài khoản thành công!')));
    }else {
      	die(json_encode(array('status' => 'false', 'code' => 400, 'message' => 'Mã xác thực không đúng!')));
    }
   
		break;
	
	
		case 'resend':
		    
$verify_code = rand(10000, 99999);
    $user = $kun->user_api($_POST['token']);
    $res = mysqli_query($kun->connect_db(), "UPDATE users SET verify_code = '".$verify_code."' WHERE `username`='".$user['username']."'");
$mail_content = 'Bạn vừa yêu cầu gửi lại mã xác thực. Mã xác thực tài khoản của bạn là: '.$verify_code;

$kun->send_email($kun->config('mail_from'), $user['email'], "Xác Thực Tài khoản Thetudong.Com", $mail_content);
		
		
		break;

	
	default:
		echo '<script>Notiflix.Notify.Failure("Lỗi hệ thống! Vui lòng thử lại sau!", "Thông Báo")</script>';
		break;
}

?>
