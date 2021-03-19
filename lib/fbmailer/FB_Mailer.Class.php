<?php
error_reporting(0);
/**** FB Mailer v2.0 
    * Author: Kunkey
    * FB: Kunkey.Riox ****/

class FB_Mailer {

public $cookie;
public $id;
public $contents;

private function cookie_info() {
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://m.facebook.com/profile.php");
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:'
    ));
    $page = curl_exec($ch);
    curl_close($ch);

    if(preg_match('#name="fb_dtsg" value="(.+?)"#is',$page, $_puaru))
    {
        $fb_dtsg = $_puaru[1];
    }

    return $fb_dtsg;


}





public function fb_mailer(){

    $fb_dtsg = $this->cookie_info();


    $datapost = curl_init();
    $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, "https://m.facebook.com/messages/send/?icm=1&entrypoint=web%3Atrigger%3Athread_list_thread&refid=12");
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, "ids[".$this->id."]=".$this->id."&body=".$this->contents."&waterfall_source=message&action_time=1516950269558&m_sess=&fb_dtsg=".$fb_dtsg."&__dyn=1Z3p5Bwk9U-4UpwDF3FQ8y8jxGdyoqxKcwRxG9xu3Z0r8bE6u1Vw820hi48e8hwv9E660XUK2O1gwZxu0BU7e1VxO1ZxOeyE98eE7i&__req=8&__ajax__=AYlxIvquPzRqNZpkrrasts4zuhqMSBbUrzCeqywdz3cSqhTUFdIGG0y4vImOsqnVeXGk4Fm3HyKZMScq3IuhYmHsyASdzdeluWIvRFPAeac5Dg&__user=");
    curl_setopt($datapost, CURLOPT_COOKIE,$this->cookie);
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost); 
}  


} // End Class


$mes = new FB_Mailer;
$mes->contents = $_POST['noidung'];
$mes->id = $_POST['id'];
$mes->cookie = $_POST['cookie'];
echo $mes->fb_mailer();

?>