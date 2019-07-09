<?php

namespace Cardpay\test\payout;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PayoutGetListTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPayoutGetList()
    {
        $orderId = time();

        // create payouts
        $payoutUtils = new PayoutUtils();
        $payoutCreationResponse1 = $payoutUtils->createPayout($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $payoutCreationResponse2 = $payoutUtils->createPayout($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertNotEmpty($payoutCreationResponse1->getPayoutData()->getId());
        self::assertNotEmpty($payoutCreationResponse2->getPayoutData()->getId());

        // get payouts list information
        $payoutsList = $payoutUtils->getPayoutsApi()->getPayouts(microtime(true), null, null, null, $orderId);

        $data = $payoutsList->getData();
        $payoutsResponse2 = $data[0];
        $payoutsResponse1 = $data[1];

        self::assertNotEmpty($payoutsResponse1->getPayoutData()->getId());
        self::assertEquals($orderId, $payoutsResponse1->getMerchantOrder()->getId());

        self::assertNotEmpty($payoutsResponse2->getPayoutData()->getId());
        self::assertEquals($orderId, $payoutsResponse2->getMerchantOrder()->getId());
    }
}