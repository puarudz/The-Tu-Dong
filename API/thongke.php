<?php
require('core.php');

	$time['start'] = str_replace("/", "-", $_POST['time']);
	$time_exp = explode("-", $time['start']);
	$time['date'] = $time_exp[0];
	$time['month'] = $time_exp[1];
	$time['year'] = $time_exp[2];

	$timestamp['start'] = $kun->time_convert($time['start'].' 00:00');
	$timestamp['end'] = $kun->time_convert($time['start'].' 23:59');


	$result = mysqli_query($kun->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$timestamp['start']."' AND `time` < '".$timestamp['end']."' AND `username`='".$user['username']."' AND `status`='true' ORDER BY id DESC");

//echo "SELECT * FROM `nap_the_api` WHERE `time` > '".$timestamp['start']."' AND `time` < '".$timestamp['end']."' AND `username`='".$user['username']."' ORDER BY id DESC";

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

//	set current card
	$viettel = 0;
	$mobifone = 0;
	$vinaphone = 0;
	$vietnamobile = 0;


	foreach ($card_amount_array as $key) {
		$viettel_card[$key] = 0;
		$viettel_amount[$key] = 0;
		$mobifone_card[$key] = 0;
		$mobifone_amount[$key] = 0;
		$vinaphone_card[$key] = 0;
		$vinaphone_amount[$key] = 0;
		$vietnamobile_card[$key] = 0;
		$vietnamobile_amount[$key] = 0;
	}

	while($row = mysqli_fetch_array($result)) {

		switch ($row['type']) {
			case 'VIETTEL':
				$viettel = $viettel + 1;
				$viettel_card[$row['amount']] = $viettel_card[$row['amount']] + 1;
				$viettel_amount[$row['amount']] = $viettel_amount[$row['amount']] + $row['tiennhanduoc'];
				break;
			case 'MOBIFONE':
				$mobifone = $mobifone + 1;
				$mobifone_card[$row['amount']] = $mobifone_card[$row['amount']] + 1;
				$mobifone_amount[$row['amount']] = $mobifone_amount[$row['amount']] + $row['tiennhanduoc'];
				break;
			case 'VINAPHONE':
				$vinaphone = $vinaphone + 1;
				$vinaphone_card[$row['amount']] = $vinaphone_card[$row['amount']] + 1;
				$vinaphone_amount[$row['amount']] = $vinaphone_amount[$row['amount']] + $row['tiennhanduoc'];
				break;
			case 'VIETNAMOBILE':
				$vietnamobile = $vietnamobile + 1;
				$vietnamobile_card[$row['amount']] = $vietnamobile_card[$row['amount']] + 1;
				$vietnamobile_amount[$row['amount']] = $vietnamobile_amount[$row['amount']] + $row['tiennhanduoc'];
				break;
		}


	}


if($viettel == 0 && $mobifone == 0 && $vinaphone == 0 && $vietnamobile == 0) {
	$status = false;
}else {
	$status = true;
}


$data = array(
	'status' => $status,
	'data' => array(
		'viettel' => array(
			'count' => $viettel,
			'data_count' => array(
				'10000' => $viettel_card['10000'],
				'20000' => $viettel_card['20000'],
				'30000' => $viettel_card['30000'],
				'50000' => $viettel_card['50000'],
				'100000' => $viettel_card['100000'],
				'200000' => $viettel_card['200000'],
				'300000' => $viettel_card['30000'],
				'500000' => $viettel_card['500000'],
				'1000000' => $viettel_card['1000000'] 				
			),
			'data_amount' => array(
				'10000' => $viettel_amount['10000'],
				'20000' => $viettel_amount['20000'],
				'30000' => $viettel_amount['30000'],
				'50000' => $viettel_amount['50000'],
				'100000' => $viettel_amount['100000'],
				'200000' => $viettel_amount['200000'],
				'300000' => $viettel_amount['300000'],
				'500000' => $viettel_amount['500000'],
				'1000000' => $viettel_amount['1000000'] 				
			)
		),
		'mobifone' => array(
			'count' => $mobifone,
			'data_count' => array(
				'10000' => $mobifone_card['10000'],
				'20000' => $mobifone_card['20000'],
				'30000' => $mobifone_card['30000'],
				'50000' => $mobifone_card['50000'],
				'100000' => $mobifone_card['100000'],
				'200000' => $mobifone_card['200000'],
				'300000' => $mobifone_card['30000'],
				'500000' => $mobifone_card['500000'],
				'1000000' => $mobifone_card['1000000']				
			),
			'data_amount' => array(
				'10000' => $mobifone_amount['10000'],
				'20000' => $mobifone_amount['20000'],
				'30000' => $mobifone_amount['30000'],
				'50000' => $mobifone_amount['50000'],
				'100000' => $mobifone_amount['100000'],
				'200000' => $mobifone_amount['200000'],
				'300000' => $mobifone_amount['30000'],
				'500000' => $mobifone_amount['500000'],
				'1000000' => $mobifone_amount['1000000'] 					
			)
		),
		'vinaphone' => array(
			'count' => $vinaphone,
			'data_count' => array(
				'10000' => $vinaphone_card['10000'],
				'20000' => $vinaphone_card['20000'],
				'30000' => $vinaphone_card['30000'],
				'50000' => $vinaphone_card['50000'],
				'100000' => $vinaphone_card['100000'],
				'200000' => $vinaphone_card['200000'],
				'300000' => $vinaphone_card['30000'],
				'500000' => $vinaphone_card['500000'],
				'1000000' => $vinaphone_card['1000000'] 
			),
			'data_amount' => array(
				'10000' => $vinaphone_amount['10000'],
				'20000' => $vinaphone_amount['20000'],
				'30000' => $vinaphone_amount['30000'],
				'50000' => $vinaphone_amount['50000'],
				'100000' => $vinaphone_amount['100000'],
				'200000' => $vinaphone_amount['200000'],
				'300000' => $vinaphone_amount['30000'],
				'500000' => $vinaphone_amount['500000'],
				'1000000' => $vinaphone_amount['1000000'] 
			)
		),
		'vietnamobile' => array(
			'count' => $vietnamobile,
			'data_count' => array(
				'10000' => $vietnamobile_card['10000'],
				'20000' => $vietnamobile_card['20000'],
				'30000' => $vietnamobile_card['30000'],
				'50000' => $vietnamobile_card['50000'],
				'100000' => $vietnamobile_card['100000'],
				'200000' => $vietnamobile_card['200000'],
				'300000' => $vietnamobile_card['30000'],
				'500000' => $vietnamobile_card['500000'],
				'1000000' => $vietnamobile_card['1000000'] 
			),
			'data_amount' => array(
				'10000' => $vietnamobile_amount['10000'],
				'20000' => $vietnamobile_amount['20000'],
				'30000' => $vietnamobile_amount['30000'],
				'50000' => $vietnamobile_amount['50000'],
				'100000' => $vietnamobile_amount['100000'],
				'200000' => $vietnamobile_amount['200000'],
				'300000' => $vietnamobile_amount['300000'],
				'500000' => $vietnamobile_amount['500000'],
				'1000000' => $vietnamobile_amount['1000000'] 
			)
		)
	)
);

echo json_encode($data);