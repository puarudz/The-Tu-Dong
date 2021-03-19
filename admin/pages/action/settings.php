<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>

<?php
if($_POST['submit']) {

$firewall = $_POST['firewall'];
$nap_tu_dong = $_POST['nap_tu_dong'];
$thongbao = $_POST['thongbao'];
$fb_mes = $_POST['fb_mes'];
$cookie = $_POST['cookie'];
$fb_id = $_POST['fb_id'];
$home = $_POST['home'];
$name = $_POST['name'];

  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$firewall."' WHERE `key`='firewall' ");

  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$nap_tu_dong."' WHERE `key`='nap_tu_dong' ");

  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$thongbao."' WHERE `key`='thongbao' ");


  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$fb_mes."' WHERE `key`='fb_mes' ");

$fb_mes_data = json_encode(array("cookie" => $cookie, "fb_id" => $fb_id));

  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$fb_mes_data."' WHERE `key`='fb_mes_options' ");

  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$home."' WHERE `key`='home' ");


  mysqli_query($kun->connect_db(), "UPDATE settings SET value = '".$name."' WHERE `key`='name' ");



	echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Cập nhật thành công!</h4>
  <p>Tất cả các cài đặt đã được áp dụng.</p>
</div>';
	
}else {
	echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Cảnh báo!</h4>
  <p>Những thay đổi trong phần này sẽ ảnh hưởng tới hoạt động của website sau này.</p>
  <hr>
  <p class="mb-0">Tuy nhiên nếu bạn hiểu rõ. Hãy tiếp tục!</p>
</div>';
}
?>






<div class="panel panel-default">
  <div class="panel-heading">CÀI ĐẶT HỆ THỐNG</div>
  <div class="panel-body">
   
<form action="" method="post">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Tường Lửa</label>
    <div class="col-sm-10">
<select class="form-control" name="firewall">
  <option value="<?php echo $kun->config('firewall');?>"><?php if($kun->config('firewall') == 1) {echo 'Đang được Bật';}else{echo 'Đang được Tắt';}?></option>
  <option value="1">Bật Firewall</option>
  <option value="0">Tắt Firewall</option>
</select>
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nạp Thẻ Tự Động</label>
    <div class="col-sm-10">
<select class="form-control" name="nap_tu_dong">
  <option value="<?php echo $kun->config('nap_tu_dong');?>"><?php if($kun->config('nap_tu_dong') == 1) {echo 'Đang được Bật';}else{echo 'Đang được Tắt';}?></option>
  <option value="1">Bật Nạp Thẻ Tự Động </option>
  <option value="0">Tắt Nạp Thẻ Tự Động </option>
</select>
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gửi Thông Báo Hoạt Động</label>
    <div class="col-sm-10">
<select class="form-control" name="thongbao">
  <option value="<?php echo $kun->config('thongbao');?>"><?php if($kun->config('thongbao') == 1) {echo 'Đang được Bật';}else{echo 'Đang được Tắt';}?></option>
  <option value="1">Bật Gửi Thông Báo</option>
  <option value="0">Tắt Gửi Thông Báo</option>
</select>
    </div>
  </div>


  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gửi Thông Báo Hoạt Động Cho Admin Qua FB MES</label>
    <div class="col-sm-10">
<select class="form-control" name="fb_mes">
  <option value="<?php echo $kun->config('fb_mes');?>"><?php if($kun->config('fb_mes') == 1) {echo 'Đang được Bật';}else{echo 'Đang được Tắt';}?></option>
  <option value="1">Bật Gửi Thông Báo Cho Admin</option>
  <option value="0">Tắt Gửi Thông Báo Cho Admin</option>
</select>
    </div>
  </div>



<?php
	$fb_mes = $kun->config('fb_mes_options');
	$json = json_decode($fb_mes, true);
	$cookie = $json['cookie'];
	$fb_id = $json['fb_id'];
?>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Cookie Facebook Clone</label>
    <div class="col-sm-10">
      <input type="text" name="cookie" class="form-control" value="<?php echo $cookie;?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">ID FB của Admin</label>
    <div class="col-sm-10">
      <input type="text" name="fb_id" class="form-control" value="<?php echo $fb_id;?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Địa Chỉ Website</label>
    <div class="col-sm-10">
      <input type="text" name="home" class="form-control" value="<?php echo $kun->config('home');?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tên Website</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" value="<?php echo $kun->config('name');?>">
    </div>
  </div>

<center><button type="submit" name="submit" value="Cập Nhật" class="btn btn-primary">Cập Nhật</button></center>


</form>
  </div>
</div>