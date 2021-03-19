<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>
                   <div class="container-fluid">
                       <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Thẻ Cào Đã Bị Mua</h4>


                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                              <tr>
                                  <th class="d-none">STT</th>
                              	  <th>Người Mua</th>
                                  <th>Loại Thẻ</th>
                                  <th>Mệnh Giá</th>
                                  <th>Seri</th>
                                  <th>Mã Thẻ</th>
                                  <th>Trạng Thái</th>
                                  <th>Thời Gian</th>
                              </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php        
 $sel = mysqli_query($kun->connect_db(), "SELECT * FROM `mua_the` ORDER BY id DESC");
 //$tong = $kun->thong_ke_he_thong('nap_the');
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `mua_the`"));
        while( $row=mysqli_fetch_array($sel) ) {

        	if($row['status'] == 'true') {
        		$btn = 'success';
        		$trangthai = 'Thành Công';

        	}else if ($row['status'] == 'false') {
        		$btn = 'danger';
        		$trangthai = 'Thẻ lỗi';
          }else {
        		$btn = '';
        		$trangthai = '';
            $action = '';
        	}
        	
?>
							  	<tr>
							  	  <td class="d-none">'+stt_count+'</td>
                                  <td><?php echo $row['from'];?></td>
                                  <td><?php echo $row['loaithe'];?></td>
                                  <td><?php echo number_format($row['menhgia']);?>đ</td>
                                  <td><?php echo $row['seri'];?></td>
                                  <td><?php echo $row['mathe'];?></td>
                                  <td><span class="btn btn-<?=$btn;?> btn-sm waves-effect waves-light"><?php echo $trangthai;?></span></td>
                                  <td><?php echo date('d/m/Y H:i', $row['time']);?></td>
                              	</tr>

<?
            }
?>

                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                </div>
                </div>