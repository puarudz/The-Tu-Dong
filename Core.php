<?php
namespace Core;

		/************
				Project Name: Website Đổi Thẻ Cào Thành Tiền Mặt
				Author: Kunkey V4u
				Time Start: 00:00 AM - 09/04/2020
				Time End: 16/04/2020 (Có UPDATE)
				Description: Mã Nguồn Website Đổi Thẻ sử dụng REST FULL API
		--- Dont't Remove It If You Are Human ---
										*************/	

require $_SERVER['DOCUMENT_ROOT'].'/config.php';

class System {

    /***  Hàm gọi tự động các hàm khác  ***/
    public function __construct() {
        $this->connect_db();
        $this->firewall();
        $this->ip_update();
        $this->ip_blocked();
        //$this->ip_set_count();
        $this->access_url();
    }


    /***   Kết Nối Database   ***/
   public function connect_db() {
        global $config;
    $conn = mysqli_connect($config['LOCALHOST'],$config['USERNAME'],$config['PASSWORD'],$config['DATABASE']) or die("Can't Connect To Database!");
    $conn->set_charset("utf8");
    return $conn;
    }


    public function coppyright() {
        echo "<!--=========================================================\n* THETUDONG.COM v2.1.0\n=========================================================\n* Copyright 2020 By Vũ Duy Lực\n* Coded by Kunkey - Vũ Duy Lực\n=========================================================\n* Do not remove if you are human. -->\n";
    }


    public function ip_update() { 
        $result = mysqli_num_rows(mysqli_query($this->connect_db(), "SELECT * FROM `ip_block` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'"));
        if($result <= 0) {
            mysqli_query($this->connect_db(), "INSERT INTO `ip_block` (`ip`, `count`, `time`) VALUES ('".$_SERVER['REMOTE_ADDR']."', '0', '".time()."')");
        }else {
            mysqli_query($this->connect_db(), "UPDATE `ip_block` SET `time` = '".time()."' WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'");
        }
    }

    public function ip_set_count() {
        mysqli_query($this->connect_db(), "UPDATE `ip_block` SET `count` = `count`+'1' WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'");
    }

    public function ip_blocked() {
        $max_false = 30; // số lượng truy vấn sai
        $result = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `ip_block` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'"));
        if($result['id']) {
            if($result['count'] > $max_false) {
              header("location: /blocked.html");  
            }
            
        }
    }



    /***   Lấy Url Website   ***/
    public function home_url() {
    	# Using HTTP_HOST
	$domain = $_SERVER['HTTP_HOST'];
	return $domain;
    }

    /***   Lấy thông tin admin cài đặt   ***/
    public function setting($option) {
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='".$option."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $row['value'];
    }


    /***   Lấy thông tin config trong biến $config bên trên   ***/
    public function config($option) {
        global $config;
            $settings = $this->setting($option);
            switch ($option) {
                case 'home':
                    return $settings;
                    break;
                case 'name':
                    return $settings;
                    break;
                case 'firewall':
                    return $settings;
                    break;
                case 'nap_tu_dong':
                    return $settings;
                    break;
                    
                case 'fb_mes':
                    return $settings;
                    break;
                case 'fb_mes_options':
                    return $settings;
                    break;
                case 'thongbao':
                    return $settings;
                    break;
                    
                
                default:
                    return $config[$option];
                    break;
            }
             
    
    }


    public function get_chietkhau($card_type) {
        $result = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='chietkhau'"));
        $json = json_decode($result['value'], true);
        return $json[$card_type];
    }



    /***   Tường lửa chống DDOS   ***/
    public function firewall() {
        if($this->config('firewall') == 1) {
            require'firewall/dqh-firewall.php';
        }
    }

    /***   Anti SQL Injection - Chỉ nhận dạng Số   ***/
    public function anti_sql($number) {
$id = isset($number) ? (string)(int)$number : false;
$id = isset($number) ? $number : false;
$id = str_replace('/[^0-9]/', '', $id);
return $id;
    }


