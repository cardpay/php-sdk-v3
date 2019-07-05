<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PaymentGatewayModeTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testGateway()
    {
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertNotEmpty($paymentResponse->getPaymentData()->getId());
    }
}