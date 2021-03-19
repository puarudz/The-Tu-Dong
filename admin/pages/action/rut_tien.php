<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>


                    <div class="container-fluid">
         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h3>Yêu Cầu Rút Tiền Chưa Được Xử Lý</h3>
                                        <br>
        
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap">
                                                <thead>
                              <tr>
                              	  <th>Người Dùng</th>
                              	  <th>Hình Thức</th>
                                  <th>Ngân Hàng</th>
                                  <th>Số Tài Khoản</th>
                                  <th>Chủ Tài Khoản</th>
                                  <th>Số Tiền Nhận</th>
                                  <th>Trạng Thái</th>
                                  <th>Thời Gian</th>
                                  <th>Duyệt</th>
                              </tr>
                                                </thead>
                                                <tbody>
<?php        
 $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_tien` WHERE status = 'delay' ORDER BY id DESC LIMIT $start, $kmess");
 $tong = $kun->thong_ke_he_thong('rut_tien');
        while( $row=mysqli_fetch_array($sel) ) {

        	if($row['status'] == 'true') {
        		$btn = 'primary';
        		$trangthai = 'Thành Công';
            $action = '<button class="btn btn-warning btn-xs" onclick="action(\''.$row['id'].'\',\'false\')"><i class="fa fa-times"></i></button>'."\n";
        	}else if ($row['status'] == 'false') {
        		$btn = 'danger';
        		$trangthai = 'Yêu Cầu Lỗi';
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
?>
							  	<tr>
							  	  <td><?php echo $row['from'];?></td>
                                  <td><?php echo $row['type'];?></td>
                                  <td><?php echo $row['nganhang'];?></td>
                                  <td><?php echo $row['nguoinhan'];?></td>
                                  <td><?php echo $row['chutaikhoan'];?></td>
                                  <td><?php echo number_format($row['sotien']);?> đ</td>
                                  <td><span class="label label-<?php echo $btn;?> label-mini"><?php echo $trangthai;?></span></td>
                                  <td><?php echo date('d/m H:i', $row['time']);?></td>

                                  <td>
                                      <?php echo $action;?>
                                      <button class="btn btn-danger btn-xs" onclick="action('<?php echo $row['id'];?>', 'delete');"><i class="fa fa-trash"></i></button>
                                  </td>
                              	</tr>

<?
            }
?>

                                      </tbody>
                                  </table>
                              </div>
    <?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('?act=rut_tien&', $start, $tong, $kmess) . '</center>';
}
?>

                                    </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

   </div> <!-- end col -->
                        </div>

  <script>
    function action(id, type) {

      if(type == 'true') {
        if(confirm("Phê duyệt yêu cầu này?") == true){
    var api = 'modun/yeu_cau_rut_tien.php';
    $.ajax({
        type: "POST",
        url: api,
        dataType: "json",
        data: {
            id: id,
            type: type,
            token: '<?php echo $_SESSION['token'];?>'
        },
        success: function(json)
        {
            if(json.status == "true") {
        swal(json.message,'thông báo!','success');
        window.location = '';
      }else {
        swal(json.message,'lỗi!','error');
      }
      
        }
    });
            }
      }

      if(type == 'false') {
        if(confirm("Yêu cầu này bị lỗi?") == true){
    var api = 'modun/yeu_cau_rut_tien.php';
    $.ajax({
        type: "POST",
        url: api,
        dataType: "json",
        data: {
            id: id,
            type: type,
            token: '<?php echo $_SESSION['token'];?>'
        },
        success: function(json)
        {
            if(json.status == "true") {
        swal(json.message,'thông báo!','success');
        window.location = '';
      }else {
        swal(json.message,'lỗi!','error');
      }
      
        }
    });
            }
      }


            if(type == 'delete') {
        if(confirm("Bạn có chắc muốn xóa yêu cầu này?") == true){
    var api = 'modun/yeu_cau_rut_tien.php';
    $.ajax({
        type: "POST",
        url: api,
        dataType: "json",
        data: {
            id: id,
            type: type,
            token: '<?php echo $_SESSION['token'];?>'
        },
        success: function(json)
        {
            if(json.status == "true") {
        swal(json.message,'thông báo!','success');
        window.location = '';
      }else {
        swal(json.message,'lỗi!','error');
      }
      
        }
    });
            }
      }

    }

  </script>