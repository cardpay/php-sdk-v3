<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class SubscriptionGetResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SubscriptionGetResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount_due' => 'float',
        'amount_total' => 'float',
        'created' => '\DateTime',
        'currency' => 'string',
        'customer' => '\Cardpay\model\SubscriptionCustomer',
        'description' => 'string',
        'id' => 'string',
        'interval' => 'int',
        'next_payment' => '\Cardpay\model\NextSubscriptionPayment',
        'payments_due' => 'int',
        'period' => 'string',
        'plan' => '\Cardpay\model\SubscriptionGetResponsePlan',
        'retries' => 'int',
        'status' => 'string',
        'status_reason' => 'string',
        'subscription_start' => '\DateTime',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount_due' => null,
        'amount_total' => null,
        'created' => 'date-time',
        'currency' => null,
        'customer' => null,
        'description' => null,
        'id' => null,
        'interval' => 'int32',
        'next_payment' => null,
        'payments_due' => 'int32',
        'period' => null,
        'plan' => null,
        'retries' => 'int32',
        'status' => null,
        'status_reason' => null,
        'subscription_start' => 'date-time',
        'type' => null
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
        'amount_due' => 'amount_due',
        'amount_total' => 'amount_total',
        'created' => 'created',
        'currency' => 'currency',
        'customer' => 'customer',
        'description' => 'description',
        'id' => 'id',
        'interval' => 'interval',
        'next_payment' => 'next_payment',
        'payments_due' => 'payments_due',
        'period' => 'period',
        'plan' => 'plan',
        'retries' => 'retries',
        'status' => 'status',
        'status_reason' => 'status_reason',
        'subscription_start' => 'subscription_start',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount_due' => 'setAmountDue',
        'amount_total' => 'setAmountTotal',
        'created' => 'setCreated',
        'currency' => 'setCurrency',
        'customer' => 'setCustomer',
        'description' => 'setDescription',
        'id' => 'setId',
        'interval' => 'setInterval',
        'next_payment' => 'setNextPayment',
        'payments_due' => 'setPaymentsDue',
        'period' => 'setPeriod',
        'plan' => 'setPlan',
        'retries' => 'setRetries',
        'status' => 'setStatus',
        'status_reason' => 'setStatusReason',
        'subscription_start' => 'setSubscriptionStart',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount_due' => 'getAmountDue',
        'amount_total' => 'getAmountTotal',
        'created' => 'getCreated',
        'currency' => 'getCurrency',
        'customer' => 'getCustomer',
        'description' => 'getDescription',
        'id' => 'getId',
        'interval' => 'getInterval',
        'next_payment' => 'getNextPayment',
        'payments_due' => 'getPaymentsDue',
        'period' => 'getPeriod',
        'plan' => 'getPlan',
        'retries' => 'getRetries',
        'status' => 'getStatus',
        'status_reason' => 'getStatusReason',
        'subscription_start' => 'getSubscriptionStart',
        'type' => 'getType'
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
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_PAST_DUE = 'PAST_DUE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CARD_EXPIRED = 'CARD_EXPIRED';
    const STATUS_ACTIVATION_FAILED = 'ACTIVATION_FAILED';
    const TYPE_ONECLICK = 'ONECLICK';
    const TYPE_SCHEDULED = 'SCHEDULED';
    const TYPE_INSTALLMENT = 'INSTALLMENT';
    

    
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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
            self::STATUS_CANCELLED,
            self::STATUS_PAST_DUE,
            self::STATUS_PENDING,
            self::STATUS_COMPLETED,
            self::STATUS_CARD_EXPIRED,
            self::STATUS_ACTIVATION_FAILED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ONECLICK,
            self::TYPE_SCHEDULED,
            self::TYPE_INSTALLMENT,
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
        $this->container['amount_due'] = isset($data['amount_due']) ? $data['amount_due'] : null;
        $this->container['amount_total'] = isset($data['amount_total']) ? $data['amount_total'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['interval'] = isset($data['interval']) ? $data['interval'] : null;
        $this->container['next_payment'] = isset($data['next_payment']) ? $data['next_payment'] : null;
        $this->container['payments_due'] = isset($data['payments_due']) ? $data['payments_due'] : null;
        $this->container['period'] = isset($data['period']) ? $data['period'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['retries'] = isset($data['retries']) ? $data['retries'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['status_reason'] = isset($data['status_reason']) ? $data['status_reason'] : null;
        $this->container['subscription_start'] = isset($data['subscription_start']) ? $data['subscription_start'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getPeriodAllowableValues();
        if (!is_null($this->container['period']) && !in_array($this->container['period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'period', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets amount_due
     *
     * @return float
     */
    public function getAmountDue()
    {
        return $this->container['amount_due'];
    }

    /**
     * Sets amount_due
     *
     * @param float $amount_due Amount of payments left to be captured
     *
     * @return $this
     */
    public function setAmountDue($amount_due)
    {
        $this->container['amount_due'] = $amount_due;

        return $this;
    }

    /**
     * Gets amount_total
     *
     * @return float
     */
    public function getAmountTotal()
    {
        return $this->container['amount_total'];
    }

    /**
     * Sets amount_total
     *
     * @param float $amount_total Total amount of subscription to be paid before completion
     *
     * @return $this
     */
    public function setAmountTotal($amount_total)
    {
        $this->container['amount_total'] = $amount_total;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime $created Creation time [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

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
     * Gets customer
     *
     * @return \Cardpay\model\SubscriptionCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\SubscriptionCustomer $customer Customer data
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Description of subscription
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id ID of subscription
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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
     * @param int $interval Interval of subscription
     *
     * @return $this
     */
    public function setInterval($interval)
    {
        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets next_payment
     *
     * @return \Cardpay\model\NextSubscriptionPayment
     */
    public function getNextPayment()
    {
        return $this->container['next_payment'];
    }

    /**
     * Sets next_payment
     *
     * @param \Cardpay\model\NextSubscriptionPayment $next_payment Next payment data
     *
     * @return $this
     */
    public function setNextPayment($next_payment)
    {
        $this->container['next_payment'] = $next_payment;

        return $this;
    }

    /**
     * Gets payments_due
     *
     * @return int
     */
    public function getPaymentsDue()
    {
        return $this->container['payments_due'];
    }

    /**
     * Sets payments_due
     *
     * @param int $payments_due Number of payments left to be captured
     *
     * @return $this
     */
    public function setPaymentsDue($payments_due)
    {
        $this->container['payments_due'] = $payments_due;

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
     * @param string $period Period of subscription
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
     * @return \Cardpay\model\SubscriptionGetResponsePlan
     */
    public function getPlan()
    {
        return $this->container['plan'];
    }

    /**
     * Sets plan
     *
     * @param \Cardpay\model\SubscriptionGetResponsePlan $plan Plan data
     *
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->container['plan'] = $plan;

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
     * @param int $retries Number of daily basis retry attempts in case of payment has not been captured successfully.
     *
     * @return $this
     */
    public function setRetries($retries)
    {
        $this->container['retries'] = $retries;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Status of subscription
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets status_reason
     *
     * @return string
     */
    public function getStatusReason()
    {
        return $this->container['status_reason'];
    }

    /**
     * Sets status_reason
     *
     * @param string $status_reason Reason of subscription cancellation that was made by CardPay
     *
     * @return $this
     */
    public function setStatusReason($status_reason)
    {
        $this->container['status_reason'] = $status_reason;

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
     * @param \DateTime $subscription_start The time in 'yyyy-MM-dd' format when subscription actually becomes activated (grace period)
     *
     * @return $this
     */
    public function setSubscriptionStart($subscription_start)
    {
        $this->container['subscription_start'] = $subscription_start;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Recurring payment type name; can be ONECLICK, SCHEDULED, INSTALLMENT
     *
     * @return $this
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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

