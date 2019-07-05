<?php

namespace Cardpay\test\refund;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\payment\PaymentUtils;

class RefundGetListTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundGetList()
    {
        $orderId = time();

        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create two partial refunds
        $refundUtils = new RefundUtils();
        $refundCreationResponse1 = $refundUtils->createRefund($paymentId, $paymentUtils, Config::$terminalCurrency, 1);
        $refundCreationResponse2 = $refundUtils->createRefund($paymentId, $paymentUtils, Config::$terminalCurrency, 2);

        // get refunds list info
        $refundsApi = $refundUtils->getRefundsApi();
        $refundsList = $refundsApi->getRefunds(microtime(true), null, null, null, $orderId);

        $data = $refundsList->getData();
        $refundsResponse2 = $data[0];
        $refundsResponse1 = $data[1];

        self::assertEquals($refundCreationResponse1->getPaymentData()->getId(), $refundsResponse1->getPaymentData()->getId());
        self::assertEquals($refundCreationResponse2->getPaymentData()->getId(), $refundsResponse2->getPaymentData()->getId());
    }
}