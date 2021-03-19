<?php $arr_menhgia = array( "0", "10000", "20000", "50000", "100000", "200000", "300000", "500000", "1000000"); ?>
<script type="text/javascript">
if (!is_mobile()) {$('.col-sm-3').css('padding', '20px');}</script>

<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
    <div style="margin-top: 20px;"></div>

    <div class="row">
        <ul>
            <li>Hệ thống Auto nạp thẻ<b class="text-danger"> cam kết 5s/thẻ, ổn định </b>. Công nghệ API<b class="text-danger"> cam kết không nuốt thẻ không làm chậm web</b> của đối tác.</li>
            <li>Vào mùa cước cam kết chiết khấu cực tốt chỉ từ <b class="text-danger"> 20%</b> đến <b class="text-danger"> 25%</b>.</li>
            <li>Quý khách lưu ý không nhập các ký tự đặc biệt vào mã thẻ hay seri như các ký tự <b class="text-danger"> = + - ~ ! # $ % ^ &amp; * () _ / . , " ' ; :</b>.</li>
            <li>
                Quý khách vui lòng gửi đúng mệnh giá thẻ. Trong trường hợp gửi sai mệnh giá thẻ của quý khách sẽ nhận mệnh giá thấp nhất.
            </li>
            <li>Quý khách gửi thẻ mệnh giá <b class="text-danger">100.000 đ</b> mà mệnh giá thực là <b class="text-info">50.000 đ</b> thì quý khách sẽ nhận được số tiền là <b class="text-success">50.000 đ</b> x Chiết khấu thẻ - 50%</li>
            <li>Quý khách gửi thẻ mệnh giá <b class="text-danger">50.000 đ</b> mà mệnh giá thực là <b class="text-info">100.000 đ</b> thì quý khách sẽ nhận được số tiền là <b class="text-success">50.000 đ</b> x Chiết khấu thẻ - 50%</li>
        </ul>
    </div>

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
                    <option value="8">Vcoin</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group row">
                <select class="form-control" id="menhgia">
                    <option value="0">Chọn Mệnh Giá</option>
                    <?php for($v=1;$v<=count($arr_menhgia)-1;$v++) { ?>
                    <option value="<?php echo $v;?>"><?php echo number_format($arr_menhgia[$v]);?> VND</option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group row">
                <input class="form-control" type="text" id="mathe" placeholder="Nhập Mã Thẻ">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group row">
                <input class="form-control" type="text" id="seri" placeholder="Nhập Mã Seri">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="text-center">
                <button id="napthe" type="button" class="btn btn-primary my-4">Nạp Thẻ</button>
            </div>
        </div>
    </div>
</div>


<center>
    <h2 class="text-dark base-color"><span class="text-danger">LỊCH SỬ</span> <span class="text-info">NẠP TIỀN</span></h2>
</center>
<br>
                          <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <strong><p>Với các thẻ đang xử lý quý khách có thể <a href="javascript:void(0);" id="reload-history"><b class="text-danger"> nhấn vào đây </b></a> để cập nhật trạng thái của thẻ cào.</p></strong>
                                </div>
                            </div>

<div class="table-responsive">
    <table class="table align-items-center table-flush" id="history-table">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tình trạng</th>
                <th>Loại Thẻ</th>
                <th>Mã Seri</th>
                <th>Mã Thẻ</th>
                <th>Mệnh Giá Gửi</th>
                <th>Thực Nhận</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody class="list d-none" id="table-history"></tbody>
    </table>
</div>
</div>


<script src="/assets/js/core/action/napthe.js?v=<?php echo rand(0, 9999);?>"></script>