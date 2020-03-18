<?php

namespace Cardpay\test\limit;

use Cardpay\api\LimitsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\LimitInfoResponse;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use GuzzleHttp\Client;

class LimitUtils
{
    /**
     * @var LimitsApi
     */
    private $limitsApi;

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
     * @param $terminalCode
     * @param $password
     * @return LimitInfoResponse
     * @throws ApiException
     */
    public function getLimitsInfo($terminalCode, $password)
    {
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

        $this->limitsApi = new LimitsApi(Config::$cardpayApiUrl, $this->client, $this->config, $this->headerSelector);

        /** @var LimitInfoResponse $limitsInfoResponse */
        $limitsInfoResponse = $this->limitsApi->getLimitsInfo(microtime(true));

        return $limitsInfoResponse;
    }

    /**
     * @return LimitsApi
     */
    public function getLimitsApi()
    {
        return $this->limitsApi;
    }

    /**
     * @param LimitsApi $limitsApi
     */
    public function setLimitsApi($limitsApi)
    {
        $this->limitsApi = $limitsApi;
    }
}