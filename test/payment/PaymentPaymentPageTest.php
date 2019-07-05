<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PaymentPaymentPageTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentPage()
    {
        $paymentUtils = new PaymentUtils();
        $redirectUrl = $paymentUtils->createPaymentInPaymentPageMode(time(), Config::$paymentpageTerminalCode, Config::$paymentpagePassword);

        self::assertNotEmpty($redirectUrl);
    }
}