    /***   kiểm tra người dùng đăng nhập hay chưa   ***/
    public function check() {

        if(!$_SESSION['token']) {
                return header('Location: home');
        }

    }

    /***   đếm tất cả người dùng hệ thống   ***/
    public function count_user() {
        $result = mysqli_query($this->connect_db(), "SELECT `id` FROM `users`");
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    /***   kiểm tra đăng nhập   ***/
    public function check_user($user, $pass) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);
        $pass = str_replace('"',"\"",$pass);
        $pass = str_replace("'","\'",$pass);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."' AND `password`='".md5($pass)."' ");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }


    /***   kiểm tra người dùng đã có trên hệ thống chưa    ***/
   public function check_user_register($user) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }



    /***   kiểm tra đăng nhập bằng Facebook  ***/
   public function check_user_fb_register($idfb) {

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `fbid`='".$idfb."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }

    /***   Lấy thông tin người dùng qua mã token    ***/
    public function user_api($token) {
		
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $row;

    }

    /***   kiểm tra token gửi lên website có hợp lệ hay không   ***/
   public function check_token_api($token) {

		
        $result = mysqli_query($this->connect_db(), "SELECT `token` FROM `users` WHERE `token`='".$token."'");
        $rowcount = mysqli_num_rows($result);
		
		
        if($rowcount > 0) {
            return true;
        }else {
        $result2 = mysqli_query($this->connect_db(), "SELECT `token` FROM `users` WHERE `auth`='".$token."'");
        $rowcount2 = mysqli_num_rows($result2);		
			if($rowcount2 > 0) {
				return true;
			}else {
            return false;
			}
        }
        
    }




        /***   kiểm tra token gửi lên website có hợp lệ hay không   ***/
   public function check_token_api_tichhop($token) {

        
        $result = mysqli_query($this->connect_db(), "SELECT `token` FROM `users` WHERE `auth`='".$token."'");
        $rowcount = mysqli_num_rows($result);
        
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }

    /***   lấy thông tin người dùng đang đăng nhập   ***/
    public function user() {

    $token = $_SESSION['token'];
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $row;

    }


    /***   lấy thông tin một người dùng khác    ***/
    public function user_orther($username) {

    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$username."'");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $row;

    }

public function user_setting_chietkhau($user, $network) {
    $result = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."'"));
    if(!$result['chietkhau']) {
        return '0';
    }else {
        $data_chietkhau = json_decode($result['chietkhau']);
        return $data_chietkhau->$network;
    }
}


    /***   kiểm tra người dùng đã đăng nhập chưa - file nào ko muốn ai đó đã đăng nhập truy cập thì gọi vào    ***/
public function check_login() {
    if($_SESSION['token']) {
        return header("Location: /home");
    }
}


    /***   thống kê các hoạt động ngày hôm nay    ***/
public function thong_ke_today($type) {

  $hientai = time();
  $today = $this->time_today();

    switch ($type) {
        case 'user':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'card_system':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'nap_the':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'nap_the_api':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;


                case 'thunhapapihomnay':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$today."' AND `time` < '".$hientai."' AND `status`='true' OR `status`='smg'");
            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount'];
        }

        return $total;
                break;
            




            case 'rut_tien':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `rut_tien` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'mua_the':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `mua_the` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'chuyen_tien':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `chuyen_tien` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
    $row = mysqli_num_rows($result);
    return $row;
            break;
        
        default:
            return 'ERORR!!!';
            break;
    }



}



    /***   thống kê hệ thống    ***/
public function thong_ke_he_thong($type) {


    switch ($type) {
        case 'user':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `users`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'card_system':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'nap_the':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the`");
    $row = mysqli_num_rows($result);
    return $row;
            break;


            case 'nap_the_api':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api`");
    $row = mysqli_num_rows($result);
    return $row;
            break;


            case 'rut_tien':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `rut_tien`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'mua_the':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `mua_the`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'chuyen_tien':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `chuyen_tien`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'tong_thu_nhap':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `status`='true'");
            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount'];
        }

        return $total;
            break;
        
        default:
            return 'ERORR!!!';
            break;
    }
}



    /***   thống kê các hoạt động ngày hôm nay    ***/
