<?php

namespace Cardpay\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\model\RecurringResponseRecurringData;
use Cardpay\recurring\RecurringOneClickUtils;
use PHPUnit\Framework\TestCase;

class RecurringGatewayModeOneClickTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRecurringGatewayModeOneClick()
    {
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringResponse = $recurringOneClickUtils->createRecurringInGatewayMode(time());

        self::assertEquals(RecurringResponseRecurringData::STATUS_COMPLETED, $recurringResponse->getRecurringData()->getStatus());
    }
}