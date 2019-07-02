<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\test\Config;
use DateTime;
use PHPUnit\Framework\TestCase;

class RecurringGracePeriodScheduledTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testScheduledSubscriptionWithGracePeriod()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::PAYMENTPAGE_TERMINAL_CODE, Config::PAYMENTPAGE_PASSWORD);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription with grace period (one month)
        $subscriptionStartDateTime = new DateTime('+1 month');
        $subscriptionStart = $subscriptionStartDateTime->format("Y-m-d\TH:i:s\Z");

        $recurringScheduledUtils = new RecurringScheduledUtils(Config::PAYMENTPAGE_TERMINAL_CODE, Config::PAYMENTPAGE_PASSWORD);
        $redirectUrl = $recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(time(), $planId, $subscriptionStart);

        self::assertNotEmpty($redirectUrl);
    }
}