<?php

namespace Cardpay\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\model\PaymentUpdateTransactionData;
use Cardpay\model\RecurringPatchRequest;
use Cardpay\model\Request;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\recurring\RecurringOneClickUtils;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class RecurringChangeOneClickStatusCompleteTest extends TestCase
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
            Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY,
            Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY,
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