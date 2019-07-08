<?php

namespace Cardpay\test\auth;

use Cardpay\api\FileTokensAuthApi;
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
        $fileTokensAuthApi = new FileTokensAuthApi();
        $apiTokens = $fileTokensAuthApi->obtainApiTokens(Config::$paymentpageTerminalCode, Config::$paymentpagePassword);

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