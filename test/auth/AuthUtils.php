<?php

namespace Cardpay\auth;

use Cardpay\api\AuthApi;
use Cardpay\ApiException;
use Cardpay\Configuration;

class AuthUtils
{
    /**
     * @param $terminalCode
     * @param $password
     * @return Configuration
     * @throws ApiException
     */
    public function getConfig($terminalCode, $password)
    {
        // get access token
        $authApi = new AuthApi();
        $apiTokens = $authApi->obtainTokens('password', $password, null, $terminalCode);
        $accessToken = $apiTokens->getAccessToken();
        $tokenType = $apiTokens->getTokenType();

        $config = new Configuration();
        $config->setApiKeyPrefix('Authorization', $tokenType)
            ->setApiKey('Authorization', $accessToken);

        return $config;
    }
}