<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>
<div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper ct-example">
          <!-- Styles -->
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Đặt Mật Khẩu Cấp 2</h3>
            </div>
            <div class="card-body">

                    <p><span style="color:#e74c3c"><strong>Cảnh b&aacute;o: hãy ghi nhớ và không tiết lộ mật khẩu cấp 2 cho bất kì ai khác</strong></span></p>
                    <p><strong>Để tránh mất tiền oan, quý khách không được tiết lộ mật khẩu cấp 2 cho bất kì ai.</strong></p>

        <?php 
            if(isset($_POST['submit'])) {
                if($_POST['pass2'] && $_POST['repass2']) {

                    if(strlen($_POST['pass2']) < 6) {
                        echo '<div class="alert alert-danger">Mật khẩu cấp 2 không được nhỏ hơn 6 kí tự!</div>';
                    }else if($_POST['pass2'] != $_POST['repass2']) {
                        echo '<div class="alert alert-danger">2 mật khẩu không giống nhau!</div>';
                    }else {
                        $syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');

                        foreach ($syntax as $key) {
                            if($kun->tim_chuoi($_POST['pass2'],$key) == true) {
                            die('<div class="alert alert-danger">Mật khẩu không được có kí tự lạ!</div><meta http-equiv="refresh" content="2">');
                            }
                        }

                        mysqli_query($kun->connect_db(), "INSERT INTO `passcap2` (`username`, `password`, `time`) VALUES ('".$user['username']."', '".md5($_POST['pass2'])."', '".time()."')");
                        die('<div class="alert alert-success">Đổi mật khẩu cấp 2 thành công!</div><meta http-equiv="refresh" content="3">');
                    }

                }else {
                    echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin!</div>';
                }

            }
        ?>
            <form action="" method="post">
                 <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nhập Mật Khẩu</label>
                    <div class="col-md-10">
                      <input class="form-control" type="password" name="pass2" id="pass2" placeholder="Nhập mật khẩu cấp 2">
                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nhập Lại Mật Khẩu</label>
                    <div class="col-md-10">
                      <input class="form-control" type="password" name="repass2" id="repass2" placeholder="Nhập Lại Mật Khẩu">
                    </div>
                  </div>

                    <div class="col-sm-12">
                      <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary my-4">Cập Nhật</button>
                      </div>
                    </div>
            </form>

            </div>
          </div>
        </div>
    </div>
</div>