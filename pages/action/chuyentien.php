<script type="text/javascript">
    if (!is_mobile()) {
        $('.col-sm-3').css('padding', '20px');
    }
</script>

<div style="margin-top: 20px;"></div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="text-left">
            <h2 class="text-dark base-color"><span class="text-danger">Chuyển Tiền</span> <span class="text-info">Nội Bộ</span></h2>
        </div>
    </div>
</div>
<div class="row">
    <ul>
        <li>Hệ thống TrumCard.Vn hỗ trợ chuyển tiền <b class="text-danger"> cho tài khoản khác </b> trong cùng hệ thống.</li>
        <li>Hệ thống TrumCard.Vn sẽ thu phí <b class="text-danger">1% /1 lần chuyển</b>.</li>
        <li>Số tiền chuyển phải lớn hơn <b class="text-danger">10.000 VND </b> và nhiều nhất là <b class="text-danger">5.000.000 VNĐ</b>.</li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="text" id="nguoinhan" placeholder="Tên Tài khoản nhận">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="text" id="noidung" placeholder="Lời nhắn">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="number" id="sotien" min="5000000" placeholder="Số tiền Chuyển">
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group row">
            <input class="form-control" type="password" id="pass2" placeholder="Nhập Mật Khẩu Cấp 2">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="text-center">
            <button id="chuyentien" type="button" class="btn btn-primary my-4">Chuyển Tiền</button>
        </div>
    </div>
</div>
</div>



<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="text-left">
            <h2 class="text-dark base-color"><span class="text-danger">LỊCH SỬ</span> <span class="text-info">CHUYỂN TIỀN</span></h2>
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
                    <th class="f-xs " align="left">Tài khoản Nhận</th>
                    <th class="f-xs " align="left">Số tiền chuyển</th>
                    <th class="f-xs " align="left">Thời gian</th>
                </tr>
            </thead>
            <tbody class="list d-none" id="table-history-chuyen-tien">
            </tbody>
        </table>
    </div>
</div>

<script src="/assets/js/core/action/chuyentien.js"></script>