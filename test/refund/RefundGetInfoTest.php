<?php

namespace Cardpay\refund;

use Cardpay\ApiException;
use Cardpay\payment\PaymentUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RefundGetInfoTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundGetInfo()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time());
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundCreationResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::TERMINAL_CURRENCY);
        $refundId = $refundCreationResponse->getRefundData()->getId();

        // get refund info
        $refundsApi = $refundUtils->getRefundsApi();
        $refundResponse = $refundsApi->getRefund($refundId);

        self::assertEquals($refundId, $refundResponse->getRefundData()->getId());
    }
}