<?php

namespace Cardpay\test\payment;

use Cardpay\api\PaymentsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\PaymentRequest;
use Cardpay\model\PaymentRequestCard;
use Cardpay\model\PaymentRequestCardAccount;
use Cardpay\model\PaymentRequestCustomer;
use Cardpay\model\PaymentRequestMerchantOrder;
use Cardpay\model\PaymentRequestPaymentData;
use Cardpay\model\PaymentResponse;
use Cardpay\model\Request;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PaymentUtils
{
    /**
     * @var PaymentsApi
     */
    private $paymentsApi;

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
     * @param bool $preAuth
     * @return string|null
     * @throws ApiException
     */
    public function createPaymentInPaymentPageMode($orderId, $terminalCode, $password, $preAuth = false)
    {
        $redirectUrl = $this->createPayment($orderId, $terminalCode, $password, $preAuth);
        return $redirectUrl;
    }

    /**
     * @param string $orderId
     * @param string $terminalCode
     * @param string $password
     * @param bool $preAuth
     * @return PaymentResponse|null
     * @throws ApiException
     */
    public function createPaymentInGatewayMode($orderId, $terminalCode, $password, $preAuth = false)
    {
        /** @var PaymentResponse $paymentResponse */
        $paymentResponse = $this->createPayment($orderId, $terminalCode, $password, $preAuth);
        return $paymentResponse;
    }

    /**
     * @param string $orderId
     * @param string $terminalCode
     * @param string $password
     * @param bool $preAuth
     * @return PaymentResponse|string|null
     * @throws ApiException
     */
    private function createPayment($orderId, $terminalCode, $password, $preAuth)
    {
        date_default_timezone_set('UTC');

        $orderDescription = 'Order description';
        $orderAmount = rand(Constants::MIN_PAYMENT_AMOUNT, Constants::MAX_PAYMENT_AMOUNT);
        $orderCurrency = Config::$terminalCurrency;
        $customerEmail = substr(sha1(rand()), 0, 20) . '@' . Config::$emailsDomain;

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

        $isGatewayMode = ($terminalCode == Config::$gatewayTerminalCode
            || $terminalCode == Config::$gatewayPostponedTerminalCode);

        // create payment
        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $merchantOrder = new PaymentRequestMerchantOrder([
            'id' => $orderId,
            'description' => $orderDescription
        ]);

        $paymentData = new PaymentRequestPaymentData([
            'amount' => $orderAmount,
            'currency' => $orderCurrency
        ]);
        if (true === $preAuth) {
            $paymentData['preauth'] = true;
        }

        $customer = new PaymentRequestCustomer([
            'email' => $customerEmail
        ]);

        $paymentRequestData = [
            'request' => $request,
            'merchant_order' => $merchantOrder,
            'payment_method' => Constants::PAYMENT_METHOD,
            'payment_data' => $paymentData,
            'customer' => $customer
        ];

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

            $paymentRequestData['card_account'] = $cardAccount;
        }

        if (null == $this->paymentsApi) {
            $this->paymentsApi = new PaymentsApi($this->client, $this->config, $this->headerSelector);
        }

        $paymentRequest = new PaymentRequest($paymentRequestData);
        $paymentCreationResponse = $this->paymentsApi->createPayment($paymentRequest);

        // redirect customer to redirect URL
        $redirectURL = $paymentCreationResponse->getRedirectUrl();
        // header("Location: {$redirectUrl}");

        if ($isGatewayMode) {
            try {
                $this->client->request('GET', $redirectURL);
            } catch (GuzzleException $e) {
                throw new ApiException($e->getMessage());
            }

            // get payment response
            $paymentsList = $this->paymentsApi
                ->getPayments(microtime(true), null, null, null, $orderId);

            $data = $paymentsList->getData();
            if (false === isset($data[0])) {
                return null;
            }

            /** @var PaymentResponse */
            return $data[0];

        } else {
            // payment page mode
            return $redirectURL;
        }
    }

    /**
     * @return PaymentsApi
     */
    public function getPaymentsApi()
    {
        return $this->paymentsApi;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return HeaderSelector
     */
    public function getHeaderSelector()
    {
        return $this->headerSelector;
    }
}