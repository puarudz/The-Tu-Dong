<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>

<?php
if(isset($_POST['del_log'])) { unlink($_SERVER['DOCUMENT_ROOT'].'/admin/modun/log_access.txt');}
?>



<div class="panel panel-default">
  <div class="panel-heading"><h4>Card247.Vn - Log Truy Vấn Hệ Thống</h4></div>
  <div class="panel-body">
  	<div class="row col-md-12">
	  	<form action="" method="post">
	  	  <button name="del_log" class="btn btn-success btn-md">Xóa Log</button>
	  	</form>
  	</div>
  		<div style="margin-bottom: 20px;margin-top: 20px;"></div>
    <textarea class="form-control" style="height: 700px;background-color: #000;color: #00ff89;"><?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/admin/modun/log_access.txt');?></textarea>
  </div>
</div>