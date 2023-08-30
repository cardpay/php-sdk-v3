<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\ApiException;
use Cardpay\model\ApiTokens;

class AuthApiClient
{
    const API_TOKEN_MIN_VALIDITY = 10000;
    const MILLISECONDS_IN_ONE_SECOND = 1000;

    private $host;

    private $terminalCode;
    private $password;

    /** @var TokensStorageApi */
    private $tokensStorageApi;

    /**
     * AuthApiClient constructor.
     * @param $host
     * @param $terminalCode
     * @param $password
     * @param $tokensStorageApi
     * @throws ApiException
     */
    public function __construct($host, $terminalCode, $password, $tokensStorageApi)
    {
        $this->validateInputParams($terminalCode, $password, $tokensStorageApi);

        $this->host = $host;
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

        // if refresh token is expired
        if ($this->isTokenExpired($apiTokens->getRefreshExpiresIn())) {
            return $this->obtainTokensByPassword();
        }

        // if access token is expired
        if ($this->isTokenExpired($apiTokens->getExpiresIn())) {
            $refreshToken = $apiTokens->getRefreshToken();
            return $this->obtainTokensByRefreshToken($refreshToken);
        }

        return $apiTokens;
    }

    /**
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainTokensByPassword()
    {
        $authApi = new AuthApi($this->host);

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('password', $this->password, null, $this->terminalCode);
        $this->saveApiTokens($apiTokens);

        return $apiTokens;
    }

    /**
     * @param string $refreshToken
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainTokensByRefreshToken($refreshToken)
    {
        $authApi = new AuthApi($this->host);

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('refresh_token', null, $refreshToken, null);
        $this->saveApiTokens($apiTokens);

        return $apiTokens;
    }

    /**
     * @param ApiTokens $apiTokens
     */
    private function saveApiTokens($apiTokens)
    {
        $currentTimeMilliseconds = $this->getCurrentTimeMilliseconds();

        $accessTokenExpiresIn = $apiTokens->getExpiresIn();
        $apiTokens->setExpiresIn($accessTokenExpiresIn * self::MILLISECONDS_IN_ONE_SECOND + $currentTimeMilliseconds);

        $refreshTokenExpiresIn = $apiTokens->getRefreshExpiresIn();
        $apiTokens->setRefreshExpiresIn($refreshTokenExpiresIn * self::MILLISECONDS_IN_ONE_SECOND + $currentTimeMilliseconds);

        $this->tokensStorageApi->saveApiTokens($apiTokens);
    }

    /**
     * @param $expiresAt
     * @return bool
     */
    private function isTokenExpired($expiresAt)
    {
        $currentTimeMilliseconds = $this->getCurrentTimeMilliseconds();

        return $expiresAt - $currentTimeMilliseconds < self::API_TOKEN_MIN_VALIDITY;
    }

    private function getCurrentTimeMilliseconds()
    {
        return round(microtime(true) * self::MILLISECONDS_IN_ONE_SECOND);
    }
}
