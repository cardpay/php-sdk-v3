<?php

namespace Cardpay\recurring\scheduled\hold_resume;

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\recurring\scheduled\RecurringScheduledTestCase;
use Cardpay\test\Config;

class RecurringScheduledResumeTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        parent::__construct(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
    }

    /**
     * @throws ApiException
     */
    public function testRecurringResume()
    {
        // create new plan
        $recurringPlanResponse = $this->recurringPlanUtils->createPlan($this->terminalCode, $this->password);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription
        $recurringResponse = $this->recurringScheduledUtils->createScheduledSubscriptionInGatewayMode(time(), $planId);
        $this->subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();

        // change subscription status to inactive
        $this->recurringScheduledUtils->changeSubscriptionStatus($this->subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_INACTIVE);

        // change subscription status to active (resume)
        $this->recurringScheduledUtils->changeSubscriptionStatus($this->subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_ACTIVE);
    }
}