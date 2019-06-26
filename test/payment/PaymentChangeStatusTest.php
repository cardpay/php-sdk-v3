<?php

namespace Cardpay\payment;

use Cardpay\ApiException;
use Cardpay\model\PaymentPatchRequest;
use Cardpay\model\PaymentUpdateTransactionData;
use Cardpay\model\Request;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class PaymentChangeStatusTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentChangeStatus()
    {
        // create payment
        $paymentUtils = new PaymentUtils();
        $paymentResponse = $paymentUtils->createPaymentInGatewayMode(
            time(),
            Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY,
            Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY,
            true
        );
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // change payment status (complete)
        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $paymentUpdateTransactionData = new PaymentUpdateTransactionData([
            'status_to' => PaymentUpdateTransactionData::STATUS_TO_COMPLETE
        ]);

        $paymentPatchRequest = new PaymentPatchRequest([
            'request' => $request,
            'operation' => PaymentPatchRequest::OPERATION_CHANGE_STATUS,
            'payment_data' => $paymentUpdateTransactionData
        ]);

        $paymentUpdateResponse = $paymentUtils->getPaymentsApi()->updatePayment($paymentId, $paymentPatchRequest);

        self::assertTrue($paymentUpdateResponse->getPaymentData()->getIsExecuted());
        self::assertEquals(ResponseUpdatedTransactionData::STATUS_COMPLETED, $paymentUpdateResponse->getPaymentData()->getStatus());
    }
}