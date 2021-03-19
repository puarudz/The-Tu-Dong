<?php
session_start();
error_reporting(1);
ini_set('display_errors', 'Off');
date_default_timezone_set("Asia/Bangkok");
// You want all errors to be triggered

// config file

$config = array(
	    /*** Database Config ***/
	'LOCALHOST' => 'localhost', // mysql host service
	'USERNAME' => 'xxx', // username
	'PASSWORD' => 'xxx', // password
	'DATABASE' => 'xxx', // database name

	    /*** Thông Tin Thêm ***/
	'site_name' => 'TrumCard.Vn', // Bắt buộc - Tên này sẽ gồm trong tiêu đề mail gửi cho người dùng
	'site_url' => 'https://trumcard.vn', // Url website
	'admin_name' => 'Vũ Duy Lực', // Hiện dưới footer
	'admin_link' => 'https://facebook.com/kunkey.riox', // Hiện dưới footer
	'admin_number_phone' => '0836851125', // Hiện dưới footer
	'admin_email' => 'mm13571234@gmail.com', // Hiện dưới footer
	'admin_andress' => 'Ha Noi - Viet Nam', // Hiện dưới footer

	    /*** Email SMTP - Dùng để gửi Mail tới người dùng (Bắt Buộc) ***/
	'email' => 'hotro.trumcard@gmail.com', // Email đăng nhập (Gmail)
	'password' => 'xxx', // Password Email đăng nhập (Gmail)
	'mail_from' => 'hotro@trumcard.vn', // Tên người gửi email
	'mail_title' => 'TrumCard.Vn', // email title

	    /*** API KEY - Dùng để xử lí thẻ (Bắt Buộc) ***/
	'apikey' => '85c763fa-ecfc-4e4c-9cad-61fc52cb8d82', // api key nhận tiền khi khách nạp qua api tích hợp
	'apikey2' => '564a4c08-3bd8-4e1f-af57-cd311490674c', // api key nhận tiền khi khách nạp qua api tích hợp
	'cardvip_username' => 'xxx',
	'cardvip_password' => 'xxx',
	'cardvip_password2' => 'xxx'
);


function get_chietkhau($card_type) {
    global $config;
    $conn = mysqli_connect($config['LOCALHOST'],$config['USERNAME'],$config['PASSWORD'],$config['DATABASE']) or die("Can't Connect To Database!");
    $conn->set_charset("utf8");
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `settings` WHERE `key`='chietkhau'"));
    $json = json_decode($result['value'], true);
    return $json[$card_type];
}

$viettel = get_chietkhau('VIETTEL');
$mobifone = get_chietkhau('MOBIFONE');
$vinaphone = get_chietkhau('VINAPHONE');
$vietnamobile = get_chietkhau('VIETNAMOBILE');
$zing = get_chietkhau('ZING');
$gate = get_chietkhau('GATE');
$garena = get_chietkhau('GARENA');
$vcoin = get_chietkhau('VCOIN');


   /*** Tên file trong thư mục pages/action (chống hacker truy cập file khác) ***/
$action_array = array(
		"doi_mat_khau", 
		"doi_mat_khau_cap_2", 
		"reset_password_2", 
		"chinh_sua_tai_khoan", 
		"nap_the", 
		"thong_tin", 
		"lich_su_nap_the",
        "lich_su_nap_the_api",
        "tich_hop_api",
		"mua_the", 
		"lich_su_mua_the", 
		"chuyen_tien",
		"lich_su_nhan_tien",
		"rut_tien",
        "thong_bao",
        "dai_ly",
        "member_dai_ly",
        "lich_su_nap_the_dai_ly"		
		);
?>
