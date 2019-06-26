<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\recurring\RecurringScheduledUtils;
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
        $recurringScheduledUtils = new RecurringScheduledUtils();
        $redirectUrl = $recurringScheduledUtils->createScheduledSubscriptionInPaymentPageMode(
            time(),
            Config::PAYMENTPAGE_TERMINAL_CODE,
            Config::PAYMENTPAGE_PASSWORD,
            $planId
        );

        self::assertNotEmpty($redirectUrl);
    }
}