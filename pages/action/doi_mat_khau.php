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
                                        <h3 class="mb-0">ĐỔI MẬT KHẨU TÀI KHOẢN</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">Thay đổi mật khẩu tài khoản giúp bảo mật thông tin tài khoản của bạn!</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Mật khẩu cũ</label>
                                                <input type="password" id="oldpassword" class="form-control" placeholder="Mật khẩu cũ">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Mật khẩu mới</label>
                                                <input type="password" id="password" class="form-control" placeholder="Mật khẩu mới">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Nhập lại mật khẩu mới</label>
                                                <input type="password" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu mới">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <button id="submit" type="button" class="btn btn-primary my-4">Đổi Mật Khẩu</button>
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

<script src="/assets/js/core/action/doimatkhau.js?v=<?php echo rand(0, 9999);?>"></script>