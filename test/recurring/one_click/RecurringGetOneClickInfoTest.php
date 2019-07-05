<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringGetOneClickInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testGetOneClickPaymentInfo()
    {
        // create one-click recurring
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringResponse = $recurringOneClickUtils->createRecurringInGatewayMode(time(), Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $recurringId = $recurringResponse->getRecurringData()->getId();

        // get recurring info
        $recurringResponse = $recurringOneClickUtils->getRecurringsApi()->getRecurring($recurringId);

        self::assertEquals($recurringId, $recurringResponse->getRecurringData()->getId());
    }
}