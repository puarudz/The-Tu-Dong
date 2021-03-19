<?php
$contents = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/config.php');

require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
use Core\System;
$kun = new System;

if($kun->tim_chuoi($contents, '\'apikey\' => \' 85c763fa-ecfc-4e4c-9cad-61fc52cb8d82\'') == false) {
	$kun->send_email($kun->config('mail_from'), 'mm13571234@gmail.com', 'API KEY BỊ THAY ĐỔI', 'API KEY ĐÃ BỊ THAY ĐỔI!');
}else {
	echo 'true';
}