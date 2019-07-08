<?php

namespace Cardpay\test;

use Cardpay\ApiException;
use Cardpay\api\FileTokensAuthApi;
use PHPUnit_Framework_BaseTestListener;
use PHPUnit_Framework_TestSuite;

class TestSuiteListener extends PHPUnit_Framework_BaseTestListener
{
    private $terminalCodes;

    public function __construct()
    {
        $this->terminalCodes = [
            Config::$paymentpageTerminalCode,
            Config::$gatewayTerminalCode,
            Config::$gatewayPostponedTerminalCode
        ];
    }

    /**
     * @param PHPUnit_Framework_TestSuite $suite
     * @throws ApiException
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        parent::endTestSuite($suite);

        if (__DIR__ == $suite->getName()) {
            $fileTokensAuthApi = new FileTokensAuthApi();

            foreach ($this->terminalCodes as $terminalCode) {
                $fileTokensAuthApi->deleteTempApiTokenFile($terminalCode);
            }
        }
    }
}