<?php

namespace Cardpay\test\auth;

use Cardpay\api\AuthApiClient;
use Cardpay\api\FileTokensStorageApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\model\ApiTokens;
use Cardpay\test\Config;

class AuthUtils
{
    /**
     * @param string $terminalCode
     * @param string $password
     * @return Configuration
     * @throws ApiException
     */
    public function getConfiguration($terminalCode, $password)
    {
        $fileTokensStorageApi = new FileTokensStorageApi(Config::$cardpayApiUrl, $terminalCode);
        $authApiClient = new AuthApiClient(Config::$cardpayApiUrl, $terminalCode, $password, $fileTokensStorageApi);

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApiClient->obtainApiTokens();

        $accessToken = $apiTokens->getAccessToken();
        $tokenType = $apiTokens->getTokenType();

        $configuration = new Configuration(Config::$cardpayApiUrl);
        $configuration->setApiKeyPrefix('Authorization', $tokenType)
            ->setApiKey('Authorization', $accessToken);

        return $configuration;
    }
}