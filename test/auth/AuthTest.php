<?php

namespace Cardpay\test\auth;

use Cardpay\api\AuthApi;
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
        $authApi = new AuthApi();
        $apiTokens = $authApi->obtainTokens('password', Config::$paymentpagePassword, null, Config::$paymentpageTerminalCode);

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