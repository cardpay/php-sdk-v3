<?php

namespace Cardpay\recurring\scheduled\retry;

use Cardpay\ApiException;
use Cardpay\model\ResponsePlanData;
use Cardpay\recurring\scheduled\RecurringScheduledTestCase;
use Cardpay\test\Config;

class RecurringRetryLogicScheduledSubscriptionTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        parent::__construct(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
    }

    /**
     * @throws ApiException
     */
    public function testRetryLogicScheduledSubscription()
    {
        // create plan with retries
        $retries = rand(2, 10);

        $recurringPlanResponse = $this->recurringPlanUtils->createPlan($this->terminalCode, $this->password, $retries);

        self::assertNotEmpty($recurringPlanResponse->getPlanData());
        self::assertEquals(ResponsePlanData::STATUS_ACTIVE, $recurringPlanResponse->getPlanData()->getStatus());
        self::assertEquals($retries, $recurringPlanResponse->getPlanData()->getRetries());

        // create scheduled subscription
        $recurringResponse = $this->recurringScheduledUtils
            ->createScheduledSubscriptionInGatewayMode(time(), $recurringPlanResponse->getPlanData()->getId());

        $this->subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();
        self::assertNotEmpty($this->subscriptionId);
    }
}