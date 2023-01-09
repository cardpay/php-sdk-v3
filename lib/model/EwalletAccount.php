<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class EwalletAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'EwalletAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bank_branch' => 'string',
        'bank_code' => 'string',
        'id' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'bank_branch' => null,
        'bank_code' => null,
        'id' => null,
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
        'bank_branch' => 'bank_branch',
        'bank_code' => 'bank_code',
        'id' => 'id',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bank_branch' => 'setBankBranch',
        'bank_code' => 'setBankCode',
        'id' => 'setId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bank_branch' => 'getBankBranch',
        'bank_code' => 'getBankCode',
        'id' => 'getId',
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
        $this->container['bank_branch'] = isset($data['bank_branch']) ? $data['bank_branch'] : null;
        $this->container['bank_code'] = isset($data['bank_code']) ? $data['bank_code'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
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

        if (!is_null($this->container['bank_branch']) && (mb_strlen($this->container['bank_branch']) > 50)) {
            $invalidProperties[] = "invalid value for 'bank_branch', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['bank_branch']) && (mb_strlen($this->container['bank_branch']) < 1)) {
            $invalidProperties[] = "invalid value for 'bank_branch', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['bank_code']) && (mb_strlen($this->container['bank_code']) > 6)) {
            $invalidProperties[] = "invalid value for 'bank_code', the character length must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['bank_code']) && (mb_strlen($this->container['bank_code']) < 1)) {
            $invalidProperties[] = "invalid value for 'bank_code', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) > 50)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) < 1)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['type']) && (mb_strlen($this->container['type']) > 4)) {
            $invalidProperties[] = "invalid value for 'type', the character length must be smaller than or equal to 4.";
        }

        if (!is_null($this->container['type']) && (mb_strlen($this->container['type']) < 1)) {
            $invalidProperties[] = "invalid value for 'type', the character length must be bigger than or equal to 1.";
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
     * Gets bank_branch
     *
     * @return string
     */
    public function getBankBranch()
    {
        return $this->container['bank_branch'];
    }

    /**
     * Sets bank_branch
     *
     * @param string $bank_branch Customer bank branch number (name)
     *
     * @return $this
     */
    public function setBankBranch($bank_branch)
    {
        if (!is_null($bank_branch) && (mb_strlen($bank_branch) > 50)) {
            throw new \InvalidArgumentException('invalid length for $bank_branch when calling EwalletAccount., must be smaller than or equal to 50.');
        }
        if (!is_null($bank_branch) && (mb_strlen($bank_branch) < 1)) {
            throw new \InvalidArgumentException('invalid length for $bank_branch when calling EwalletAccount., must be bigger than or equal to 1.');
        }

        $this->container['bank_branch'] = $bank_branch;

        return $this;
    }

    /**
     * Gets bank_code
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->container['bank_code'];
    }

    /**
     * Sets bank_code
     *
     * @param string $bank_code Customer bank code
     *
     * @return $this
     */
    public function setBankCode($bank_code)
    {
        if (!is_null($bank_code) && (mb_strlen($bank_code) > 6)) {
            throw new \InvalidArgumentException('invalid length for $bank_code when calling EwalletAccount., must be smaller than or equal to 6.');
        }
        if (!is_null($bank_code) && (mb_strlen($bank_code) < 1)) {
            throw new \InvalidArgumentException('invalid length for $bank_code when calling EwalletAccount., must be bigger than or equal to 1.');
        }

        $this->container['bank_code'] = $bank_code;

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
     * @param string $id Customer personal identification number
     *
     * @return $this
     */
    public function setId($id)
    {
        if (!is_null($id) && (mb_strlen($id) > 50)) {
            throw new \InvalidArgumentException('invalid length for $id when calling EwalletAccount., must be smaller than or equal to 50.');
        }
        if (!is_null($id) && (mb_strlen($id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $id when calling EwalletAccount., must be bigger than or equal to 1.');
        }

        $this->container['id'] = $id;

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
     * @param string $type Customer account type
     *
     * @return $this
     */
    public function setType($type)
    {
        if (!is_null($type) && (mb_strlen($type) > 4)) {
            throw new \InvalidArgumentException('invalid length for $type when calling EwalletAccount., must be smaller than or equal to 4.');
        }
        if (!is_null($type) && (mb_strlen($type) < 1)) {
            throw new \InvalidArgumentException('invalid length for $type when calling EwalletAccount., must be bigger than or equal to 1.');
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

