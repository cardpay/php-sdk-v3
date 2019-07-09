<?php

namespace Cardpay\test;

use Cardpay\api\FileTokensAuthApi;
use Cardpay\ApiException;
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

        $isDirectoryName = (__DIR__ == substr($suite->getName(), 0, strlen(__DIR__)));
        $isSuiteName = ('PhpSdkCardpayApiV3TestSuite' == $suite->getName());

        if ($isDirectoryName || $isSuiteName) {
            $fileTokensAuthApi = new FileTokensAuthApi();

            foreach ($this->terminalCodes as $terminalCode) {
                $fileTokensAuthApi->deleteTempApiTokenFile($terminalCode);
            }
        }
    }
}