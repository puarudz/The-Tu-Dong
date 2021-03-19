<?php
defined('KUNKEYPR') or exit('Restricted Access');
$token = $_SESSION['token'];
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TrumCard.Vn - Hệ thống đổi thẻ cào thành tiền mặt, gạch cước đi động, bán thẻ game lớn nhất Việt Nam.">
  <meta name="author" content="TrumCard.Vn">
  <meta name="csrf-token" content="<?php echo $_SESSION['token'];?>">
  <meta name="csrf-auth-token" content="<?php echo $user['auth'];?>">
  <title><?php echo $title;?></title>
  <!-- Favicon -->
  <link rel="icon" href="https://i.imgur.com/mYg58Pj.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <!-- Page plugins Css -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/lib/notiflix/notiflix-2.6.0.min.css">
  <link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <!-- Page Loader Plugin Css-->
  <link rel="stylesheet" href="/assets/lib/pace/pace.css">
  <!-- Page plugins JS -->
  <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="/assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script language="javascript" src="/assets/lib/notiflix/notiflix-aio-2.6.0.min.js"></script>
    <!-- Optional JS -->
  
  <script src="/assets/vendor/datatables.net/js/jquery.dataTables.min.js?ts=<?php echo rand(0, 84656452);?>"></script>
  <script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script> 
  <!-- Page Loader Plugin JS-->
  <script src="/assets/lib/pace/pace.js"></script>    
  <!-- Custom JS -->
  <script src="/assets/js/core/functions.js?ts=<?php echo rand(0,84656452);?>"></script> 
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.1.0" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/custom.css?v=<?php echo rand(0,84656452);?>" type="text/css">
  <!-- DATE PICKER -->
  <link href="/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="/assets/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js"></script>
  <!-- Chart -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="/home">
            <span class="text-danger"><b>TRUMCARD</b></span>.
            <span class="text-info"><b>VN</b></span>
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/home">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Trang Chủ</span>
              </a>            
            </li>

