<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\model\UpdatedSubscriptionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringCancelScheduledSubscriptionTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testCancelScheduledSubscription()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription
        $recurringScheduledUtils = new RecurringScheduledUtils(Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
        $recurringResponse = $recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(time(), $planId);

        // cancel subscription
        $subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();
        $subscriptionUpdateResponse = $recurringScheduledUtils->changeSubscriptionStatus($subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_CANCELLED);

        self::assertNotNull($subscriptionUpdateResponse);
        self::assertNotNull($subscriptionUpdateResponse->getSubscriptionData());
        self::assertTrue($subscriptionUpdateResponse->getSubscriptionData()->getIsExecuted());
        self::assertEquals(UpdatedSubscriptionData::STATUS_CANCELLED, $subscriptionUpdateResponse->getSubscriptionData()->getStatus());
        self::assertEquals($subscriptionId, $subscriptionUpdateResponse->getSubscriptionData()->getId());
    }
}