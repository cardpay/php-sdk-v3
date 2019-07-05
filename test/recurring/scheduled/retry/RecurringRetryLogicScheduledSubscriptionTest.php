<?php

namespace Cardpay\test\recurring\scheduled\retry;

use Cardpay\ApiException;
use Cardpay\model\ResponsePlanData;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringScheduledTestCase;

class RecurringRetryLogicScheduledSubscriptionTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        parent::__construct(Config::$gatewayTerminalCode, Config::$gatewayPassword);
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