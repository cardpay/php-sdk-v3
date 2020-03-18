<?php

namespace Cardpay\test\payment;

use Cardpay\ApiException;
use Cardpay\model\LimitInfoResponse;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\limit\LimitUtils;

class LimitGetInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testLimitGetInfo()
    {
        $limitUtils = new LimitUtils();

        /** @var LimitInfoResponse $limitsInfoResponse */
        $limitsInfoResponse = $limitUtils->getLimitsInfo(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $remainingLimits = $limitsInfoResponse->getRemainingLimits();

        self::assertTrue(is_array($remainingLimits));
        self::assertNotEmpty($remainingLimits);
    }
}