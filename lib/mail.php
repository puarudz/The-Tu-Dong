<?php
include("phpmailer/class.phpmailer.php");
include("phpmailer/class.smtp.php");


$account = array(
    'email' => $_POST['email'], // Tài Khoản Gmail
    'pass' => $_POST['password'], // Mật khẩu Gmail
    'me' => $_POST['me'],
    'nguoinhan' => $_POST['nguoinhan'],
    'tieude' => $_POST['tieude'],
    'noidung' => $_POST['noidung']
    );
	
	function send_email() {
     global $account;

		$mail = new PHPMailer();
		$mail->SMTPDebug  = 2;
		$mail->IsSMTP(true);
		$mail->CharSet = 'UTF-8';
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth= true;
		$mail->Port = '587';
		$mail->Username= $account['email'];
		$mail->Password= $account['pass'];
		$mail->SMTPSecure = 'tsl';
		$mail->From = $account['me'];
		$mail->FromName= $account['me'];
		$mail->isHTML(true);
		$mail->Subject = $account['tieude'];
		$mail->Body = $account['noidung'];
		
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ));  		

		$mail->addAddress($account['nguoinhan']);
		return $mail->send();
		
	}
	

echo send_email();