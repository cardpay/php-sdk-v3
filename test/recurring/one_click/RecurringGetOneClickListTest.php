<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringGetOneClickListTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testGetOneClickPaymentsListInfo()
    {
        $orderId = time();

        // create one-click recurring payments
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringCreationResponse1 = $recurringOneClickUtils->createRecurringInGatewayMode($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);
        $recurringCreationResponse2 = $recurringOneClickUtils->createRecurringInGatewayMode($orderId, Config::$gatewayTerminalCode, Config::$gatewayPassword);

        self::assertNotEmpty($recurringCreationResponse1->getRecurringData()->getId());
        self::assertNotEmpty($recurringCreationResponse2->getRecurringData()->getId());

        // get recurring payments list information
        $recurringList = $recurringOneClickUtils->getRecurringsApi()->getRecurrings(microtime(true), null, null, null, $orderId);

        $data = $recurringList->getData();
        $recurringResponse2 = $data[0];
        $recurringResponse1 = $data[1];

        self::assertNotEmpty($recurringResponse1->getRecurringData()->getId());
        self::assertEquals($orderId, $recurringResponse1->getMerchantOrder()->getId());

        self::assertNotEmpty($recurringResponse2->getRecurringData()->getId());
        self::assertEquals($orderId, $recurringResponse2->getMerchantOrder()->getId());
    }
}