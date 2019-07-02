<?php

namespace Cardpay\recurring\one_click;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class RecurringGetOneClickListTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testGetOneClickPaymentsListInfo()
    {
        $orderId = time();

        // create one-click recurring payments
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $recurringCreationResponse1 = $recurringOneClickUtils->createRecurringInGatewayMode($orderId);
        $recurringCreationResponse2 = $recurringOneClickUtils->createRecurringInGatewayMode($orderId);

        // get recurring payments list information
        $recurringList = $recurringOneClickUtils->getRecurringsApi()->getRecurrings(microtime(true), null, null, null, $orderId);

        $data = $recurringList->getData();
        $recurringResponse2 = $data[0];
        $recurringResponse1 = $data[1];

        self::assertEquals($recurringCreationResponse1->getRecurringData()->getId(), $recurringResponse1->getRecurringData()->getId());
        self::assertEquals($recurringCreationResponse2->getRecurringData()->getId(), $recurringResponse2->getRecurringData()->getId());
    }
}