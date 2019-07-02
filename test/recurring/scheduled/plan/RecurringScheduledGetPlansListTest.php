<?php

namespace Cardpay\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\recurring\scheduled\RecurringPlanUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringScheduledGetPlansListTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testGetPlansList()
    {
        // create plans
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);

        // get plans list information
        $planDataList = $recurringPlanUtils->getRecurringsApi()->getPlans(microtime(true));

        $data = $planDataList->getData();
        $planResponse2 = $data[0];
        $planResponse1 = $data[1];

        self::assertNotEmpty($planResponse1->getId());
        self::assertNotEmpty($planResponse2->getId());
    }
}