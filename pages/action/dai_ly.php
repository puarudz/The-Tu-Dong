<?php
defined('KUNKEYPR') or exit('Restricted Access');
if($user['add_by']) {
	echo '<script>window.location="/home"</script>';
  die();
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
                  <h3 class="mb-0">TẠO TÀI KHOẢN KHÁCH HÀNG</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <center><h6 class="heading-small text-muted mb-4">Tạo khách hàng tiềm năng để được hưởng chiết khấu hoa hồng</h6></center>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Họ Tên</label>
                        <input type="text" id="name" class="form-control" placeholder="Họ Tên Khách Hàng">
                      </div>
                    </div>


                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">SĐT/Tên Đăng Nhập</label>
                        <input type="text" id="username" class="form-control" placeholder="SĐT/Tên Đăng Nhập">
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Khách Hàng</label>
                        <input type="email" id="email" class="form-control" placeholder="Email Khách Hàng">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Mật Khẩu Khách Hàng</label>
                        <input type="password" id="password" class="form-control" placeholder="Mật Khẩu Khách Hàng">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Nhập Lại Mật Khẩu Khách Hàng</label>
                        <input type="password" id="repassword" class="form-control" placeholder="Nhập Lại Mật Khẩu Khách Hàng">
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Chiết Khẩu Viettel</label>
                            <select class="form-control" data-live-search="true" id="VIETTEL">
                                <?php for($i=0;$i<=10;$i++) { ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
                                 <?php } ?>
                            </select>
                      </div>
                    </div>


                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Chiết Khẩu Mobifone</label>
                            <select class="form-control" data-live-search="true" id="MOBIFONE">
                                <?php for($i=0;$i<=10;$i++) { ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
                                 <?php } ?>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Chiết Khẩu Vinaphone</label>
                            <select class="form-control" data-live-search="true" id="VINAPHONE">
                                <?php for($i=0;$i<=10;$i++) { ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
                                 <?php } ?>
                            </select>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Chiết Khẩu Vietnamobile</label>
                            <select class="form-control" data-live-search="true" id="VIETNAMOBILE">
                                <?php for($i=0;$i<=10;$i++) { ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
                                 <?php } ?>
                            </select>
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <div class="text-center">
                        <button id="creat" type="button" class="btn btn-primary my-4">Tạo</button>
                      </div>
                    </div>



                  </div>

                </div>

            </div>
          </div>




                  </div>
            </div>
        </div>
       </div>
</div>

	
<script type="text/javascript">
    $(document).ready(function() {
		
		$('#creat').click(function() {
		        document.getElementById("creat").disabled = true;
				document.getElementById('creat').innerHTML = "Đang Tạo";
            	var api = '/api/dai-ly';
                $.ajax({
                    type: "POST",
                    url: api,
            		dataType: "json",
                    data: {
                        token: '<?php echo $_SESSION['token'];?>',
            			name: $('#name').val(),
            			username: $('#username').val(),
            			email: $('#email').val(),
            			password: $('#password').val(),
                        repassword: $('#repassword').val(),
                        viettel: $('#VIETTEL').val(),
                        mobifone: $('#MOBIFONE').val(),
                        vinaphone: $('#VINAPHONE').val(),
                        vietnamobile: $('#VIETNAMOBILE').val()
                    },
                    success: function(json)
                    {
            			document.getElementById("creat").disabled = false;
                        document.getElementById('creat').innerHTML = "Tạo";
            			
                        if(json.status == "true") {
            				swal(json.message, 'thông báo!','success');
            			}else {
            				swal(json.message, 'Lỗi!','error');
            			}
            			
            			
                    }
                });
		});
		
});
</script>
	
	
	
	
	
	
	
	
	
	
	