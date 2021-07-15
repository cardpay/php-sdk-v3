<?php

namespace Cardpay\test;

class Config
{
    public static $cardpayApiUrl;

    public static $paymentpageTerminalCode;
    public static $paymentpagePassword;

    public static $gatewayTerminalCode;
    public static $gatewayPassword;

    public static $gatewayPostponedTerminalCode;
    public static $gatewayPostponedPassword;

    public static $avsPaymentpageTerminalCode;
    public static $avsPaymentpagePassword;

    public static $terminalCurrency;

    public static $emailsDomain;

    public static $card3dsConfirmed;
    public static $cardNon3dsConfirmed;

    public static function init()
    {
        // production API URL: https://cardpay.com
        self::$cardpayApiUrl = self::getEnvVariable('CARDPAY_API_URL', 'https://sandbox.cardpay.com');

        self::$paymentpageTerminalCode = self::getEnvVariable('PAYMENTPAGE_TERMINAL_CODE', '18397');
        self::$paymentpagePassword = self::getEnvVariable('PAYMENTPAGE_PASSWORD', 'FpK2cy143POj');

        // process refunds and payouts immediately
        self::$gatewayTerminalCode = self::getEnvVariable('GATEWAY_TERMINAL_CODE', '32071');
        self::$gatewayPassword = self::getEnvVariable('GATEWAY_PASSWORD', 'FP708uO2ralC');

        // postponed refunds and payouts
        self::$gatewayPostponedTerminalCode = self::getEnvVariable('GATEWAY_POSTPONED_TERMINAL_CODE', '18399');
        self::$gatewayPostponedPassword = self::getEnvVariable('GATEWAY_POSTPONED_PASSWORD', 'jehE149L7bHU');

        // AVS tests
        self::$avsPaymentpageTerminalCode = self::getEnvVariable('AVS_PAYMENTPAGE_TERMINAL_CODE', '23029');
        self::$avsPaymentpagePassword = self::getEnvVariable('AVS_PAYMENTPAGE_PASSWORD', '0UT41J9avFch');

        self::$terminalCurrency = self::getEnvVariable('TERMINAL_CURRENCY', 'USD');

        self::$emailsDomain = self::getEnvVariable('EMAILS_DOMAIN', 'mailinator.com');

        // testing cards
        self::$card3dsConfirmed = self::getEnvVariable('CARD_3DS_CONFIRMED', '4000000000000002');
        self::$cardNon3dsConfirmed = self::getEnvVariable('CARD_NON3DS_CONFIRMED', '4000000000000077');
    }

    /**
     * @param string $envVariable
     * @param string $defaultValue
     * @return mixed
     */
    private static function getEnvVariable($envVariable, $defaultValue)
    {
        if (!empty($envVariable) && isset($_ENV[$envVariable])) {
            return $_ENV[$envVariable];
        } else {
            return $defaultValue;
        }
    }
}