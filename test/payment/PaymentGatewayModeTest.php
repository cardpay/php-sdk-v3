<?php

namespace Cardpay\payment;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class PaymentGatewayModeTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testGateway()
    {
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time());

        self::assertNotEmpty($paymentResponse->getPaymentData()->getId());
    }
}