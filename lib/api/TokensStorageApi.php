<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\api;

use Cardpay\model\ApiTokens;

interface TokensStorageApi
{
    public function saveApiTokens(ApiTokens $apiTokens);

    public function areApiTokensSaved();

    public function readApiTokens();

    public function deleteApiTokens();
}