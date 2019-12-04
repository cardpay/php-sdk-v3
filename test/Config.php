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

    public static $terminalCurrency;

    public static $emailsDomain;

    public static function init()
    {
        // production API URL: https://cardpay.com
        self::$cardpayApiUrl = self::getEnvVariable('CARDPAY_API_URL', 'https://sandbox.cardpay.com');

        self::$paymentpageTerminalCode = self::getEnvVariable('PAYMENTPAGE_TERMINAL_CODE', '18397');
        self::$paymentpagePassword = self::getEnvVariable('PAYMENTPAGE_PASSWORD', 'FpK2cy143POj');

        // process refunds and payouts immediately
        self::$gatewayTerminalCode = self::getEnvVariable('GATEWAY_TERMINAL_CODE', '18833');
        self::$gatewayPassword = self::getEnvVariable('GATEWAY_PASSWORD', 'pzQf529Wa0AV');

        // postponed refunds and payouts
        self::$gatewayPostponedTerminalCode = self::getEnvVariable('GATEWAY_POSTPONED_TERMINAL_CODE', '18399');
        self::$gatewayPostponedPassword = self::getEnvVariable('GATEWAY_POSTPONED_PASSWORD', 'jehE149L7bHU');

        self::$terminalCurrency = self::getEnvVariable('TERMINAL_CURRENCY', 'USD');

        self::$emailsDomain = self::getEnvVariable('EMAILS_DOMAIN', 'mailinator.com');
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