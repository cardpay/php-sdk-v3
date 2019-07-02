<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\model\UpdatedSubscriptionData;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class RecurringCancelScheduledSubscriptionTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testCancelScheduledSubscription()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription
        $recurringScheduledUtils = new RecurringScheduledUtils(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
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