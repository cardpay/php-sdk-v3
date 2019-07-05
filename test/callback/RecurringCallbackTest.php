<?php

namespace Cardpay\test\callback;

use Cardpay\model\RecurringResponseRecurringData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringCallbackTest extends BaseTestCase
{
    public function testRecurringCallback()
    {
        // recurring callback structure example, JSON body
        $recurringCallback = '{"callback_time":"2019-07-01T11:03:21.922Z","payment_method":"BANKCARD","merchant_order":{"id":"order-377077-151221399-93345"},"customer":{"email":"customer@gmail.com","id":"3123077","ip":"1.1.1.1","locale":"en"},"recurring_data":{"id":"2763432565","status":"COMPLETED","amount":30.00,"currency":"USD","created":"2019-07-01T11:03:20.655226Z","rrn":"000070123456","auth_code":"324567","filing":{"id":"88B4616312345678E0539664A8C0D12B5"},"is_3d":false},"card_account":{"masked_pan":"412345...1234","issuing_country_code":"US","holder":"John Smith"}}';

        // 'Signature' header example
        $signature = 'b9b351d70584b217d9d5f0b9039e0fc410cd6caf5f85c77afb4c27131620e2c78b8b59d27efdfd4fde7049561ad4182c251844a62a921052d9e817b7e7df10b0';

        $secretKey = Config::$gatewayPassword;

        // validate callback
        $calculatedSignature = hash('sha512', $recurringCallback . $secretKey);

        if ($signature !== $calculatedSignature) {
            // header("HTTP/1.1 400 Bad Request");
            $this->fail('Incorrect signature');

        } else {
            $callbackJSON = json_decode($recurringCallback, true);
            $status = $callbackJSON['recurring_data']['status'];

            // change order status accordingly
            // see 'TransactionStatus' definition, in API v3 documentation: https://integration.cardpay.com/v3/#definitions
            switch ($status) {
                case RecurringResponseRecurringData::STATUS_COMPLETED:
                    // ...
                    break;

                case RecurringResponseRecurringData::STATUS_DECLINED:
                    // ...
                    break;
            }

            // header("HTTP/1.1 200 OK");
            // echo "OK";
        }
    }
}