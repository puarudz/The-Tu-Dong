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
                                    <div class="col-8">
                                        <h3 class="mb-0">THÔNG TIN TÀI KHOẢN</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Thông Tin Người Dùng</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Họ Và Tên</label>
                                                    <input type="text" id="name" readonly="" class="form-control" placeholder="Họ Và Tên" value="lucky.jesse">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Tên Người Dùng </label>
                                                    <input type="text" readonly="" id="username" class="form-control" placeholder="Tên Người Dùng">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Thông Tin Thêm</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="email">Địa Chỉ Email</label>
                                                    <input id="email" readonly="" class="form-control" placeholder="Email" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Số Dư Tài Khoản</label>
                                                    <input type="text" readonly="" id="money" class="form-control" placeholder="Số Dư">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Ngày Đăng Kí</label>
                                                    <input type="text" readonly="" id="register_time" class="form-control" placeholder="Ngày Đăng Kí">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Chức Vụ</label>
                                                    <input type="text" readonly="" id="level" class="form-control" placeholder="Chức Vụ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4">Thông Tin Tích Hợp Api</h6>
                                    <div class="pl-lg-4">
                                        <div class="form-group">
                                          <label class="form-control-label">Api Key</label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="apikeycopy"><b><i class="fa fa-clone"></i></b></span>
                                            </div>
                                            <input type="text" readonly="" class="form-control" id="apikey" placeholder="API KEY">
                                          </div>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/assets/js/core/action/thongtin.js?v=<?php echo rand(0, 9999);?>"></script>