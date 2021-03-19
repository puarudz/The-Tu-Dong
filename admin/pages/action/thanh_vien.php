<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>

 <div class="container-fluid">


<?php 

if(isset($_POST['cong_tien_submit'])) {

	if($_POST['id']) {
		if($_POST['tien'] <= 0) {
			echo '<script>alert("Số Tiền cần Cộng phải lớn hơn 0!");</script>';
		}else {
			mysqli_query($kun->connect_db(), "UPDATE `users` SET `money`=`money`+'".$_POST['tien']."' WHERE `id`='".$_POST['id']."'");
			echo '<script>alert("Đã Cộng!");</script>';
		}
	}
}

if(isset($_POST['tru_tien_submit'])) {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));

	if($tar['money'] > 0) {
		if($_POST['id']) {
			if($_POST['tien'] <= 0) {
				echo '<script>alert("Số Tiền cần Trừ phải lớn hơn 0!");</script>';
			}else {
				mysqli_query($kun->connect_db(), "UPDATE `users` SET `money`=`money`-'".$_POST['tien']."' WHERE `id`='".$_POST['id']."'");
				echo '<script>alert("Đã Trừ!");</script>';
			}
		}
	}else {
		echo '<script>alert("Không thể trừ tiền thành viên không có hào nào!");</script>';
	}

}



if($_POST['type'] == 'block') {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));
	$count = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `users_block` WHERE `username`='".$tar['username']."'"));
	if($count > 0) {
		echo '<script>alert("Thành Viên '.$tar['username'].' Đã Bị Block!");</script>';
	}else {
		mysqli_query($kun->connect_db(), "INSERT INTO `users_block` (`username`, `time`) VALUES ('".$tar['username']."', '".time()."')");
		echo '<script>alert("Đã Block Thành Viên '.$tar['username'].'!");</script>';
	}
}



if($_POST['type'] == 'unblock') {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));
	$count = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `users_block` WHERE `username`='".$tar['username']."'"));
	if($count > 0) {
		mysqli_query($kun->connect_db(), "DELETE FROM `users_block` WHERE `username`='".$tar['username']."'");		
		echo '<script>alert("Thành Viên '.$tar['username'].' Đã Được Mở Block!");</script>';
	}else {
		echo '<script>alert("Thành Viên '.$tar['username'].' Đang Không Bị Block!");</script>';
	}
}



if($_POST['type'] == 'cong_tien') {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));
?>
                                                <!-- sample modal content -->
                                                <div class="modal fade" id="load" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                           <form  action="" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
			                                  <div class="form-group row">
			                                      <label for="tien" class="col-sm-3 col-form-label">Số Tiền Hiện Tại</label>
			                                      <input type="hidden" name="id" value="<?php echo $tar['id'];?>">
			                                      <div class="col-sm-9">
			                                          <input type="number" value="<?php echo $tar['money'];?>" class="form-control" name="current_money" readonly="">
			                                      </div>
			                                  </div>
			                                  <div class="form-group row">
			                                      <label for="tien" class="col-sm-3 col-form-label">Số Tiền Muốn Cộng</label>
			                                      <div class="col-sm-9">
			                                          <input type="number" name="tien" value="0" class="form-control">
			                                      </div>
			                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                              <a style="background-color: #b7b7b7;" href="" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                                              <button type="submit" name="cong_tien_submit" class="btn btn-primary">Lưu</button>
                                                            </div>
                                               </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>

<?php
}



if($_POST['type'] == 'tru_tien') {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));
?>
<!-- Modal -->
                                                    <!-- sample modal content -->
                                                <div class="modal fade" id="load" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                  <form  action="" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
			                                  <div class="form-group row">
			                                      <label for="tien" class="col-sm-3 col-form-label">Số Tiền Hiện Tại</label>
			                                      <input type="hidden" name="id" value="<?php echo $tar['id'];?>">
			                                      <div class="col-sm-9">
			                                          <input type="number" value="<?php echo $tar['money'];?>" class="form-control" name="current_money" readonly="">
			                                      </div>
			                                  </div>
			                                  <div class="form-group row">
			                                      <label for="tien" class="col-sm-3 col-form-label">Số Tiền Muốn Trừ</label>
			                                      <div class="col-sm-9">
			                                          <input type="number" name="tien" value="0" class="form-control">
			                                      </div>
			                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                              <a style="background-color: #b7b7b7;" href="" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                                              <button type="submit" name="tru_tien_submit" class="btn btn-primary">Lưu</button>
                                                            </div>
                                               </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php
}

if($_POST['type'] == 'delete') {
	$tar = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$_POST['id']."'"));
	mysqli_query($kun->connect_db(), "DELETE FROM `users` WHERE `id`='".$_POST['id']."'");
	echo '<script>alert("Đã Xóa!");</script>';
}




