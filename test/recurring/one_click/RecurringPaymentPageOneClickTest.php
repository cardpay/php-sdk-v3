<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class RecurringPaymentPageOneClickTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testRecurringPaymentPageOneClick()
    {
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $redirectUrl = $recurringOneClickUtils->createRecurringInPaymentPageMode(time(), Config::$paymentpageTerminalCode, Config::$paymentpagePassword);

        self::assertNotEmpty($redirectUrl);
    }
}