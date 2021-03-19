<?php
require('core.php');



    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `chuyen_tien` WHERE `nguoinhan`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {
            $data_history[$i++] = array(
			'nguoichuyen' => htmlentities($row['name']),
      'noidung' => htmlentities($kun->cut_str($row['messages'], 50)),
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