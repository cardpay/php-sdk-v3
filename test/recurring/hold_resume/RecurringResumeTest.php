<?php

namespace Cardpay\recurring\hold_resume;

use Cardpay\ApiException;
use Cardpay\model\Request;
use Cardpay\model\SubscriptionUpdateRequest;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\recurring\RecurringScheduledUtils;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class RecurringResumeTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRecurringResume()
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
        $subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();

        // change subscription status to inactive
        $this->changeSubscriptionStatus($subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_INACTIVE, $recurringPlanUtils);

        // change subscription status to active
        $this->changeSubscriptionStatus($subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_ACTIVE, $recurringPlanUtils);
    }

    /**
     * @param string $subscriptionId
     * @param string $statusTo
     * @param RecurringPlanUtils $recurringPlanUtils
     * @throws ApiException
     */
    private function changeSubscriptionStatus($subscriptionId, $statusTo, $recurringPlanUtils)
    {
        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $subscriptionData = new SubscriptionUpdateRequestSubscriptionData([
            'status_to' => $statusTo
        ]);

        $subscriptionUpdateRequest = new SubscriptionUpdateRequest([
            'request' => $request,
            'operation' => SubscriptionUpdateRequest::OPERATION_CHANGE_STATUS,
            'subscription_data' => $subscriptionData
        ]);

        $subscriptionUpdateResponse = $recurringPlanUtils->getRecurringsApi()->updateSubscription($subscriptionId, $subscriptionUpdateRequest);

        self::assertEquals($subscriptionId, $subscriptionUpdateResponse->getSubscriptionData()->getId());
        self::assertEquals($statusTo, $subscriptionUpdateResponse->getSubscriptionData()->getStatus());
    }
}