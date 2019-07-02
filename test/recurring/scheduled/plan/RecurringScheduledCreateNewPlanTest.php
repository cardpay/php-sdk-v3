<?php

namespace Cardpay\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\recurring\scheduled\RecurringPlanUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringScheduledCreateNewPlanTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testCreateNewPlan()
    {
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);

        self::assertNotEmpty($recurringPlanResponse->getPlanData());
    }
}