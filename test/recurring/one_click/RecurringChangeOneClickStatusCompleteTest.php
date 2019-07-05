<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\model\PaymentUpdateTransactionData;
use Cardpay\model\RecurringPatchRequest;
use Cardpay\model\Request;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\Constants;

class RecurringChangeOneClickStatusCompleteTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testChangeOneClickStatusComplete()
    {
        // create one-click recurring payment
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringResponse = $recurringOneClickUtils->createRecurringInGatewayMode(
            time(),
            Config::$gatewayTerminalCode,
            Config::$gatewayPassword,
            null,
            true
        );

        $recurringId = $recurringResponse->getRecurringData()->getId();

        // change recurring status (complete)
        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $paymentUpdateTransactionData = new PaymentUpdateTransactionData([
            'status_to' => PaymentUpdateTransactionData::STATUS_TO_COMPLETE
        ]);

        $recurringPatchRequest = new RecurringPatchRequest([
            'request' => $request,
            'operation' => RecurringPatchRequest::OPERATION_CHANGE_STATUS,
            'recurring_data' => $paymentUpdateTransactionData
        ]);

        $recurringUpdateResponse = $recurringOneClickUtils->getRecurringsApi()->updateRecurring($recurringId, $recurringPatchRequest);

        self::assertTrue($recurringUpdateResponse->getRecurringData()->getIsExecuted());
        self::assertEquals(ResponseUpdatedTransactionData::STATUS_COMPLETED, $recurringUpdateResponse->getRecurringData()->getStatus());
    }
}