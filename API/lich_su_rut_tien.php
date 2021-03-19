<?php
require('core.php');


    $result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_tien` WHERE `from`='".$user['username']."' ORDER BY id DESC");
	
						$i = 0;
	          while( $row=mysqli_fetch_array($result) ) {
            $data_history[$i++] = array(
      'hinhthuc' => htmlentities($row['type']),
      'chutaikhoan' => htmlentities($row['chutaikhoan']),
			'nguoinhan' => htmlentities($row['nguoinhan']),
      'nganhang' => htmlentities($row['nganhang']),
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