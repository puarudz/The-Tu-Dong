<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>
<div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb" style="padding-top: 20px;">LỊCH SỬ ĐỔI THẺ QUA API ( GẦN NHẤT )</label>
    </div>
	
	
	<div id="divTable" class="nthoa_table" data-page="1">
    <table id="tb_hisser" class="table-bordered table-striped table-condensed cf dataTable no-footer" style="width: 100%;line-height: 2;">
        <thead class="cf">
            <tr>
            	<th class="f-xs " align="center" data-title="Tình trạng">Mã GD</th>
                <th class="f-xs " align="center" data-title="Tình trạng">Tình trạng</th>			
                <th class="f-xs " align="center" data-title="Hình thức">Seri</th>
                <th class="f-xs " align="center" data-title="Tài khoản">Mã Thẻ</th>
                <th class="f-xs " align="center" data-title="Tài khoản">Loại Thẻ</th>
                <th class="f-xs " align="center" data-title="Tài khoản">Mệnh Giá Gửi</th>
                <th class="f-xs " align="center" data-title="Tài khoản">Mệnh Giá Thực</th>
                <th class="f-xs " align="center" data-title="Số tiền nhận">Khách Nhận</th>
                <th class="f-xs " align="center" data-title="Thời gian">Thời gian</th>
                </tr></thead>
                 <tbody id="table-history">
                    </tbody>
                    
                    </table>

</div>

<script type="text/javascript">
    $(document).ready(function() {
	var api = '/api/history-api';
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
			var status = '<td id="status"><span class="label label-warning">Đang Xử Lý</span></td>';
			}else if(data[index].status == "true"){
			var status = '<td><span class="label label-success">Thành Công</span></td>';
			}else if(data[index].status == "smg"){
			var status = '<td><span class="label label-warning">Sai Mệnh Giá</span></td>';
			}else {
			var status = '<td><span class="label label-danger">Thẻ Lỗi</span></td>';
			}
			var magd = '<td>#'+data[index].ma_giao_dich+'</td>';
			var seri = '<td>'+data[index].seri+'</td>';
			var mathe = '<td>'+data[index].mathe+'</td>';
			var loaithe = '<td>'+data[index].loaithe+'</td>';
			var menhgia = '<td>'+number_format_vnd(data[index].menhgia)+'</td>';
			var menhgiathuc = '<td>'+number_format_vnd(data[index].menhgiathuc)+'</td>';
			var thucnhan = '<td>'+number_format_vnd(data[index].thucnhan)+'</td>';
			var time = '<td>'+data[index].time+'</td>';
			
			$('#table-history').append('<tr>'+magd+status+seri+mathe+loaithe+menhgia+menhgiathuc+thucnhan+time+'</tr>');
			
			
			});


			}
			
			
        }
    });

});
</script>

