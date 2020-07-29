<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class CardBindingCard implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CardBindingCard';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'expiration' => 'string',
        'holder' => 'string',
        'pan' => 'string',
        'security_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'expiration' => null,
        'holder' => null,
        'pan' => null,
        'security_code' => null
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
        'expiration' => 'expiration',
        'holder' => 'holder',
        'pan' => 'pan',
        'security_code' => 'security_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'expiration' => 'setExpiration',
        'holder' => 'setHolder',
        'pan' => 'setPan',
        'security_code' => 'setSecurityCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'expiration' => 'getExpiration',
        'holder' => 'getHolder',
        'pan' => 'getPan',
        'security_code' => 'getSecurityCode'
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
        $this->container['expiration'] = isset($data['expiration']) ? $data['expiration'] : null;
        $this->container['holder'] = isset($data['holder']) ? $data['holder'] : null;
        $this->container['pan'] = isset($data['pan']) ? $data['pan'] : null;
        $this->container['security_code'] = isset($data['security_code']) ? $data['security_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['expiration'] === null) {
            $invalidProperties[] = "'expiration' can't be null";
        }
        if (!preg_match("/([0-9]{2}\/[0-9]{4})/", $this->container['expiration'])) {
            $invalidProperties[] = "invalid value for 'expiration', must be conform to the pattern /([0-9]{2}\/[0-9]{4})/.";
        }

        if ($this->container['holder'] === null) {
            $invalidProperties[] = "'holder' can't be null";
        }
        if ((mb_strlen($this->container['holder']) > 50)) {
            $invalidProperties[] = "invalid value for 'holder', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['holder']) < 1)) {
            $invalidProperties[] = "invalid value for 'holder', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['pan'] === null) {
            $invalidProperties[] = "'pan' can't be null";
        }
        if ((mb_strlen($this->container['pan']) > 19)) {
            $invalidProperties[] = "invalid value for 'pan', the character length must be smaller than or equal to 19.";
        }

        if ((mb_strlen($this->container['pan']) < 13)) {
            $invalidProperties[] = "invalid value for 'pan', the character length must be bigger than or equal to 13.";
        }

        if ($this->container['security_code'] === null) {
            $invalidProperties[] = "'security_code' can't be null";
        }
        if (!preg_match("/[0-9]{3,4}/", $this->container['security_code'])) {
            $invalidProperties[] = "invalid value for 'security_code', must be conform to the pattern /[0-9]{3,4}/.";
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
     * Gets expiration
     *
     * @return string
     */
    public function getExpiration()
    {
        return $this->container['expiration'];
    }

    /**
     * Sets expiration
     *
     * @param string $expiration Customer's card expiration date. Format: `mm/yyyy`
     *
     * @return $this
     */
    public function setExpiration($expiration)
    {

        if ((!preg_match("/([0-9]{2}\/[0-9]{4})/", $expiration))) {
            throw new \InvalidArgumentException("invalid value for $expiration when calling CardBindingCard., must conform to the pattern /([0-9]{2}\/[0-9]{4})/.");
        }

        $this->container['expiration'] = $expiration;

        return $this;
    }

    /**
     * Gets holder
     *
     * @return string
     */
    public function getHolder()
    {
        return $this->container['holder'];
    }

    /**
     * Sets holder
     *
     * @param string $holder Customer's cardholder name. Any valid cardholder name
     *
     * @return $this
     */
    public function setHolder($holder)
    {
        if ((mb_strlen($holder) > 50)) {
            throw new \InvalidArgumentException('invalid length for $holder when calling CardBindingCard., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($holder) < 1)) {
            throw new \InvalidArgumentException('invalid length for $holder when calling CardBindingCard., must be bigger than or equal to 1.');
        }

        $this->container['holder'] = $holder;

        return $this;
    }

    /**
     * Gets pan
     *
     * @return string
     */
    public function getPan()
    {
        return $this->container['pan'];
    }

    /**
     * Sets pan
     *
     * @param string $pan Customer's card number (PAN). Any valid card number, may contain spaces
     *
     * @return $this
     */
    public function setPan($pan)
    {
        if ((mb_strlen($pan) > 19)) {
            throw new \InvalidArgumentException('invalid length for $pan when calling CardBindingCard., must be smaller than or equal to 19.');
        }
        if ((mb_strlen($pan) < 13)) {
            throw new \InvalidArgumentException('invalid length for $pan when calling CardBindingCard., must be bigger than or equal to 13.');
        }

        $this->container['pan'] = $pan;

        return $this;
    }

    /**
     * Gets security_code
     *
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->container['security_code'];
    }

    /**
     * Sets security_code
     *
     * @param string $security_code Customer's CVV2 / CVC2 / CAV2
     *
     * @return $this
     */
    public function setSecurityCode($security_code)
    {

        if ((!preg_match("/[0-9]{3,4}/", $security_code))) {
            throw new \InvalidArgumentException("invalid value for $security_code when calling CardBindingCard., must conform to the pattern /[0-9]{3,4}/.");
        }

        $this->container['security_code'] = $security_code;

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

