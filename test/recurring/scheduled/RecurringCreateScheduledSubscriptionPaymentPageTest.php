<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringCreateScheduledSubscriptionPaymentPageTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testCreateScheduledSubscriptionInPaymentPageMode()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$paymentpageTerminalCode, Config::$paymentpagePassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create subscription
        $recurringScheduledUtils = new RecurringScheduledUtils(Config::$paymentpageTerminalCode, Config::$paymentpagePassword);
        $redirectUrl = $recurringScheduledUtils->createScheduledSubscriptionInPaymentPageMode(time(), $planId);

        self::assertNotEmpty($redirectUrl);
    }
}