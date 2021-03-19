<?php
require('core.php');

    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `add_by`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {
	            $data_history[$i++] = array(
	            'name' =>  $row['name'],
				'username' => $row['username'],
				'email' => $row['email'],
				'money' => $row['money'],
				'viettel' => $kun->user_setting_chietkhau($row['username'], 'VIETTEL'),
				'vinaphone' => $kun->user_setting_chietkhau($row['username'], 'VINAPHONE'),
				'mobifone' => $kun->user_setting_chietkhau($row['username'], 'MOBIFONE'),
				'vietnamobile' => $kun->user_setting_chietkhau($row['username'], 'VIETNAMOBILE'),
				'time' => date('d/m/Y H:i', $row['time'])
				);
            }
			
		$data = array(
		"status" => "true",
		"code" => 200,
		"message" => "Lấy danh sách thành viên đại lý thành công",
		"data" => $data_history
		);
		
		show($data);