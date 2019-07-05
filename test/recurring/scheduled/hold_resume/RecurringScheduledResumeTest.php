<?php

namespace Cardpay\test\recurring\scheduled\hold_resume;

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringScheduledTestCase;

class RecurringScheduledResumeTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        parent::__construct(Config::$gatewayTerminalCode, Config::$gatewayPassword);
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