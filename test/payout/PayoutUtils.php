<?php

namespace Cardpay\test\payout;

use Cardpay\api\PayoutsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\PayoutRequest;
use Cardpay\model\PayoutRequestCard;
use Cardpay\model\PayoutRequestCardAccount;
use Cardpay\model\PayoutRequestMerchantOrder;
use Cardpay\model\PayoutRequestPayoutData;
use Cardpay\model\PayoutResponse;
use Cardpay\model\Request;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use GuzzleHttp\Client;

class PayoutUtils
{
    /**
     * @var PayoutsApi
     */
    private $payoutsApi;

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
     * @return PayoutResponse
     * @throws ApiException
     */
    public function createPayout($orderId, $terminalCode, $password)
    {
        if (null == $this->config) {
            $authUtils = new AuthUtils();
            $this->config = $authUtils->getConfiguration($terminalCode, $password);
        }

        $request = new Request([
            'id' => microtime(true),
            'time' => date(Constants::DATETIME_FORMAT)
        ]);

        $payoutMerchantOrder = new PayoutRequestMerchantOrder([
            'id' => $orderId
        ]);

        $payoutData = new PayoutRequestPayoutData([
            'amount' => rand(10, 100),
            'currency' => Config::$terminalCurrency
        ]);

        $card = new PayoutRequestCard([
            'pan' => Constants::TEST_CARD_PAN
        ]);

        $cardAccount = new PayoutRequestCardAccount([
            'card' => $card,
            'recipient_info' => 'John Smith'
        ]);

        $payoutRequest = new PayoutRequest([
            'request' => $request,
            'merchant_order' => $payoutMerchantOrder,
            'payment_method' => Constants::PAYMENT_METHOD,
            'payout_data' => $payoutData,
            'card_account' => $cardAccount
        ]);

        if (null == $this->client) {
            $this->client = new Client();
        }
        if (null == $this->headerSelector) {
            $this->headerSelector = new HeaderSelector();
        }

        $this->payoutsApi = new PayoutsApi($this->client, $this->config, $this->headerSelector);
        $payoutResponse = $this->payoutsApi->createPayout($payoutRequest);

        return $payoutResponse;
    }

    /**
     * @return PayoutsApi
     */
    public function getPayoutsApi()
    {
        return $this->payoutsApi;
    }
}