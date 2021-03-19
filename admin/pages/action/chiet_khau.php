<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>  
                    <div class="container-fluid">
                        <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Cập Nhật Chiết Khấu</h4>

                                </div>
                            </div>
<?php
if(isset($_POST['submit'])){

	$menhgia_array = array(
		"10000",
		"20000",
		"50000",
		"100000",
		"200000",
		"300000",
		"500000",
		"1000000"
	);

	$viettel = [];
	$mobifone = [];
	$vinaphone = [];
	$vietnamobile = [];
	$zing = [];
	$gate = [];
	$garena = [];
	$vcoin = [];

	foreach ($menhgia_array as $key) {
		$viettel[$key] = $_POST['viettel_'.$key];
		$mobifone[$key] = $_POST['mobifone_'.$key];
		$vinaphone[$key] = $_POST['vinaphone_'.$key];
		$vietnamobile[$key] = $_POST['vietnamobile_'.$key];
		$zing[$key] = $_POST['zing_'.$key];
		$gate[$key] = $_POST['gate_'.$key];
		$garena[$key] = $_POST['garena_'.$key];
		$vcoin[$key] = $_POST['vcoin_'.$key];
	} 

	$data = array(
		'VIETTEL' => $viettel,
		'MOBIFONE' => $mobifone,
		'VINAPHONE' => $vinaphone,
		'VIETNAMOBILE' => $vietnamobile,
		'ZING' => $zing,
		'GATE' => $gate,
		'GARENA' => $garena,
		'VCOIN' => $vcoin
	);

mysqli_query($kun->connect_db(), "UPDATE `settings` SET `value`='".mysqli_real_escape_string($kun->connect_db(), json_encode($data))."' WHERE `key`='chietkhau'");

echo '<script>swal("Cập nhật chiết khấu thành công!", "Thành Công!", "success")</script>';

echo $mysqli->error;

}
?>
<form action="" method="POST">
<div class="row">
<div class="col-lg-3">
                                <div class="card">
                                    
                                    <div class="card-body"><h4 class="card-title mb-4">VIETTEL</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('VIETTEL');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="viettel_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>
   <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">MOBIFONE</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('MOBIFONE');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="mobifone_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>    
<div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">VINAPHONE</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('VINAPHONE');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="vinaphone_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>
<div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">VIETNAMOBILE</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('VIETNAMOBILE');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="vietnamobile_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>
 <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">ZING</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('ZING');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="zing_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div> 
 <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">GATE</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('GATE');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="gate_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>
 <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">GARENA</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('GARENA');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="garena_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div>
 <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body"><h4 class="card-title mb-4">VCOIN</h4>
 <?php 
	  	$viettel = $kun->get_chietkhau('VCOIN');
	  	foreach ($viettel as $key => $value) { if(!$value) $value = '0';?>
		<div class="form-group row">
	        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="margin-top: 5px;"><?php echo number_format($key);?></label>
	        <div class="col-lg-9 col-sm-9">
	            <input type="number" class="form-control" name="vcoin_<?php echo $key;?>" value="<?php echo $value;?>">
	        </div>
	    </div>
	  	<?php } ?>
                                    </div>
                                </div>
                            </div> 
                                                     </div>                       
                    <button type="submit" name="submit" class="btn btn-round btn-success btn-lg">Cập Nhật</button>
                </form>
 

</div>