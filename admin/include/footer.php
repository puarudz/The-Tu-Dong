<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>  
</div>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="/assets_3/libs/jquery/jquery.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/bootstrap/js/bootstrap.bundle.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/metismenu/metisMenu.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/simplebar/simplebar.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/node-waves/waves.min.js?ts=<?php echo rand(0,99999);?>"></script>

        <!-- Required datatable js -->
        <script src="/assets_3/libs/datatables.net/js/jquery.dataTables.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <!-- Buttons examples -->
        <script src="/assets_3/libs/datatables.net-buttons/js/dataTables.buttons.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/jszip/jszip.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/pdfmake/build/pdfmake.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/pdfmake/build/vfs_fonts.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-buttons/js/buttons.html5.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-buttons/js/buttons.print.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-buttons/js/buttons.colVis.min.js?ts=<?php echo rand(0,99999);?>"></script>
        
        <!-- Responsive examples -->
        <script src="/assets_3/libs/datatables.net-responsive/js/dataTables.responsive.min.js?ts=<?php echo rand(0,99999);?>"></script>
        <script src="/assets_3/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js?ts=<?php echo rand(0,99999);?>"></script>

        <!-- Datatable init js -->
        <script src="/assets_3/js/pages/datatables.init.js?ts=<?php echo rand(0,99999);?>"></script>    

        <script src="/assets_3/js/app.js?ts=<?php echo rand(0,99999);?>"></script>
  <script>
    
    function dem_user(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.user'),
        run_count = 1,
        int_speed = 14;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

dem_user(500);


    function dem_thuong(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count2'),
        run_count = 1,
        int_speed = 14;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

dem_thuong(600);


    function dem_vip(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count3'),
        run_count = 1,
        int_speed = 14;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

dem_vip(1000);



    function dem_video(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count4'),
        run_count = 1,
        int_speed = 5;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

dem_video(2805);


$('#load').modal({
  show: true
})
  </script>




  </body>
</html>
