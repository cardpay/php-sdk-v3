<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PaymentGetInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentGetInfo()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // get payment info
        $paymentResponse = $paymentUtils->getPaymentsApi()->getPayment($paymentId);

        self::assertEquals($paymentId, $paymentResponse->getPaymentData()->getId());
    }
}