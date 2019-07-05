<?php

namespace Cardpay\test\refund;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\payment\PaymentUtils;

class RefundGetInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundGetInfo()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundCreationResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::$terminalCurrency);
        $refundId = $refundCreationResponse->getRefundData()->getId();

        // get refund info
        $refundsApi = $refundUtils->getRefundsApi();
        $refundResponse = $refundsApi->getRefund($refundId);

        self::assertEquals($refundId, $refundResponse->getRefundData()->getId());
    }
}