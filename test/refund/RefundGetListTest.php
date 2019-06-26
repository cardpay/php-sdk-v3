<?php

namespace Cardpay\refund;

use Cardpay\ApiException;
use Cardpay\payment\PaymentUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RefundGetListTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundGetList()
    {
        $orderId = time();

        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode($orderId);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create two partial refunds
        $refundUtils = new RefundUtils();
        $refundCreationResponse1 = $refundUtils->createRefund($paymentId, $paymentUtils, Config::TERMINAL_CURRENCY, 1);
        $refundCreationResponse2 = $refundUtils->createRefund($paymentId, $paymentUtils, Config::TERMINAL_CURRENCY, 2);

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