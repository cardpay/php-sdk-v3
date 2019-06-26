<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ShippingAddress implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ShippingAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'city' => 'string',
        'country' => 'string',
        'phone' => 'string',
        'state' => 'string',
        'street' => 'string',
        'zip' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'city' => null,
        'country' => null,
        'phone' => null,
        'state' => null,
        'street' => null,
        'zip' => null
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
        'city' => 'city',
        'country' => 'country',
        'phone' => 'phone',
        'state' => 'state',
        'street' => 'street',
        'zip' => 'zip'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'city' => 'setCity',
        'country' => 'setCountry',
        'phone' => 'setPhone',
        'state' => 'setState',
        'street' => 'setStreet',
        'zip' => 'setZip'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'city' => 'getCity',
        'country' => 'getCountry',
        'phone' => 'getPhone',
        'state' => 'getState',
        'street' => 'getStreet',
        'zip' => 'getZip'
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
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['street'] = isset($data['street']) ? $data['street'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['city']) && (mb_strlen($this->container['city']) > 20)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['city']) && (mb_strlen($this->container['city']) < 0)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) > 20)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) < 5)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be bigger than or equal to 5.";
        }

        if (!is_null($this->container['phone']) && !preg_match("/[0-9|+|\\-|w|p|(|)|\\s]+/", $this->container['phone'])) {
            $invalidProperties[] = "invalid value for 'phone', must be conform to the pattern /[0-9|+|\\-|w|p|(|)|\\s]+/.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) > 20)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) < 0)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['street']) && (mb_strlen($this->container['street']) > 100)) {
            $invalidProperties[] = "invalid value for 'street', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['street']) && (mb_strlen($this->container['street']) < 2)) {
            $invalidProperties[] = "invalid value for 'street', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['zip']) && (mb_strlen($this->container['zip']) > 12)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be smaller than or equal to 12.";
        }

        if (!is_null($this->container['zip']) && (mb_strlen($this->container['zip']) < 0)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be bigger than or equal to 0.";
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
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city Delivery city. May include whitespaces, hyphens, apostrophes, commas and dots
     *
     * @return $this
     */
    public function setCity($city)
    {
        if (!is_null($city) && (mb_strlen($city) > 20)) {
            throw new \InvalidArgumentException('invalid length for $city when calling ShippingAddress., must be smaller than or equal to 20.');
        }
        if (!is_null($city) && (mb_strlen($city) < 0)) {
            throw new \InvalidArgumentException('invalid length for $city when calling ShippingAddress., must be bigger than or equal to 0.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country [ISO 3166-1](https://en.wikipedia.org/wiki/ISO_3166-1) code of country: 2 or 3 latin letters or numeric code. Mandatory if 'shipping_address' is presented.
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone Valid Customer phone number
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        if (!is_null($phone) && (mb_strlen($phone) > 20)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling ShippingAddress., must be smaller than or equal to 20.');
        }
        if (!is_null($phone) && (mb_strlen($phone) < 5)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling ShippingAddress., must be bigger than or equal to 5.');
        }
        if (!is_null($phone) && (!preg_match("/[0-9|+|\\-|w|p|(|)|\\s]+/", $phone))) {
            throw new \InvalidArgumentException("invalid value for $phone when calling ShippingAddress., must conform to the pattern /[0-9|+|\\-|w|p|(|)|\\s]+/.");
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string $state Delivery state or province. May include whitespaces, hyphens, apostrophes, commas and dots
     *
     * @return $this
     */
    public function setState($state)
    {
        if (!is_null($state) && (mb_strlen($state) > 20)) {
            throw new \InvalidArgumentException('invalid length for $state when calling ShippingAddress., must be smaller than or equal to 20.');
        }
        if (!is_null($state) && (mb_strlen($state) < 0)) {
            throw new \InvalidArgumentException('invalid length for $state when calling ShippingAddress., must be bigger than or equal to 0.');
        }

        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->container['street'];
    }

    /**
     * Sets street
     *
     * @param string $street Delivery street address. May include whitespaces, hyphens, apostrophes, commas, quotes, dots, slashes and semicolons
     *
     * @return $this
     */
    public function setStreet($street)
    {
        if (!is_null($street) && (mb_strlen($street) > 100)) {
            throw new \InvalidArgumentException('invalid length for $street when calling ShippingAddress., must be smaller than or equal to 100.');
        }
        if (!is_null($street) && (mb_strlen($street) < 2)) {
            throw new \InvalidArgumentException('invalid length for $street when calling ShippingAddress., must be bigger than or equal to 2.');
        }

        $this->container['street'] = $street;

        return $this;
    }

    /**
     * Gets zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     *
     * @param string $zip Delivery postal code
     *
     * @return $this
     */
    public function setZip($zip)
    {
        if (!is_null($zip) && (mb_strlen($zip) > 12)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling ShippingAddress., must be smaller than or equal to 12.');
        }
        if (!is_null($zip) && (mb_strlen($zip) < 0)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling ShippingAddress., must be bigger than or equal to 0.');
        }

        $this->container['zip'] = $zip;

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

