<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class SubscriptionFilterParameters implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SubscriptionFilterParameters';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'request_id' => 'string',
        'max_count' => 'int',
        'offset' => 'int',
        'sort_order' => 'string',
        'customer_id' => 'string',
        'plan_id' => 'string',
        'start_time' => '\DateTime',
        'end_time' => '\DateTime',
        'currency' => 'string',
        'status' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'request_id' => null,
        'max_count' => 'int32',
        'offset' => 'int32',
        'sort_order' => null,
        'customer_id' => null,
        'plan_id' => null,
        'start_time' => 'date-time',
        'end_time' => 'date-time',
        'currency' => null,
        'status' => null,
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
        'request_id' => 'request_id',
        'max_count' => 'max_count',
        'offset' => 'offset',
        'sort_order' => 'sort_order',
        'customer_id' => 'customer_id',
        'plan_id' => 'plan_id',
        'start_time' => 'start_time',
        'end_time' => 'end_time',
        'currency' => 'currency',
        'status' => 'status',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'request_id' => 'setRequestId',
        'max_count' => 'setMaxCount',
        'offset' => 'setOffset',
        'sort_order' => 'setSortOrder',
        'customer_id' => 'setCustomerId',
        'plan_id' => 'setPlanId',
        'start_time' => 'setStartTime',
        'end_time' => 'setEndTime',
        'currency' => 'setCurrency',
        'status' => 'setStatus',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'request_id' => 'getRequestId',
        'max_count' => 'getMaxCount',
        'offset' => 'getOffset',
        'sort_order' => 'getSortOrder',
        'customer_id' => 'getCustomerId',
        'plan_id' => 'getPlanId',
        'start_time' => 'getStartTime',
        'end_time' => 'getEndTime',
        'currency' => 'getCurrency',
        'status' => 'getStatus',
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
        $this->container['request_id'] = isset($data['request_id']) ? $data['request_id'] : null;
        $this->container['max_count'] = isset($data['max_count']) ? $data['max_count'] : null;
        $this->container['offset'] = isset($data['offset']) ? $data['offset'] : null;
        $this->container['sort_order'] = isset($data['sort_order']) ? $data['sort_order'] : null;
        $this->container['customer_id'] = isset($data['customer_id']) ? $data['customer_id'] : null;
        $this->container['plan_id'] = isset($data['plan_id']) ? $data['plan_id'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
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

        if ($this->container['request_id'] === null) {
            $invalidProperties[] = "'request_id' can't be null";
        }
        if ((mb_strlen($this->container['request_id']) > 50)) {
            $invalidProperties[] = "invalid value for 'request_id', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['request_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'request_id', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['max_count']) && ($this->container['max_count'] > 10000)) {
            $invalidProperties[] = "invalid value for 'max_count', must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['max_count']) && ($this->container['max_count'] < 1)) {
            $invalidProperties[] = "invalid value for 'max_count', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['offset']) && ($this->container['offset'] > 10000)) {
            $invalidProperties[] = "invalid value for 'offset', must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['offset']) && ($this->container['offset'] < 0)) {
            $invalidProperties[] = "invalid value for 'offset', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['sort_order']) && !preg_match("/asc|desc/", $this->container['sort_order'])) {
            $invalidProperties[] = "invalid value for 'sort_order', must be conform to the pattern /asc|desc/.";
        }

        if (!is_null($this->container['customer_id']) && (mb_strlen($this->container['customer_id']) > 32)) {
            $invalidProperties[] = "invalid value for 'customer_id', the character length must be smaller than or equal to 32.";
        }

        if (!is_null($this->container['customer_id']) && (mb_strlen($this->container['customer_id']) < 0)) {
            $invalidProperties[] = "invalid value for 'customer_id', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['plan_id']) && (mb_strlen($this->container['plan_id']) > 32)) {
            $invalidProperties[] = "invalid value for 'plan_id', the character length must be smaller than or equal to 32.";
        }

        if (!is_null($this->container['plan_id']) && (mb_strlen($this->container['plan_id']) < 0)) {
            $invalidProperties[] = "invalid value for 'plan_id', the character length must be bigger than or equal to 0.";
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
     * Gets request_id
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->container['request_id'];
    }

    /**
     * Sets request_id
     *
     * @param string $request_id Request ID
     *
     * @return $this
     */
    public function setRequestId($request_id)
    {
        if ((mb_strlen($request_id) > 50)) {
            throw new \InvalidArgumentException('invalid length for $request_id when calling SubscriptionFilterParameters., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($request_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $request_id when calling SubscriptionFilterParameters., must be bigger than or equal to 1.');
        }

        $this->container['request_id'] = $request_id;

        return $this;
    }

    /**
     * Gets max_count
     *
     * @return int
     */
    public function getMaxCount()
    {
        return $this->container['max_count'];
    }

    /**
     * Sets max_count
     *
     * @param int $max_count Limit number of returned subscriptions (must be less than 10000, default is 1000)
     *
     * @return $this
     */
    public function setMaxCount($max_count)
    {

        if (!is_null($max_count) && ($max_count > 10000)) {
            throw new \InvalidArgumentException('invalid value for $max_count when calling SubscriptionFilterParameters., must be smaller than or equal to 10000.');
        }
        if (!is_null($max_count) && ($max_count < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_count when calling SubscriptionFilterParameters., must be bigger than or equal to 1.');
        }

        $this->container['max_count'] = $max_count;

        return $this;
    }

    /**
     * Gets offset
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->container['offset'];
    }

    /**
     * Sets offset
     *
     * @param int $offset Offset (must be less than 10000)
     *
     * @return $this
     */
    public function setOffset($offset)
    {

        if (!is_null($offset) && ($offset > 10000)) {
            throw new \InvalidArgumentException('invalid value for $offset when calling SubscriptionFilterParameters., must be smaller than or equal to 10000.');
        }
        if (!is_null($offset) && ($offset < 0)) {
            throw new \InvalidArgumentException('invalid value for $offset when calling SubscriptionFilterParameters., must be bigger than or equal to 0.');
        }

        $this->container['offset'] = $offset;

        return $this;
    }

    /**
     * Gets sort_order
     *
     * @return string
     */
    public function getSortOrder()
    {
        return $this->container['sort_order'];
    }

    /**
     * Sets sort_order
     *
     * @param string $sort_order Sort based on order of results. 'asc' for ascending order or 'desc' for descending order (default value)
     *
     * @return $this
     */
    public function setSortOrder($sort_order)
    {

        if (!is_null($sort_order) && (!preg_match("/asc|desc/", $sort_order))) {
            throw new \InvalidArgumentException("invalid value for $sort_order when calling SubscriptionFilterParameters., must conform to the pattern /asc|desc/.");
        }

        $this->container['sort_order'] = $sort_order;

        return $this;
    }

    /**
     * Gets customer_id
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string $customer_id Merchant identifier of customer account
     *
     * @return $this
     */
    public function setCustomerId($customer_id)
    {
        if (!is_null($customer_id) && (mb_strlen($customer_id) > 32)) {
            throw new \InvalidArgumentException('invalid length for $customer_id when calling SubscriptionFilterParameters., must be smaller than or equal to 32.');
        }
        if (!is_null($customer_id) && (mb_strlen($customer_id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $customer_id when calling SubscriptionFilterParameters., must be bigger than or equal to 0.');
        }

        $this->container['customer_id'] = $customer_id;

        return $this;
    }

    /**
     * Gets plan_id
     *
     * @return string
     */
    public function getPlanId()
    {
        return $this->container['plan_id'];
    }

    /**
     * Sets plan_id
     *
     * @param string $plan_id Id of plan. Use for searching scheduled subscriptions by plan
     *
     * @return $this
     */
    public function setPlanId($plan_id)
    {
        if (!is_null($plan_id) && (mb_strlen($plan_id) > 32)) {
            throw new \InvalidArgumentException('invalid length for $plan_id when calling SubscriptionFilterParameters., must be smaller than or equal to 32.');
        }
        if (!is_null($plan_id) && (mb_strlen($plan_id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $plan_id when calling SubscriptionFilterParameters., must be bigger than or equal to 0.');
        }

        $this->container['plan_id'] = $plan_id;

        return $this;
    }

    /**
     * Gets start_time
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->container['start_time'];
    }

    /**
     * Sets start_time
     *
     * @param \DateTime $start_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period starts (inclusive), UTC time, default is 24 hours before 'end_time' (format: yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setStartTime($start_time)
    {
        $this->container['start_time'] = $start_time;

        return $this;
    }

    /**
     * Gets end_time
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->container['end_time'];
    }

    /**
     * Sets end_time
     *
     * @param \DateTime $end_time Date and time up to milliseconds (in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format) when requested period ends (not inclusive), UTC time, must be less than 7 days after 'start_time', default is current time (format: yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setEndTime($end_time)
    {
        $this->container['end_time'] = $end_time;

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
     * @param string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code of transactions currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

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
     * @param string $type Type of subscription. 'ONECLICK' type will be ignored.
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

