<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class RecurringRequestRecurringData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RecurringRequestRecurringData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'currency' => 'string',
        'dynamic_descriptor' => 'string',
        'filing' => '\Cardpay\model\RecurringRequestFiling',
        'generate_token' => 'bool',
        'initiator' => 'string',
        'interval' => 'int',
        'note' => 'string',
        'payments' => 'int',
        'period' => 'string',
        'plan' => '\Cardpay\model\Plan',
        'preauth' => 'bool',
        'retries' => 'int',
        'subscription_start' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'currency' => null,
        'dynamic_descriptor' => null,
        'filing' => null,
        'generate_token' => null,
        'initiator' => null,
        'interval' => 'int32',
        'note' => null,
        'payments' => 'int32',
        'period' => null,
        'plan' => null,
        'preauth' => null,
        'retries' => 'int32',
        'subscription_start' => 'date-time'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'amount' => 'amount',
        'currency' => 'currency',
        'dynamic_descriptor' => 'dynamic_descriptor',
        'filing' => 'filing',
        'generate_token' => 'generate_token',
        'initiator' => 'initiator',
        'interval' => 'interval',
        'note' => 'note',
        'payments' => 'payments',
        'period' => 'period',
        'plan' => 'plan',
        'preauth' => 'preauth',
        'retries' => 'retries',
        'subscription_start' => 'subscription_start'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'currency' => 'setCurrency',
        'dynamic_descriptor' => 'setDynamicDescriptor',
        'filing' => 'setFiling',
        'generate_token' => 'setGenerateToken',
        'initiator' => 'setInitiator',
        'interval' => 'setInterval',
        'note' => 'setNote',
        'payments' => 'setPayments',
        'period' => 'setPeriod',
        'plan' => 'setPlan',
        'preauth' => 'setPreauth',
        'retries' => 'setRetries',
        'subscription_start' => 'setSubscriptionStart'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'currency' => 'getCurrency',
        'dynamic_descriptor' => 'getDynamicDescriptor',
        'filing' => 'getFiling',
        'generate_token' => 'getGenerateToken',
        'initiator' => 'getInitiator',
        'interval' => 'getInterval',
        'note' => 'getNote',
        'payments' => 'getPayments',
        'period' => 'getPeriod',
        'plan' => 'getPlan',
        'preauth' => 'getPreauth',
        'retries' => 'getRetries',
        'subscription_start' => 'getSubscriptionStart'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const PERIOD_MINUTE = 'minute';
    const PERIOD_DAY = 'day';
    const PERIOD_WEEK = 'week';
    const PERIOD_MONTH = 'month';
    const PERIOD_YEAR = 'year';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPeriodAllowableValues()
    {
        return [
            self::PERIOD_MINUTE,
            self::PERIOD_DAY,
            self::PERIOD_WEEK,
            self::PERIOD_MONTH,
            self::PERIOD_YEAR,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['dynamic_descriptor'] = isset($data['dynamic_descriptor']) ? $data['dynamic_descriptor'] : null;
        $this->container['filing'] = isset($data['filing']) ? $data['filing'] : null;
        $this->container['generate_token'] = isset($data['generate_token']) ? $data['generate_token'] : null;
        $this->container['initiator'] = isset($data['initiator']) ? $data['initiator'] : null;
        $this->container['interval'] = isset($data['interval']) ? $data['interval'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['payments'] = isset($data['payments']) ? $data['payments'] : null;
        $this->container['period'] = isset($data['period']) ? $data['period'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['preauth'] = isset($data['preauth']) ? $data['preauth'] : null;
        $this->container['retries'] = isset($data['retries']) ? $data['retries'] : null;
        $this->container['subscription_start'] = isset($data['subscription_start']) ? $data['subscription_start'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) > 25)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) < 0)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['initiator']) && !preg_match("/mit|cit/", $this->container['initiator'])) {
            $invalidProperties[] = "invalid value for 'initiator', must be conform to the pattern /mit|cit/.";
        }

        if (!is_null($this->container['interval']) && ($this->container['interval'] < 1)) {
            $invalidProperties[] = "invalid value for 'interval', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) > 100)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) < 0)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['payments']) && ($this->container['payments'] > 200)) {
            $invalidProperties[] = "invalid value for 'payments', must be smaller than or equal to 200.";
        }

        if (!is_null($this->container['payments']) && ($this->container['payments'] < 2)) {
            $invalidProperties[] = "invalid value for 'payments', must be bigger than or equal to 2.";
        }

        $allowedValues = $this->getPeriodAllowableValues();
        if (!is_null($this->container['period']) && !in_array($this->container['period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'period', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['retries']) && ($this->container['retries'] > 15)) {
            $invalidProperties[] = "invalid value for 'retries', must be smaller than or equal to 15.";
        }

        if (!is_null($this->container['retries']) && ($this->container['retries'] < 1)) {
            $invalidProperties[] = "invalid value for 'retries', must be bigger than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount The total transaction amount in selected currency with dot as a decimal separator, must be less than 100 millions
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets dynamic_descriptor
     *
     * @return string
     */
    public function getDynamicDescriptor()
    {
        return $this->container['dynamic_descriptor'];
    }

    /**
     * Sets dynamic_descriptor
     *
     * @param string $dynamic_descriptor Short description of the service or product, must be enabled by CardPay manager to be used.
     *
     * @return $this
     */
    public function setDynamicDescriptor($dynamic_descriptor)
    {
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) > 25)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling RecurringRequestRecurringData., must be smaller than or equal to 25.');
        }
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) < 0)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling RecurringRequestRecurringData., must be bigger than or equal to 0.');
        }

        $this->container['dynamic_descriptor'] = $dynamic_descriptor;

        return $this;
    }

    /**
     * Gets filing
     *
     * @return \Cardpay\model\RecurringRequestFiling
     */
    public function getFiling()
    {
        return $this->container['filing'];
    }

    /**
     * Sets filing
     *
     * @param \Cardpay\model\RecurringRequestFiling $filing Filing data, should be send in all recurring requests besides first recurring request First recurring request should be send without filing attribute
     *
     * @return $this
     */
    public function setFiling($filing)
    {
        $this->container['filing'] = $filing;

        return $this;
    }

    /**
     * Gets generate_token
     *
     * @return bool
     */
    public function getGenerateToken()
    {
        return $this->container['generate_token'];
    }

    /**
     * Sets generate_token
     *
     * @param bool $generate_token This attribute can be received only in first recurring request. In all requests with recurring_id card.token can't be generated. If set to 'true', card token will be generated and returned in GET response. Will be generated only for successful transactions (not for declined).
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->container['generate_token'] = $generate_token;

        return $this;
    }

    /**
     * Gets initiator
     *
     * @return string
     */
    public function getInitiator()
    {
        return $this->container['initiator'];
    }

    /**
     * Sets initiator
     *
     * @param string $initiator Can be only 2 values: `mit` (merchant initiated transaction), `cit` (cardholder initiated transaction)
     *
     * @return $this
     */
    public function setInitiator($initiator)
    {

        if (!is_null($initiator) && (!preg_match("/mit|cit/", $initiator))) {
            throw new \InvalidArgumentException("invalid value for $initiator when calling RecurringRequestRecurringData., must conform to the pattern /mit|cit/.");
        }

        $this->container['initiator'] = $initiator;

        return $this;
    }

    /**
     * Gets interval
     *
     * @return int
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     *
     * @param int $interval Frequency interval of period, can be 1-365 depending on selected period value. Minimum value of period + interval can be 7 days / 1 week. Maximum value of period + interval plan can be 365 days / 52 weeks / 12 months / 1 year. 1-60 minutes - for **sandbox environment** and testing purpose only.
     *
     * @return $this
     */
    public function setInterval($interval)
    {

        if (!is_null($interval) && ($interval < 1)) {
            throw new \InvalidArgumentException('invalid value for $interval when calling RecurringRequestRecurringData., must be bigger than or equal to 1.');
        }

        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->container['note'];
    }

    /**
     * Sets note
     *
     * @param string $note Note about the recurring that will not be displayed to customer.
     *
     * @return $this
     */
    public function setNote($note)
    {
        if (!is_null($note) && (mb_strlen($note) > 100)) {
            throw new \InvalidArgumentException('invalid length for $note when calling RecurringRequestRecurringData., must be smaller than or equal to 100.');
        }
        if (!is_null($note) && (mb_strlen($note) < 0)) {
            throw new \InvalidArgumentException('invalid length for $note when calling RecurringRequestRecurringData., must be bigger than or equal to 0.');
        }

        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets payments
     *
     * @return int
     */
    public function getPayments()
    {
        return $this->container['payments'];
    }

    /**
     * Sets payments
     *
     * @param int $payments Number of total payments to be charged per defined interval, can be 2-200.
     *
     * @return $this
     */
    public function setPayments($payments)
    {

        if (!is_null($payments) && ($payments > 200)) {
            throw new \InvalidArgumentException('invalid value for $payments when calling RecurringRequestRecurringData., must be smaller than or equal to 200.');
        }
        if (!is_null($payments) && ($payments < 2)) {
            throw new \InvalidArgumentException('invalid value for $payments when calling RecurringRequestRecurringData., must be bigger than or equal to 2.');
        }

        $this->container['payments'] = $payments;

        return $this;
    }

    /**
     * Gets period
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param string $period Initial period of recurring, can be `day`, `week`, `month`, `year`.  `minute` - for **sandbox environment** and testing purpose only.
     *
     * @return $this
     */
    public function setPeriod($period)
    {
        $allowedValues = $this->getPeriodAllowableValues();
        if (!is_null($period) && !in_array($period, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'period', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['period'] = $period;

        return $this;
    }

    /**
     * Gets plan
     *
     * @return \Cardpay\model\Plan
     */
    public function getPlan()
    {
        return $this->container['plan'];
    }

    /**
     * Sets plan
     *
     * @param \Cardpay\model\Plan $plan Plan data
     *
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->container['plan'] = $plan;

        return $this;
    }

    /**
     * Gets preauth
     *
     * @return bool
     */
    public function getPreauth()
    {
        return $this->container['preauth'];
    }

    /**
     * Sets preauth
     *
     * @param bool $preauth This parameter is allowed to be used only for first recurring payment. If set to `true`, the amount will not be captured but only blocked *(for BANKCARD payment method only)*.
     *
     * @return $this
     */
    public function setPreauth($preauth)
    {
        $this->container['preauth'] = $preauth;

        return $this;
    }

    /**
     * Gets retries
     *
     * @return int
     */
    public function getRetries()
    {
        return $this->container['retries'];
    }

    /**
     * Sets retries
     *
     * @param int $retries Number of daily basis retry attempts in case of payment has not been captured successfully, from 1 to 15 attempts can be specified.
     *
     * @return $this
     */
    public function setRetries($retries)
    {

        if (!is_null($retries) && ($retries > 15)) {
            throw new \InvalidArgumentException('invalid value for $retries when calling RecurringRequestRecurringData., must be smaller than or equal to 15.');
        }
        if (!is_null($retries) && ($retries < 1)) {
            throw new \InvalidArgumentException('invalid value for $retries when calling RecurringRequestRecurringData., must be bigger than or equal to 1.');
        }

        $this->container['retries'] = $retries;

        return $this;
    }

    /**
     * Gets subscription_start
     *
     * @return \DateTime
     */
    public function getSubscriptionStart()
    {
        return $this->container['subscription_start'];
    }

    /**
     * Sets subscription_start
     *
     * @param \DateTime $subscription_start The date in yyyy-MM-dd format when subscription will actually become activated (grace period). Auth request will be created but Customer will be charged only when subscription start date comes. Leave it empty or specify the current date to activate subscription at once without any grace period applied.
     *
     * @return $this
     */
    public function setSubscriptionStart($subscription_start)
    {
        $this->container['subscription_start'] = $subscription_start;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

