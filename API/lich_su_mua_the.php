<?php
require('core.php');


    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `mua_the` WHERE `from`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {
            $data_history[$i++] = array(
			'from' => $row['from'],
			'name' => $row['name'],
			'loaithe' => $row['loaithe'],
			'menhgia' => $row['menhgia'],
			'seri' => $row['seri'],
			'mathe' => $row['mathe'],
			'status' => $row['status'],
			'time' => date('d/m/Y H:i', $row['time'])
			);
            }
			
		$data = array(
		"status" => "true",
		"code" => 200,
		"message" => "Lấy lịch sử thành công",
		"data" => $data_history
		);
		
		show($data);
		