<?php

namespace Cardpay\test\recurring\scheduled;

use Cardpay\api\RecurringsApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\HeaderSelector;
use Cardpay\model\RecurringPlanRequest;
use Cardpay\model\RecurringPlanRequestPlanData;
use Cardpay\model\RecurringPlanResponse;
use Cardpay\model\Request;
use Cardpay\test\auth\AuthUtils;
use Cardpay\test\Config;
use Cardpay\test\Constants;
use GuzzleHttp\Client;

class RecurringPlanUtils
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
     * @param string $terminalCode
     * @param string $password
     * @param int $retries
     * @return RecurringPlanResponse
     * @throws ApiException
     */
    public function createPlan($terminalCode, $password, $retries = 0)
    {
        $planeName = substr(sha1(rand()), 0, 20);
        $period = RecurringPlanRequestPlanData::PERIOD_WEEK;
        $interval = rand(1, 52);
        $orderAmount = rand(Constants::MIN_PAYMENT_AMOUNT, Constants::MAX_PAYMENT_AMOUNT);
        $orderCurrency = Config::$terminalCurrency;

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

        $planData = new RecurringPlanRequestPlanData([
            'name' => $planeName,
            'period' => $period,
            'interval' => $interval,
            'currency' => $orderCurrency,
            'amount' => $orderAmount
        ]);
        if ($retries > 0) {
            $planData['retries'] = $retries;
        }

        $recurringPlanRequest = new RecurringPlanRequest([
            'request' => $request,
            'plan_data' => $planData
        ]);

        if (null == $this->recurringsApi) {
            $this->recurringsApi = new RecurringsApi($this->client, $this->config, $this->headerSelector);
        }
        $recurringPlanResponse = $this->recurringsApi->createPlan($recurringPlanRequest);

        return $recurringPlanResponse;
    }

    /**
     * @return RecurringsApi
     */
    public function getRecurringsApi()
    {
        return $this->recurringsApi;
    }
}