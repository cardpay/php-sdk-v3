<?php

namespace Cardpay\test\auth;

use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\model\ApiTokens;
use Cardpay\api\FileTokensAuthApi;

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
        $fileTokensAuthApi = new FileTokensAuthApi();

        /** @var ApiTokens $apiTokens */
        $apiTokens = $fileTokensAuthApi->obtainApiTokens($terminalCode, $password);

        $accessToken = $apiTokens->getAccessToken();
        $tokenType = $apiTokens->getTokenType();

        $configuration = new Configuration();
        $configuration->setApiKeyPrefix('Authorization', $tokenType)
            ->setApiKey('Authorization', $accessToken);

        return $configuration;
    }
}