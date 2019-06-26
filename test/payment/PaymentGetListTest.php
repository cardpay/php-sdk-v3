<?php

namespace Cardpay\payment;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class PaymentGetListTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentGetList()
    {
        $orderId = time();

        // create payments
        $paymentUtils = new PaymentUtils();
        $paymentCreationResponse1 = $paymentUtils->createPaymentInGatewayMode($orderId);
        $paymentCreationResponse2 = $paymentUtils->createPaymentInGatewayMode($orderId);

        // get payments list information
        $paymentsList = $paymentUtils->getPaymentsApi()->getPayments(microtime(true), null, null, null, $orderId);

        $data = $paymentsList->getData();
        $paymentsResponse2 = $data[0];
        $paymentsResponse1 = $data[1];

        self::assertEquals($paymentCreationResponse1->getPaymentData()->getId(), $paymentsResponse1->getPaymentData()->getId());
        self::assertEquals($paymentCreationResponse2->getPaymentData()->getId(), $paymentsResponse2->getPaymentData()->getId());
    }
}