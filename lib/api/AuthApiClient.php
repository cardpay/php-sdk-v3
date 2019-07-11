<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\ApiException;
use Cardpay\model\ApiTokens;

class AuthApiClient
{
    const API_TOKEN_MIN_VALIDITY = 10000;

    private $terminalCode;
    private $password;

    /** @var TokensStorageApi */
    private $tokensStorageApi;

    /**
     * AuthApiClient constructor.
     * @param $terminalCode
     * @param $password
     * @param $tokensStorageApi
     * @throws ApiException
     */
    public function __construct($terminalCode, $password, $tokensStorageApi)
    {
        $this->validateInputParams($terminalCode, $password, $tokensStorageApi);

        $this->terminalCode = $terminalCode;
        $this->password = $password;
        $this->tokensStorageApi = $tokensStorageApi;
    }

    /**
     * @param $terminalCode
     * @param $password
     * @param $tokensStorageApi
     * @throws ApiException
     */
    private function validateInputParams($terminalCode, $password, $tokensStorageApi)
    {
        if (empty($terminalCode)) {
            throw new ApiException('Empty terminal code');
        }
        if (empty($password)) {
            throw new ApiException('Empty password');
        }
        if (null == $tokensStorageApi) {
            throw new ApiException('TokensStorageApi is not set');
        }
    }

    /**
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainApiTokens()
    {
        if (false === $this->tokensStorageApi->areApiTokensSaved()) {
            return $this->obtainTokensByPassword();
        }

        /** @var ApiTokens $apiTokens */
        $apiTokens = $this->tokensStorageApi->readApiTokens();

        // if access token is expired
        if ($this->isTokenExpired($apiTokens->getExpiresIn())) {
            $refreshToken = $apiTokens->getRefreshToken();
            return $this->obtainTokensByRefreshToken($refreshToken);
        }

        // if refresh token is expired
        if ($this->isTokenExpired($apiTokens->getRefreshExpiresIn())) {
            return $this->obtainTokensByPassword();
        }

        return $apiTokens;
    }

    /**
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainTokensByPassword()
    {
        $authApi = new AuthApi();

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('password', $this->password, null, $this->terminalCode);
        $this->tokensStorageApi->saveApiTokens($apiTokens);

        return $apiTokens;
    }

    /**
     * @param string $refreshToken
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainTokensByRefreshToken($refreshToken)
    {
        $authApi = new AuthApi();

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('refresh_token', null, $refreshToken, null);
        $this->tokensStorageApi->saveApiTokens($apiTokens);

        return $apiTokens;
    }

    private function isTokenExpired($expiresAt)
    {
        $currentTimeMilliseconds = round(microtime(true) * 1000);

        return $expiresAt - $currentTimeMilliseconds < self::API_TOKEN_MIN_VALIDITY;
    }
}