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
        Config::init();
        parent::__construct(Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
    }

    /**
     * @throws ApiException
     */
    public function testRetryLogicScheduledSubscription()
    {
        // create plan with retries
        $retries = mt_rand(2, 10);

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