<?php
require('core.php');


    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `chuyen_tien` WHERE `from`='".$user['username']."' OR `nguoinhan`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {
	          		
	          		if($row['nguoinhan'] != $user['username']) $type = '-'; else $type = '+';

            $data_history[$i++] = array(
            'type' => $type,
			'nguoinhan' => htmlentities($row['name_nguoinhan']),
			'sotien' => htmlentities($row['sotien']),
			'status' => $row['status'],
			'time' => date('d/m/Y - H:i', $row['time'])
			);
            }
			
		$data = array(
		"status" => "true",
		"code" => 200,
		"message" => "Lấy lịch sử thành công",
		"data" => $data_history
		);
		
		show($data);