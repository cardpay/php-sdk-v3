<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\Constants;

class RecurringCombinedSubscriptionAmountScheduledTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testScheduledSubscriptionCombinedSubscriptionAmount()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription with combined subscription amount
        $initialAmount = rand(1, Constants::MIN_PAYMENT_AMOUNT - 1);

        $recurringScheduledUtils = new RecurringScheduledUtils(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $redirectUrl = $recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(time(), $planId, null, $initialAmount);

        self::assertNotEmpty($redirectUrl);
    }
}