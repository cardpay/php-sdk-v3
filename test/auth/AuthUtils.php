<?php

namespace Cardpay\test\auth;

use Cardpay\api\AuthApiClient;
use Cardpay\api\FileTokensStorageApi;
use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\model\ApiTokens;

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
        $fileTokensStorageApi = new FileTokensStorageApi($terminalCode);
        $authApiClient = new AuthApiClient($terminalCode, $password, $fileTokensStorageApi);

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApiClient->obtainApiTokens();

        $accessToken = $apiTokens->getAccessToken();
        $tokenType = $apiTokens->getTokenType();

        $configuration = new Configuration();
        $configuration->setApiKeyPrefix('Authorization', $tokenType)
            ->setApiKey('Authorization', $accessToken);

        return $configuration;
    }
}