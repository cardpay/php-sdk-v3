<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\test\Config;

class RecurringCreateScheduledSubscriptionGatewayTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        parent::__construct(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
    }

    /**
     * @throws ApiException
     */
    public function testCreateScheduledSubscriptionInGatewayMode()
    {
        // create new plan
        $recurringPlanResponse = $this->recurringPlanUtils->createPlan($this->terminalCode, $this->password);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        self::assertNotEmpty($planId);

        // create scheduled subscription
        $recurringResponse = $this->recurringScheduledUtils
            ->createScheduledSubscriptionInGatewayMode(time(), $planId);

        $this->subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();

        self::assertNotEmpty($this->subscriptionId);
    }
}