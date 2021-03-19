<?php $arr_menhgia = array( "10000", "20000", "30000", "50000", "100000", "200000", "300000", "500000", "1000000"); ?>
<script type="text/javascript">if (!is_mobile()) {$('.col-sm-3').css('padding', '20px');}</script>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group row">
            <select class="form-control" id="loaithe">
                <option value="0">Chọn nhà mạng</option>
                <option value="1">Viettel</option>
                <option value="2">Mobifone</option>
                <option value="3">Vinaphone</option>
                <option value="4">Vietnamobile</option>
                <option value="5">Zing</option>
                <option value="6">Gate</option>
                <option value="7">Garena</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <select class="form-control" id="menhgia">
                <option value="0">Chọn Mệnh Giá</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input readonly="" class="form-control" type="number" value="1" min="1" max="100" id="mathe" placeholder="Nhập Số Lượng">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="password" id="pass2" placeholder="Nhập Mật Khẩu Cấp 2">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="text-center">
            <button id="muathe" type="button" class="btn btn-primary my-4">Mua Thẻ</button>
        </div>
    </div>
</div>
</div>

<div class="panel" id="panel-the">
    <ceter><h1>THÔNG TIN THẺ CÀO</h1></center>

        <div class="row">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Bạn vừa mua mã thẻ thành công!</h4>
                <p>Loại Thẻ Cào: <b id="show_loaithe"></b>
                </p>
                <p>Mệnh Giá: <b id="show_menhgia"></b> VNĐ</p>
                <p>Mã Seri: <b id="show_seri"></b>
                </p>
                <p>Mã Thẻ: <b id="show_mathe"></b>
                </p>
                <p class="mb-0">Vui lòng không tiết lộ mã thẻ và seri cho bất cứ ai để đề phòng rủi ro mất thẻ. Chúng tôi sẽ không hỗ trợ vấn đề nào về việc bạn bị lộ mã thẻ ra ngoài!</p>
            </div>
        </div>
</div>

<center>
    <h1 class="mb-0">Lịch Sử Mua Thẻ</h1>
</center>
<br>
<div class="table-responsive">
    <table class="table align-items-center table-flush" id="history-table">
        <thead class="thead-light">
            <tr>
                <th class="d-none">STT</th>
                <th>Tình trạng</th>
                <th>Mã Seri</th>
                <th>Mã Thẻ</th>
                <th>Loại Thẻ</th>
                <th>Mệnh Giá</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody class="list d-none" id="table-history">

        </tbody>
    </table>
</div>
</div>

<script src="/assets/js/core/action/muathe.js?v=<?php echo rand(0, 9999);?>"></script>