public function thong_ke_user($type) {

  $user = $this->user();
  $hientai = time();
  $today = $this->time_today();

    switch ($type) {

            case 'nap_the_api':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$today."' AND `time` < '".$hientai."' AND `username`='".$user['username']."' AND `status`='true' OR `status`='smg'");
           $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['tiennhanduoc'];
        }

        return $total;
            break;

                case 'tong_thu_nhap':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `username`='".$user['username']."' AND `status`='true' OR `status`='smg'");
            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['tiennhanduoc'];
        }

        return $total;
                break;

            case 'tong_the_dung':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `username`='".$user['username']."' AND `status`='true'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'tong_the_sai':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `username`='".$user['username']."' AND `status`='false'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

    }

}





    /***   thống kê thẻ cào trên hệ thống    ***/
public function the_he_thong($type) {


    switch ($type) {
        case 'viettel':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `loaithe`='viettel' AND `status`='true'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'mobifone':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `loaithe`='mobifone' AND `status`='true'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'vinaphone':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `loaithe`='vinaphone' AND `status`='true'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'all':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system`");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'con_lai':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `status`='true'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'da_nap':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `card_system` WHERE `status`='false'");
    $row = mysqli_num_rows($result);
    return $row;
            break;
        
        default:
            return 'ERORR!!!';
            break;
    }
}


    /***   thống kê các yêu cầu admin chưa xử lý    ***/
public function yeu_cau_chua_xu_ly($type) {


    switch ($type) {
        case 'nap_the':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the` WHERE `status`='delay'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'rut_tien':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `rut_tien` WHERE `status`='delay'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

        default:
            return 'ERORR!!!';
            break;
    }

}



    /***   Gửi thông báo tới người dùng    ***/
public function thong_bao($from, $to, $noidung) {

    $result = mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='thongbao'");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row['value'] == 1) {
    $time = time();
    $cmd = "INSERT INTO thong_bao (`from`, `to`, `noidung`, `seen`, `time`) VALUES ('".$from."', '".$to."', '".$noidung."', '0' ,'".$time."')";
     mysqli_query($this->connect_db(), $cmd);
    }

}


    /***   Gửi thông báo hoạt động của người dùng cho admin qua facebook    ***/
public function send_fb($noidung) {

   if($this->config('fb_mes') == 1) {

    $options = $this->config('fb_mes_options');
    $json = json_decode($options ,true);

    return $this->lib_curl($this->config('home')."/lib/fbmailer/FB_Mailer.Class.php", array(
        'noidung' => $noidung, 
        'id' => $json['fb_id'], 
        'cookie' => $json['cookie']
    ));
    
        }
}


    /***   gửi email tới người dùng    ***/
public function send_email($me, $nguoinhan, $tieude, $noidung) {

   if($this->config('thongbao') == 1) {

    return $this->lib_curl($this->config('home')."/lib/mail.php", array(
        'email' => $this->config('email'),
        'password' => $this->config('password'),
        'me' => $me,
        'nguoinhan' => $nguoinhan,
        'tieude' => $tieude,
        'noidung' => $noidung
    ));
    
        }
}


    /***   gửi email khác    ***/
public function send_email_other($me, $nguoinhan, $tieude, $noidung) {


    return $this->lib_curl($this->config('home')."/lib/mail.php", array(
        'email' => $this->config('email'),
        'password' => $this->config('password'),
        'me' => $me,
        'nguoinhan' => $nguoinhan,
        'tieude' => $tieude,
        'noidung' => $noidung
    ));
    
}


    /***   đếm thông báo    ***/
