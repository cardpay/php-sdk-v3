<?php

namespace Cardpay\test\refund;

use Cardpay\ApiException;
use Cardpay\model\RefundUpdateRequest;
use Cardpay\model\Request;
use Cardpay\model\RequestUpdatedTransactionData;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use Cardpay\test\payment\PaymentUtils;

class RefundChangeStatusTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundChangeStatus()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::$gatewayPostponedTerminalCode, $password = Config::$gatewayPostponedPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundCreationResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::$terminalCurrency);
        $refundId = $refundCreationResponse->getRefundData()->getId();

        // change refund status (reverse)
        $changeStatusRequest = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $refundData = new RequestUpdatedTransactionData([
            'status_to' => 'REVERSE'
        ]);

        $refundUpdateRequest = new RefundUpdateRequest([
            'request' => $changeStatusRequest,
            'refund_data' => $refundData
        ]);

        $refundUpdateResponse = $refundUtils->getRefundsApi()->updateRefund($refundId, $refundUpdateRequest);

        self::assertTrue($refundUpdateResponse->getRefundData()->getIsExecuted());
        self::assertEquals(ResponseUpdatedTransactionData::STATUS_VOIDED, $refundUpdateResponse->getRefundData()->getStatus());
    }
}