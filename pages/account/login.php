<?php 
require $_SERVER[ 'DOCUMENT_ROOT']. '/Core.php'; 
use Core\System; 
$kun = new System; 
$kun->check_login(); 
$kun->coppyright(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Đăng nhập - TrumCard.Vn</title>
    <!-- Favicon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/1200px-Flat_tick_icon.svg.png" type="image/png">
    <!-- Schema.org Andess+ -->
    <meta NAME="geo.placename" CONTENT="Ha Noi - Việt Nam">
    <meta NAME="geo.region" CONTENT="VN">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="TrumCard.Vn Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
    <meta itemprop="description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
    <meta itemprop="image" content="https://TrumCard.Vn">

    <meta name="description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam." />
    <meta name="keywords" content="Taoshopgame.xyz, TrumCard.Vn, Hệ thống đổi thẻ cào, doi the, đổi thẻ, gạch cước, thẻ game, mua the dien thoai" />
    <meta name="author" content="kunkeypr" />
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="TrumCard.Vn- Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam." />
    <meta property="og:image" content="" />
    <meta property="og:url" content="https://TrumCard.Vn" />
    <meta property="og:site_name" content="TrumCard.Vn" />
    <meta property="og:description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam." />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/notiflix/notiflix-2.6.0.min.css">
    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body class="bg-default">

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-6 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p id="result" style="display: none;"></p>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-3 py-lg-3">
                            <div class="text-center text-muted mb-4" style="margin-top: 30px;">
                                <h1 class="text-black">TrumCard.Vn</h1>
                            </div>
                            <form role="form">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Tên Tài Khoản" type="text" id="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Mật Khẩu" type="password" id="password">
                                        </div>
                                    </div>
                                    <div class="row row-example justify-content-md-center">
                                        <div class="text-center align-items-center">
                                            <center style="margin-left: 0px;">
                                                <div style="text-align: center;" class="g-recaptcha" data-sitekey="6LeOJiwaAAAAAIomwim1gR_CUbWNAa8aI3TtD_bB"></div>
                                                <center>
                                        </div>
                                    </div>

                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox" checked="">
                                        <label class="custom-control-label" for=" customCheckLogin">
                                            <span class="text-muted">Ghi nhớ</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="submit" class="btn btn-primary my-4">Đăng Nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-header bg-transparent pb-5">
                            <div class="btn-wrapper text-center">
                                <a href="/reset/password" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                                    <span class="btn-inner--text">Quên Mật Khẩu</span>
                                </a>
                                <a href="/register.html" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <span class="btn-inner--text">Đăng Kí</span>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2020 <a href="/home" class="font-weight-bold ml-1" target="_blank">TrumCard.Vn</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

    <!-- Demo JS - remove this in your project -->
    <script src="/assets/js/demo.min.js"></script>
    <!-- Optional JS -->
    <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script language="javascript" src="/assets/lib/notiflix/notiflix-aio-2.6.0.min.js"></script>
    <script src="/assets/js/core/account/login.js"></script>
</body>
</html>