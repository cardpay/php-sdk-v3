<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;

class RecurringScheduledCreateNewPlanTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testCreateNewPlan()
    {
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertNotEmpty($recurringPlanResponse->getPlanData());
    }
}