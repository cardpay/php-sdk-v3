<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class DisputeResponseDisputeData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DisputeResponseDisputeData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'due_time' => 'string',
        'group_id' => 'string',
        'reason_code' => 'string',
        'reason_description' => 'string',
        'reg_time' => 'string',
        'result_time' => 'string',
        'stage' => 'string',
        'status' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'due_time' => null,
        'group_id' => null,
        'reason_code' => null,
        'reason_description' => null,
        'reg_time' => null,
        'result_time' => null,
        'stage' => null,
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
        'due_time' => 'due_time',
        'group_id' => 'group_id',
        'reason_code' => 'reason_code',
        'reason_description' => 'reason_description',
        'reg_time' => 'reg_time',
        'result_time' => 'result_time',
        'stage' => 'stage',
        'status' => 'status',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'due_time' => 'setDueTime',
        'group_id' => 'setGroupId',
        'reason_code' => 'setReasonCode',
        'reason_description' => 'setReasonDescription',
        'reg_time' => 'setRegTime',
        'result_time' => 'setResultTime',
        'stage' => 'setStage',
        'status' => 'setStatus',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'due_time' => 'getDueTime',
        'group_id' => 'getGroupId',
        'reason_code' => 'getReasonCode',
        'reason_description' => 'getReasonDescription',
        'reg_time' => 'getRegTime',
        'result_time' => 'getResultTime',
        'stage' => 'getStage',
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
        $this->container['due_time'] = isset($data['due_time']) ? $data['due_time'] : null;
        $this->container['group_id'] = isset($data['group_id']) ? $data['group_id'] : null;
        $this->container['reason_code'] = isset($data['reason_code']) ? $data['reason_code'] : null;
        $this->container['reason_description'] = isset($data['reason_description']) ? $data['reason_description'] : null;
        $this->container['reg_time'] = isset($data['reg_time']) ? $data['reg_time'] : null;
        $this->container['result_time'] = isset($data['result_time']) ? $data['result_time'] : null;
        $this->container['stage'] = isset($data['stage']) ? $data['stage'] : null;
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
     * Gets due_time
     *
     * @return string
     */
    public function getDueTime()
    {
        return $this->container['due_time'];
    }

    /**
     * Sets due_time
     *
     * @param string $due_time Due date and time in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format for making decision or action over chargeback/retrieval request, i.e accepting, disputing or providing evidence documents (format - yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setDueTime($due_time)
    {
        $this->container['due_time'] = $due_time;

        return $this;
    }

    /**
     * Gets group_id
     *
     * @return string
     */
    public function getGroupId()
    {
        return $this->container['group_id'];
    }

    /**
     * Sets group_id
     *
     * @param string $group_id Dispute group ID in Disputes Resolution Center that includes returned dispute entity
     *
     * @return $this
     */
    public function setGroupId($group_id)
    {
        $this->container['group_id'] = $group_id;

        return $this;
    }

    /**
     * Gets reason_code
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->container['reason_code'];
    }

    /**
     * Sets reason_code
     *
     * @param string $reason_code Dispute's reason code
     *
     * @return $this
     */
    public function setReasonCode($reason_code)
    {
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Gets reason_description
     *
     * @return string
     */
    public function getReasonDescription()
    {
        return $this->container['reason_description'];
    }

    /**
     * Sets reason_description
     *
     * @param string $reason_description Dispute's reason code description
     *
     * @return $this
     */
    public function setReasonDescription($reason_description)
    {
        $this->container['reason_description'] = $reason_description;

        return $this;
    }

    /**
     * Gets reg_time
     *
     * @return string
     */
    public function getRegTime()
    {
        return $this->container['reg_time'];
    }

    /**
     * Sets reg_time
     *
     * @param string $reg_time Dispute registration date in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (format - yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setRegTime($reg_time)
    {
        $this->container['reg_time'] = $reg_time;

        return $this;
    }

    /**
     * Gets result_time
     *
     * @return string
     */
    public function getResultTime()
    {
        return $this->container['result_time'];
    }

    /**
     * Sets result_time
     *
     * @param string $result_time Dispute's terminal (final) status date and time in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (format - yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setResultTime($result_time)
    {
        $this->container['result_time'] = $result_time;

        return $this;
    }

    /**
     * Gets stage
     *
     * @return string
     */
    public function getStage()
    {
        return $this->container['stage'];
    }

    /**
     * Sets stage
     *
     * @param string $stage Chargeback/retrieval request's current stage
     *
     * @return $this
     */
    public function setStage($stage)
    {
        $this->container['stage'] = $stage;

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
     * @param string $status Chargeback/retrieval request's current status
     *
     * @return $this
     */
    public function setStatus($status)
    {
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
     * @param string $type Indicates dispute entity type: `CB` - for chargebacks `RR` - for retrieval requests `FR` - for fraud reports
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

