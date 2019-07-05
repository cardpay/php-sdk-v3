<?php

namespace Cardpay\test\payout;

use Cardpay\ApiException;
use Cardpay\model\PayoutUpdateRequest;
use Cardpay\model\Request;
use Cardpay\model\RequestUpdatedTransactionData;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;
use Cardpay\test\Constants;

class PayoutChangeStatusTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testPayoutChangeStatus()
    {
        // create payout
        $payoutUtils = new PayoutUtils();
        $payoutCreationResponse = $payoutUtils->createPayout(time(), Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
        $payoutId = $payoutCreationResponse->getPayoutData()->getId();

        // change payout status (reverse)
        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $updatedTransactionData = new RequestUpdatedTransactionData([
            'status_to' => RequestUpdatedTransactionData::STATUS_TO_REVERSE
        ]);

        $payoutUpdateRequest = new PayoutUpdateRequest([
            'request' => $request,
            'payout_data' => $updatedTransactionData
        ]);

        $payoutUpdateResponse = $payoutUtils->getPayoutsApi()->updatePayout($payoutId, $payoutUpdateRequest);

        self::assertTrue($payoutUpdateResponse->getPayoutData()->getIsExecuted());
        self::assertEquals(ResponseUpdatedTransactionData::STATUS_VOIDED, $payoutUpdateResponse->getPayoutData()->getStatus());
    }
}