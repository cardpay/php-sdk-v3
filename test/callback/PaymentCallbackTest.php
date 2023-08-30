<?php

namespace Cardpay\test\callback;

use Cardpay\model\PaymentResponsePaymentData;
use Cardpay\test\BaseTestCase;

class PaymentCallbackTest extends BaseTestCase
{
    public function testPaymentCallback()
    {
        // payment callback structure example, JSON body
        $paymentCallback = '{"callback_time":"2019-07-01T09:30:06.828Z","payment_method":"BANKCARD","merchant_order":{"id":"67897"},"customer":{"email":"customer@gmail.com","id":"3439100","ip":"1.1.1.1","locale":"en"},"payment_data":{"id":"276122317","status":"COMPLETED","amount":6.03,"currency":"USD","created":"2019-07-01T09:29:57.409901Z","note":"Note","rrn":"000012725137","auth_code":"114564","is_3d":false},"card_account":{"masked_pan":"412345...1234","issuing_country_code":"US","holder":"John Smith"}}';

        $callbackSecret = 'pzQf529Wa0AV';

        // 'Signature' header example
        $signature = '626598d3465770829f83e35910f99cf897fbb25ff0e7cb0f75934c29339cf9d9a9a6d602d99b2f3e7272301b609247b43981f90d313b646b16d802de212f671a';

        // validate callback
        $calculatedSignature = hash('sha512', $paymentCallback . $callbackSecret);

        if ($signature !== $calculatedSignature) {
            // header("HTTP/1.1 400 Bad Request");
            $this->fail('Incorrect signature');

        } else {
            $callbackJSON = json_decode($paymentCallback, true);
            $status = $callbackJSON['payment_data']['status'];

            // change order status accordingly
            // see 'TransactionStatus' definition, in API v3 documentation: https://integration.unlimit.com/#TransactionStatus
            switch ($status) {
                case PaymentResponsePaymentData::STATUS_COMPLETED:
                    // ...
                    break;

                case PaymentResponsePaymentData::STATUS_DECLINED:
                    // ...
                    break;
            }

            // header("HTTP/1.1 200 OK");
            // echo "OK";
        }
    }
}
