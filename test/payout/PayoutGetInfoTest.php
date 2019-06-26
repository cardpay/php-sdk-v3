<?php

namespace Cardpay\payout;

use Cardpay\ApiException;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class PayoutGetInfoTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPayoutGetInfo()
    {
        // create payout
        $payoutUtils = new PayoutUtils();
        $payoutCreationResponse = $payoutUtils->createPayout(time(), Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $payoutId = $payoutCreationResponse->getPayoutData()->getId();

        // get payout info
        $payoutsApi = $payoutUtils->getPayoutsApi();
        $payoutResponse = $payoutsApi->getPayout($payoutId);

        self::assertEquals($payoutId, $payoutResponse->getPayoutData()->getId());
    }
}