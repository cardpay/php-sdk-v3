<?php

namespace Cardpay\test\recurring\scheduled\plan;

use Cardpay\ApiException;
use Cardpay\model\PlanUpdateRequest;
use Cardpay\model\PlanUpdateRequestPlanData;
use Cardpay\model\Request;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\recurring\scheduled\RecurringPlanUtils;
use DateTime;

class RecurringScheduledRenamePlanTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRenamePlan()
    {
        $newPlanName = time();

        // create new plan
        $recurringPlanUtils = new RecurringPlanUtils();
        $recurringPlanResponse = $recurringPlanUtils->createPlan(Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $planId = $recurringPlanResponse->getPlanData()->getId();

        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
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