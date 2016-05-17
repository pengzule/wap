<?php

namespace App\Tool\SMS;

use App\Models\M3Result;

class SendTemplateSMS
{
    //主帐号
    private $accountSid='8a48b5515493a1b70154a2d5233111d2';

    //主帐号Token
    private $accountToken='38fc611452b2477b84aad5512c91f718';

    //应用Id
    //private $appId='aaf98f8954939ed50154a39d8f521549';
    private $appId='8a48b5515493a1b70154a2d5671511d9';

    //请求地址，格式如下，不需要写https://
    // (开发) Rest URL：https://sandboxapp.cloopen.com:8883
    // (生产) Rest URL：https://app.cloopen.com:8883
    private $serverIP='sandboxapp.cloopen.com';

    //请求端口
    private $serverPort='8883';

    //REST版本号
    private $softVersion='2013-12-26';

    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id
     */
    public function sendTemplateSMS($to,$datas,$tempId)
    {
        $m3_result = new M3Result;

        // 初始化REST SDK
        $rest = new CCPRestSDK($this->serverIP,$this->serverPort,$this->softVersion);
        $rest->setAccount($this->accountSid,$this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
        //  echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            $m3_result->status = 3;
            $m3_result->message = 'result error!';
        }
        if($result->statusCode != 0) {
            $m3_result->status = $result->statusCode;
            $m3_result->message = $result->statusMsg;
        }else{
            $m3_result->status = 0;
            $m3_result->message = '发送成功';
        }

        return $m3_result;
    }
}

//sendTemplateSMS("18576437523", array(1234, 5), 1);
