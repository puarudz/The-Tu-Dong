<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>


<section class="panel">
                          <header class="panel-heading">
                              Thẻ Nạp Chậm
                          </header>
                          <div class="panel-body">
                              <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                                  <table id="example" class="table table-striped table-advance table-hover">
                                      <thead>
                                      	<thead>
                              <tr>
                              	  <th>Người Nạp</th>
                                  <th>Loại Thẻ</th>
                                  <th>Mệnh Giá</th>
                                  <th>Mã Thẻ</th>
                                  <th>Seri</th>
                                  <th>Trạng Thái</th>
                                  <th>Thời Gian</th>
                                  <th>Duyệt</th>
                              </tr>
                              </thead>

                              <tbody>
<?php        
 $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `nap_the` ORDER BY id DESC LIMIT $start, $kmess");
 $tong = $kun->thong_ke_he_thong('nap_the');
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
?>
							  	<tr>
                                  <td><?php echo $row['name'];?></td>
                                  <td><?php echo $row['loaithe'];?></td>
                                  <td><?php echo number_format($row['menhgia']);?> đ</td>
                                  <td><?php echo $row['mathe'];?></td>
                                  <td><?php echo $row['seri'];?></td>
                                  <td><span class="label label-<?php echo $btn;?> label-mini"><?php echo $trangthai;?></span></td>
                                  <td><?php echo date('d/m H:i', $row['time']);?></td>

                                  <td>
                                      <?php echo $action;?>
                                      <button class="btn btn-danger btn-xs" onclick="action('<?php echo $row['id'];?>', 'delete');"><i class="fa fa-trash-o "></i></button>
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
echo '<center>' . $kun->phantrang('?act=the_nap_cham&', $start, $tong, $kmess) . '</center>';
}
?>

                          </div>
                      </section>



  <script>
    function action(id, type) {

      if(type == 'true') {
        if(confirm("Thẻ này là thẻ đúng?") == true){
    var api = 'modun/duyet_the_nap_cham.php';
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
        if(confirm("Thẻ này là thẻ sai?") == true){
    var api = 'modun/duyet_the_nap_cham.php';
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
        if(confirm("Bạn có chắc muốn xóa thẻ này?") == true){
    var api = 'modun/duyet_the_nap_cham.php';
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