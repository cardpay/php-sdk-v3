<?php

namespace Cardpay\test\callback;

use Cardpay\model\PaymentResponsePaymentData;
use Cardpay\test\BaseTestCase;

class AvsCallbackTest extends BaseTestCase
{
    public function testAvsCallback()
    {
        // AVS callback structure example, JSON body
        $avsCallback = '{"callback_time":"2019-07-01T09:30:06.828Z","payment_method":"BANKCARD","merchant_order":{"id":"67897"},"payment_data":{"status":"COMPLETED","currency":"USD","created":"2019-07-01T09:29:57.409901Z"},"card_account":{"masked_pan":"412345...1234","issuing_country_code":"US","holder":"John Smith"},"customer":{"email":"customer@gmail.com","locale":"en"}}';

        $callbackSecret = '0UT41J9avFch';

        // 'Signature' header example
        $signature = 'e6888f42c4f6fbc1051ff4b9dbbfbb8760589bba0ca188effbf94ba17f2c6ed84cc2f809932291dd3c04ba3c256fa03d737b9510199b8efa8f794891355bb9e3';

        // validate callback
        $calculatedSignature = hash('sha512', $avsCallback . $callbackSecret);

        if ($signature !== $calculatedSignature) {
            // header("HTTP/1.1 400 Bad Request");
            $this->fail('Incorrect signature');

        } else {
            $callbackJSON = json_decode($avsCallback, true);
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
