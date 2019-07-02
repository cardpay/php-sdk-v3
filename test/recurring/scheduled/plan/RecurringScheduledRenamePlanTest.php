<?php

namespace Cardpay\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\model\PlanUpdateRequest;
use Cardpay\model\PlanUpdateRequestPlanData;
use Cardpay\model\Request;
use Cardpay\recurring\scheduled\RecurringPlanUtils;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class RecurringScheduledRenamePlanTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRenamePlan()
    {
        $newPlanName = time();

        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY, Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $planData = new PlanUpdateRequestPlanData([
            'name_to' => $newPlanName
        ]);

        $planUpdateRequest = new PlanUpdateRequest([
            'request' => $request,
            'operation' => PlanUpdateRequest::OPERATION_RENAME,
            'plan_data' => $planData
        ]);

        // rename plan
        $planUpdateResponse = $recurringPlanUtils->getRecurringsApi()->updatePlan($planId, $planUpdateRequest);

        self::assertEquals($planId, $planUpdateResponse->getPlanData()->getId());
        self::assertTrue($planUpdateResponse->getPlanData()->getIsExecuted());
        self::assertEquals($newPlanName, $planUpdateResponse->getPlanData()->getNameTo());
    }
}