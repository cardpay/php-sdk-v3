<?php

namespace Cardpay\test\callback;

use Cardpay\model\PayoutResponsePayoutData;
use Cardpay\test\BaseTestCase;

class PayoutCallbackTest extends BaseTestCase
{
    public function testPayoutCallback()
    {
        // payout callback structure example, JSON body
        $payoutCallback = '{"callback_time":"2019-07-01T11:15:22.389Z","payment_method":"BANKCARD","merchant_order":{"id":"1198009"},"payout_data":{"id":"12328919","status":"COMPLETED","amount":13.08,"currency":"USD","created":"2019-07-01T10:14:28Z","rrn":"918211678906"},"card_account":{"masked_pan":"412345...1234","issuing_country_code":"US"}}';

        $secretKey = 'pzQf529Wa0AV';

        // 'Signature' header example
        $signature = '6767ec6e2f1b5dd2a4a1f8ca0aac1ecd37afe437ffdd1e621382b257da0d98218778a66a6b328d69028581bc6e3d1f5967a16bbadd1239e020cf069e66cf7f89';

        // validate callback
        $calculatedSignature = hash('sha512', $payoutCallback . $secretKey);

        if ($signature !== $calculatedSignature) {
            // header("HTTP/1.1 400 Bad Request");
            $this->fail('Incorrect signature');

        } else {
            $callbackJSON = json_decode($payoutCallback, true);
            $status = $callbackJSON['payout_data']['status'];

            // change order status accordingly
            // see 'TransactionStatus' definition, in API v3 documentation: https://integration.cardpay.com/#TransactionStatus
            switch ($status) {
                case PayoutResponsePayoutData::STATUS_COMPLETED:
                    // ...
                    break;

                case PayoutResponsePayoutData::STATUS_DECLINED:
                    // ...
                    break;
            }

            // header("HTTP/1.1 200 OK");
            // echo "OK";
        }
    }
}