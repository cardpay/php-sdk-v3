<?php

namespace Cardpay\test\auth;

use Cardpay\api\AuthApiClient;
use Cardpay\api\FileTokensStorageApi;
use Cardpay\ApiException;
use Cardpay\test\BaseTestCase;
use Cardpay\test\Config;

class AuthTest extends BaseTestCase
{
    /**
     * @throws ApiException
     */
    public function testAuthTokens()
    {
        $fileTokensStorageApi = new FileTokensStorageApi(Config::$paymentpageTerminalCode);
        $authApiClient = new AuthApiClient(Config::$paymentpageTerminalCode, Config::$paymentpagePassword, $fileTokensStorageApi);
        $apiTokens = $authApiClient->obtainApiTokens();

        $accessToken = $apiTokens->getAccessToken();
        $accessTokenExpiresIn = $apiTokens->getExpiresIn();

        $refreshToken = $apiTokens->getRefreshToken();
        $refreshTokenExpiresIn = $apiTokens->getRefreshExpiresIn();

        $tokenType = $apiTokens->getTokenType();

        self::assertNotEmpty($accessToken);
        self::assertNotEmpty($accessTokenExpiresIn);
        self::assertNotEmpty($refreshToken);
        self::assertNotEmpty($refreshTokenExpiresIn);
        self::assertNotEmpty($tokenType);
    }
}