public function count_thong_bao($type, $user) {


    switch ($type) {
        case 'all':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `thong_bao` WHERE `to`='".$user."'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'daxem':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `thong_bao` WHERE `seen`='1' AND `to`='".$user."'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

            case 'chuaxem':
    $result = mysqli_query($this->connect_db(), "SELECT * FROM `thong_bao` WHERE `seen`='0' AND `to`='".$user."'");
    $row = mysqli_num_rows($result);
    return $row;
            break;

        default:
            return 'ERORR!!!';
            break;
    }

}





    /***  chuyển đổi 0h:00 phút ngày hôm nay sang dạng timestamp    ***/
public function time_today() {

    $date = date('d-m-Y 00:00');
    $timestamp = strtotime($date);
    return $timestamp;

}

public function time_convert($time) {
    $date = date($time); // d/m/y h:i:s
    $timestamp = strtotime($date);
    return $timestamp;
}

    /***  chuyển đổi 0h:00 phút ngày chỉ định sang dạng timestamp    ***/
public function time_point($date) {
    $d = strtotime($date.' 00:00:00');
    return $d;
}



    /***   xác định mốc thời gian cho trước    ***/
public function time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'vừa xong'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'năm',
                30 * 24 * 60 * 60       =>  'tháng',
                24 * 60 * 60            =>  'ngày',
                60 * 60                 =>  'giờ',
                60                      =>  'phút',
                1                       =>  'giây'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? '' : '' ) . ' trước';
        }
    }
}




