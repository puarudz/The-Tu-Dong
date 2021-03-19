<?php defined( 'KUNKEYPR') or die( "ACCESS DENIED!");?>

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
                                        <h3 class="mb-0"><center>YÊU CẦU LẤY LẠI MẬT KHẨU CẤP 2</center></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">Bạn đang quên mật khẩu cấp 2! vui lòng bấm vào nút <b>RESET</b> bên dưới để yêu cầu lấy lại mật khẩu cấp 2!</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                       <div class="col-sm-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <img style="cursor:pointer;width: 100%; height: 46px;" id="imgcaptcha" src="/lib/captcha/captcha.php?rand=<?php echo rand();?>" onclick="document.getElementById('imgcaptcha').src = '/lib/captcha/captcha.php?rand='+ Math.random(); document.getElementById('captcha').focus();">
                                                </div>
                                                <div class="col-md-8">
                                                  <input class="form-control" type="text" id="captcha" placeholder="Nhập mã vào đây!">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <button id="submit" type="button" class="btn btn-primary my-4">RESET</button>
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

<script src="/assets/js/core/action/resetmatkhaucap2.js?v=<?php echo rand(0, 9999);?>"></script>