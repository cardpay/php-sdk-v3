<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class RenamedPlanData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RenamedPlanData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'details' => 'string',
        'updated' => '\DateTime',
        'is_executed' => 'bool',
        'name_to' => 'string',
        'name' => 'string',
        'status_to' => 'string',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'details' => null,
        'updated' => 'date-time',
        'is_executed' => null,
        'name_to' => null,
        'name' => null,
        'status_to' => null,
        'status' => null
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
        'id' => 'id',
        'details' => 'details',
        'updated' => 'updated',
        'is_executed' => 'is_executed',
        'name_to' => 'name_to',
        'name' => 'name',
        'status_to' => 'status_to',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'details' => 'setDetails',
        'updated' => 'setUpdated',
        'is_executed' => 'setIsExecuted',
        'name_to' => 'setNameTo',
        'name' => 'setName',
        'status_to' => 'setStatusTo',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'details' => 'getDetails',
        'updated' => 'getUpdated',
        'is_executed' => 'getIsExecuted',
        'name_to' => 'getNameTo',
        'name' => 'getName',
        'status_to' => 'getStatusTo',
        'status' => 'getStatus'
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
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    

    
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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['details'] = isset($data['details']) ? $data['details'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
        $this->container['is_executed'] = isset($data['is_executed']) ? $data['is_executed'] : null;
        $this->container['name_to'] = isset($data['name_to']) ? $data['name_to'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['status_to'] = isset($data['status_to']) ? $data['status_to'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusToAllowableValues();
        if (!is_null($this->container['status_to']) && !in_array($this->container['status_to'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status_to', must be one of '%s'",
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
     * @param string $id Represents the ID of the modified plan
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->container['details'];
    }

    /**
     * Sets details
     *
     * @param string $details The reason why request was unsuccessful
     *
     * @return $this
     */
    public function setDetails($details)
    {
        $this->container['details'] = $details;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime $updated Plan update date
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets is_executed
     *
     * @return bool
     */
    public function getIsExecuted()
    {
        return $this->container['is_executed'];
    }

    /**
     * Sets is_executed
     *
     * @param bool $is_executed Indicates was the request successful or not
     *
     * @return $this
     */
    public function setIsExecuted($is_executed)
    {
        $this->container['is_executed'] = $is_executed;

        return $this;
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
     * @param string $name_to New plan name -  for RENAME operation only
     *
     * @return $this
     */
    public function setNameTo($name_to)
    {
        $this->container['name_to'] = $name_to;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of modified plan. Will be returned for `RENAME` operation
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

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
     * @param string $status_to New state of plan (active or hold) -  for CHANGE_STATUS operation only
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
     * @param string $status Status of modified plan ('ACTIVE' or 'HOLD'). Will be returned for `CHANGE_STATUS` operation
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

