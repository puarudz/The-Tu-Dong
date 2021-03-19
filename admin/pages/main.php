<?php
defined('KUNKEYPR') or exit('Restricted Access');

if(!$_GET['act']) {
	require 'info_sys.php';
}else {
$act = $_GET['act'];
		require 'action/'.$act.'.php';

}

?>