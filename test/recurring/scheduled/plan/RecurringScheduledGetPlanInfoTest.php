<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;

class RecurringScheduledGetPlanInfoTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testGetPlanInfo()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanCreationResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $planId = $recurringPlanCreationResponse->getPlanData()->getId();

        // get plan info
        $recurringPlanResponse = $recurringPlanUtils->getRecurringsApi()->getPlan($planId);

        self::assertEquals($planId, $recurringPlanResponse->getPlanData()->getId());
    }
}