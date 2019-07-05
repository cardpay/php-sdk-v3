<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;

class RecurringScheduledDeletePlanTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testDeletePlan()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // delete plan
        list($array, $statusCode, $headers) = $recurringPlanUtils->getRecurringsApi()->deletePlanWithHttpInfo($planId);

        self::assertEquals(200, $statusCode);
    }
}