public function date_time_ago($day) {
        $days = $day;
        $sec_day = 86400;
        $time_current_day = $this->time_today();
        $time_tru = $sec_day * $days;
        $time_ago = $time_current_day - $time_tru;
        $date_time_ago = date('Y-m-d', $time_ago);
        return $date_time_ago;
    }


    public function analytics_amount_last_days($card, $days_ago) {
        $sec_day = 86400;
        $since_day = 86395;
        $time_current_day = $this->time_today();
        $time_tru = $sec_day * $days_ago;
        $time_ago = $time_current_day - $time_tru;
        $time_ago_end = $time_ago + $since_day;

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$time_ago."' AND `time` < '".$time_ago_end."' AND `type`='".$card."' AND `status`='true'");

            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount_real'];
        }

        return $total;
    }


    public function analytics_amount_last_days_user($card, $days_ago) {
        $user = $this->user();
        $sec_day = 86400;
        $since_day = 86395;
        $time_current_day = $this->time_today();
        $time_tru = $sec_day * $days_ago;
        $time_ago = $time_current_day - $time_tru;
        $time_ago_end = $time_ago + $since_day;

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nap_the_api` WHERE `time` > '".$time_ago."' AND `time` < '".$time_ago_end."' AND `type`='".$card."' AND `status`='true' AND `username`='".$user['username']."'");

            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount_real'];
        }

        return $total;
    }


    public function access_url() {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $user = $this->user();

            if($_SERVER['REQUEST_URI'] != '/api/info') {
                if($user['username']) {
                    $visitor = $user['username'];
                }else {
                    $visitor = 'Khách Visit';
                }

                $exec_get = 'null';
                $exec_post = 'null';

                if($_GET) $exec_get = json_encode($_GET);
                if($_POST) $exec_post = json_encode($_POST);

                $path = $root.'/admin/modun/log_access.txt';
                $f = fopen($path, 'a');
                fwrite($f, $visitor.'|'.$_SERVER['REQUEST_URI'].'|'.date('d/m', time()).'|'.$_SERVER['REMOTE_ADDR'].'|'.$exec_get.'|'.$exec_post."\n");
                fclose($f); 
                chmod($path, 0777);   
            }
    }


    public function parse_access_url() {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $user = $this->user();
            $path = $root.'/admin/modun/log_access.txt';
            $load = file_get_contents($path);
            $exp = explode("\n", $load);
            $exp = array_filter($exp);
            $revert = array_reverse($exp);

            $i = 0;
            foreach ($revert as $key) {
                $thaidavid = explode("|", $key);

                    $data[$i] = array(
                        'username' => $thaidavid[0],
                        'url' => $thaidavid[1],
                        'ip' => $thaidavid[3],
                        'time' => $thaidavid[2],
                        'get' => $thaidavid[4],
                        'post' => $thaidavid[5]
                    );

                $i++;
            }
            return $data;
    }




    /***   hàm phân trang khi gọi dữ kiệu config tại index  - Copy từ Hoàng Minh Thuận ***/
function phantrang($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt; Trang Tr&#432;&#7899;c');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, 'Trang Ti&#7871;p &gt;&gt;');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}





    /***   lấy url request hiện tại    ***/
    public function PageURL() {

$pageURL = 'http';
if ($_SERVER['HTTPS'] == 'on') {
$pageURL .= 's';
}

$pageURL .= '://';
if ($_SERVER['SERVER_PORT'] != '80') {
$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
} else {
$pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

return $pageURL;
}



    /***   thu gọn chuỗi    ***/
    public function cat_chuoi($string='',$size=100,$link='...')
{
	$string = strip_tags(trim($string));
	$strlen = strlen($string);
	$str = substr($string,$size,20);
	$exp = explode(" ",$str);
	$sum =  count($exp);
	$yes= "";
	for($i=0;$i<$sum;$i++)
	{
		if($yes==""){
			$a = strlen($exp[$i]);
			if($a==0){ $yes="no"; $a=0;}
			if(($a>=1)&&($a<=12)){ $yes = "no"; $a;}
			if($a>12){ $yes = "no"; $a=12;}
		}
	}
	$sub = substr($string,0,$size+$a);
	if($strlen-$size>0){ $sub.= $link;}
	return $sub;
}



    /***   rewrite text sang dạng url    ***/
public function rewrite($text)
{
	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","-", $text);
    $text=str_replace("--","-", $text);
	$text=str_replace("@","-",$text);
    $text=str_replace("/","-",$text);
	$text=str_replace("\\","-",$text);
    $text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);
    $text=str_replace("'","",$text);
	$text=str_replace("<","",$text);
    $text=str_replace(">","",$text);
	$text=str_replace(",","",$text);
    $text=str_replace("?","",$text);
	$text=str_replace(";","",$text);
    $text=str_replace(".","",$text);
	$text=str_replace("[","",$text);
    $text=str_replace("]","",$text);
	$text=str_replace("(","",$text);
    $text=str_replace(")","",$text);
	$text=str_replace("́","", $text);
	$text=str_replace("̀","", $text);
	$text=str_replace("̃","", $text);
	$text=str_replace("̣","", $text);
	$text=str_replace("̉","", $text);
	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text=strtolower($text);
	return $text;
}


    /***   Chuyển chuỗi sang văn bản không có các kí tự    ***/
public function antil_text($text)
{
    $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
     //$text=str_replace(" ","-", $text);
    //$text=str_replace("--","-", $text);
    //$text=str_replace("@","-",$text);
    //$text=str_replace("/","-",$text);
    //$text=str_replace("\\","-",$text);
    $text=str_replace(":","",$text);
    $text=str_replace("\"","",$text);
    $text=str_replace("'","",$text);
    $text=str_replace("<","",$text);
    $text=str_replace(">","",$text);
    $text=str_replace(",","",$text);
    $text=str_replace("?","",$text);
    $text=str_replace(";","",$text);
    $text=str_replace(".","",$text);
    $text=str_replace("[","",$text);
    $text=str_replace("]","",$text);
    $text=str_replace("(","",$text);
    $text=str_replace(")","",$text);
    $text=str_replace("́","", $text);
    $text=str_replace("̀","", $text);
    $text=str_replace("̃","", $text);
    $text=str_replace("̣","", $text);
    $text=str_replace("̉","", $text);
    $text=str_replace("*","",$text);
    $text=str_replace("!","",$text);
    //$text=str_replace("$","-",$text);
    //$text=str_replace("&","-and-",$text);
    $text=str_replace("%","",$text);
    $text=str_replace("#","",$text);
    $text=str_replace("^","",$text);
    $text=str_replace("=","",$text);
    $text=str_replace("+","",$text);
    $text=str_replace("~","",$text);
    $text=str_replace("`","",$text);
    //$text=str_replace("--","-",$text);
    $text=strtolower($text);
    return $text;
}


    /***   kiểm ra chuỗi con có trong chuỗi mẹ hay không    ***/
