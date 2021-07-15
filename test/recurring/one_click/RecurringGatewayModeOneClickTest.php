<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\model\RecurringResponseRecurringData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringGatewayModeOneClickTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRecurringGatewayModeOneClick()
    {
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringResponse = $recurringOneClickUtils->createRecurringInGatewayMode(time(), Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);

        self::assertEquals(RecurringResponseRecurringData::STATUS_COMPLETED, $recurringResponse->getRecurringData()->getStatus());
    }
}