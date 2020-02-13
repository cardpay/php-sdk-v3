<?php

namespace Cardpay\test;

class Constants
{
    const PAYMENT_METHOD = 'BANKCARD';

    const INITIATOR_CIT = 'cit';
    const INITIATOR_MIT = 'mit';

    const TEST_CARD_HOLDER = 'John Smith';
    const TEST_CARD_SECURITY_CODE = '123';

    const MIN_PAYMENT_AMOUNT = 10;
    const MAX_PAYMENT_AMOUNT = 100;

    const ACCT_TYPE_NOT_APPLICABLE = '01';
    const ACCT_TYPE_CREDIT = '02';
    const ACCT_TYPE_DEBIT = '03';

    const ADDRESS_COUNTRY = 'USA';
    const ADDRESS_STATE = 'NY';
    const ADDRESS_ZIP = '10001';
    const ADDRESS_CITY = 'New York';
    const ADDRESS_PHONE = '+1 111111111';
    const ADDRESS_ADDR_LINE_1 = '450 W.';
    const ADDRESS_ADDR_LINE_2 = '33 Street';

    const TRANS_TYPE_GOODS_SERVICE_PURCHASE = '01';
    const TRANS_TYPE_CHECK_ACCEPTANCE = '03';
    const TRANS_TYPE_ACCOUNT_FUNDING = '10';
    const TRANS_TYPE_QUASI_CASH_TRANSACTION = '11';
    const TRANS_TYPE_PREPAID_ACTIVATION_AND_LOAD = '28';

    const CUSTOMER_PHONE = '+1 222222222';
    const CUSTOMER_WORK_PHONE = '+1 333333333';
    const CUSTOMER_HOME_PHONE = '+1 444444444';
}