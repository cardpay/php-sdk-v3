<?php

namespace Cardpay\payment;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class PaymentGetInfoTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentGetInfo()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time());
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // get payment info
        $paymentResponse = $paymentUtils->getPaymentsApi()->getPayment($paymentId);

        self::assertEquals($paymentId, $paymentResponse->getPaymentData()->getId());
    }
}