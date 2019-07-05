<?php

namespace Cardpay\test\payout;

use Cardpay\ApiException;
use Cardpay\model\PayoutResponsePayoutData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class PayoutCreateTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPayout()
    {
        $payoutUtils = new PayoutUtils();
        $payoutResponse = $payoutUtils->createPayout(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertEquals(PayoutResponsePayoutData::STATUS_COMPLETED, $payoutResponse->getPayoutData()->getStatus());
    }
}