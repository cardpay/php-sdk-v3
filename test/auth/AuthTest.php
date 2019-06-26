<?php

namespace Cardpay\auth;

require_once(__DIR__ . "/../Config.php");

use Cardpay\api\AuthApi;
use Cardpay\ApiException;
use Cardpay\test\Config;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testAuthTokens()
    {
        $authApi = new AuthApi();
        $apiTokens = $authApi->obtainTokens('password', Config::PAYMENTPAGE_PASSWORD, null, Config::PAYMENTPAGE_TERMINAL_CODE);

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