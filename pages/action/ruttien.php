<script type="text/javascript">if (!is_mobile()) {$('.col-sm-3').css('padding', '20px');$('.col-sm-2').css('padding', '20px');}</script>
<div style="margin-top: 20px;"></div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="text-left">
            <h2 class="text-dark base-color"><span class="text-danger">RÚT TIỀN</span> <span class="text-info">VỀ ATM - VÍ</span></h2>
        </div>
    </div>
</div>
<div class="row">
    <ul>
        <li>Hệ thống TrumCard.Vn hỗ trợ rút tiền về <b class="text-danger"> rất nhiều ngân hàng và ví điện tử </b> thông dụng.</li>
        <li>Hệ thống TrumCard.Vn cam kết<b class="text-danger"> rút tiền không phát sinh phí </b>.</li>
        <li>Đối với lệnh rút tiền về ngân hàng quý khách lưu ý <b class="text-danger"> điền đúng số tài khoản và tên chủ khoản (không dấu) </b>. Nếu điền sai tên chủ khoản lệnh rút tiền sẽ tự động hủy và hoàn lại tiền cho khách.</li>
        <li>Đối với lệnh rút tiền về ví điện tử MOMO quý khách lưu ý <b class="text-danger"> điền đúng số điện thoại và tên chủ ví MOMO </b>. Nếu điền sai tên chủ ví lệnh rút tiền sẽ tự động hủy và hoàn lại tiền cho khách.</li>
    </ul>
</div>



<div class="row">
    <div class="col-sm-3">
        <div class="form-group row">
            <select class="form-control" id="nganhang">
                <option value=""> Chọn ngân hàng/Ví điện tử</option>
                <option value="MOMO"> Ví điện tử Momo (Momo)</option>
                <option value="AGRIBANK"> Ngân hàng Nông nghiệp và Phát triển Nông thôn (AGRIBANK)</option>
                <option value="TECHCOMBANK"> Ngân hàng TMCP Kỹ thương Việt Nam (TECHCOMBANK)</option>
                <option value="VIETCOMBANK"> Ngân hàng thương mại cổ phần Ngoại thương Việt Nam (VIETCOMBANK)</option>
                <option value="TPBANK"> Ngân hàng Thương mại Cổ phần Tiên Phong (TPBANK)</option>
                <option value="DONGABANK"> Ngân hàng Đông Á (DONGABANK)</option>
                <option value="MSB"> Ngân hàng thương mại cổ phần Hàng hải Việt Nam (MSB)</option>
                <option value="BIDV"> Ngân hàng Đầu tư và Phát triển Việt Nam (BIDV)</option>
                <option value="SACOMBANK"> Ngân hàng thương mại cổ phần Sài Gòn Thương Tín (SACOMBANK)</option>
                <option value="LIENVIETPOSTBANK"> Ngân hàng thương mại cổ phần Bưu điện Liên Việt (LIENVIETPOSTBANK)</option>
                <option value="VIETINBANK"> Ngân hàng Thương mại cổ phần Công Thương Việt Nam (VIETINBANK)</option>
                <option value="MBBANK"> Ngân hàng thương mại cổ phần Quân đội (MBBANK)</option>
                <option value="VPBANK"> Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBANK)</option>
                <option value="ACB"> Ngân hàng thương mại cổ phần Á Châu (ACB)</option>
                <option value="OCB"> Ngân hàng TMCP Phương Đông (OCB)</option>
                <option value="EXIMBANK"> Ngân hàng thương mại cổ phần Xuất Nhập Khẩu Việt Nam (EXIMBANK)</option>
                <option value="ABBANK"> Ngân hàng An Bình (ABBANK)</option>
                <option value="BAOVIETBANK"> Ngân Hàng TMCP Bảo Việt (BAOVIETBANK)</option>
                <option value="BACABANK"> Ngân hàng TMCP Bắc Á (BACABANK)</option>
                <option value="HSBC"> (HSBC)</option>
            </select>
        </div>
    </div>


    <div class="col-sm-2">
        <div class="form-group row">
            <input class="form-control" type="text" id="nguoinhan" placeholder="Tài khoản/Số tài khoản:">
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group row">
            <input class="form-control" type="text" id="chutaikhoan" placeholder="Tên Chủ Tài Khoản">
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group row">
            <input class="form-control" type="number" id="sotien" min="50000" value="50000" placeholder="Số tiền cần rút">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="password" id="pass2" placeholder="Nhập Mật Khẩu Cấp 2">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="text-center">
            <button id="ruttien" type="button" class="btn btn-primary my-4">Rút Tiền</button>
        </div>
    </div>
</div>
</div>



<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="text-left">
            <h2 class="text-dark base-color"><span class="text-danger">LỊCH SỬ</span> <span class="text-info">RÚT TIỀN</span></h2>
        </div>
    </div>
</div>


<div id="divTable" class="nthoa_table" data-page="1">
    <div class="table-responsive">
        <table class="table align-items-center table-flush" id="history-table">
            <thead class="thead-light">
                <tr>
                    <th class="f-xs d-none" align="left">STT</th>
                    <th class="f-xs " align="left">Tình trạng</th>
                    <th class="f-xs " align="left">Ngân hàng</th>
                    <th class="f-xs " align="left">Tài khoản</th>
                    <th class="f-xs " align="left">Chủ Tài Khoản</th>
                    <th class="f-xs " align="left" da>Số tiền nhận</th>
                    <th class="f-xs " align="left">Thời gian rút</th>
                </tr>
            </thead>
            <tbody class="list d-none" id="table-history-rut-tien">
            </tbody>
        </table>
    </div>
</div>

<script src="/assets/js/core/action/ruttien.js?v=<?php echo rand(0, 9999);?>"></script>