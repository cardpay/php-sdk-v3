<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PlanSubscriptionDeclineLogic implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PlanSubscriptionDeclineLogic';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'continue_retries' => 'bool',
        'duration' => 'int',
        'status_to' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'continue_retries' => null,
        'duration' => 'int32',
        'status_to' => null
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
        'continue_retries' => 'continue_retries',
        'duration' => 'duration',
        'status_to' => 'status_to'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'continue_retries' => 'setContinueRetries',
        'duration' => 'setDuration',
        'status_to' => 'setStatusTo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'continue_retries' => 'getContinueRetries',
        'duration' => 'getDuration',
        'status_to' => 'getStatusTo'
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
        $this->container['continue_retries'] = isset($data['continue_retries']) ? $data['continue_retries'] : null;
        $this->container['duration'] = isset($data['duration']) ? $data['duration'] : null;
        $this->container['status_to'] = isset($data['status_to']) ? $data['status_to'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['duration']) && ($this->container['duration'] > 6)) {
            $invalidProperties[] = "invalid value for 'duration', must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['duration']) && ($this->container['duration'] < 1)) {
            $invalidProperties[] = "invalid value for 'duration', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['status_to']) && !preg_match("/WAITING/", $this->container['status_to'])) {
            $invalidProperties[] = "invalid value for 'status_to', must be conform to the pattern /WAITING/.";
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
     * Gets continue_retries
     *
     * @return bool
     */
    public function getContinueRetries()
    {
        return $this->container['continue_retries'];
    }

    /**
     * Sets continue_retries
     *
     * @param bool $continue_retries Continue retries
     *
     * @return $this
     */
    public function setContinueRetries($continue_retries)
    {
        $this->container['continue_retries'] = $continue_retries;

        return $this;
    }

    /**
     * Gets duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->container['duration'];
    }

    /**
     * Sets duration
     *
     * @param int $duration Duration in calendar months
     *
     * @return $this
     */
    public function setDuration($duration)
    {

        if (!is_null($duration) && ($duration > 6)) {
            throw new \InvalidArgumentException('invalid value for $duration when calling PlanSubscriptionDeclineLogic., must be smaller than or equal to 6.');
        }
        if (!is_null($duration) && ($duration < 1)) {
            throw new \InvalidArgumentException('invalid value for $duration when calling PlanSubscriptionDeclineLogic., must be bigger than or equal to 1.');
        }

        $this->container['duration'] = $duration;

        return $this;
    }

    /**
     * Gets status_to
     *
     * @return string
     */
    public function getStatusTo()
    {
        return $this->container['status_to'];
    }

    /**
     * Sets status_to
     *
     * @param string $status_to The status that will be set for the subscription after exhausted all payment retry attempts
     *
     * @return $this
     */
    public function setStatusTo($status_to)
    {

        if (!is_null($status_to) && (!preg_match("/WAITING/", $status_to))) {
            throw new \InvalidArgumentException("invalid value for $status_to when calling PlanSubscriptionDeclineLogic., must conform to the pattern /WAITING/.");
        }

        $this->container['status_to'] = $status_to;

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

