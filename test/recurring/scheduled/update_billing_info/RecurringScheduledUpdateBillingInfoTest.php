<?php

namespace Cardpay\test\recurring\scheduled\update_billing_info;

use Cardpay\ApiException;
use Cardpay\model\BillingAddress;
use Cardpay\model\FilingRecurringData;
use Cardpay\model\FilingRequest;
use Cardpay\model\FilingRequestMerchantOrder;
use Cardpay\model\FilingRequestSubscriptionData;
use Cardpay\model\PaymentRequestCard;
use Cardpay\model\PaymentRequestCardAccount;
use Cardpay\model\RecurringCustomer;
use Cardpay\model\Request;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use Cardpay\test\recurring\scheduled\RecurringScheduledTestCase;
use DateTime;
use GuzzleHttp\Exception\GuzzleException;

class RecurringScheduledUpdateBillingInfoTest extends RecurringScheduledTestCase
{
    public function __construct()
    {
        Config::init();
        parent::__construct(Config::$gatewayPostponedTerminalCode, Config::$gatewayPostponedPassword);
    }

    /**
     * @throws ApiException
     */
    public function testLinkACardToAnExistingSubscription()
    {
        $orderId = microtime();

        // create new plan
        $recurringPlanResponse = $this->recurringPlanUtils->createPlan($this->terminalCode, $this->password);
        $planId = $recurringPlanResponse->getPlanData()->getId();
        $customerId = time();
        $customerEmail = substr(sha1(mt_rand()), 0, 20) . '@' . Config::$emailsDomain;

        self::assertNotEmpty($planId);

        // create scheduled subscription
        $recurringResponse = $this->recurringScheduledUtils
            ->createScheduledSubscriptionInGatewayMode(time(), $planId);

        $this->subscriptionId = $recurringResponse->getRecurringData()->getSubscription()->getId();
        self::assertNotEmpty($this->subscriptionId);

        $filingId = $recurringResponse->getRecurringData()->getFiling()->getId();
        self::assertNotEmpty($filingId);

        // create new card binding
        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $merchantOrder = new FilingRequestMerchantOrder([
            'id' => $orderId,
            'description' => 'Order description'
        ]);

        $recurringData = new FilingRecurringData([
            'initiator' => Constants::INITIATOR_CIT,
            'trans_type' => Constants::TRANS_TYPE_GOODS_SERVICE_PURCHASE
        ]);

        $subscriptionData = new FilingRequestSubscriptionData([
            'id' => $this->subscriptionId
        ]);

        $card = new PaymentRequestCard([
            'pan' => Config::$cardNon3dsConfirmed,
            'holder' => Constants::TEST_CARD_HOLDER,
            'security_code' => Constants::TEST_CARD_SECURITY_CODE,
            'expiration' => '12/' . date('Y', strtotime('+1 year')),
            'acct_type' => Constants::ACCT_TYPE_DEBIT
        ]);

        $billingAddress = new BillingAddress([
            'country' => Constants::ADDRESS_COUNTRY,
            'state' => Constants::ADDRESS_STATE,
            'zip' => Constants::ADDRESS_ZIP,
            'city' => Constants::ADDRESS_CITY,
            'phone' => Constants::ADDRESS_PHONE,
            'addr_line_1' => Constants::ADDRESS_ADDR_LINE_1,
            'addr_line_2' => Constants::ADDRESS_ADDR_LINE_2
        ]);

        $cardAccount = new PaymentRequestCardAccount([
            'card' => $card,
            'billing_address' => $billingAddress
        ]);

        $recurringCustomer = new RecurringCustomer([
            'id' => $customerId,
            'email' => $customerEmail,
            'phone' => Constants::CUSTOMER_PHONE,
            'work_phone' => Constants::CUSTOMER_WORK_PHONE,
            'home_phone' => Constants::CUSTOMER_HOME_PHONE
        ]);

        $filingRequest = new FilingRequest([
            'request' => $request,
            'merchant_order' => $merchantOrder,
            'payment_method' => Constants::PAYMENT_METHOD,
            'recurring_data' => $recurringData,
            'subscription_data' => $subscriptionData,
            'card_account' => $cardAccount,
            'customer' => $recurringCustomer
        ]);

        $recurringGatewayCreationResponse = $this->recurringScheduledUtils
            ->getRecurringsApi()
            ->createFiling($filingRequest);

        $redirectUrl = $recurringGatewayCreationResponse->getRedirectUrl();
        self::assertNotEmpty($redirectUrl);

        try {
            $this->recurringScheduledUtils->getClient()->request('GET', $redirectUrl);
        } catch (GuzzleException $e) {
            throw new ApiException($e->getMessage());
        }
    }
}