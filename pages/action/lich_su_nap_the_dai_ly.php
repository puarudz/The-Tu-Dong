<?php defined('KUNKEYPR') or die("ACCESS DENIED!");
if($user['add_by']) {
  echo '<script>window.location="/home"</script>';
}
?>



<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
                  <div class="nav-wrapper row row-example justify-content-md-center">

      <div class="card">
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">LỊCH SỬ NẠP THẺ ĐẠI LÝ ( GẦN NHẤT )</h6>
                <div class="pl-lg-4">
                  <div class="row">

        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="history-table">
            <thead class="thead-light">
               <tr>
                <th class="f-xs text-center">STT</th>
                <th class="f-xs text-center" align="center" data-title="Tình trạng">Tình trạng</th>
                <th class="f-xs text-center" align="center" data-title="Tình trạng">Khách Hàng</th>   
                <th class="f-xs text-center" align="center" data-title="Hình thức">Seri/Mã Thẻ</th>
                <th class="f-xs text-center" align="center" data-title="Tài khoản">Loại Thẻ</th>
                <th class="f-xs text-center" align="center" data-title="Tài khoản">Mệnh Giá Gửi</th>
                <th class="f-xs text-center" align="center" data-title="Tài khoản">Mệnh Giá Thực</th>
                <th class="f-xs text-center" align="center" data-title="Số tiền nhận">Khách Nhận</th>
                <th class="f-xs text-center" align="center" data-title="Số tiền nhận">Hoa Hồng</th>
                <th class="f-xs text-center" align="center" data-title="Thời gian">Thời gian</th>
               </tr>
            </thead>
            <tbody class="list d-none" id="table-history">
      </tbody>
          </table>
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
<script type="text/javascript">
    $(document).ready(function() {
  var api = '/api/lich-su-nap-the-dai-ly';
    $.ajax({
        type: "POST",
        url: api,
    dataType: "json",
        data: {
            token: '<?php echo $user['auth'];?>'
        },
        success: function(json)
        {
            if(json.status == "false") {
        
      }else {
      var data = json.data;
      $.each(data, function (index, value) {
      // data[index].from;
      
          if(data[index].status == "delay") { 
            var status = '<td id="status"><span class="btn btn-warning btn-sm"><i class="fa fa-spinner fa-spin"></i> Đang Xử Lý</span></td>';
          }else if(data[index].status == "true"){
            var status = '<td><span class="btn btn-primary btn-sm">Thành Công</span></td>';
          }else if(data[index].status == "smg"){
            var status = '<td><span class="btn btn-warning btn-sm">Sai Mệnh Giá</span></td>';
          }else {
            var status = '<td><span class="btn btn-danger btn-sm">Thẻ Lỗi</span></td>';
          }          

          if(data[index].loaithe == "VIETTEL") { 
            var network = '<td><img src="/assets_2/img/network/viettel.png" style="width: 40px;"></td>';
          }else if(data[index].loaithe == "MOBIFONE"){
            var network = '<td><img src="/assets_2/img/network/mobifone.png" style="width: 40px;"></td>';
          }else if(data[index].loaithe == "VINAPHONE"){
            var network = '<td><img src="/assets_2/img/network/vinaphone.png" style="width: 40px;"></td>';
          }else if(data[index].loaithe == "VIETNAMOBILE"){
            var network = '<td><img src="/assets_2/img/network/vietnamobile.png" style="width: 40px;"></td>';
          }else if(data[index].loaithe == "GATE"){
            var network = '<td><img src="/assets_2/img/network/gate.png" style="width: 40px;"></td>';
          }else if(data[index].loaithe == "GARENA"){
            var network = '<td><img src="/assets_2/img/network/garena.png" style="width: 40px;"></td>';
          }else{
            var network = '<td><span class="btn btn-danger btn-sm">Lỗi</span></td>';
          }

      var stt_count = index+1;
      var stt = '<th class="d-none">'+stt_count+'</th>';
      var khach_hang = '<td class="text-center">'+data[index].from+'</td>';
      var seri_mathe = '<td class="text-center">'+data[index].seri+'<br>'+data[index].mathe+'</td>';
      var loaithe = '<td class="text-center">'+data[index].loaithe+'</td>';
      var menhgia = '<td class="text-center">'+number_format_vnd(data[index].menhgia)+'</td>';
      var menhgiathuc = '<td class="text-center">'+number_format_vnd(data[index].menhgiathuc)+'</td>';
      var thucnhan = '<td class="text-center">'+number_format_vnd(data[index].thucnhan)+'</td>';
      var hoa_hong = '<td class="text-center">'+number_format_vnd(data[index].hoahong)+'</td>';
      var time = '<td class="text-center">'+data[index].time+'</td>';
      
      $('#table-history').append('<tr>'+stt+status+khach_hang+seri_mathe+network+menhgia+menhgiathuc+thucnhan+hoa_hong+time+'</tr>');
    
      });

    $('#history-table').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Vietnamese.json"
        }
    });
    $("#table-history").removeClass("d-none");

      }
      
      
        }
    });

});
</script>

