<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\model\PaymentUpdateTransactionData;
use Cardpay\model\RecurringPatchRequest;
use Cardpay\model\Request;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use DateTime;

class RecurringChangeOneClickStatusReverseTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testChangeOneClickStatusReverse()
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

        // change recurring status (reverse)
        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $paymentUpdateTransactionData = new PaymentUpdateTransactionData([
            'status_to' => PaymentUpdateTransactionData::STATUS_TO_REVERSE
        ]);

        $recurringPatchRequest = new RecurringPatchRequest([
            'request' => $request,
            'operation' => RecurringPatchRequest::OPERATION_CHANGE_STATUS,
            'recurring_data' => $paymentUpdateTransactionData
        ]);

        $recurringUpdateResponse = $recurringOneClickUtils->getRecurringsApi()->updateRecurring($recurringId, $recurringPatchRequest);

        self::assertTrue($recurringUpdateResponse->getRecurringData()->getIsExecuted());
        self::assertEquals(ResponseUpdatedTransactionData::STATUS_VOIDED, $recurringUpdateResponse->getRecurringData()->getStatus());
    }
}