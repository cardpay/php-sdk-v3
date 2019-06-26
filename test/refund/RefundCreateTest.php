<?php

namespace Cardpay\refund;

use Cardpay\ApiException;
use Cardpay\model\RefundResponseRefundData;
use Cardpay\payment\PaymentUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RefundCreateTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRefund()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time());
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::TERMINAL_CURRENCY);

        self::assertEquals(RefundResponseRefundData::STATUS_COMPLETED, $refundResponse->getRefundData()->getStatus());
    }
}