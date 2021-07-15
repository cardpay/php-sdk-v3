<?php

namespace Cardpay\test\refund;

use Cardpay\ApiException;
use Cardpay\model\RefundResponseRefundData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\payment\PaymentUtils;

class RefundCreateTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRefund()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::$terminalCurrency);

        self::assertEquals(RefundResponseRefundData::STATUS_AUTHORIZED, $refundResponse->getRefundData()->getStatus());
    }
}