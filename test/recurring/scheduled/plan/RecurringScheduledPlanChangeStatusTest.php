<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\model\ChangedPlanData;
use Cardpay\model\PlanUpdateRequest;
use Cardpay\model\PlanUpdateRequestPlanData;
use Cardpay\model\Request;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;
use DateTime;

class RecurringScheduledPlanChangeStatusTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testChangePlanStatus()
    {
        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        self::assertNotEmpty($planId);

        // change plan status (make it inactive)
        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $planData = new PlanUpdateRequestPlanData([
            'status_to' => PlanUpdateRequestPlanData::STATUS_TO_INACTIVE
        ]);

        $planUpdateRequest = new PlanUpdateRequest([
            'request' => $request,
            'operation' => PlanUpdateRequest::OPERATION_CHANGE_STATUS,
            'plan_data' => $planData
        ]);

        $planUpdateResponse = $recurringPlanUtils->getRecurringsApi()->updatePlan($planId, $planUpdateRequest);

        self::assertEquals($planId, $planUpdateResponse->getPlanData()->getId());
        self::assertTrue($planUpdateResponse->getPlanData()->getIsExecuted());
        self::assertEquals(ChangedPlanData::STATUS_INACTIVE, $planUpdateResponse->getPlanData()->getStatus());
    }
}