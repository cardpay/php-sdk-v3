<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class AvsTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testAvsRequest()
    {
        $paymentUtils = new PaymentUtils();
        $redirectUrl = $paymentUtils->createAvsRequest(time(), Config::$avsPaymentpageTerminalCode, Config::$avsPaymentpagePassword);

        self::assertNotEmpty($redirectUrl);
    }
}