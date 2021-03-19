<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>

<div class="panel panel-default">
  <div class="panel-heading">LOG CALLBACK</div>
  <p>Định Dạng : |Trạng Thái|, |Mệnh Giá Thực|, |Mệnh Giá Gửi Lên|, |Mã Thẻ|, |Mã Seri|, |Mã Đơn|,|Ngày Giờ|</p>
  <div class="panel-body">
    <textarea class="form-control" style="height: 700px;background-color: #000;color: #00ff89;"><?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/Card_Exchange/log/log.bat');?></textarea>
  </div>
</div>