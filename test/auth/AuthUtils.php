<?php

namespace Cardpay\test\auth;

use Cardpay\api\AuthApi;
use Cardpay\ApiException;
use Cardpay\Configuration;

class AuthUtils
{
    /**
     * @param string $terminalCode
     * @param string $password
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

        $configuration = new Configuration();
        $configuration->setApiKeyPrefix('Authorization', $tokenType)
            ->setApiKey('Authorization', $accessToken);

        return $configuration;
    }
}