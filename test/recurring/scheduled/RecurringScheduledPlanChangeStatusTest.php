<?php

namespace Cardpay\recurring\scheduled;

use Cardpay\ApiException;
use Cardpay\model\ChangedPlanData;
use Cardpay\model\PlanUpdateRequest;
use Cardpay\model\PlanUpdateRequestPlanData;
use Cardpay\model\Request;
use Cardpay\recurring\RecurringPlanUtils;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class RecurringScheduledPlanChangeStatusTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testChangePlanStatus()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $planData = new PlanUpdateRequestPlanData([
            'status_to' => PlanUpdateRequestPlanData::STATUS_TO_INACTIVE
        ]);

        $planUpdateRequest = new PlanUpdateRequest([
            'request' => $request,
            'operation' => PlanUpdateRequest::OPERATION_CHANGE_STATUS,
            'plan_data' => $planData
        ]);

        // change plan status (make it inactive)
        $planUpdateResponse = $recurringPlanUtils->getRecurringsApi()->updatePlan($planId, $planUpdateRequest);

        self::assertEquals($planId, $planUpdateResponse->getPlanData()->getId());
        self::assertTrue($planUpdateResponse->getPlanData()->getIsExecuted());
        self::assertEquals(ChangedPlanData::STATUS_INACTIVE, $planUpdateResponse->getPlanData()->getStatus());
    }
}