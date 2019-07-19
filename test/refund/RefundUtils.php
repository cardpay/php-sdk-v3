<?php

namespace Cardpay\test\refund;

use Cardpay\api\RefundsApi;
use Cardpay\ApiException;
use Cardpay\model\RefundRequest;
use Cardpay\model\RefundRequestPaymentData;
use Cardpay\model\RefundRequestRefundData;
use Cardpay\model\RefundResponse;
use Cardpay\model\Request;
use Cardpay\test\payment\PaymentUtils;
use DateTime;

class RefundUtils
{
    /**
     * @var RefundsApi
     */
    private $refundsApi;

    /**
     * @param string $paymentId
     * @param PaymentUtils $paymentUtils
     * @param int $refundAmount
     * @param string $refundCurrency
     * @return RefundResponse
     * @throws ApiException
     */
    public function createRefund($paymentId, $paymentUtils, $refundCurrency, $refundAmount = 0)
    {
        $requestRefund = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $refundPaymentData = new RefundRequestPaymentData([
            'id' => $paymentId
        ]);

        $refundRequestData = [
            'request' => $requestRefund,
            'payment_data' => $refundPaymentData
        ];

        if ($refundAmount > 0) {
            $refundData = new RefundRequestRefundData([
                'amount' => $refundAmount,
                'currency' => $refundCurrency
            ]);

            $refundRequestData['refund_data'] = $refundData;
        }

        $refundRequest = new RefundRequest($refundRequestData);

        $this->refundsApi = new RefundsApi($paymentUtils->getClient(), $paymentUtils->getConfig(), $paymentUtils->getHeaderSelector());
        $refundResponse = $this->refundsApi->createRefund($refundRequest);

        return $refundResponse;
    }

    /**
     * @return RefundsApi
     */
    public function getRefundsApi()
    {
        return $this->refundsApi;
    }
}