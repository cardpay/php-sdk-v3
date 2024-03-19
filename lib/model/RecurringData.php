<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class RecurringData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RecurringData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'begin' => 'bool',
        'contract_number' => 'string',
        'initial_amount' => 'float',
        'plan' => '\Cardpay\model\Plan',
        'subscription_start' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'begin' => null,
        'contract_number' => null,
        'initial_amount' => null,
        'plan' => null,
        'subscription_start' => null,
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
        'begin' => 'begin',
        'contract_number' => 'contract_number',
        'initial_amount' => 'initial_amount',
        'plan' => 'plan',
        'subscription_start' => 'subscription_start',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'begin' => 'setBegin',
        'contract_number' => 'setContractNumber',
        'initial_amount' => 'setInitialAmount',
        'plan' => 'setPlan',
        'subscription_start' => 'setSubscriptionStart',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'begin' => 'getBegin',
        'contract_number' => 'getContractNumber',
        'initial_amount' => 'getInitialAmount',
        'plan' => 'getPlan',
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
        $this->container['begin'] = isset($data['begin']) ? $data['begin'] : null;
        $this->container['contract_number'] = isset($data['contract_number']) ? $data['contract_number'] : null;
        $this->container['initial_amount'] = isset($data['initial_amount']) ? $data['initial_amount'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
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

        if (!is_null($this->container['contract_number']) && (mb_strlen($this->container['contract_number']) > 20)) {
            $invalidProperties[] = "invalid value for 'contract_number', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['contract_number']) && (mb_strlen($this->container['contract_number']) < 0)) {
            $invalidProperties[] = "invalid value for 'contract_number', the character length must be bigger than or equal to 0.";
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
     * Gets begin
     *
     * @return bool
     */
    public function getBegin()
    {
        return $this->container['begin'];
    }

    /**
     * Sets begin
     *
     * @param bool $begin Is acceptable only for One-click type
     *
     * @return $this
     */
    public function setBegin($begin)
    {
        $this->container['begin'] = $begin;

        return $this;
    }

    /**
     * Gets contract_number
     *
     * @return string
     */
    public function getContractNumber()
    {
        return $this->container['contract_number'];
    }

    /**
     * Sets contract_number
     *
     * @param string $contract_number Contract number between customer and merchant. Required for Mexican merchants
     *
     * @return $this
     */
    public function setContractNumber($contract_number)
    {
        if (!is_null($contract_number) && (mb_strlen($contract_number) > 20)) {
            throw new \InvalidArgumentException('invalid length for $contract_number when calling RecurringData., must be smaller than or equal to 20.');
        }
        if (!is_null($contract_number) && (mb_strlen($contract_number) < 0)) {
            throw new \InvalidArgumentException('invalid length for $contract_number when calling RecurringData., must be bigger than or equal to 0.');
        }

        $this->container['contract_number'] = $contract_number;

        return $this;
    }

    /**
     * Gets initial_amount
     *
     * @return float
     */
    public function getInitialAmount()
    {
        return $this->container['initial_amount'];
    }

    /**
     * Sets initial_amount
     *
     * @param float $initial_amount The amount of subscription initiated transaction in selected currency with dot as a decimal separator, must be less than 100 millions
     *
     * @return $this
     */
    public function setInitialAmount($initial_amount)
    {
        $this->container['initial_amount'] = $initial_amount;

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
     * Gets subscription_start
     *
     * @return string
     */
    public function getSubscriptionStart()
    {
        return $this->container['subscription_start'];
    }

    /**
     * Sets subscription_start
     *
     * @param string $subscription_start The time in 'yyyy-MM-dd' format when subscription will actually become activated (grace period).Leave it empty to activate subscription at once without any grace period applied.
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
     * @param string $type Scheduled payment type attribute. Supported values are: `SM` - value for scheduled by merchant case `SA` - value for scheduled by acquirer case The default value is SA
     *
     * @return $this
     */
    public function setType($type)
    {
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

