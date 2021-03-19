<?php
$arr_menhgia = array("10000", "20000", "50000", "100000", "200000", "300000", "500000", "1000000"); 
$bonus_ck_viettel = $kun->user_setting_chietkhau($user['username'], 'VIETTEL');
$bonus_ck_mobifone = $kun->user_setting_chietkhau($user['username'], 'MOBIFONE');                
$bonus_ck_vinaphone = $kun->user_setting_chietkhau($user['username'], 'VINAPHONE');
$bonus_ck_vietnamobile = $kun->user_setting_chietkhau($user['username'], 'VIETNAMOBILE');
?>
<script type="text/javascript">if(is_mobile()) {$(".table").addClass("table-responsive");}</script>

        <table class="table table-bordered table-hover  nthoa_table table tablePercentDiscount">
            <tr>
                <th class="text-center">Mệnh Giá</th>
                <th class="text-center">Viettel</th>
                <th class="text-center">Mobifone</th>
                <th class="text-center">Vinaphone</th>
                <th class="text-center">Vietnamobile</th>
                <th class="text-center">Zing</th>
                <th class="text-center">Gate</th>
                <th class="text-center">Garena</th>
                <th class="text-center">Vcoin</th>
            </tr>
<?php for($x=0; $x<=count($arr_menhgia)-1; $x++) { ?>
    <tr>
      <td class="text-center"><?php echo number_format($arr_menhgia[$x]);?></td>
      <td class="text-center"><?php echo $viettel[$arr_menhgia[$x]] + $bonus_ck_viettel;?>%</td>
      <td class="text-center"><?php echo $mobifone[$arr_menhgia[$x]] + $bonus_ck_mobifone;?>%</td>
      <td class="text-center"><?php echo $vinaphone[$arr_menhgia[$x]] + $bonus_ck_vinaphone;?>%</td>
      <td class="text-center"><?php echo $vietnamobile[$arr_menhgia[$x]] + $bonus_ck_vietnamobile;?>%</td>
      <td class="text-center"><?php echo $zing[$arr_menhgia[$x]];?>%</td>
      <td class="text-center"><?php echo $gate[$arr_menhgia[$x]];?>%</td>
      <td class="text-center"><?php echo $garena[$arr_menhgia[$x]];?>%</td>
      <td class="text-center"><?php echo $vcoin[$arr_menhgia[$x]];?>%</td>
    </tr>  
 <?php } ?>
        </table>