<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringCreateScheduledSubscriptionPaymentPageTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testCreateScheduledSubscriptionInPaymentPageMode()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::PAYMENTPAGE_TERMINAL_CODE, Config::PAYMENTPAGE_PASSWORD);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create subscription
        $recurringScheduledUtils = new RecurringScheduledUtils(Config::PAYMENTPAGE_TERMINAL_CODE, Config::PAYMENTPAGE_PASSWORD);
        $redirectUrl = $recurringScheduledUtils->createScheduledSubscriptionInPaymentPageMode(time(), $planId);

        self::assertNotEmpty($redirectUrl);
    }
}