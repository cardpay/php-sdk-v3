<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\recurring\RecurringScheduledUtils;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringCreateScheduledSubscriptionGatewayTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testCreateScheduledSubscriptionInGatewayMode()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription
        $recurringScheduledUtils = new RecurringScheduledUtils();
        $recurringResponse = $recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(
            time(),
            Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY,
            Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY,
            $planId
        );

        self::assertNotEmpty($recurringResponse->getRecurringData()->getSubscription()->getId());
    }
}