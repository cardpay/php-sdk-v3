<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringScheduledDeletePlanTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testDeletePlan()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // delete plan
        list($array, $statusCode, $headers) = $recurringPlanUtils->getRecurringsApi()->deletePlanWithHttpInfo($planId);

        self::assertEquals(200, $statusCode);
    }
}