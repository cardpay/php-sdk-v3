<?php

namespace Cardpay\recurring\one_click;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class RecurringGetOneClickInfoTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testGetOneClickPaymentInfo()
    {
        // create one-click recurring
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringResponse = $recurringOneClickUtils->createRecurringInGatewayMode(time());
        $recurringId = $recurringResponse->getRecurringData()->getId();

        // get recurring info
        $recurringResponse = $recurringOneClickUtils->getRecurringsApi()->getRecurring($recurringId);

        self::assertEquals($recurringId, $recurringResponse->getRecurringData()->getId());
    }
}