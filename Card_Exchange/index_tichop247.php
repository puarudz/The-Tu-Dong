<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;



$auth = $_GET['key']; // api key
$card_type = $_GET['card_type']; // card type
$card_amount = $_GET['card_amount']; // card amount
$card_code = $_GET['card_code']; // card code
$card_seri = $_GET['card_seri']; // card seri
$request_id = $_GET['request_id']; // request id
$callback_url = $_GET['callback'];


if(!$auth || !$card_type || !$card_amount || !$card_code || !$card_seri || !$request_id || !$callback_url) {
    die(json_encode(array('status' => 100, 'message' => 'Nhập thiếu dữ liệu!')));
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');

foreach ($syntax as $key) {
    if($kun->tim_chuoi($auth,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'api key không được chứa có kí tự lạ!')));
    }

    if($kun->tim_chuoi($card_type,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'tên nhà mạng không được chứa có kí tự lạ!')));
    }

    if($kun->tim_chuoi($card_amount,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'giá trị thẻ không được chứa có kí tự lạ!')));
    }

    if($kun->tim_chuoi($card_code,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'mã thẻ không được chứa có kí tự lạ!')));
    }

    if($kun->tim_chuoi($card_seri,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'mã seri không được chứa có kí tự lạ!')));
    }

    if($kun->tim_chuoi($request_id,$key) == true) {
        die(json_encode(array('status' => 500, 'message' => 'request id không được chứa có kí tự lạ!')));
    }

}

$card_type_array = array(
    'VIETTEL',
    'MOBIFONE',
    'VINAPHONE',
    'VIETNAMOBILE',
    'ZING',
    'GATE',
    'GARENA',
    'VCOIN'
);

$card_amount_array = array(
    '10000',
    '20000',
    '30000',
    '50000',
    '100000',
    '200000',
    '300000',
    '500000',
    '1000000'
);


if(!in_array($card_type, $card_type_array)) {
    die(json_encode(array('status' => 403, 'message' => 'Tên Nhà Mạng Không Hợp Lệ!')));
}

if(!in_array($card_amount, $card_amount_array)) {
    die(json_encode(array('status' => 403, 'message' => 'Mệnh Giá Không Hợp Lệ!')));
}

if(!filter_var($callback_url, FILTER_VALIDATE_URL)) {
    die(json_encode(array('status' => 403, 'message' => 'Url Callback Không Hợp Lệ!')));    
}

$user = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `auth` ='".$auth."'"));

if(!$user['username']) {
    die(json_encode(array('status' => 403, 'message' => 'API KEY Không Hợp Lệ!'))); 
}


switch ($card_type) {
    case 'VIETTEL':
        $nw_type = 'VTT';
        break;
    case 'MOBIFONE':
        $nw_type = 'VMS';
        break;
    case 'VINAPHONE':
        $nw_type = 'VNP';
        break;
    case 'VIETNAMOBILE':
        $nw_type = 'VNP';
        break;
}


    $callback = $config['site_url']."/Card_Exchange/callback_0x13d.php";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://tichhop247.com/API/NapThe?APIKey=".$config['apikey']."&Network=".$nw_type."&CardCode=".$card_code."&CardSeri=".$card_seri."&CardValue=".$card_amount."&URLCallback=".$callback."&TrxID=".$request_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $responseDecode = json_decode($response,true);

    $myfile = fopen("log/log_nap.bat", "a");
    $txt = $user['username']."|".date('H:i:s d/m/y', time())."|".$request_id."|".$responseDecode['Code']."|".$responseDecode['Message']."\n";
    fwrite($myfile, $txt);
    fclose($myfile);


    if ($responseDecode['Code'] == 1) 
    {
              //Gửi thẻ thành công, đợi duyệt.
            if($user['add_by']) {
                $daily = $user['add_by'];
            }else {
                $daily = null;
            }
        
            $cmd = "INSERT INTO `nap_the_api` (`daily`, `daily_nhan`, `username`, `name`, `type`, `amount`, `amount_real`, `pin`, `serial`, `tiennhanduoc`, `transid`, `callback`, `status`, `time`) VALUES ('".$daily."', '0', '".$user['username']."', '".$user['name']."', '".$card_type."', '".$card_amount."', '0', '".$card_code."', '".$card_seri."', '0', '".$request_id."', '".$callback_url."', 'delay', '".time()."')";
            mysqli_query($kun->connect_db(), $cmd);
            die(json_encode(array('status' => 200, 'message' => 'Gửi thẻ thành công!')));   
    }
    else if($responseDecode['Code'] == 0){
          die(json_encode(array('status' => 100, 'message' => $responseDecode['Message'])));   
    }else
    {
         die(json_encode(array('status' => 100, 'message' => $responseDecode['Message'])));   
    }
        exit();