<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PlanUpdateRequestPlanData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PlanUpdateRequestPlanData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name_to' => 'string',
        'status_to' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name_to' => null,
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
        'name_to' => 'name_to',
        'status_to' => 'status_to'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name_to' => 'setNameTo',
        'status_to' => 'setStatusTo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name_to' => 'getNameTo',
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

    const STATUS_TO_ACTIVE = 'ACTIVE';
    const STATUS_TO_INACTIVE = 'INACTIVE';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusToAllowableValues()
    {
        return [
            self::STATUS_TO_ACTIVE,
            self::STATUS_TO_INACTIVE,
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
        $this->container['name_to'] = isset($data['name_to']) ? $data['name_to'] : null;
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

        if (!is_null($this->container['name_to']) && (mb_strlen($this->container['name_to']) > 25)) {
            $invalidProperties[] = "invalid value for 'name_to', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['name_to']) && (mb_strlen($this->container['name_to']) < 0)) {
            $invalidProperties[] = "invalid value for 'name_to', the character length must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getStatusToAllowableValues();
        if (!is_null($this->container['status_to']) && !in_array($this->container['status_to'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status_to', must be one of '%s'",
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
     * Gets name_to
     *
     * @return string
     */
    public function getNameTo()
    {
        return $this->container['name_to'];
    }

    /**
     * Sets name_to
     *
     * @param string $name_to New plan name - for RENAME operation only
     *
     * @return $this
     */
    public function setNameTo($name_to)
    {
        if (!is_null($name_to) && (mb_strlen($name_to) > 25)) {
            throw new \InvalidArgumentException('invalid length for $name_to when calling PlanUpdateRequestPlanData., must be smaller than or equal to 25.');
        }
        if (!is_null($name_to) && (mb_strlen($name_to) < 0)) {
            throw new \InvalidArgumentException('invalid length for $name_to when calling PlanUpdateRequestPlanData., must be bigger than or equal to 0.');
        }

        $this->container['name_to'] = $name_to;

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
     * @param string $status_to New state of plan (ACTIVE or INACTIVE) - for CHANGE_STATUS operation only
     *
     * @return $this
     */
    public function setStatusTo($status_to)
    {
        $allowedValues = $this->getStatusToAllowableValues();
        if (!is_null($status_to) && !in_array($status_to, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status_to', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
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

