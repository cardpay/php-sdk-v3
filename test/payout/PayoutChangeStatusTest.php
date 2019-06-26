<?php

namespace Cardpay\payout;

use Cardpay\ApiException;
use Cardpay\model\PayoutUpdateRequest;
use Cardpay\model\Request;
use Cardpay\model\RequestUpdatedTransactionData;
use Cardpay\model\ResponseUpdatedTransactionData;
use Cardpay\test\Config;
use Constants;
use PHPUnit\Framework\TestCase;

class PayoutChangeStatusTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPayoutChangeStatus()
    {
        // create payout
        $payoutUtils = new PayoutUtils();
        $payoutCreationResponse = $payoutUtils->createPayout(time(), Config::GATEWAY_TERMINAL_CODE_POSTPONED, Config::GATEWAY_PASSWORD_POSTPONED);
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