<?php
error_reporting(0);
/**** CardVip v2.0 
    * Author: Kunkey
    * FB: Kunkey.Riox ****/

class CardVip {

public $username;
public $password;
public $password2;
public $cookie_path;

private function try_login() {
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://cardvip.vn/Customer/Login");
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
        $contents = 'Tài khoản mật khẩu lỗi';
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
    curl_setopt($ch, CURLOPT_URL, 'https://cardvip.vn/Home/GetListConfigCardByNetworkCode');
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
            curl_setopt($ch, CURLOPT_URL, 'https://cardvip.vn/Customer/GetListOrderCardSell?limit=1&offset=0&keyword=');
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
                    curl_setopt($ch, CURLOPT_URL, 'https://cardvip.vn/Customer/GetListCardSellDetail?orderId='.$data[0]->Id);
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
        curl_setopt($ch, CURLOPT_URL, 'https://cardvip.vn/Home/InsertOrderCardSell');
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
            $contents = 'Mua Mã Thẻ Thành Công';
        }else {
            $contents = $msg->msg;
        }


    }else {
        $contents = 'Lỗi lấy ID Card!';
    }
    return $contents;
}


}