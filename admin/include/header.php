<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>  
<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Admin - Dashboard Card247.Vn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets_3/images/favicon.ico">
        <link href="/assets_3/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css?ts=<?php echo rand(0,99999);?>" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="/assets_3/css/bootstrap.min.css?ts=<?php echo rand(0,99999);?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets_3/css/icons.min.css?ts=<?php echo rand(0,99999);?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets_3/css/app.min.css?ts=<?php echo rand(0,99999);?>" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Apex Chart -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>

    
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="https://card247.vn/assets/img/logo/logo23.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://card247.vn/assets/img/logo/logo23.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="/admin" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="https://card247.vn/assets/img/logo/logo23.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://card247.vn/assets/img/logo/logo23.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                       

                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="/admin" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                            </li>
                  
                            <li class="menu-title" key="t-menu">Qu???n L?? Th???</li>
                            <li>
                                <a href="?act=the_nap_api" class="waves-effect">
                                    <i class="fa fa-credit-card"></i>
                                    <span key="t-dashboards">Qu???n L?? N???p Th??? API</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Qu???n L?? Th??nh Vi??n V?? Ti???n</li>
                              <li class="">
                                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                                    <i class="bx bx-task"></i>
                                    <span key="t-tasks">????n R??t Ti???n</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li><a href="?act=rut_tien" key="t-task-list"><span class="badge badge-pill badge-info float-right"><?php echo number_format(mysqli_num_rows(mysqli_query($kun->connect_db(),"SELECT * FROM `rut_tien` WHERE `status` ='delay'", 0))); ?></span>??ang Ch??? Duy???t</a></li>
                                    <li><a href="?act=lsrut_tien" key="t-kanban-board">L???ch S??? Duy???t Ti???n</a></li>
                                </ul>
                            </li>
                                                   <li>
                                <a href="?act=thanh_vien" class="waves-effect">
                                    <i class="fa fa-users"></i>
                                    <span key="t-dashboards">Th??nh Vi??n</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Qu???n L?? H??? Th???ng</li>
                                <li>
                                <a href="?act=chiet_khau" class="waves-effect">
                                    <i class="fa fa-wrench"></i>
                                    <span key="t-dashboards">C???p Nh???t Chi???t Kh???u</span>
                                </a>
                            </li>
                                                                              <li>
                                <a href="?act=settings" class="waves-effect">
                                    <i class="fa fa-cogs"></i>
                                    <span key="t-dashboards">C???p Nh???t H??? Th???ng</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="false">
                                    <i class="fa fa-history"></i>
                                    <span key="t-tasks">History H??? Th???ng</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li><a href="?act=history_mua_the" key="t-task-list"><span class="badge badge-pill badge-info float-right"></span>Mua M?? Th??? C??o</a></li>
                                    <li><a href="?act=history_chuyen_tien" key="t-task-list"><span class="badge badge-pill badge-info float-right"></span>Chuy???n Ti???n Th??nh Vi??n</a></li>
                                     <li><a href="?act=get_truy_van" key="t-task-list"><span class="badge badge-pill badge-info float-right"></span>Truy V???n H??? Th???ng</a></li>
                                    <li><a href="?act=check_log_nap" key="t-task-list"><span class="badge badge-pill badge-info float-right"></span>Log N???p Th???</a></li>
                                    <li><a href="?act=check_log_callback" key="t-kanban-board">Log Callback</a></li>
                                </ul>
                            </li>
                            <li class="menu-title" key="t-menu">T??nh N??ng Kh??c</li>
                                <li>
                                <a href="/home" class="waves-effect">
                                    <i class="fa fa-home fa-2"></i>
                                    <span key="t-dashboards">Quay V??? Trang Ch???</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
              <div class="page-content">
