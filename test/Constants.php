<?php

class Constants
{
    const DATETIME_FORMAT = 'Y-m-d\TH:i:s\Z';

    const PAYMENT_METHOD = 'BANKCARD';

    const INITIATOR_CIT = 'cit';
    const INITIATOR_MIT = 'mit';

    const TEST_CARD_PAN = '4000000000000077';
    const TEST_CARD_HOLDER = 'John Smith';
    const TEST_CARD_SECURITY_CODE = '123';
    const TEST_CARD_EXPIRATION = '12/2020';

    const MIN_PAYMENT_AMOUNT = 10;
    const MAX_PAYMENT_AMOUNT = 100;
}