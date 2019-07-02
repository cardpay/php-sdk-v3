<?php

namespace Cardpay\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\recurring\scheduled\RecurringPlanUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringScheduledGetPlanInfoTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testGetPlanInfo()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanCreationResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanCreationResponse->getPlanData()->getId();

        // get plan info
        $recurringPlanResponse = $recurringPlanUtils->getRecurringsApi()->getPlan($planId);

        self::assertEquals($planId, $recurringPlanResponse->getPlanData()->getId());
    }
}