<?php if($user['admin'] == 1) { ?>
            <li class="nav-item">
              <a class="nav-link" href="/admin">
                <i class="ni ni-badge text-success"></i>
                <span class="nav-link-text">Admin Control</span>
              </a>            
            </li>
<?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-circle-08 text-orange"></i>
                <span class="nav-link-text">Tài Khoản</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a  class="nav-link" href="/thong-tin-tai-khoan" class="nav-link">Thông Tin Tài Khoản</a>
                  </li>
                  <li class="nav-item">
                    <a href="/doi-mat-khau" class="nav-link">Đổi Mật Khẩu Tài Khoản</a>
                  </li>
                  <li class="nav-item">
                    <a href="/doi-mat-khau-cap-2" class="nav-link">Đổi Mật Khẩu Cấp 2</a>
                  </li>
                  <li class="nav-item">
                    <a href="/reset-mat-khau-cap-2" class="nav-link">Quên Mật Khẩu Cấp 2</a>
                  </li>
                  <li class="nav-item">
                    <a href="/signout.html" class="nav-link">Đăng Xuất</a>
                  </li>
                </ul>
              </div>
            </li>

<?php if(!$user['add_by']) { ?>

            <li class="nav-item">
              <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Đại Lý</span>
              </a>
              <div class="collapse" id="navbar-tables">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/dai-ly" class="nav-link">Thêm Khách Hàng</a>
                  </li>
                  <li class="nav-item">
                    <a href="/thanh-vien-dai-ly" class="nav-link">Quản Lý Khách Hàng</a>
                  </li>
                  <li class="nav-item">
                    <a href="/lich-su-nap-the-dai-ly" class="nav-link">Lịch Sử Nạp Đại Lý</a>
                  </li>
                </ul>
              </div>
            </li>
<?php } ?>


            <li class="nav-item">
              <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                <i class="ni ni-ui-04 text-info"></i>
                <span class="nav-link-text">Tích Hợp API</span>
              </a>
              <div class="collapse" id="navbar-components">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/tich-hop-api" class="nav-link">Hướng Dẫn Tích Hợp</a>
                  </li>
                  <li class="nav-item">
                    <a href="/Card_Exchange/tailieu-trumcard.zip" class="nav-link">Tài Liệu Tích Hợp</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- hosting
            <li class="nav-item">
              <a class="nav-link" href="#navbar-hosting" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-hosting">
                <i class="ni ni-app text-info"></i>
                <span class="nav-link-text">Mua Hosting</span>
              </a>
              <div class="collapse" id="navbar-hosting">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/hosting" class="nav-link">Danh Sách Gói Hosting</a>
                  </li>
                  <li class="nav-item">
                    <a href="/hosting/hosting-da-mua" class="nav-link">Quản Lý Hosting</a>
                  </li>
                </ul>
              </div>
            </li>
			-->
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">Liên Hệ / Hỗ Trợ</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="tel:0836851125">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Hỗ Trợ Kĩ Thuật</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tel:0836851125">
                <i class="ni ni-app"></i>
                <span class="nav-link-text">Hỗ Trợ Thanh Toán</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tel:0981478427">
                <i class="ni ni-settings"></i>
                <span class="nav-link-text"><b>Zalo: 0836.851.125</b></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
                  <h1 style="color: white;">Dashboard</h1>
            </div>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>



          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSEhIVEBUSGBkVFRcXFRcWGBURFxUXGBYWGBgYHTQgGRolHBgWITEhJyorMC4uFx8zODMtNygtLisBCgoKDg0OGxAQGi0lHyUvLTItKy0tLS0vLystLS0tLi0tNi0tLS0tLS0tLTUtLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABQYDBAcCAf/EAE0QAAICAQEEBgQJCAYIBwAAAAECAAMRBAUSITEGE0FRYXEiMlKBFCNCYnKCkaGxFjNTY3ODksEHNEOTorIVVHSUs7TR8CREwsPS0+H/xAAaAQEAAwEBAQAAAAAAAAAAAAAAAwQFAgEG/8QALREAAgICAAQEBgEFAAAAAAAAAAECAwQREiExQSIyUXEFEzNhgfCRFEJTYqH/2gAMAwEAAhEDEQA/AO4xEQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAEREAREQBERAETV2htGqhd+2xa15AscZPcBzY+A4ytarpg7HGnoOP0lxKA+K1j0z5NuTuEJTeorZzKSj1Zb5oVbVTrLKnHVNXgjeIAeojhYp7VzlT2gjjzGaUuo12qc1pc7kY39w/B6a88QC6g2bxB9UMT34yJ81vQK5hvZosccVJ6zfB/aOW3vIjBnrr4XqT5ninvmkXG7pFpF9bVUL53J/1mL8q9D/rdH96v/Wc9r1L1MatRQ1Tpz3EyCOxt1cnB7xvDxzwG9RqA4ypJHLirL9zCWoYcZran/wAIJ5EovTiXynb2lf1NTQ3lahP3GSCsDxHETmllSt6yhvMA/jMNehrXjWDSeeamao586yJ1L4fLszlZi7o6lE57p9q6uv1NR1g9m5Q4x4MuH95LSY0XTJc41NRo/WKesq95ADJ71wO+VrMayHVE8LoS6MtUTHRerqGRldW4hlIII7wRzmSQEoiIgCIiAIiIAiIgCIiAIiIAiIgCImDW6tKkayxgiIMsTyA/77IBmdgASTgDiSeQHfIGzaV2pBGi3UTs1NilkP7KsEGwfOJC929KZ0h26da4oZ2qqdgnUoC1vV83stVAWzug7teMAlc5PK6UW3ui16an4JUoCiy4ekEAAHV0g55cPTK4x6pnsouPU8TTKhtvZd+mYO7Lr7rA2MBxduqMswT0gKxwzu7oGRgEkCY7LyawyFXZ91ayPVaywhU+qWYe6dD2bstKcsN6yx8b9rnesfHLJ5ADjhQAozwAlO1ehFO06KQMV3Wm9B2ArXY1qDwDhH/eeEtU5ThFxfpyILKFJpr8ly2Ps5dPUtScd3mTzdzxZ28Scn3zdiJULBF7f2MuorxncsTjU+OKP/NTyI7R7sUalyQd5dxlJV19mxThhntGeR7Rg9s6YzAcTwEpu3Niu2sHU2JV8JrLsXrLg2U7inAV14lHXt/s5axb/lS59CC+rjXLqRMSW/JDU/63V/urf/fPFnRbVgcLdPafFLKvvDP+EvrOq+5U/pbCMiZNToNTVxs0zkdrVEXKPcMP/hmtRqUfO6wOOY7VPcwPFT4GTwurn0ZFKqceqPWm36mL6dzSxOSAM1ufn18j5jB8ZY9D0yThXehrvPBETLi48vij357GxjvxxlS+EtZwpxjttIyv1B8s+PLz5T2ugrwQRv73rM3FmI5HPZjsxjHZiVrsaNvOPL7k1d7gvEdH0BubL2gV59WtTvbo+c3ym8uA8ec3JTNgdIWqZadSxdGIWq5jxBPAV2nvPIP28jx4tc5lThKEuGRfjNSW0IiJydCIiAIiIAiIgCIiAIiIB4utCqWYhVUEkngAAMkk9055tPaLauwWMCtKHNCHhn9c49o/JHyR4k4kul+0uts+CqcpXhr8fKbgUp8uTN4bo7TIe65UG8xwP5ngAB2k9w5zQxKF9SfTsU8m1+SJKdE6t7WM36Gn77n5/ZUftMvEoWwTqajq3TT5uaml6anYKXUPcPS9k8/Rz3Zxnh7q/pIRRu6jR6qm0cGQV7wz80kgke6U75qVjaLFMHGCRepWOlboLdBfvAhNUK8g5GLq7KyM/S3ZDara+0doDqtJp30NL8Hvu9F9089xfLtGfMc5I6zo3TTo6NEudzrkGflF2LFn8GySwxywJF1JSw6/bGnoZEuuSprc7gdgu9jGefmPtn3U7WorUvZdWijtLqB+MiatLTrazRraksuo9GwEYIJGBbWRxCOBkEHvHMGa2n/o42ajbw02T3NZYw94LYPvjmORDbY2m+12Oj0YZdKCPhOoIIDKDncQHn5dvDPDnadXQFv0VScOr6xgOfxSU9XgnzsrkrVVXUmFC1Ig5ABVVR5cAJF7FButfVngjKK9ODwPUA5azHZ1jcR81EgE3E8O00tdqmVWKL1jAeiuQu8ewZPADxhvR6ot9DLtDaFdK71hxk7qgAszueSoo4sx7hIHWdHvhx6zV19SACErUjrQCOdtq8/2YJXvLdmXQafD9dcwtvIxvfJrU80qU+qveebY4ngAJenUzxM7dTRS9qbHu0o3j8fSP7RV9NF/WIvAj5y+9QOM1kYEAggg8QQcgg8iDOjq2ZQek2lposL6d1O8c26ZCGYZ521VrxHey8jxI453tHHzGnwz6epn3Yu+cepq2IGBVgGBGCDxBB5giTnRHa5UjSWsW4fEOxyWUDjUx7XUcQe1R3qZWE1rOAaqyysMhnYIpB5EYy33CfLNLa49K3qyCGXq1A3XU5Vt5sk4PdiWsitXR5Ln2ZXpk65czq4iQ/RXaIu06niHQ9XapYsVtUDe4sckHIYeDCTExmtcjTQiIgCIiAIiIAiIgEdq9dbUSWoNlftVHfYD51ZAJ+rvHwmDXdIal01l9brbuDAUHB644CVsDxVixUYPHjJiUTp3TXZqKkwFZENr2LhXAzu1KW7Vz1jYPDKCdQhxSUTmcuFbZEqerTLE2OzZOBlrbnOTujtLMeA/kJbejnRzcIv1GHu5qOaUAjkne2Ob+4YHOD6MaO9SussqOpQg9TukLaiE463qzhWLL2ggheQ9IiXPZ+1argercEr6ykFXQ9zo2GU+YljIyOLwR6Iipp4fE+rNLbZ6myvV/IQNVf4UuQRYfBHUE9ys57JMIwIBByDxBHIjwgkGRH+gAv8AV77tKuc7lfVtWPopajBB4LgeEqE46T7dGkqDbvWWOdypM43n58T2KBxJ93Mic62ltnWO4Ntz1sjB1VURFRsEAgMCTwJ5kyR6c6R6r6C11txKOVawpwYOhO6EUKPk8hxx4SD1eqext9zvE8PcOXKU8i1p8K5H0fwrBrsrVk4p7317Fi2Jto6i1KtSxS7iKNTXhHzjJrceq2cZwRund5AgE3BV1q8N7T3fOIsqOPFRvAnyxOWaFSb6FX1jfTj6tisT7lVj5AztUmom5R5md8VxoUX8MOjW9ehDHZFlpzqrRYg49TWu5Ue7rMktZjuJC/NkwZ9nlpOZpq6izEiNTqZJa0cJXdcTmQzejRxa0zMdRMFd+pYkKaqVycN6VrEZ549EKftmkHM3tCc4kalsu2UpRJHTbHV8ddbbqPBnKp2cOrrwpHmDJvSaOupd2qtal7kUKPsAmpoBx93/AH+E3X1CDmyjzIEsR6GLYtSKN0g2Z8GuDIMU6gnA7K9RxYr4K/EjuYN7QmpLbt7U6S6l6bNTSm+OBNqAq4OUcZPNWAI8pQ9NtSsqN+2sOMq4DrjfUlWI+aSMg9xE1sK/a4G+hmZVWnxJE10f1fU6tPY1PxT9wtUFqm9/pJ47yd0v05TqNQtikV2KXGGTBBxYp3kP8QE6ZszWC6qu1eViK48mAOPvlbNglZtdyfGk3DT7G1ERKhYEREAREQBMWp1CoN5iQPIn8BMsQCNr29pWO6NTTveybFDfwk5lK1lfwvXWVg5W23qyR2aWhF633Fy65/WidEuqVhhlDDuIBH2Gc76A7Gpua+5kxxCgoWrYM7Pa2GQgj0XqHP5M7hLh2/3mcyjs6CSFGOQHADuAkPtTS1WkMy4dfVsUlLF+i68QPDke0TW2hs5l/Nam9MccMwuB8D1oLf4pFrfcCRY6WdxVCh9/pESvKei/j4/GWHZljqu7Zb1xB4NuhWK9m9jgW58QB5SUqszKto7zmT+kbM9jLZ5fRwGLpFsRNXVuMSjKd6txjKPjGcHmMEgjtB9857tPopq6UssIpsSpWcstjDKqpJ9ErwPDlk+c6sJh11G/W9Z+WrL/ABAj+cTqjPqc4+bdj7Vb0Vzon0UFB6+1hbaRhd31K1bnu54sx9o44cgOObVNDYOoNmmoc8C9SMR3EoMj7ZvzuMVFaRDZbOyTlN7Ynwz7E9IzX1FWRIPXaMyyTDZQDOZR2T03ODKh8DOeU3NPoAwKsN4MMEHkQeYMnPgUy16fE4VeizZmcS0RVHRnSY46es+a5H2GbFPRrRr6uk04/cpn7cSUAn2SJFBvb2a1Wz6l9WpF8kUfgJSukOn6rWPgYF6LaPpr8XZ9wqPvMv0qXTpMPpX+dZV7nr3/AMahLGM+G1ENy3BkHmWnoNZnShP0VllfkosJQe5WUSrSwdA39HUjuv4e+ik/jmXs9eBP7lXEfiaLTERMoviIiAIiIAiJ5sJwcDJ7BnGT59kA+mU/+ixf/A73Imx8/U3U/BBJ006p/Wsr047q1Nj+6yzC/wCAytdCNg0mq6u5euNOpur3XYsnB95T1RO5khgc7s8BKbR2zp8lVsFrg8UqBtYdwK1glffiRC7zk5qesdm/u5bv9EEkdnPEtW0rloqASsEsRXVWuFDWN6q9wHMk9gBPZI7/AEDY/G3UPvHsqC1ovguVLHzYn3cpxKGy7j5PAauj05zJ/Q18M9/GYNn7NKLutY1vHgWCg47juAA9vHEkkTERjo4vv4z0J9iJIVSJ6N+jW9X6G61Mdyly9Y/u3SS0iNP8XrLF5DUVravjZX8XZ/hNEl4AiIgCIiAIiQ+s2g9jmjTY314W2kZSjPZ8+3HJezm3YGA+bVvNz/BKmIJx8IsU/mqiPVB7LXHAdwJb2cy1VYVQqjAUAADsAGAJh2foUpQIme0sScs7nizse1ieZmzAErHTz1NP+3H/AAbpZ5U+nbZbSp+sezHgtTJ+NiySn6kfdHFnkZBSwdAl9HUt33/hp6RK/LT0GqxpQ/6Wyyz6psYIf4Qs0fiD8CX3KWIvE2WCIiZRoCIiAIiIAiIgCVzZC9Vr9XUeC3ivVV+J3RVd9hSs/XljkL0iXq+r1YHHTMTZw4/BnG7d7l9Gz91AMm0RnVaUHkOuYftAgC+/daySsjduadmRLKhvWUMLax7WAVdAeXpIzqD3kGbeg1qXVrZWd5W8MEEcCpB4hgcgg8QRiAbEREAREQCH6RgoK9SP/LPvP/s7ejd7gp3/AN2JMAzzYgYFSMgjBB5EHmDIno9YUDaVyS+mwoJPF9Oc9S/j6IKk+0jQCYiJq67aNVIBtsVM8Bk8WPcq82PgIBtTX12urpXftcIvLJPMnkAOZJ7AOJkeddqLfzFXUqf7W8EHHetI9I/XKe+ZtDsZEfrXLX3Yx1lmCVHaEUejWPBQM9uYBrHr9T7ekoP1b7R/7Kn+Pj8giSuk0qVqErUIq8gBgCZogCIiAJROlF2/rCOzT1Bf3lp32H8K1fbLrrdStVb2Od1a1Lse5VGTOb6d2betcbr3MbGHsluS/VUKv1Zbwq+KzfoV8mWoa9TzrbCEbd4sfRQd9jEKg97ETo+zdGKaq6l5VoqDyVQM/dKT0f0nXatBj0NN8a/cbTlaV/zP4bq98v8APc2zis0ux5jQ1DfqIiJTLIiIgCIiAIiIAnl1BBBGQeBB5EHsnqIBCbDsNLHR2E/FjeoY/wBpps4A8WryEPhuH5Uy6vYx3zbp7TprG4thQ1dhHDNlZ4E4wN5SrcBxwJn2vs7rlG63V2VnfqfGdywDHEdqkEgjtBM87H2n1oZXXqrqiFtrzndY8mU/KrbmrdvHkQQANdddqq+F2m64e3p2B95rtIZfIF56/KTTj1y9OOHxtNtQ+11APmDJeIBEjpNov9c0w876x9xaD0m0fZqqG+jYrn7FJMlSon3EAiPygqJwiX2n5unuwfrlAv3zR1vwm567aNMaHrON++xFD0sRv1laixIOARnGCAe8GyxPAQw2dqbPz2q3R7GnQVjHcbHLOfNdybeg2RTSS1dYDHgXOWsYfOsbLN7zN6J6BERAEREAREhukm2xp0AUB7rMipPEc3buReGT5DmZ6k29I8b0Q/TPaHWOukU+iuLL/Icaq/MkbxHco9qQeot3VzgseAVRzZycKo8SSAPOfKk3QSzbzMS9jnmzn1mPd5dgAHISc6JbKNrLq7BhF/q6ntyMG8+YyF8CT8rhpprGq/2ZRe77Psic6M7J+D0hWwbHPWXMO21gMgfNUAKPBRJaImY229svrkIiJ4BERAEREAREQBERAEjdrbK60rZW5pvrz1dgGeB5o6/LrPap8wQQDJKIBFbO2tl+pvXqL8Z3c5SwDm9LfLHePWHaORMrNXaGz67k3LV3hnI5gqw5MrDirDsIIMhdfr7dCm/a3wrTggbxwL0yQAMerdz+a30oBZIzOf7S/pAdsjTUhPn3cT5itT+LDylX2jtu+z8/qXIPyQ3Vr5bqY3vfmRu2KLleDbLm+S+51fX7e01PC3UVVn2S43v4Rx+6Qmp6f6VfUW676NZUfbaVlC0Oxrm/M6W0j9n1YPvswDJP8kdZul2SqpVBZt+3iABk8EUg/bOPmTfREqxsePns/gl9V/SORjc0vPgOsuCnPgqI28fCaeo6fasHHVVU55dZXdx8t4rmRewLmRQwVFucAsSj6i1Vbiq9XV+aTGPWYZ5kCS2psvdCrpY6tzDaVWUj6It3v5ylLMkpaHy6U+Udr3NVummuPy6R5Un+dhnk9MNd+mX+6WbHRLozRqBatll2/SwHo5r+LYZTKum+CMMOJPq5zxljXoDpO3rj++YfhLcVOS2mdO7Fjy+X+/yVT8sdd+lT31D+RmWrpvrRzND+dTj7xb/KWn8g9H7Nv9/b/wDKRe3+gdYr39Mbd9DvFOsJ6xO1VLcm7R2EjB55HahZ6nLvxP8AG/38mov9IOoA46apzjmLWTj2cCh4e+Qte2wzNZeLDa+N990MMDkqhCSqDsGPE5JJnyvZCOoZLbQGGR6h+4pmeX2M49W0H6SfzVv5S9XRlVPiikylZbgWrT4oli6NbMGtPWsQdMjYCczdYp+WPk1jh6J4t2+j63QAJzTolr30TWm5N+q0qSayWNbKCC5QqCwI3QcZI3BwPZ0fS6lLEWytg6OMqynII7wZxa7G92LTIYquPKt7XqZYiJEdCIiAIiIAiIgCIiAIiIAiIgHi2wKCzEKACSScAAcyT2Cc86V7VfWKEpVVqRw6s+8DcRkZUD1EwTgkEnhwA4mW6aazfdNKD6IHW3D2hvYrQ+BKsx+gByMhhL2NiqyLlPoVrcmVclwdUQ+n2ITxtcn5lZKj3t6x92JbegGxa1L6oIq72a6sAfm1OHfPMl3B4+yq98rdNj214Bw11nVVkY9FWs6tW9wy86npNOtaLWg3VRQqjuUDAH2CcZEK64qFa13O4W22yc7JbMsw6ygPW9Z5OpU+TAg/jM0SoTFD2fpiNM2nTGntrU1Puj1Lt3HWY7c8HB7QZGdCdmX1G5rrzYN417u87AMjcXy/LI+48Zfto7GquYOd5LAMCxGKvu+ySODL4MCJoU9EqQzF3tvDkMyOyhGYKFyy1qA3AAYOQccpmSwZ7kovk/5LSvWltcx0WTfN2oHqWlUrPtVVBvTHgWd8d4APbLBPirgYHACfZoVwUIqK7FaT29iIidnhQukOg6jUkrwr1OXUezeONi/WHp+YeactfTbT72kd+3TkXjyr4v8Aam+PfKpNfBs4ocL7GdlQ1La7iZtkbSOkt3s4osPxy9lbHgLl7h7Xh6XYc4Z8ZQQQRkHgR3g8xLF1SsjpkNdjhLaOlCJA9C9YbNKqsctQzUsTzPVnCE95KFD75PTBa09GsnsRETw9EREAREQBERAEREAQYiAc/wBt5+GajP6vd+h1S/8Aq35qu2AT3DMmemek3LU1A9VwKbD7LAk1MfAlmXzZZDFc8O/hNnEmpU6XYzMiOrNjofpw12jXsrra33rWqe/jbn3TpU5t0N1G7dpSflI+nPhYAp/Gkj3zpMzsr6n4Rdo8giIlcmEREAREQBERAMGvqDVOp5MjKfIqQZy6gNZp6yrbjlK3B7N7dBw3ep5EeM6Tt7V9VprrPYrYgd7bp3R5k4HvnPUxVUO6pPuRf/yX8FebZUy35T5odatgOODIcOhPFG4gg94yDx7cTZmts2rdqQHnujePex4sfexJ98zXWhVLMcBQST4CacW+HbKMuvIsHQAHGq7vhHD/AHejP3y2SG6JaA1aZA43XsJtsHc9h3t0/RGF+rJmfPze5NmvBaikIiJydCIiAIiIAiIgCIiAIiIBCdNv6hqv2L/5ZUF5CIml8P8A7vwUszsaey/Wq/20f8zOrCIlbK869kTUeV+4iIlYnEREAREQBERAK908/qbftdP/AMzVKbtX8zb+zf8AyGImjheSZSyfNE2V5DymDXck/bUf8dIiXrfpv2KsPOvc6jERMA1xERAEREA//9k=">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $user['name'];?>: <b><?php echo number_format($user['money']);?></b> VNĐ</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Xin chào <b><?php echo $user['name'];?></b></h6>
                </div>
                <a href="#" class="dropdown-item">
                  <i class="ni ni-credit-card"></i>
                  <span><b><?php echo number_format($user['money']);?></b> VNĐ</span>
                </a>
                <a href="/thong-tin-tai-khoan" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Tài khoản  </span>
                </a>
                <a href="tel:<?php echo $config['admin_number_phone'];?>" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Liên Hệ</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/signout.html" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Đăng xuất</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->

<div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">

              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Thu nhập hôm nay</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($kun->thong_ke_user('nap_the_api'));?> VND</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng thu nhập</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($kun->thong_ke_user('tong_thu_nhap'));?> VND</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng Thẻ Đúng</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($kun->thong_ke_user('tong_the_dung'));?> Thẻ</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng Thẻ Sai</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo number_format($kun->thong_ke_user('tong_the_sai'));?> Thẻ</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
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
    