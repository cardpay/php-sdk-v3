<?php

namespace Cardpay\recurring\one_click;

use Cardpay\ApiException;
use PHPUnit\Framework\TestCase;

class RecurringPaymentPageOneClickTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testRecurringPaymentPageOneClick()
    {
        $recurringOneClickUtils = new RecurringOneClickUtils();
        $redirectUrl = $recurringOneClickUtils->createRecurringInPaymentPageMode(time());

        self::assertNotEmpty($redirectUrl);
    }
}