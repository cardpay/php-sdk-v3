<?php

namespace Cardpay\test;

require_once(__DIR__ . "/Config.php");
require_once(__DIR__ . "/Constants.php");

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('UTC');
        Config::init();
    }
}