<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ScheduledData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ScheduledData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'contract_number' => 'string',
        'dynamic_descriptor' => 'string',
        'encrypted_data' => 'string',
        'generate_token' => 'bool',
        'initial_amount' => 'float',
        'initiator' => 'string',
        'note' => 'string',
        'plan' => '\Cardpay\model\Plan',
        'scheduled_type' => 'string',
        'subscription_start' => '\DateTime',
        'three_ds_challenge_indicator' => 'string',
        'trans_type' => 'string',
        'units' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'contract_number' => null,
        'dynamic_descriptor' => null,
        'encrypted_data' => null,
        'generate_token' => null,
        'initial_amount' => null,
        'initiator' => null,
        'note' => null,
        'plan' => null,
        'scheduled_type' => null,
        'subscription_start' => 'date-time',
        'three_ds_challenge_indicator' => null,
        'trans_type' => null,
        'units' => 'int32'
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
        'contract_number' => 'contract_number',
        'dynamic_descriptor' => 'dynamic_descriptor',
        'encrypted_data' => 'encrypted_data',
        'generate_token' => 'generate_token',
        'initial_amount' => 'initial_amount',
        'initiator' => 'initiator',
        'note' => 'note',
        'plan' => 'plan',
        'scheduled_type' => 'scheduled_type',
        'subscription_start' => 'subscription_start',
        'three_ds_challenge_indicator' => 'three_ds_challenge_indicator',
        'trans_type' => 'trans_type',
        'units' => 'units'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'contract_number' => 'setContractNumber',
        'dynamic_descriptor' => 'setDynamicDescriptor',
        'encrypted_data' => 'setEncryptedData',
        'generate_token' => 'setGenerateToken',
        'initial_amount' => 'setInitialAmount',
        'initiator' => 'setInitiator',
        'note' => 'setNote',
        'plan' => 'setPlan',
        'scheduled_type' => 'setScheduledType',
        'subscription_start' => 'setSubscriptionStart',
        'three_ds_challenge_indicator' => 'setThreeDsChallengeIndicator',
        'trans_type' => 'setTransType',
        'units' => 'setUnits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'contract_number' => 'getContractNumber',
        'dynamic_descriptor' => 'getDynamicDescriptor',
        'encrypted_data' => 'getEncryptedData',
        'generate_token' => 'getGenerateToken',
        'initial_amount' => 'getInitialAmount',
        'initiator' => 'getInitiator',
        'note' => 'getNote',
        'plan' => 'getPlan',
        'scheduled_type' => 'getScheduledType',
        'subscription_start' => 'getSubscriptionStart',
        'three_ds_challenge_indicator' => 'getThreeDsChallengeIndicator',
        'trans_type' => 'getTransType',
        'units' => 'getUnits'
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

    const TRANS_TYPE__01 = '01';
    const TRANS_TYPE__03 = '03';
    const TRANS_TYPE__10 = '10';
    const TRANS_TYPE__11 = '11';
    const TRANS_TYPE__28 = '28';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTransTypeAllowableValues()
    {
        return [
            self::TRANS_TYPE__01,
            self::TRANS_TYPE__03,
            self::TRANS_TYPE__10,
            self::TRANS_TYPE__11,
            self::TRANS_TYPE__28,
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
        $this->container['contract_number'] = isset($data['contract_number']) ? $data['contract_number'] : null;
        $this->container['dynamic_descriptor'] = isset($data['dynamic_descriptor']) ? $data['dynamic_descriptor'] : null;
        $this->container['encrypted_data'] = isset($data['encrypted_data']) ? $data['encrypted_data'] : null;
        $this->container['generate_token'] = isset($data['generate_token']) ? $data['generate_token'] : null;
        $this->container['initial_amount'] = isset($data['initial_amount']) ? $data['initial_amount'] : null;
        $this->container['initiator'] = isset($data['initiator']) ? $data['initiator'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['scheduled_type'] = isset($data['scheduled_type']) ? $data['scheduled_type'] : null;
        $this->container['subscription_start'] = isset($data['subscription_start']) ? $data['subscription_start'] : null;
        $this->container['three_ds_challenge_indicator'] = isset($data['three_ds_challenge_indicator']) ? $data['three_ds_challenge_indicator'] : null;
        $this->container['trans_type'] = isset($data['trans_type']) ? $data['trans_type'] : null;
        $this->container['units'] = isset($data['units']) ? $data['units'] : null;
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

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) > 25)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) < 0)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['encrypted_data']) && (mb_strlen($this->container['encrypted_data']) > 10000)) {
            $invalidProperties[] = "invalid value for 'encrypted_data', the character length must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['encrypted_data']) && (mb_strlen($this->container['encrypted_data']) < 0)) {
            $invalidProperties[] = "invalid value for 'encrypted_data', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['initiator'] === null) {
            $invalidProperties[] = "'initiator' can't be null";
        }
        if (!preg_match("/mit|cit/", $this->container['initiator'])) {
            $invalidProperties[] = "invalid value for 'initiator', must be conform to the pattern /mit|cit/.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) > 100)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) < 0)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['scheduled_type']) && !preg_match("/SA/", $this->container['scheduled_type'])) {
            $invalidProperties[] = "invalid value for 'scheduled_type', must be conform to the pattern /SA/.";
        }

        if (!is_null($this->container['three_ds_challenge_indicator']) && !preg_match("/01|04/", $this->container['three_ds_challenge_indicator'])) {
            $invalidProperties[] = "invalid value for 'three_ds_challenge_indicator', must be conform to the pattern /01|04/.";
        }

        $allowedValues = $this->getTransTypeAllowableValues();
        if (!is_null($this->container['trans_type']) && !in_array($this->container['trans_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'trans_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['units']) && ($this->container['units'] < 1)) {
            $invalidProperties[] = "invalid value for 'units', must be bigger than or equal to 1.";
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
     * @param string $contract_number Contract number between customer and merchant. Required for Mexican merchants for scheduled payments.
     *
     * @return $this
     */
    public function setContractNumber($contract_number)
    {
        if (!is_null($contract_number) && (mb_strlen($contract_number) > 20)) {
            throw new \InvalidArgumentException('invalid length for $contract_number when calling ScheduledData., must be smaller than or equal to 20.');
        }
        if (!is_null($contract_number) && (mb_strlen($contract_number) < 0)) {
            throw new \InvalidArgumentException('invalid length for $contract_number when calling ScheduledData., must be bigger than or equal to 0.');
        }

        $this->container['contract_number'] = $contract_number;

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
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling ScheduledData., must be smaller than or equal to 25.');
        }
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) < 0)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling ScheduledData., must be bigger than or equal to 0.');
        }

        $this->container['dynamic_descriptor'] = $dynamic_descriptor;

        return $this;
    }

    /**
     * Gets encrypted_data
     *
     * @return string
     */
    public function getEncryptedData()
    {
        return $this->container['encrypted_data'];
    }

    /**
     * Sets encrypted_data
     *
     * @param string $encrypted_data The encrypted payment credentials encoded in base64. *(for APPLEPAY payment method only)*
     *
     * @return $this
     */
    public function setEncryptedData($encrypted_data)
    {
        if (!is_null($encrypted_data) && (mb_strlen($encrypted_data) > 10000)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_data when calling ScheduledData., must be smaller than or equal to 10000.');
        }
        if (!is_null($encrypted_data) && (mb_strlen($encrypted_data) < 0)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_data when calling ScheduledData., must be bigger than or equal to 0.');
        }

        $this->container['encrypted_data'] = $encrypted_data;

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
     * @param bool $generate_token This attribute can be received only in first recurring request. In all requests with recurring_id card.token can't be generated. If set to 'true', Card token will be generated and returned in GET response. Will be generated only for successful transactions (not for declined).
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->container['generate_token'] = $generate_token;

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
     * @param string $initiator Use `cit` for initiator attribute (cardholder initiated transaction).
     *
     * @return $this
     */
    public function setInitiator($initiator)
    {

        if ((!preg_match("/mit|cit/", $initiator))) {
            throw new \InvalidArgumentException("invalid value for $initiator when calling ScheduledData., must conform to the pattern /mit|cit/.");
        }

        $this->container['initiator'] = $initiator;

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
            throw new \InvalidArgumentException('invalid length for $note when calling ScheduledData., must be smaller than or equal to 100.');
        }
        if (!is_null($note) && (mb_strlen($note) < 0)) {
            throw new \InvalidArgumentException('invalid length for $note when calling ScheduledData., must be bigger than or equal to 0.');
        }

        $this->container['note'] = $note;

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
     * Gets scheduled_type
     *
     * @return string
     */
    public function getScheduledType()
    {
        return $this->container['scheduled_type'];
    }

    /**
     * Sets scheduled_type
     *
     * @param string $scheduled_type Scheduled payment type attribute. For typical scheduled payments should be absent or `SA` - scheduled by acquirer
     *
     * @return $this
     */
    public function setScheduledType($scheduled_type)
    {

        if (!is_null($scheduled_type) && (!preg_match("/SA/", $scheduled_type))) {
            throw new \InvalidArgumentException("invalid value for $scheduled_type when calling ScheduledData., must conform to the pattern /SA/.");
        }

        $this->container['scheduled_type'] = $scheduled_type;

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
     * @param \DateTime $subscription_start The time in 'yyyy-MM-dd' format when subscription will actually become activated (grace period).Leave it empty to activate subscription at once without any grace period applied.
     *
     * @return $this
     */
    public function setSubscriptionStart($subscription_start)
    {
        $this->container['subscription_start'] = $subscription_start;

        return $this;
    }

    /**
     * Gets three_ds_challenge_indicator
     *
     * @return string
     */
    public function getThreeDsChallengeIndicator()
    {
        return $this->container['three_ds_challenge_indicator'];
    }

    /**
     * Sets three_ds_challenge_indicator
     *
     * @param string $three_ds_challenge_indicator three_ds_challenge_indicator
     *
     * @return $this
     */
    public function setThreeDsChallengeIndicator($three_ds_challenge_indicator)
    {

        if (!is_null($three_ds_challenge_indicator) && (!preg_match("/01|04/", $three_ds_challenge_indicator))) {
            throw new \InvalidArgumentException("invalid value for $three_ds_challenge_indicator when calling ScheduledData., must conform to the pattern /01|04/.");
        }

        $this->container['three_ds_challenge_indicator'] = $three_ds_challenge_indicator;

        return $this;
    }

    /**
     * Gets trans_type
     *
     * @return string
     */
    public function getTransType()
    {
        return $this->container['trans_type'];
    }

    /**
     * Sets trans_type
     *
     * @param string $trans_type trans_type
     *
     * @return $this
     */
    public function setTransType($trans_type)
    {
        $allowedValues = $this->getTransTypeAllowableValues();
        if (!is_null($trans_type) && !in_array($trans_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'trans_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['trans_type'] = $trans_type;

        return $this;
    }

    /**
     * Gets units
     *
     * @return int
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param int $units Units quantity of the subscription, who can consume their service.
     *
     * @return $this
     */
    public function setUnits($units)
    {

        if (!is_null($units) && ($units < 1)) {
            throw new \InvalidArgumentException('invalid value for $units when calling ScheduledData., must be bigger than or equal to 1.');
        }

        $this->container['units'] = $units;

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

