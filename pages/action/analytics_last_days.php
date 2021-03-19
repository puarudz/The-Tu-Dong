
<center>
    <h2 class="text-dark base-color"><span class="text-danger">Biểu Đồ</span> <span class="text-info">Doanh Thu</span></h2>
</center>

<div class="col-lg-12 col-sm-12 col-md-12">
  <div id="chart" class="chart" style="padding: 0px; position: relative;height: 300px;"></div>
</div>

<script type="text/javascript">
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
              $viettel_data .= $kun->analytics_amount_last_days_user('VIETTEL', $i).', ';
            }
            echo rtrim($viettel_data, ", ");
          ?>]
        },
        {
          name: 'VINAPHONE',
          data: [<?php
            $vinaphone_data = '';
            for($i=9;$i>=0;$i--) {
              $vinaphone_data .= $kun->analytics_amount_last_days_user('VINAPHONE', $i).', ';
            }
            echo rtrim($vinaphone_data, ", ");
          ?>]
        },
        {
          name: 'MOBIFONE',
          data: [<?php
            $mobifone_data = '';
            for($i=9;$i>=0;$i--) {
              $mobifone_data .= $kun->analytics_amount_last_days_user('MOBIFONE', $i).', ';
            }
            echo rtrim($mobifone_data, ", ");
          ?>]
        },
        {
          name: 'VIETNAMOBILE',
          data: [<?php
            $vietnamobile_data = '';
            for($i=9;$i>=0;$i--) {
              $vietnamobile_data .= $kun->analytics_amount_last_days_user('VIETNAMOBILE', $i).', ';
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