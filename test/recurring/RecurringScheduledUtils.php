<?php

namespace Cardpay\recurring;

require_once(__DIR__ . "/../Config.php");
require_once(__DIR__ . "/../Constants.php");

use Cardpay\api\RecurringsApi;
use Cardpay\ApiException;
use Cardpay\auth\AuthUtils;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\PaymentRequestCard;
use Cardpay\model\PaymentRequestCardAccount;
use Cardpay\model\PaymentRequestMerchantOrder;
use Cardpay\model\Plan;
use Cardpay\model\RecurringCustomer;
use Cardpay\model\RecurringRequest;
use Cardpay\model\RecurringRequestRecurringData;
use Cardpay\model\RecurringResponse;
use Cardpay\model\Request;
use Cardpay\test\Config;
use Constants;
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

    /**
     * @param $orderId
     * @param string $terminalCode
     * @param string $password
     * @param string $planId
     * @param string $subscriptionStart
     * @return string|null
     * @throws ApiException
     */
    public function createScheduledSubscriptionInPaymentPageMode(
        $orderId,
        $terminalCode = Config::PAYMENTPAGE_TERMINAL_CODE,
        $password = Config::PAYMENTPAGE_PASSWORD,
        $planId = null,
        $subscriptionStart = null
    )
    {
        $redirectUrl = $this->createScheduledSubscription($orderId, $terminalCode, $password, $planId, $subscriptionStart);

        return $redirectUrl;
    }

    /**
     * @param $orderId
     * @param string $terminalCode
     * @param string $password
     * @param string $planId
     * @param string $subscriptionStart
     * @return RecurringResponse|null
     * @throws ApiException
     */
    public function createScheduledSubscriptionInGatewayMode(
        $orderId,
        $terminalCode = Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY,
        $password = Config::GATEWAY_PASSWORD_PROCESS_IMMEDIATELY,
        $planId = null,
        $subscriptionStart = null
    )
    {
        /** @var RecurringResponse $recurringResponse */
        $recurringResponse = $this->createScheduledSubscription($orderId, $terminalCode, $password, $planId, $subscriptionStart);

        return $recurringResponse;
    }

    /**
     * @param $orderId
     * @param $terminalCode
     * @param $password
     * @param $planId
     * @param $subscriptionStart
     * @return RecurringResponse|string|null
     * @throws ApiException
     */
    private function createScheduledSubscription($orderId, $terminalCode, $password, $planId, $subscriptionStart)
    {
        $orderDescription = 'Order description (scheduled subscription)';
        $customerId = time();
        $customerEmail = substr(sha1(rand()), 0, 20) . '@mailinator.com';

        $isGatewayMode = ($terminalCode == Config::GATEWAY_TERMINAL_CODE_PROCESS_IMMEDIATELY
            || $terminalCode == Config::GATEWAY_TERMINAL_CODE_POSTPONED);

        if (null == $this->config) {
            $authUtils = new AuthUtils();
            $this->config = $authUtils->getConfig($terminalCode, $password);
        }
        if (null == $this->client) {
            $this->client = new Client();
        }
        if (null == $this->headerSelector) {
            $this->headerSelector = new HeaderSelector();
        }

        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
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

        $recurringCustomer = new RecurringCustomer([
            'id' => $customerId,
            'email' => $customerEmail
        ]);

        $recurringRequest = new RecurringRequest([
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
                'expiration' => Constants::TEST_CARD_EXPIRATION
            ]);

            $cardAccount = new PaymentRequestCardAccount([
                'card' => $card
            ]);

            $recurringRequest['card_account'] = $cardAccount;
        }

        if (null == $this->recurringsApi) {
            $this->recurringsApi = new RecurringsApi($this->client, $this->config, $this->headerSelector);
        }
        $recurringCreationResponse = $this->recurringsApi->createRecurring($recurringRequest);

        // redirect customer to redirect URL
        $redirectURL = $recurringCreationResponse->getRedirectUrl();
        // header("Location: {$redirectUrl}");

        if ($isGatewayMode) {
            try {
                $this->client->request('GET', $redirectURL);
            } catch (GuzzleException $e) {
                throw new ApiException($e->getMessage());
            }

            // get recurring response
            $recurringsList = $this->recurringsApi
                ->getRecurrings(microtime(true), null, null, null, $orderId);

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
     * @return RecurringsApi
     */
    public function getRecurringsApi()
    {
        return $this->recurringsApi;
    }
}