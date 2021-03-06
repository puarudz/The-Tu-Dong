<?php
error_reporting(1);
/**** CardVip v2.0 
    * Author: Kunkey
    * FB: Kunkey.Riox ****/

class CardVip {

public $username;
public $password;
public $password2;
public $cookie_path;


public function __construct() {
	$this->home_api = 'https://cardvip.vn';
	$this->log_muacard_path = $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/log_path/log_muacard.txt';
	$this->log_napcuoc_path = $_SERVER['DOCUMENT_ROOT'].'/lib/cardvip/log_path/log_napcuoc.txt';	
}

private function try_login() {
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->home_api."/Customer/Login");
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $this->cookie_path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$this->username.'&password='.$this->password);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
}



public function get($url) {

    $page = json_decode($this->try_login());
    if($page->status) {
        
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
          $contents = curl_exec($ch);
          curl_close($ch);

    }else {
        $contents = 'T??i kho???n m???t kh???u l???i';
    }

  return $contents;
}

public function get_options_card($network) {
    $page = json_decode($this->try_login());

    switch (strtoupper($network)) {
        case 'VIETTEL':
            $card_network = 'NW_190726020047355';
            break;
        case 'VINAPHONE':
            $card_network = 'NW_190726020107355';
            break;
        case 'VIETNAMOBILE':
            $card_network = 'NW_191105040839773';
            break;
        case 'MOBIFONE':
            $card_network = 'NW_190726020132934';
            break;
        case 'ZING':
            $card_network = 'NW_190811054358545';
            break;
        case 'GATE':
            $card_network = 'NW_190816032024147';
            break;
        case 'GARENA':
            $card_network = 'NW_190824070526420';
            break;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->home_api.'/Home/GetListConfigCardByNetworkCode');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'networkCode='.$card_network.'&typeCard=2');
    $contents = curl_exec($ch);
    curl_close($ch);
    return $contents;
}


public function get_last_card_ordered() {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->home_api.'/Customer/GetListOrderCardSell?limit=1&offset=0&keyword=');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $card_list_order = json_decode(curl_exec($ch));
            curl_close($ch);   

            if($card_list_order->status) {  
                $data = $card_list_order->rows;
                if($data[0]->Id) {

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $this->home_api.'/Customer/GetListCardSellDetail?orderId='.$data[0]->Id);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
                    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    $info_card = json_decode(curl_exec($ch));
                    curl_close($ch);   

                    if($info_card->status) {
                        $contents = array(
                            'order_id' => $info_card->data[0]->OrderId,
                            'id' => $info_card->data[0]->Id,
                            'pin' => $info_card->data[0]->NumberCard,
                            'serial' => $info_card->data[0]->SeriCard
                        );
                    }

                }

            }else {
                $contents = $card_list_order->msg;
            }

    return $contents;
}


public function post_order_card($network, $amount){

    $get_id_card = json_decode($this->get_options_card($network));

    if($get_id_card->status) {
        $data = $get_id_card->data;
            $contents = '';
        foreach ($data as $key) {
            if($key->PricesCard == $amount) {
                $id_card = $key->Id;
                break;
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->home_api.'/Home/InsertOrderCardSell');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_path);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'model[IdConfigCard]='.$id_card.'&model[Quantity]=1&model[PasswordAdvanced]='.$this->password2);
        $msg = json_decode(curl_exec($ch));
        curl_close($ch);
 
        if($msg->status) {

        	/**
        	if($msg->order_id) {
				_log($this->log_muacard_path, $msg->order_id); // ghi l???i logg ????? x??? l?? th??? mua ???????c hay kh??ng ?
        	} 
			**/

            $contents = 'Mua M?? Th??? Th??nh C??ng';
        }else {
            $contents = $msg->msg;
        }


    }else {
        $contents = 'L???i l???y ID Card!';
    }
    return $contents;
}

private function _log($path, $string) {
	$f = fopen($path, 'a');
	fwrite($f, $string."\n");
	fclose($f);
}

private function _read_log($path) {
	$f = file_get_contents($path);
	$exp = explode("\n", $f);
	$i = 0;
	foreach ($exp as $key) {
		if($key != '') {
			$data[$i] = $key;
		}
	}
	return $data;
}

private function _search_log($order_id, $data = array()) {
	if(in_array($order_id, $data)) {
		return true;
	}else {
		return false;
	}
}



}




$config = [
	'mail' => 'ghhyvot@effobe.com',
	'pass' => 'kundeptraivl',
	'pass2' => 'kundeptrai'
];



$cardvip = new CardVip;
$cardvip->username = $config['mail'];
$cardvip->password = $config['pass'];
$cardvip->password2 = $cofig['pass2'] ;
$cardvip->cookie_path = 'cookiexx.txt';

echo $cardvip->get_last_card_ordered();