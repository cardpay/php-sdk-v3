<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ReportsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ReportsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'callback_url' => 'string',
        'reports_data' => '\Cardpay\model\ReportsData',
        'request' => '\Cardpay\model\Request'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'callback_url' => null,
        'reports_data' => null,
        'request' => null
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
        'callback_url' => 'callback_url',
        'reports_data' => 'reports_data',
        'request' => 'request'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'callback_url' => 'setCallbackUrl',
        'reports_data' => 'setReportsData',
        'request' => 'setRequest'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'callback_url' => 'getCallbackUrl',
        'reports_data' => 'getReportsData',
        'request' => 'getRequest'
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
        $this->container['callback_url'] = isset($data['callback_url']) ? $data['callback_url'] : null;
        $this->container['reports_data'] = isset($data['reports_data']) ? $data['reports_data'] : null;
        $this->container['request'] = isset($data['request']) ? $data['request'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['callback_url']) && (mb_strlen($this->container['callback_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'callback_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['callback_url']) && (mb_strlen($this->container['callback_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'callback_url', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['reports_data'] === null) {
            $invalidProperties[] = "'reports_data' can't be null";
        }
        if ($this->container['request'] === null) {
            $invalidProperties[] = "'request' can't be null";
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
     * Gets callback_url
     *
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->container['callback_url'];
    }

    /**
     * Sets callback_url
     *
     * @param string $callback_url Url for sending resulted callback. If field is skipped then callback won't be sent.
     *
     * @return $this
     */
    public function setCallbackUrl($callback_url)
    {
        if (!is_null($callback_url) && (mb_strlen($callback_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $callback_url when calling ReportsRequest., must be smaller than or equal to 512.');
        }
        if (!is_null($callback_url) && (mb_strlen($callback_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $callback_url when calling ReportsRequest., must be bigger than or equal to 0.');
        }

        $this->container['callback_url'] = $callback_url;

        return $this;
    }

    /**
     * Gets reports_data
     *
     * @return \Cardpay\model\ReportsData
     */
    public function getReportsData()
    {
        return $this->container['reports_data'];
    }

    /**
     * Sets reports_data
     *
     * @param \Cardpay\model\ReportsData $reports_data ReportsData
     *
     * @return $this
     */
    public function setReportsData($reports_data)
    {
        $this->container['reports_data'] = $reports_data;

        return $this;
    }

    /**
     * Gets request
     *
     * @return \Cardpay\model\Request
     */
    public function getRequest()
    {
        return $this->container['request'];
    }

    /**
     * Sets request
     *
     * @param \Cardpay\model\Request $request Request
     *
     * @return $this
     */
    public function setRequest($request)
    {
        $this->container['request'] = $request;

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

