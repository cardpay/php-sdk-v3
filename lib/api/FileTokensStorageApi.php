<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\ApiException;
use Cardpay\Configuration;
use Cardpay\model\ApiTokens;

class FileTokensStorageApi implements TokensStorageApi
{
    const API_TOKENS_TMP_FILENAME_PREFIX = 'cardpay_apiv3_tokens_';

    private $apiTokensTempFilepath;

    /**
     * FileTokensStorageApi constructor
     * @param $host
     * @param $terminalCode
     * @throws ApiException
     */
    public function __construct($host, $terminalCode)
    {
        $this->validateInputParams($terminalCode);

        $configuration = new Configuration($host);
        $tempFolderPath = $configuration->getTempFolderPath();

        $this->apiTokensTempFilepath = $tempFolderPath . DIRECTORY_SEPARATOR . self::API_TOKENS_TMP_FILENAME_PREFIX . $terminalCode;
    }

    /**
     * @param $terminalCode
     * @throws ApiException
     */
    private function validateInputParams($terminalCode)
    {
        if (empty($terminalCode)) {
            throw new ApiException('Empty terminal code');
        }
    }

    /**
     * @param ApiTokens $apiTokens
     * @return bool
     * @throws ApiException
     */
    public function saveApiTokens(ApiTokens $apiTokens)
    {
        $serializedApiTokens = serialize($apiTokens);

        /** @var bool $areTokensSaved */
        $areTokensSaved = file_put_contents($this->apiTokensTempFilepath, $serializedApiTokens);
        if (false === $areTokensSaved) {
            throw new ApiException('Unable to write API tokens to temporary file');
        }

        return true;
    }

    /**
     * @return bool
     */
    public function areApiTokensSaved()
    {
        return file_exists($this->apiTokensTempFilepath);
    }

    /**
     * @return ApiTokens|mixed
     * @throws ApiException
     */
    public function readApiTokens()
    {
        $apiTokensFileContents = file_get_contents($this->apiTokensTempFilepath);
        if (false === $apiTokensFileContents) {
            throw new ApiException('Unable to read API tokens from temporary file');
        }
        if (empty($apiTokensFileContents)) {
            throw new ApiException('Empty API tokens file');
        }

        $apiTokens = unserialize($apiTokensFileContents);
        if (false === $apiTokens) {
            throw new ApiException('Unable to unserialize API tokens');
        }
        if (false === ($apiTokens instanceof ApiTokens)) {
            throw new ApiException('Invalid temporary API tokens file');
        }

        return $apiTokens;
    }

    /**
     * @return bool
     * @throws ApiException
     */
    public function deleteApiTokens()
    {
        if (false === $this->areApiTokensSaved()) {
            return false;
        }

        /** @var bool $isTempFileDeleted */
        $isTempFileDeleted = unlink($this->apiTokensTempFilepath);
        if (false === $isTempFileDeleted) {
            throw new ApiException("Unable to delete temporary API tokens file");
        }

        return true;
    }
}