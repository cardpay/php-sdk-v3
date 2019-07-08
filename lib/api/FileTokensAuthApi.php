<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\model\ApiTokens;

class FileTokensAuthApi implements TokensAuthApiInterface
{
    const API_TOKENS_TMP_FILENAME_PREFIX = 'cardpay_apiv3_tokens';
    const API_TOKEN_MIN_VALIDITY = 10000;

    private $terminalCode;
    private $password;

    private $apiTokensTempFilePrefix;
    private $apiTokensTempFilepath;

    /**
     * FileTokensAuthApi constructor.
     */
    public function __construct()
    {
        $configuration = new Configuration();
        $tempFolderPath = $configuration->getTempFolderPath();

        $this->apiTokensTempFilePrefix = $tempFolderPath . DIRECTORY_SEPARATOR . self::API_TOKENS_TMP_FILENAME_PREFIX . '_';
    }

    /**
     * @param string $terminalCode
     * @param string $password
     * @return ApiTokens
     * @throws ApiException
     */
    public function obtainApiTokens($terminalCode, $password)
    {
        if (empty($terminalCode) || empty($password)) {
            throw new ApiException('Invalid API credentials');
        }

        $this->terminalCode = $terminalCode;
        $this->password = $password;

        $this->apiTokensTempFilepath = $this->getTempFilepath($terminalCode);

        if (false === file_exists($this->apiTokensTempFilepath)) {
            return $this->obtainTokensByPassword();
        }

        /** @var ApiTokens $apiTokens */
        $apiTokens = $this->readTokensFromTempFile();

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
    private function obtainTokensByPassword()
    {
        $authApi = new AuthApi();

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('password', $this->password, null, $this->terminalCode);
        $this->saveTokensToTempFile($apiTokens);

        return $apiTokens;
    }

    /**
     * @param string $refreshToken
     * @return ApiTokens
     * @throws ApiException
     */
    private function obtainTokensByRefreshToken($refreshToken)
    {
        $authApi = new AuthApi();

        /** @var ApiTokens $apiTokens */
        $apiTokens = $authApi->obtainTokens('refresh_token', null, $refreshToken, null);
        $this->saveTokensToTempFile($apiTokens);

        return $apiTokens;
    }

    /**
     * @return ApiTokens|mixed
     * @throws ApiException
     */
    private function readTokensFromTempFile()
    {
        $apiTokensFileContents = file_get_contents($this->apiTokensTempFilepath);
        if (false === $apiTokensFileContents) {
            throw new ApiException('Unable to read API tokens from temporary file');
        }

        if (empty($apiTokensFileContents)) {
            $apiTokens = $this->obtainTokensByPassword();
            $this->saveTokensToTempFile($apiTokens);
        } else {
            $apiTokens = unserialize($apiTokensFileContents);
            if (false === $apiTokens) {
                throw new ApiException('Unable to unserialize API tokens');
            }
            if (false === ($apiTokens instanceof ApiTokens)) {
                throw new ApiException('Invalid temporary API tokens file');
            }
        }

        return $apiTokens;
    }

    /**
     * @param ApiTokens $apiTokens
     * @return bool
     * @throws ApiException
     */
    private function saveTokensToTempFile(ApiTokens $apiTokens)
    {
        $currentTimeMilliseconds = $this->getCurrentTimeMilliseconds();

        $accessTokenExpiresIn = $apiTokens->getExpiresIn();
        $apiTokens->setExpiresIn($accessTokenExpiresIn * 1000 + $currentTimeMilliseconds);

        $refreshTokenExpiresIn = $apiTokens->getRefreshExpiresIn();
        $apiTokens->setRefreshExpiresIn($refreshTokenExpiresIn * 1000 + $currentTimeMilliseconds);

        /** @var bool $areTokensSaved */
        $areTokensSaved = $this->writeTokensToTempFile($apiTokens);

        return $areTokensSaved;
    }

    /**
     * @param ApiTokens $apiTokens
     * @return bool
     * @throws ApiException
     */
    public function writeTokensToTempFile(ApiTokens $apiTokens)
    {
        $apiTokensSerialized = serialize($apiTokens);

        $isFileWritten = file_put_contents($this->apiTokensTempFilepath, $apiTokensSerialized);
        if (false === $isFileWritten) {
            throw new ApiException('Unable to write API tokens to temporary file');
        }

        return true;
    }

    private function isTokenExpired($expiresAt)
    {
        $currentTimeMilliseconds = $this->getCurrentTimeMilliseconds();

        return $expiresAt - $currentTimeMilliseconds < self::API_TOKEN_MIN_VALIDITY;
    }

    private function getCurrentTimeMilliseconds()
    {
        return round(microtime(true) * 1000);
    }

    /**
     * @param string $terminalCode
     * @return bool
     * @throws ApiException
     */
    public function deleteTempApiTokenFile($terminalCode)
    {
        if (empty($terminalCode)) {
            return false;
        }

        $this->apiTokensTempFilepath = $this->getTempFilepath($terminalCode);
        if (false === file_exists($this->apiTokensTempFilepath)) {
            return false;
        }

        /** @var bool $isTempFileDeleted */
        $isTempFileDeleted = unlink($this->apiTokensTempFilepath);
        if (false === $isTempFileDeleted) {
            throw new ApiException("Unable to delete temporary API tokens file");
        }

        return true;
    }

    private function getTempFilepath($terminalCode)
    {
        return $this->apiTokensTempFilePrefix . $terminalCode;
    }
}