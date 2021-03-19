<?php
defined('KUNKEYPR') or exit('Restricted Access');
?>
<footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-left text-muted">
              Copyright 2020 <a href="/home" class="font-weight-bold ml-1">TrumCard.Vn</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <?php
                if($user['add_by']) {
                  $author = $kun->user_orther($user['add_by']);
                  echo 'Đại lý vận hành: <b>'.$author['name'].'</b>';
                }else {
                  echo 'Vận hành bởi: <b>'.$config['admin_name'].'</b>';
                }
                ?>
              </li>
            </ul>
          </div>
        </div>
      </footer>
  </div>
</div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->

  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.1.0"></script>
  <!-- Main JS -->
  <script src="/assets/js/core/main.js?v=3.1.0"></script>
</body>
</html>

