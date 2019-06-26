<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\model\Request;
use Cardpay\model\SubscriptionUpdateRequest;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\model\UpdatedSubscriptionData;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\recurring\RecurringScheduledUtils;
use Cardpay\test\Config;
use Constants;
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
        $recurringScheduledUtils = new RecurringScheduledUtils();
        $recurringResponse = $recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(
            time(),
            Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY,
            Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY,
            $planId
        );

        // cancel subscription
        $subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();

        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $subscriptionData = new SubscriptionUpdateRequestSubscriptionData([
            'status_to' => SubscriptionUpdateRequestSubscriptionData::STATUS_TO_CANCELLED
        ]);

        $subscriptionUpdateRequest = new SubscriptionUpdateRequest([
            'request' => $request,
            'operation' => SubscriptionUpdateRequest::OPERATION_CHANGE_STATUS,
            'subscription_data' => $subscriptionData
        ]);

        $subscriptionUpdateResponse = $recurringPlanUtils->getRecurringsApi()->updateSubscription($subscriptionId, $subscriptionUpdateRequest);

        self::assertNotNull($subscriptionUpdateResponse);
        self::assertEquals(UpdatedSubscriptionData::STATUS_CANCELLED, $subscriptionUpdateResponse->getSubscriptionData()->getStatus());
    }
}