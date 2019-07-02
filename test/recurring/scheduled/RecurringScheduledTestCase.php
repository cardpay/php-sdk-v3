<?php

namespace Cardpay\recurring\scheduled;

require_once(__DIR__ . "/../../Config.php");
require_once(__DIR__ . "/../../Constants.php");

use Cardpay\ApiException;
use Cardpay\model\SubscriptionUpdateRequestSubscriptionData;
use Cardpay\model\UpdatedSubscriptionData;
use PHPUnit\Framework\TestCase;

class RecurringScheduledTestCase extends TestCase
{
    /** @var RecurringPlanUtils */
    protected $recurringPlanUtils;

    /** @var RecurringScheduledUtils */
    protected $recurringScheduledUtils;

    protected $subscriptionId;

    protected $terminalCode;

    protected $password;

    /**
     * RecurringScheduledTest constructor.
     * @param $terminalCode
     * @param $password
     * @throws ApiException
     */
    public function __construct($terminalCode, $password)
    {
        parent::__construct();

        $this->terminalCode = $terminalCode;
        $this->password = $password;

        $this->recurringPlanUtils = new RecurringPlanUtils();
        $this->recurringScheduledUtils = new RecurringScheduledUtils($terminalCode, $password);
    }

    /**
     * @throws ApiException
     */
    public function tearDown()
    {
        parent::tearDown();

        if (empty($this->subscriptionId)) {
            return;
        }

        // cancel testing subscription
        $subscriptionUpdateResponse = $this->recurringScheduledUtils
            ->changeSubscriptionStatus($this->subscriptionId, SubscriptionUpdateRequestSubscriptionData::STATUS_TO_CANCELLED);

        /** @var UpdatedSubscriptionData $updatedSubscriptionData */
        $updatedSubscriptionData = $subscriptionUpdateResponse->getSubscriptionData();

        self::assertNotNull($updatedSubscriptionData);
        self::assertTrue($updatedSubscriptionData->getIsExecuted());
        self::assertEquals($this->subscriptionId, $updatedSubscriptionData->getId());
        self::assertEquals(UpdatedSubscriptionData::STATUS_CANCELLED, $updatedSubscriptionData->getStatus());
    }
}