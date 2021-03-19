<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>


<section class="panel">
                          <header class="panel-heading">
                              Thẻ Cào Trên Hệ Thống
                          </header>
                          <div class="panel-body">
                              <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                                  <table id="example" class="table table-striped table-advance table-hover">
                                      <thead>
                                      	<thead>
                              <tr>
                                  <th>Loại Thẻ</th>
                                  <th>Mệnh Giá</th>
                                  <th>Mã Thẻ</th>
                                  <th>Seri</th>
                                  <th>Trạng Thái</th>
                                  <th>Thời Gian</th>
                                  <th>Action</th>
                              </tr>
                              </thead>

                              <tbody>
<?php        
 $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `card_system` ORDER BY id DESC LIMIT $start, $kmess");
 $tong = $kun->thong_ke_he_thong('card_system');
        while( $row=mysqli_fetch_array($sel) ) {

        	if($row['status'] == 'true') {
        		$btn = 'primary';
        		$trangthai = 'Chưa Mua';
        	}else if ($row['status'] == 'false') {
        		$btn = 'danger';
        		$trangthai = 'Đã Mua';
        	}else if ($row['status'] == 'delay') {
        		$btn = 'warning';
        		$trangthai = '';
        	}else {
        		$btn = '';
        		$trangthai = '';
            $action = '';
        	}
?>
							  	<tr>
                                  <td><?php echo $row['loaithe'];?></td>
                                  <td><?php echo number_format($row['menhgia']);?> đ</td>
                                  <td><?php echo $row['mathe'];?></td>
                                  <td><?php echo $row['seri'];?></td>
                                  <td><span class="label label-<?php echo $btn;?> label-mini"><?php echo $trangthai;?></span></td>
                                  <td><?php echo date('d/m H:i', $row['time']);?></td>

                                  <td>
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
echo '<center>' . $kun->phantrang('?act=the_cao_he_thong&', $start, $tong, $kmess) . '</center>';
}
?>

                          </div>
                      </section>



  <script>
    function action(id, type) {

            if(type == 'delete') {
        if(confirm("Bạn có chắc muốn xóa thẻ này?") == true){
    var api = 'modun/the_cao.php';
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