?>
                       <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Quản Lý Thành Viên</h4>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                      	<thead>
                              <tr>
                                  <th class="d-none"></th>
                                  <th class="d-none">block</th>
                              	  <th>ID</th>
                              	  <th>Username</th>
                              	  <th>Họ Tên</th>
                              	  <th>Email</th>
                              	  <th>SĐT</th>
                              	  <th>Money</th>
                              	  <th>IP</th>
                                  <th>Thời Gian</th>
                                  <th>API Key Tích Hợp</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
        
        
                                            <tbody>
<?php        
 $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `users` $cond ORDER BY id DESC");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `users`"));
        while( $row=mysqli_fetch_array($sel) ) {

        	if($row['status'] == 'true') {
        		$btn = 'primary';
        		$trangthai = 'Đã duyệt';
            $action = '<button class="btn btn-warning btn-xs" onclick="action(\''.$row['id'].'\',\'false\')"><i class="fa fa-times"></i></button>'."\n";
        	}else if ($row['status'] == 'false') {
        		$btn = 'danger';
        		$trangthai = 'Thẻ lỗi';
            $action = '<button class="btn btn-success btn-xs" onclick="action(\''.$row['id'].'\',\'true\')"><i class="fa fa-check"></i></button>'."\n";
        	}else if ($row['status'] == 'delay') {
        		$btn = 'warning';
        		$trangthai = 'Chờ duyệt';
            $action = '<button class="btn btn-success btn-xs" onclick="action(\''.$row['id'].'\',\'true\')"><i class="fa fa-check"></i></button>
            <button class="btn btn-warning btn-xs" onclick="action(\''.$row['id'].'\',\'false\')"><i class="fa fa-times"></i></button>';
        	}else {
        		$btn = '';
        		$trangthai = '';
            $action = '';
        	}


	$target = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` ='".$row['id']."'"));
	$count_block = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `users_block` WHERE `username`='".$target['username']."'"));
	if($count_block > 0) {
		$data_block = 'block';
		$btn_block = '<button class="btn btn-success btn-sm" onclick="action(\''.$row['id'].'\', \'unblock\');"><i class="fa fa-unlock"></i></button>';
	}else {
		$data_block = 'active';
		$btn_block = '<button class="btn btn-danger btn-sm" onclick="action(\''.$row['id'].'\', \'block\');"><i class="fa fa-ban"></i></button>';
	}

?>

							  	<tr>
							  	  <td class="d-none">'<?php echo $row['auth'];?>'</td>
							  	  <td class="d-none"><?php echo $data_block;?></td>
							  	  <td>#<?php echo $row['id'];?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['name'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['phone'];?></td>
                                  <td><?php echo number_format($row['money']);?>đ</td>
                                  <td><?php echo $row['ip'];?></td>
                                  <td><?php echo date('d/m/Y H:i', $row['time']);?></td>
                                  <td><input type="text" value="<?php echo $row['auth'];?>" id= "apikey" class="form-control" placeholder="API KEY" aria-describedby="basic-addon2" readonly="">
                    
                      </td>
                                  <td>
                                      <button class="btn btn-success btn-sm" onclick="action('<?php echo $row['id'];?>','cong_money')"><i class="fa fa-plus" aria-hidden="true"></i></button>
 							          <button class="btn btn-warning btn-sm" onclick="action('<?php echo $row['id'];?>','tru_money')"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                      <button class="btn btn-danger btn-sm" onclick="action('<?php echo $row['id'];?>', 'delete');"><i class="fa fa-trash"></i></button>
                                      <?php echo $btn_block;?>
                                  </td>
                              	</tr>

<?
            }
?>

                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                </div>
                </div>

  <script>
    function action(id, type) {

      if(type == 'cong_money') {
        if(confirm("Cộng Tiền Cho thành viên này?") == true){
			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="id"
			    element1.value = id;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="type"
			    element2.value = "cong_tien";
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
            }
      }

      if(type == 'tru_money') {
        if(confirm("Trừ tiền thành viên này?") == true){
			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="id"
			    element1.value = id;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="type"
			    element2.value = "tru_tien";
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
            }
      }


       if(type == 'delete') {
        if(confirm("Bạn có chắc muốn xóa thành viên này?") == true){
 			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="id"
			    element1.value = id;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="type"
			    element2.value = "delete";
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
            }
      }


       if(type == 'block') {
        if(confirm("Bạn có chắc muốn block thành viên này?") == true){
 			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="id"
			    element1.value = id;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="type"
			    element2.value = "block";
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
            }
      }


       if(type == 'unblock') {
        if(confirm("Bạn có chắc muốn mở block thành viên này?") == true){
 			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="id"
			    element1.value = id;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="type"
			    element2.value = "unblock";
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
            }
      }






    }

  </script>
