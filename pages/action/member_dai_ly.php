<?php defined('KUNKEYPR') or die("ACCESS DENIED!");
if($user['add_by']) {
	echo '<script>window.location="/home"</script>';
}
?>



<?php if(isset($_POST['edit'])) {

	$_POST['username'] = addslashes($_POST['username']);

	$sql = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `add_by`='".$user['username']."' AND `username`='".$_POST['username']."'"));
	if($sql['username']) {
		?>


		<form action="" method="post">
                  <div class="modal show" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" style="display: block; padding-right: 17px;" aria-modal="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Sửa Chiết Khấu Thành Viên</h6>
                        </div>

                        <div class="modal-body">

					        <input type="hidden" name="username" value="<?php echo $sql['username'];?>">



							<div class="form-group row">
			                    <label for="example-text-input" class="col-md-4 col-form-label form-control-label">Tên Khách Hàng</label>
			                    <div class="col-md-8">
			                      <input readonly="" class="form-control" type="text" placeholder="Nhập tên khách hàng" value="<?php echo $sql['name'];?>">
			                    </div>
			                </div>

			                <div class="form-group row">
			                    <label for="example-text-input" class="col-md-4 col-form-label form-control-label">VIETTEL</label>
			                    <div class="col-md-8">
			                      <select class="form-control" data-live-search="true" name="VIETTEL">
			                        			<option value="<?php echo $kun->user_setting_chietkhau($sql['username'], 'VIETTEL');?>"><?php echo $kun->user_setting_chietkhau($sql['username'], 'VIETTEL');?>% - Hiện Tại</option>
			                        		<?php for($i=1;$i<=10;$i++) { ?>
			                                    <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
			                                <?php } ?>
			                        </select>
			                    </div>
			                </div>


			                <div class="form-group row">
			                    <label for="example-text-input" class="col-md-4 col-form-label form-control-label">VINAPHONE</label>
			                    <div class="col-md-8">
			                      <select class="form-control" data-live-search="true" name="VINAPHONE">
			                        			<option value="<?php echo $kun->user_setting_chietkhau($sql['username'], 'VINAPHONE');?>"><?php echo $kun->user_setting_chietkhau($sql['username'], 'VINAPHONE');?>% - Hiện Tại</option>
			                        		<?php for($i=1;$i<=10;$i++) { ?>
			                                    <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
			                                <?php } ?>
			                        </select>
			                    </div>
			                </div>



			                <div class="form-group row">
			                    <label for="example-text-input" class="col-md-4 col-form-label form-control-label">MOBIFONE</label>
			                    <div class="col-md-8">
			                      <select class="form-control" data-live-search="true" name="MOBIFONE">
			                        			<option value="<?php echo $kun->user_setting_chietkhau($sql['username'], 'MOBIFONE');?>"><?php echo $kun->user_setting_chietkhau($sql['username'], 'MOBIFONE');?>% - Hiện Tại</option>
			                        		<?php for($i=1;$i<=10;$i++) { ?>
			                                    <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
			                                <?php } ?>
			                        </select>
			                    </div>
			                </div>


			                <div class="form-group row">
			                    <label for="example-text-input" class="col-md-4 col-form-label form-control-label">VIETNAMOBILE</label>
			                    <div class="col-md-8">
			                      <select class="form-control" data-live-search="true" name="VIETNAMOBILE">
			                        			<option value="<?php echo $kun->user_setting_chietkhau($sql['username'], 'VIETNAMOBILE');?>"><?php echo $kun->user_setting_chietkhau($sql['username'], 'VIETNAMOBILE');?>% - Hiện Tại</option>
			                        		<?php for($i=1;$i<=10;$i++) { ?>
			                                    <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
			                                <?php } ?>
			                        </select>
			                    </div>
			                </div>


                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="update" class="btn btn-primary">Lưu Lại</button>
		        		  <a href="" class="btn btn-secondary">Đóng</a>
                        </div>
                      </div>
                    </div>
                  </div>
	</form>

		<?php
	}else {
		die('<script>swal("Lỗi!", "Bạn không có quyền thay đổi thành viên này!", "error")</script>');
	}
}


