<?php

namespace App\Tool\SMS;

use App\Models\AppResult;

class SendTemplateSMS
{
    //主帐号
    private $accountSid='aaf98f8954939ed50154ae5ae4bd213a';

    //主帐号Token
    private $accountToken='9a417bde3e6d4d7dabea6dadcd1f844e';

    //应用Id
    //private $appId='aaf98f8954939ed50154a39d8f521549';
    private $appId='8a48b5515493a1b70154ae78f5071f76';

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
        $app_result = new AppResult;

        // 初始化REST SDK
        $rest = new CCPRestSDK($this->serverIP,$this->serverPort,$this->softVersion);
        $rest->setAccount($this->accountSid,$this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
        //  echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            $app_result->status = 3;
            $app_result->message = 'result error!';
        }
        if($result->statusCode != 0) {
            $app_result->status = $result->statusCode;
            $app_result->message = $result->statusMsg;
        }else{
            $app_result->status = 0;
            $app_result->message = '发送成功';
        }

        return $app_result;
    }
}

//sendTemplateSMS("18576437523", array(1234, 5), 1);
