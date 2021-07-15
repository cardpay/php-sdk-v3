<?php

namespace Cardpay\test\refund;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\payment\PaymentUtils;

class RefundGetListTest extends BaseTestCase
{
    private $paymentUtils;
    private $refundUtils;

    public function __construct()
    {
        parent::__construct();

        $this->paymentUtils = new PaymentUtils();
        $this->refundUtils = new RefundUtils();
    }

    /**
     * @throws ApiException
     */
    public function testRefundGetList()
    {
        // create two refunds
        $orderId = time();
        $this->createRefund($orderId);
        $this->createRefund($orderId);

        // get refunds list info
        $refundsApi = $this->refundUtils->getRefundsApi();
        $refundsList = $refundsApi->getRefunds(microtime(true), null, null, null, $orderId);

        $data = $refundsList->getData();
        $refundsResponse1 = $data[0];
        $refundsResponse2 = $data[1];

        self::assertNotEmpty($refundsResponse1->getPaymentData()->getId());
        self::assertEquals($orderId, $refundsResponse1->getMerchantOrder()->getId());

        self::assertNotEmpty($refundsResponse2->getPaymentData()->getId());
        self::assertEquals($orderId, $refundsResponse2->getMerchantOrder()->getId());
    }

    /**
     * @param $orderId
     * @throws ApiException
     */
    private function createRefund($orderId)
    {
        // create payment
        $paymentResponse = $this->paymentUtils->createPaymentInGatewayMode($orderId, Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
        $paymentId = $paymentResponse->getPaymentData()->getId();

        // create refund
        $refundCreationResponse1 = $this->refundUtils->createRefund($paymentId, $this->paymentUtils, Config::$terminalCurrency, 1);
        self::assertNotEmpty($refundCreationResponse1->getRefundData()->getId());
    }
}