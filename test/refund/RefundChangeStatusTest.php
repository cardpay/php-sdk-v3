<?php

namespace Cardpay\refund;

use Cardpay\ApiException;
use Cardpay\model\RefundUpdateRequest;
use Cardpay\model\Request;
use Cardpay\model\RequestUpdatedTransactionData;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\payment\PaymentUtils;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class RefundChangeStatusTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRefundChangeStatus()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(time(), Config::GATEWAY_TERMINAL_CODE_POSTPONED, $password = Config::GATEWAY_PASSWORD_POSTPONED);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundUtils = new RefundUtils();
        $refundCreationResponse = $refundUtils->createRefund($paymentId, $paymentUtils, Config::TERMINAL_CURRENCY);
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