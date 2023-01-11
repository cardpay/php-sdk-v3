<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\api\RecurringsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\BillingAddress;
use Cardpay\model\PaymentRequestCard;
use Cardpay\model\PaymentRequestCardAccount;
use Cardpay\model\PaymentRequestMerchantOrder;
use Cardpay\model\Plan;
use Cardpay\model\RecurringCreationRequest;
use Cardpay\model\RecurringCustomer;
use Cardpay\model\RecurringRequestRecurringData;
use Cardpay\model\RecurringResponse;
use Cardpay\model\Request;
use Cardpay\model\SubscriptionUpdateRequest;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\model\SubscriptionUpdateResponse;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RecurringScheduledUtils
{
    /**
     * @var RecurringsApi
     */
    private $recurringsApi;

    /**
     * @var Configuration
     */
    private $config;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var HeaderSelector
     */
    private $headerSelector;

    private $terminalCode;

    private $password;

    /**
     * RecurringScheduledUtils constructor
     *
     * @param string $terminalCode
     * @param string $password
     * @throws ApiException
     */
    public function __construct($terminalCode, $password)
    {
        $this->terminalCode = $terminalCode;
        $this->password = $password;

        if (null == $this->config) {
            $authUtils = new AuthUtils();
            $this->config = $authUtils->getConfiguration($terminalCode, $password);
        }

        if (null == $this->client) {
            $this->client = new Client();
        }

        if (null == $this->headerSelector) {
            $this->headerSelector = new HeaderSelector();
        }

        if (null == $this->recurringsApi) {
            $this->recurringsApi = new RecurringsApi(Config::$cardpayApiUrl, $this->client, $this->config, $this->headerSelector);
        }
    }

    /**
     * @param string $orderId
     * @param string $planId
     * @param string $subscriptionStart
     * @param float $initialAmount
     * @return string|null
     * @throws ApiException
     */
    public function createScheduledSubscriptionInPaymentPageMode($orderId, $planId = null, $subscriptionStart = null, $initialAmount = 0.0)
    {
        $redirectUrl = $this->createScheduledSubscription($orderId, $planId, $subscriptionStart, $initialAmount);

        return $redirectUrl;
    }

    /**
     * @param string $orderId
     * @param string $planId
     * @param string $subscriptionStart
     * @param float $initialAmount
     * @return RecurringResponse|null
     * @throws ApiException
     */
    public function createScheduledSubscriptionInGatewayMode($orderId, $planId = null, $subscriptionStart = null, $initialAmount = 0.0)
    {
        /** @var RecurringResponse $recurringResponse */
        $recurringResponse = $this->createScheduledSubscription($orderId, $planId, $subscriptionStart, $initialAmount);

        return $recurringResponse;
    }

    /**
     * @param string $orderId
     * @param string $planId
     * @param string $subscriptionStart
     * @param float $initialAmount
     * @return RecurringResponse|string|null
     * @throws ApiException
     */
    private function createScheduledSubscription($orderId, $planId, $subscriptionStart, $initialAmount)
    {
        $orderDescription = 'Order description (scheduled subscription)';
        $customerId = time();
        $customerEmail = substr(sha1(mt_rand()), 0, 20) . '@' . Config::$emailsDomain;

        $isGatewayMode = ($this->terminalCode == Config::$gatewayTerminalCode || $this->terminalCode == Config::$gatewayPostponedTerminalCode);

        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $paymentMerchantOrder = new PaymentRequestMerchantOrder([
            'id' => $orderId,
            'description' => $orderDescription
        ]);

        $plan = new Plan([
            'id' => $planId
        ]);

        $recurringData = new RecurringRequestRecurringData([
            'initiator' => Constants::INITIATOR_CIT,
            'plan' => $plan,
            'trans_type' => Constants::TRANS_TYPE_GOODS_SERVICE_PURCHASE
        ]);
        if (!empty($subscriptionStart)) {
            $recurringData['subscription_start'] = $subscriptionStart;
        }
        if ($initialAmount > 0) {
            $recurringData['initial_amount'] = $initialAmount;
        }

        $recurringCustomer = new RecurringCustomer([
            'id' => $customerId,
            'email' => $customerEmail,
            'phone' => Constants::CUSTOMER_PHONE,
            'work_phone' => Constants::CUSTOMER_WORK_PHONE,
            'home_phone' => Constants::CUSTOMER_HOME_PHONE
        ]);

        $recurringRequest = new RecurringCreationRequest([
            'request' => $request,
            'merchant_order' => $paymentMerchantOrder,
            'payment_method' => Constants::PAYMENT_METHOD,
            'recurring_data' => $recurringData,
            'customer' => $recurringCustomer
        ]);

        if ($isGatewayMode) {
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

            $recurringRequest['card_account'] = $cardAccount;
        }

        $recurringCreationResponse = $this->recurringsApi->createRecurring($recurringRequest);

        // redirect customer to redirect URL
        $redirectURL = $recurringCreationResponse->getRedirectUrl();
        // header("Location: {$redirectUrl}");

        if ($isGatewayMode && empty($subscriptionStart)) {
            try {
                $this->client->request('GET', $redirectURL);
            } catch (GuzzleException $e) {
                throw new ApiException($e->getMessage());
            }

            // get recurring response
            $recurringsList = $this->recurringsApi->getRecurrings(microtime(true), null, null, null, $orderId);

            $data = $recurringsList->getData();
            if (false === isset($data[0])) {
                return null;
            }

            /** @var RecurringResponse */
            return $data[0];
        }

        // payment page mode
        return $redirectURL;
    }

    /**
     * @param string $subscriptionId
     * @param string $statusTo
     * @return SubscriptionUpdateResponse
     * @throws ApiException
     */
    public function changeSubscriptionStatus($subscriptionId, $statusTo)
    {
        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $subscriptionData = new SubscriptionUpdateRequestSubscriptionData([
            'status_to' => $statusTo
        ]);

        $subscriptionUpdateRequest = new SubscriptionUpdateRequest([
            'request' => $request,
            'operation' => SubscriptionUpdateRequest::OPERATION_CHANGE_STATUS,
            'subscription_data' => $subscriptionData
        ]);

        return $this->recurringsApi->updateSubscription($subscriptionId, $subscriptionUpdateRequest);
    }

    /**
     * @return RecurringsApi
     */
    public function getRecurringsApi()
    {
        return $this->recurringsApi;
    }

    /**
     * @param RecurringsApi $recurringsApi
     */
    public function setRecurringsApi($recurringsApi)
    {
        $this->recurringsApi = $recurringsApi;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Configuration $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return HeaderSelector
     */
    public function getHeaderSelector()
    {
        return $this->headerSelector;
    }

    /**
     * @param HeaderSelector $headerSelector
     */
    public function setHeaderSelector($headerSelector)
    {
        $this->headerSelector = $headerSelector;
    }

    /**
     * @return string
     */
    public function getTerminalCode()
    {
        return $this->terminalCode;
    }

    /**
     * @param string $terminalCode
     */
    public function setTerminalCode($terminalCode)
    {
        $this->terminalCode = $terminalCode;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}