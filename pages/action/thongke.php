<div style="margin-top: 20px;"></div>
<center>
    <h2 class="text-dark base-color">
   <span class="text-danger">Thống Kê</span>
   <span class="text-info">Thẻ Cào</span>
</h2>
</center>

<br>
<div class="col-lg-3 col-md-3 col-sm-6">
    <div class="form-group" id="date_filter">
        <div class="input-group date">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo date('d/m/Y');?>" id="date_filter_value">
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table align-items-center table-flush" id="history-table">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Nhà Mạng</th>
                <th class="text-center">Mệnh Giá</th>
                <th class="text-center">Số Lượng Thẻ</th>
                <th class="text-center">Tổng khách nhận</th>
            </tr>
        </thead>
        <tbody class="list" id="table-filter"></tbody>
    </table>
</div>

<script src="/assets/js/core/action/thongke.js?v=<?php echo rand(0, 9999);?>"></script>