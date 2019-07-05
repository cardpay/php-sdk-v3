<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;

class RecurringScheduledGetPlansListTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testGetPlansList()
    {
        // create plans
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);

        // get plans list information
        $planDataList = $recurringPlanUtils->getRecurringsApi()->getPlans(microtime(true));

        $data = $planDataList->getData();
        $planResponse2 = $data[0];
        $planResponse1 = $data[1];

        self::assertNotEmpty($planResponse1->getId());
        self::assertNotEmpty($planResponse2->getId());
    }
}