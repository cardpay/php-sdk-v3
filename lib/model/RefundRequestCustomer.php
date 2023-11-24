<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class RefundRequestCustomer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RefundRequestCustomer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'email' => 'string',
        'full_name' => 'string',
        'identity' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'email' => null,
        'full_name' => null,
        'identity' => null
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
        'email' => 'email',
        'full_name' => 'full_name',
        'identity' => 'identity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'full_name' => 'setFullName',
        'identity' => 'setIdentity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'full_name' => 'getFullName',
        'identity' => 'getIdentity'
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
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['full_name'] = isset($data['full_name']) ? $data['full_name'] : null;
        $this->container['identity'] = isset($data['identity']) ? $data['identity'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 256)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) < 3)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) > 256)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['identity']) && (mb_strlen($this->container['identity']) > 256)) {
            $invalidProperties[] = "invalid value for 'identity', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['identity']) && (mb_strlen($this->container['identity']) < 0)) {
            $invalidProperties[] = "invalid value for 'identity', the character length must be bigger than or equal to 0.";
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
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email Customer email address. Mandatory for BOLETO, LOTERICA, DEPOSITEXPRESSBRL.
     *
     * @return $this
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (mb_strlen($email) > 256)) {
            throw new \InvalidArgumentException('invalid length for $email when calling RefundRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($email) && (mb_strlen($email) < 3)) {
            throw new \InvalidArgumentException('invalid length for $email when calling RefundRequestCustomer., must be bigger than or equal to 3.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets full_name
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->container['full_name'];
    }

    /**
     * Sets full_name
     *
     * @param string $full_name Customer full name. Mandatory for BOLETO, LOTERICA, DEPOSITEXPRESSBRL.
     *
     * @return $this
     */
    public function setFullName($full_name)
    {
        if (!is_null($full_name) && (mb_strlen($full_name) > 256)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling RefundRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($full_name) && (mb_strlen($full_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling RefundRequestCustomer., must be bigger than or equal to 1.');
        }

        $this->container['full_name'] = $full_name;

        return $this;
    }

    /**
     * Gets identity
     *
     * @return string
     */
    public function getIdentity()
    {
        return $this->container['identity'];
    }

    /**
     * Sets identity
     *
     * @param string $identity Customer identity for Latin America - Customer’s personal identification number: 'CPF' or 'CNPJ' for Brazil. Mandatory for BOLETO, LOTERICA, DEPOSITEXPRESSBRL.
     *
     * @return $this
     */
    public function setIdentity($identity)
    {
        if (!is_null($identity) && (mb_strlen($identity) > 256)) {
            throw new \InvalidArgumentException('invalid length for $identity when calling RefundRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($identity) && (mb_strlen($identity) < 0)) {
            throw new \InvalidArgumentException('invalid length for $identity when calling RefundRequestCustomer., must be bigger than or equal to 0.');
        }

        $this->container['identity'] = $identity;

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

