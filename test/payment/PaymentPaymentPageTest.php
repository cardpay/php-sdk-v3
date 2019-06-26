<?php

namespace Cardpay\test;

use Cardpay\ApiException;
use Cardpay\payment\PaymentUtils;
use PHPUnit\Framework\TestCase;

class PaymentPaymentPageTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testPaymentPage()
    {
        $paymentUtils = new PaymentUtils();
        $redirectUrl = $paymentUtils->createPaymentInPaymentPageMode(time(), Config::PAYMENTPAGE_TERMINAL_CODE, Config::PAYMENTPAGE_PASSWORD);

        self::assertNotEmpty($redirectUrl);
    }
}