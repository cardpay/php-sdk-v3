<?php

namespace Cardpay\test;

class Config
{
    const SANDBOX_CARDPAY_API_URL = 'https://sandbox.cardpay.com/api';
    // const PRODUCTION_CARDPAY_API_URL = 'https://cardpay.com/api';

    const PAYMENTPAGE_TERMINAL_CODE = '18397';
    const PAYMENTPAGE_PASSWORD = 'FpK2cy143POj';

    const GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY = '18833';       // process refunds and payouts immediately
    const GATEWAY_PASSWORD_PROCESS_IMMEDIATELY = 'pzQf529Wa0AV';

    const GATEWAY_TERMINAL_CODE_POSTPONED = '18399';                 // postponed refunds and payouts
    const GATEWAY_PASSWORD_POSTPONED = 'jehE149L7bHU';

    const TERMINAL_CURRENCY = "USD";
}