<?php

namespace Cardpay\test\recurring\one_click;

use Cardpay\api\RecurringsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\BillingAddress;
use Cardpay\model\PaymentRequestCard;
use Cardpay\model\PaymentRequestCardAccount;
use Cardpay\model\PaymentRequestMerchantOrder;
use Cardpay\model\RecurringCreationRequest;
use Cardpay\model\RecurringCustomer;
use Cardpay\model\RecurringRequestFiling;
use Cardpay\model\RecurringRequestRecurringData;
use Cardpay\model\RecurringResponse;
use Cardpay\model\Request;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RecurringOneClickUtils
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
     * @param string $orderId
     * @param string $terminalCode
     * @param string $password
     * @param string $filingId
     * @param bool $preAuth
     * @return string|null
     * @throws ApiException
     */
    public function createRecurringInPaymentPageMode($orderId, $terminalCode, $password, $filingId = null, $preAuth = false)
    {
        $redirectUrl = $this->createRecurring($orderId, $terminalCode, $password, $filingId, $preAuth);
        return $redirectUrl;
    }

    /**
     * @param string $orderId
     * @param string $terminalCode
     * @param string $password
     * @param string $filingId
     * @param bool $preAuth
     * @return RecurringResponse|null
     * @throws ApiException
     */
    public function createRecurringInGatewayMode($orderId, $terminalCode, $password, $filingId = null, $preAuth = false)
    {
        return $this->createRecurring($orderId, $terminalCode, $password, $filingId, $preAuth);
    }

    /**
     * @param string $orderId
     * @param string $terminalCode
     * @param string $password
     * @param string $filingId
     * @param bool $preAuth
     * @return RecurringResponse|string|null
     * @throws ApiException
     */
    private function createRecurring($orderId, $terminalCode, $password, $filingId, $preAuth)
    {
        $orderDescription = 'Order description (one-click recurring)';
        $orderAmount = mt_rand(Constants::MIN_PAYMENT_AMOUNT, Constants::MAX_PAYMENT_AMOUNT);
        $orderCurrency = Config::$terminalCurrency;
        $customerId = time();
        $customerEmail = substr(sha1(mt_rand()), 0, 20) . '@' . Config::$emailsDomain;

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

        $isGatewayMode = ($terminalCode == Config::$gatewayTerminalCode || $terminalCode == Config::$gatewayPostponedTerminalCode);

        $request = new Request([
            'id' => microtime(true),
            'time' => new DateTime()
        ]);

        $merchantOrder = new PaymentRequestMerchantOrder([
            'id' => $orderId,
            'description' => $orderDescription
        ]);

        $recurringData = new RecurringRequestRecurringData([
            'initiator' => Constants::INITIATOR_CIT,
            'amount' => $orderAmount,
            'currency' => $orderCurrency,
            'trans_type' => Constants::TRANS_TYPE_GOODS_SERVICE_PURCHASE
        ]);
        if (!empty($filingId)) {
            $filing = new RecurringRequestFiling([
                'id' => $filingId
            ]);
            $recurringData['filing'] = $filing;
        }
        if (true === $preAuth) {
            $recurringData['preauth'] = true;
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
            'merchant_order' => $merchantOrder,
            'payment_method' => Constants::PAYMENT_METHOD,
            'recurring_data' => $recurringData,
            'customer' => $recurringCustomer
        ]);

        if ($isGatewayMode && empty($filingId)) {
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

        if (null == $this->recurringsApi) {
            $this->recurringsApi = new RecurringsApi(Config::$cardpayApiUrl, $this->client, $this->config, $this->headerSelector);
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
        }

        // payment page mode
        return $redirectURL;
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
}