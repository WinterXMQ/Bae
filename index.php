<?php
/*
    WinterXMQ <WinterXMQ@gmail.com>
    Version 1.0.0.1
*/
define("TOKEN", "WinterXMQ");

class WMChartCallBackAPI {
    /**
     *  微信平台回调，监测双方合理权限
     */
    public function valid() {
        $echoStr = $_GET["echostr"];    // 监测通过后用于返回, 便于微信平台判断
        echo $echoStr;
        exit;
    }

    public function CheckSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}

?>