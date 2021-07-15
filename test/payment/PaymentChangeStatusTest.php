<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\model\PaymentPatchRequest;
use Cardpay\model\PaymentUpdateTransactionData;
use Cardpay\model\Request;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use DateTime;

class PaymentChangeStatusTest extends BaseTestCase
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
            Config::$gatewayPostponedTerminalCode,
            Config::$gatewayPostponedPassword,
            true
        );
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // change payment status (complete)
        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
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