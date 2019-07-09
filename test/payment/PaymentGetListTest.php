<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PaymentGetListTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentGetList()
    {
        $orderId = time();

        // create payments
        $paymentUtils = new PaymentUtils();
        $paymentCreationResponse1 = $paymentUtils->createPaymentInGatewayMode($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $paymentCreationResponse2 = $paymentUtils->createPaymentInGatewayMode($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertNotEmpty($paymentCreationResponse1->getPaymentData()->getId());
        self::assertNotEmpty($paymentCreationResponse2->getPaymentData()->getId());

        // get payments list information
        $paymentsList = $paymentUtils->getPaymentsApi()->getPayments(microtime(true), null, null, null, $orderId);

        $data = $paymentsList->getData();
        $paymentsResponse2 = $data[0];
        $paymentsResponse1 = $data[1];

        self::assertNotEmpty($paymentsResponse1->getPaymentData()->getId());
        self::assertEquals($orderId, $paymentsResponse1->getMerchantOrder()->getId());

        self::assertNotEmpty($paymentsResponse2->getPaymentData()->getId());
        self::assertEquals($orderId, $paymentsResponse2->getMerchantOrder()->getId());
    }
}