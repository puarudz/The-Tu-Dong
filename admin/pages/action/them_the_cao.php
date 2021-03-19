<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>

<?php
if($_POST['submit']) {

$loaithe = $_POST['loaithe'];
$menhgia = $_POST['menhgia'];
$seri = $_POST['seri'];
$mathe = $_POST['mathe'];
$time = time();

    mysqli_query($kun->connect_db(), "INSERT INTO `card_system` (`from`, `name`, `loaithe`, `menhgia`, `seri`, `mathe`, `status`, `time`) VALUES ('".$user['username']."', '".$user['name']."', '".$loaithe."', '".$menhgia."', '".$seri."', '".$mathe."', 'true', '".$time."')");

	echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Thêm thẻ thành công!</h4>
  <p>Thẻ cào đã được thêm vào hệ thống.</p>
</div>';
	
}else {
	echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Cảnh báo!</h4>
  <p>thẻ được thêm phải đúng loại thẻ, mệnh giá, seri, mã thẻ.</p>
  <hr>
  <p class="mb-0">Tuy nhiên nếu bạn hiểu rõ. Hãy tiếp tục!</p>
</div>';
}
?>






<div class="panel panel-default">
  <div class="panel-heading">THÊM THẺ CÀO</div>
  <div class="panel-body">
   
<form action="" method="post">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Loại Thẻ</label>
    <div class="col-sm-10">
<select class="form-control" name="loaithe">
  <option value="Viettel">Viettel</option>
  <option value="Mobifone">Mobifone</option>
  <option value="Vinaphone">Vinaphone</option>
  <option value="Garena">Garena</option>
</select>
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Mệnh Giá Thẻ</label>
    <div class="col-sm-10">
<select class="form-control" name="menhgia">
  <option value="10000">10.000 VND</option>
  <option value="20000">20.000 VND</option>
  <option value="30000">30.000 VND</option>
  <option value="50000">50.000 VND</option>
  <option value="100000">100.000 VND</option>
  <option value="200000">200.000 VND</option>
  <option value="300000">300.000 VND</option>
  <option value="500000">500.000 VND</option>
    <option value="1000000">1.000.000 VND</option>
</select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Seri Thẻ</label>
    <div class="col-sm-10">
      <input type="text" name="seri" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Mã Thẻ</label>
    <div class="col-sm-10">
      <input type="text" name="mathe" class="form-control">
    </div>
  </div>


<center><button type="submit" name="submit" value="Cập Nhật" class="btn btn-primary">Cập Nhật</button></center>


</form>
  </div>
</div>