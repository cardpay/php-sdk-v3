<?php

namespace Cardpay\payout;

use Cardpay\ApiException;
use Cardpay\model\PayoutResponsePayoutData;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class PayoutCreateTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPayout()
    {
        $payoutUtils = new PayoutUtils();
        $payoutResponse = $payoutUtils->createPayout(time(), Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);

        self::assertEquals(PayoutResponsePayoutData::STATUS_COMPLETED, $payoutResponse->getPayoutData()->getStatus());
    }
}