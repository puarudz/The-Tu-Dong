<?php
defined('KUNKEYPR') or exit('Restricted Access');
?><div class="container-fluid">


                                <div class="card">
                                    <div class="card-body" style="position: relative;">
                                        <h4 class="card-title mb-4">THỐNG KÊ 10 NGÀY</h4>
                                        <div id="chart" class="chart" style="padding: 0px; position: relative;height: 300px;"></div>
                                    </div>
                                </div>

<script>
          function number_format_vnd(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
        var options = {
          series: [
        {
          name: 'VIETTEL',
          data: [<?php
            $viettel_data = '';
            for($i=9;$i>=0;$i--) {
              $viettel_data .= $kun->analytics_amount_last_days('VIETTEL', $i).', ';
            }
            echo rtrim($viettel_data, ", ");
          ?>]
        },
        {
          name: 'VINAPHONE',
          data: [<?php
            $vinaphone_data = '';
            for($i=9;$i>=0;$i--) {
              $vinaphone_data .= $kun->analytics_amount_last_days('VINAPHONE', $i).', ';
            }
            echo rtrim($vinaphone_data, ", ");
          ?>]
        },
        {
          name: 'MOBIFONE',
          data: [<?php
            $mobifone_data = '';
            for($i=9;$i>=0;$i--) {
              $mobifone_data .= $kun->analytics_amount_last_days('MOBIFONE', $i).', ';
            }
            echo rtrim($mobifone_data, ", ");
          ?>]
        },
        {
          name: 'VIETNAMOBILE',
          data: [<?php
            $vietnamobile_data = '';
            for($i=9;$i>=0;$i--) {
              $vietnamobile_data .= $kun->analytics_amount_last_days('VIETNAMOBILE', $i).', ';
            }
            echo rtrim($vietnamobile_data, ", ");
          ?>]
        }
        ],
          chart: {
          height: 350,
          type: 'area',
            defaultLocale: 'vi',
            locales: [{
              name: 'vi',
              options: {
                months: [
                'Tháng Một', 
                'Tháng Hai', 
                'Tháng Ba', 
                'Tháng Tư', 
                'Tháng Năm', 
                'Tháng Sáu', 
                'Tháng Bảy', 
                'Tháng Tám', 
                'Tháng Chín', 
                'Tháng Mười', 
                'Tháng Mười Một', 
                'Tháng Mười Hai'
                ],
                shortMonths: ['/ 01', '/ 02', '/ 03', '/ 04', '/ 05', '/ 06', '/ 07', '/ 08', '/ 09', '/ 10', '/ 11', '/ 12'],
                days: ['Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'],
                shortDays: ['Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy', 'CN'],
                toolbar: {
                  download: 'Tải SVG',
                  selection: 'Lựa chọn',
                  selectionZoom: 'Lựa Chọn vùng',
                  zoomIn: 'Phóng To',
                  zoomOut: 'Thu Nhỏ',
                  pan: 'Xoay',
                  reset: 'Đặt lại chế độ',
                }
              }
            }]
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
          }
        },
        yaxis: {
          labels: {
            formatter: function (value) {
              return number_format_vnd(value) + " VNĐ";
            }
          },
        },
        xaxis: {
          type: 'datetime',
          categories: [<?php
            $day_data = '';
            for($i=9;$i>=0;$i--) {
              $day_data .= '"'.$kun->date_time_ago($i).'T00:00:00.000Z", ';
            }
            echo rtrim($day_data, ", ");
          ?>]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        colors:[
        '#1FF372', // Viettel
        '#1172EE', // Vinaphone
        '#FE614C', // mobifone
        '#F6C647', // Vietnamobile
        ]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>



<div class="col-md-12 row state-overview">
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">HÔM NAY CÓ GÌ MỚI ?</h4>
                                </div>
                            </div>
                        </div>
           </div>
                            <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-wallet-alt h2 text-warning mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Số Thẻ Nạp Qua Api</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_today('nap_the_api'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bxs-wallet-alt h2 text-primary mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Thu Nhập Api Hôm Nay</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_today('thunhapapihomnay'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bxs-bank h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu Cầu Rút Tiền</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_today('rut_tien');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-user-voice h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Người Dùng Mới</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_today('user');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                             <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-message-square-dots h2 text-warning mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu Cầu Mua Thẻ</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_today('mua_the'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-group h2 text-primary mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu Cầu Chuyển Tiền</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_today('chuyen_tien'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-calendar-event h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Thẻ Mới Hôm Nay</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_today('card_system');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div-->
                             <!--div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-wallet h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Tổng Nạp Qua Api</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_he_thong('tong_thu_nhap'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div-->
                                    </div>



                  


<!--div class="col-md-12 row state-overview">
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Yêu cầu chưa xử lí!</h4>
                                </div>
                            </div>
                        </div>
</div>

<div class="row">
                                 <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="mdi mdi-litecoin h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu cầu rút tiền</p>
                                                        <h5 class="mb-0"><?php echo $kun->yeu_cau_chua_xu_ly('rut_tien');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div-->




<!--
<div class="col-md-12  row state-overview">

    <div class="border-head">
                          <h3><i class="fa fa-credit-card" aria-hidden="true"></i> Thẻ Cào Còn Lại</h3>
                      </div>
              <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('viettel');?></h1>
                              <p>VIETTEL</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('mobifone');?></h1>
                              <p>MOBIFONE</p>
                          </div>
                      </section>
                      </a>
                  </div>

              <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('vinaphone');?></h1>
                              <p>VINAPHONE</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('all');?></h1>
                              <p>Tổng thẻ hệ thống</p>
                          </div>
                      </section>
                      </a>
                  </div>

              <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('con_lai');?></h1>
                              <p>Tổng thẻ còn Lại</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <a href="#">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1 class=""><?php echo $kun->the_he_thong('da_nap');?></h1>
                              <p>Tổng thẻ đã nạp</p>
                          </div>
                      </section>
                      </a>
                  </div>
                </div>

-->

<div class="col-md-12 row state-overview">
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Thống kê hệ thống</h4>
                                </div>
                            </div>
                        </div>
</div>
<div class="row">
                                 <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-history h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu cầu rút tiền</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_he_thong('rut_tien');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="mdi mdi-ethereum h2 text-primary mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu Cầu Chuyển Tiền</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_he_thong('chuyen_tien');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-user-check h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Người Dùng Hệ Thống</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_he_thong('user');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-message-square-dots h2 text-warning mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Yêu Cầu Mua Thẻ</p>
                                                        <h5 class="mb-0"><?php echo $kun->thong_ke_he_thong('mua_the');?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                   </div> 
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-wallet h2 text-info mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Tổng Nạp Qua Api</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_he_thong('tong_thu_nhap'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                <div class="col-sm-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-wallet-alt h2 text-warning mb-0"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-2">Tổng Số Thẻ Nạp Qua Api</p>
                                                        <h5 class="mb-0"><?php echo number_format($kun->thong_ke_he_thong('tong_the_dung'));?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                             
</div>
                 
</div>

