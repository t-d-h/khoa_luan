<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\MomoTrait;

class MomoController extends Controller
{
    use MomoTrait;

    public function atm(Request $request)
    {
        $dataRequest = $request->all();

        $partnerCode = $dataRequest['partnerCode'];
        $accessKey = $dataRequest['accessKey'];
        $secretKey = $dataRequest['secretKey'];
        $orderInfo = $dataRequest['orderInfo'];
        $amount = $dataRequest['amount'];
        $orderId = $dataRequest['orderId'] ?? time();
        $returnUrl = $dataRequest['returnUrl'];
        $notifyUrl = $dataRequest['notifyUrl'];
        $bankCode = $dataRequest['bankCode'];
        $requestType = "payWithMoMoATM";
        $requestId = time()."";
        $extraData = "";
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyUrl."&extraData=".$extraData."&requestType=".$requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array('partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);

        //send api to momo
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result,true);

        return redirect($jsonResult['payUrl']);
    }
}
