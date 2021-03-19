<?php
require '../../Core.php';
use Core\System;
$kun = new System;

$myfile = fopen("log.txt", "a");
$txt = $_GET['status']."|".number_format($_GET['value_receive'])."|".$_GET['pricesvalue']."|".$_GET['card_code']."|".$_GET['card_seri']."|".$_GET['requestid']."|".date('H:i:s d/m/y', time())."\n";
fwrite($myfile, $txt);
fclose($myfile);

?>