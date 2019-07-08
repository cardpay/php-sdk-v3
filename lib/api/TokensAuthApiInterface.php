<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\ApiException;
use Cardpay\model\ApiTokens;

interface TokensAuthApiInterface
{
    /**
     * @param string $terminalCode
     * @param string $password
     * @return ApiTokens
     */
    public function obtainApiTokens($terminalCode, $password);

    /**
     * @param string $terminalCode
     * @return bool
     * @throws ApiException
     */
    public function deleteTempApiTokenFile($terminalCode);
}