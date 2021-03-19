<?php 
require $_SERVER[ 'DOCUMENT_ROOT']. '/Core.php'; 
use Core\System; 
$kun = new System; 
$kun->coppyright(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Quên Mật Khẩu- TrumCard.Vn</title>
    <!-- Favicon -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/1200px-Flat_tick_icon.svg.png" type="image/png">
    <!-- Schema.org Andess+ -->
    <meta NAME="geo.placename" CONTENT="Ha Noi - Việt Nam">
    <meta NAME="geo.region" CONTENT="VN">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="TrumCard.Vn- Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
    <meta itemprop="description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
    <meta itemprop="image" content="https://TrumCard.Vn">

    <meta name="description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam." />
    <meta name="keywords" content="TrumCard.Vn, TrumCard.Vn, Hệ thống đổi thẻ cào, doi the, đổi thẻ, gạch cước, thẻ game, mua the dien thoai" />
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
    <p id="result" style="display: none;"></p>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-6 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">TrumCard.Vn</h1>
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
                    <div class="card card-profile bg-secondary mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <img src="https://scr.vn/wp-content/uploads/2020/07/avt-cute.jpg" class="rounded-circle border-secondary">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-7 px-5">
                            <div class="text-center mb-4">
                                <h3>Quên Mật Khẩu</h3>
                                <h4>Vui Lòng sử dụng email của bạn để lấy lại mật khẩu!</h4>
                            </div>
                            <form role="form">
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" max="50" id="email" placeholder="Nhập email của bạn" type="email">
                                    </div>
                                    <br>
                                     <div class="row row-example justify-content-md-center">
                                        <div class="text-center align-items-center">
                                            <center style="margin-left: 0px;">
                                                <div style="text-align: center;" class="g-recaptcha" data-sitekey="6LeOJiwaAAAAAIomwim1gR_CUbWNAa8aI3TtD_bB"></div>
                                                <center>
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="text-center">
                                    <button type="button" id="submit" class="btn btn-danger mt-2">Lấy Mật Khẩu</button>
                                </div>
                            </form>
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
    <script src="/assets/js/core/account/reset-password.js"></script>
</body>

</html>