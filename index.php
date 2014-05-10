<?php
/**
 *   WinterXMQ <WinterXMQ@gmail.com>
 *   Version 1.0.0.1
 */
define ( "TOKEN", "WinterXMQ" );


$weChatObj = new WeChatCallbackAPI();
$weChatObj->valid();

class WeChatCallbackAPI {
    /**
     * 用于微信平台和回复平台交流
     */
    public function valid() {
        $echoStr = $_GET["echostr"];        //随机字符串
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    /**
     * 检查是否是微信平台的数据访问
     */
    private function checkSignature() {

        $signature = $_GET ["signature"];
        $timestamp = $_GET ["timestamp"];
        $nonce = $_GET ["nonce"];

        $token = TOKEN;
        $tmpArr = array (
            $token,
            $timestamp,
            $nonce
        );
        sort ( $tmpArr );
        $tmpStr = implode ( $tmpArr );
        $tmpStr = sha1 ( $tmpStr );
        
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }   
}  