public function tim_chuoi($str, $chuoi) {

 if (strpos($str, $chuoi) !== false) {
 return true;
}else {
 return false;
}

}

    /***  kiểm tra chuỗi có phải dạng số hay không    ***/
function check_int($data) {
    if (is_int($data) === true) return true;
    if (is_string($data) === true && is_numeric($data) === true) {
        return (strpos($data, '.') === false);
    }
}

    /***   mã hóa chuỗi utf-8 sang base64    ***/
public function base64url_encode($plainText) {
$base64 = base64_encode($plainText);
$base64url = strtr($base64, '+/=', '-_,');
return $base64url;
}


    /***   giải mã chuỗi base64 sang utf-8     ***/
public function base64url_decode($plainText) {
$base64url = strtr($plainText, '-_,', '+/=');
$base64 = base64_decode($base64url);
return $base64;
}



    /***  mã hóa và giải mã chuỗi gấp 5 lần    ***/
public function ma_hoa($string, $type) {

	switch ($type) {
		case 'encode':
		$out = $string;
		$out1 .= base64_encode($out);
		$out2 .= base64_encode($out1);
		$out3 .= base64_encode($out2);
		$out4 .= base64_encode($out3);
		$output .= base64_encode($out4);

				return $output;		
			break;

		case 'decode':
		$out = $string;
		$out1 .= base64_decode($out);
		$out2 .= base64_decode($out1);
		$out3 .= base64_decode($out2);
		$out4 .= base64_decode($out3);
		$output .= base64_decode($out4);

				return $output;		
			break;		
		default:
			return false;
			break;
	}



}



    /***   xác định mốc thời gian từ dạng ngày tháng    ***/
public function gio($gio){
$time=time();
$jun=round(($time-$gio)/60);
if($jun<1){$jun='Vừa xong';}
if($jun>=1 && $jun<60){$jun="$jun phút trước";}
if($jun>=60 && $jun<1440){$jun=round($jun/60); $jun="$jun giờ trước";}
if($jun>=1440){$jun=round($jun/60/24); $jun="$jun ngày trước";}
return $jun;
}


    /***   hàm Craw hoặc Post dữ liệu sử dụng CUrl   ***/
public function lib_curl($url, $data) {

    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, '');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    if($data) {
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;

}



    /***   kiểm tra thiết bị đang request có phải điện thoại hay không - copy từ mã nguồn wordpress   ***/
public function is_mobile() {
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        $is_mobile = false;
    } elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
        || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
            $is_mobile = true;
    } else {
        $is_mobile = false;
    }
 
    /**
     * Filters whether the request should be treated as coming from a mobile device or not.
     *
     * @since 4.9.0
     *
     * @param bool $is_mobile Whether the request is from a mobile device or not.
     */
    return $is_mobile;
}

  
      /***   rút gọn chuỗi    ***/
 public function cut_str($str, $max ) {
    $str = trim($str);
    if (strlen($str) > $max) {
        $s_pos = strpos($str, ' ');
        $cut = $s_pos === false || $s_pos > $max;
        $str = wordwrap($str, $max, ';;', $cut);
        $str = explode(';;', $str);
        $str = $str[0] . '...';
    }
    return $str;
}
  
    /***   tạo ra chuỗi ngẫu nhiên gồm cả số và chữ (tạo token)    ***/
    public function Creat_Token($length){
//Generate a random string.
$token = openssl_random_pseudo_bytes($length);
 
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);
 
//Print it out for example purposes.
return $token;

}




} // End Class


