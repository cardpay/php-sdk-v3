<?php

namespace Cardpay\test\callback;

use Cardpay\model\RefundResponseRefundData;
use Cardpay\test\BaseTestCase;

class RefundCallbackTest extends BaseTestCase
{
    public function testRefundCallback()
    {
        // refund callback structure example, JSON body
        $refundCallback = '{"callback_time":"2019-07-01T11:15:19.140Z","payment_method":"BANKCARD","merchant_order":{"id":"770183:10527453:018"},"customer":{"email":"customer@gmail.com","id":"770223:1053:0"},"refund_data":{"id":"2761801","status":"COMPLETED","amount":34.43,"currency":"USD","created":"2019-07-01T09:33:21Z","note":"Note","rrn":"000071231945","auth_code":"7413455","is_3d":false},"payment_data":{"id":"2612369","remaining_amount":165.57},"card_account":{"masked_pan":"412345...1234","issuing_country_code":"US"}}';

        $secretKey = 'pzQf529Wa0AV';

        // 'Signature' header example
        $signature = '2fe7a4fb4616a1a064f74b931ca48c005aa15aee1a09927f02b4cbd843df3142d625b4247f7f1eaf16dadec0d9ef7b690024abe85012394ab63ec2cbe04d1043';

        // validate callback
        $calculatedSignature = hash('sha512', $refundCallback . $secretKey);

        if ($signature !== $calculatedSignature) {
            // header("HTTP/1.1 400 Bad Request");
            $this->fail('Incorrect signature');

        } else {
            $callbackJSON = json_decode($refundCallback, true);
            $status = $callbackJSON['refund_data']['status'];

            // change order status accordingly
            // see 'TransactionStatus' definition, in API v3 documentation: https://integration.cardpay.com/#TransactionStatus
            switch ($status) {
                case RefundResponseRefundData::STATUS_COMPLETED:
                    // ...
                    break;

                case RefundResponseRefundData::STATUS_DECLINED:
                    // ...
                    break;
            }

            // header("HTTP/1.1 200 OK");
            // echo "OK";
        }
    }
}