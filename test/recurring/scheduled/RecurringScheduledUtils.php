<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\api\RecurringsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
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
            $this->recurringsApi = new RecurringsApi($this->client, $this->config, $this->headerSelector);
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
        $customerEmail = substr(sha1(rand()), 0, 20) . '@' . Config::$emailsDomain;

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
            'plan' => $plan
        ]);
        if (!empty($subscriptionStart)) {
            $recurringData['subscription_start'] = $subscriptionStart;
        }
        if ($initialAmount > 0) {
            $recurringData['initial_amount'] = $initialAmount;
        }

        $recurringCustomer = new RecurringCustomer([
            'id' => $customerId,
            'email' => $customerEmail
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
                'pan' => Constants::TEST_CARD_PAN,
                'holder' => Constants::TEST_CARD_HOLDER,
                'security_code' => Constants::TEST_CARD_SECURITY_CODE,
                'expiration' => '12/' . date('Y', strtotime('+1 year'))
            ]);

            $cardAccount = new PaymentRequestCardAccount([
                'card' => $card
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

        } else {
            // payment page mode
            return $redirectURL;
        }
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

        $subscriptionUpdateResponse = $this->recurringsApi->updateSubscription($subscriptionId, $subscriptionUpdateRequest);

        return $subscriptionUpdateResponse;
    }

    /**
     * @return RecurringsApi
     */
    public function getRecurringsApi()
    {
        return $this->recurringsApi;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}