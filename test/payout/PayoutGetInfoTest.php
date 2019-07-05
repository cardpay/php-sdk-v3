<?php

namespace Cardpay\test\payout;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PayoutGetInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPayoutGetInfo()
    {
        // create payout
        $payoutUtils = new PayoutUtils();
        $payoutCreationResponse = $payoutUtils->createPayout(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $payoutId = $payoutCreationResponse->getPayoutData()->getId();

        // get payout info
        $payoutsApi = $payoutUtils->getPayoutsApi();
        $payoutResponse = $payoutsApi->getPayout($payoutId);

        self::assertEquals($payoutId, $payoutResponse->getPayoutData()->getId());
    }
}