if(isset($_POST['update'])) {

	$_POST['username'] = addslashes($_POST['username']);

	$sql = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `add_by`='".$user['username']."' AND `username`='".$_POST['username']."'"));
	if($sql['username']) {
		if(!is_numeric($_POST['VIETTEL'])) {
			die("Lỗi chiết khấu!");
		}
		if(!is_numeric($_POST['MOBIFONE'])) {
			die("Lỗi chiết khấu!");
		}
		if(!is_numeric($_POST['VINAPHONE'])) {
			die("Lỗi chiết khấu!");
		}
		if(!is_numeric($_POST['VIETNAMOBILE'])) {
			die("Lỗi chiết khấu!");
		}

		$setting_ck = json_encode(array(
			'VIETTEL' => $_POST['VIETTEL'],
			'MOBIFONE' => $_POST['MOBIFONE'],
			'VINAPHONE' => $_POST['VINAPHONE'],
			'VIETNAMOBILE' => $_POST['VIETNAMOBILE']
		));
		mysqli_query($kun->connect_db(), "UPDATE `users` SET `chietkhau`='".mysqli_real_escape_string($kun->connect_db(), $setting_ck)."' WHERE `add_by`='".$user['username']."'");

		echo '<script>swal("Thành Công!", "Cập Nhật Chiết Khấu Thành Công", "success")</script>';
	}else {
		die('<script>swal("Lỗi!", "Bạn không có quyền thay đổi thành viên này!", "error")</script>');
	}



}
 


?>




<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
                  <div class="nav-wrapper row row-example justify-content-md-center">

			<div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Thành viên đại lý</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Quản lý thành viên đại lý</h6>
                <div class="pl-lg-4">
                  <div class="row">

        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="history-table">
            <thead class="thead-light">
               <tr>
            	<th class="f-xs " align="left">Họ Và Tên</th>
                <th class="f-xs " align="left">Username</th>			
                <th class="f-xs " align="left">Tiền</th>
                <th class="f-xs " align="left">Viettel</th>
                <th class="f-xs " align="left">Vinaphone</th>
                <th class="f-xs " align="left">Mobifone</th>
                <th class="f-xs " align="left">Vietnamobile</th>
                <th class="f-xs " align="left">Thời Gian</th>
                <th class="f-xs " align="left">Thao Tác</th>
               </tr>
            </thead>
            <tbody class="list" id="table-history">

            </tbody>
          </table>
        </div>
                              </div>

                  </div>
            </div>
        </div>
       </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
	var api = '/api/member-dai-ly';
    $.ajax({
        type: "POST",
        url: api,
		dataType: "json",
        data: {
            token: '<?php echo $_SESSION['token'];?>'
        },
        success: function(json)
        {
            if(json.status == "false") {
				swal("Lỗi", "Lỗi Hệ Thống", "error");
			}else {
			var data = json.data;
			$.each(data, function (index, value) {
			// data[index].from;
			
			var name = '<td class="text-center">'+data[index].name+'</td>';
			var username = '<td class="text-center">'+data[index].username+'</td>';
			var money = '<td class="text-center">'+number_format_vnd(data[index].money)+' VND</td>';
			var viettel = '<td class="text-center">'+data[index].viettel+'%</td>';
			var vinaphone = '<td class="text-center">'+data[index].vinaphone+'%</td>';
			var mobifone = '<td class="text-center">'+data[index].mobifone+'%</td>';
			var vietnamobile = '<td class="text-center">'+data[index].vietnamobile+'%</td>';	
			var time = '<td class="text-center">'+data[index].time+'</td>';
			var action = '<td class="text-center"><button onclick="edit(\''+data[index].username+'\')" class="btn btn-success btn-sm">Sửa</button></td>';
			
			$('#table-history').append('<tr>'+name+username+money+viettel+vinaphone+mobifone+vietnamobile+time+action+'</tr>');
			
			
			});


				
			}
			
		
        }
    });

});

function edit(username) {
 			    var form = document.createElement("form");
			    document.body.appendChild(form);
			    form.method = "POST";
			    form.action = "";
			    var element1 = document.createElement("INPUT");         
			    element1.name="username"
			    element1.value = username;
			    element1.type = 'hidden'
			    form.appendChild(element1);
			    var element2 = document.createElement("INPUT");         
			    element2.name="edit"
			    element2.value = username;
			    element2.type = 'hidden'
			    form.appendChild(element2);
			    form.submit();
}
</script>

