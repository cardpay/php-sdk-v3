<?php

namespace Cardpay\test\recurring\scheduled\hold_resume;

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringScheduledTestCase;

class RecurringScheduledHoldTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        Config::init();
        parent::__construct(Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
    }

    /**
     * @throws ApiException
     */
    public function testRecurringHold()
    {
        // create new plan
        $recurringPlanResponse = $this->recurringPlanUtils->createPlan($this->terminalCode, $this->password);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        // create scheduled subscription
        $recurringResponse = $this->recurringScheduledUtils
            ->createScheduledSubscriptionInGatewayMode(time(), $planId);
        $this->subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();

        // change subscription status to inactive (hold)
        $this->recurringScheduledUtils
            ->changeSubscriptionStatus($this->subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_INACTIVE);
    }
}