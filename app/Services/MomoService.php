<?php

namespace App\Services;

use App\Models\PaymentModel;
use App\Traits\MomoTrait;

class MomoService extends BaseService
{
    use MomoTrait;

    public function __construct(PaymentModel $paymentModel)
    {
        $this->model = $paymentModel;
    }

    public function createPayment($orderId, $total)
    {
        $partnerCode = MOMO_PARTNER_CODE;
        $accessKey = MOMO_ACCESS_KEY;
        $secretKey = MOMO_SECRET_KEY;
        $orderInfo = 'Thanh toán qua MoMo';
        $amount = $total;
        $orderId = $orderId."";
        $returnUrl = route(RESULT_PAYMENT_MOMO);
        $notifyUrl = MOMO_NOTIFY_URL;
        $bankCode = MOMO_BANK_CODE;
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

        return $jsonResult['payUrl'];
    }
}
