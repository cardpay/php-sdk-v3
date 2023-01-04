<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestLivingAddress implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestLivingAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'state' => 'string',
        'zip' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'address' => null,
        'city' => null,
        'country' => null,
        'state' => null,
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
        'address' => 'address',
        'city' => 'city',
        'country' => 'country',
        'state' => 'state',
        'zip' => 'zip'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address' => 'setAddress',
        'city' => 'setCity',
        'country' => 'setCountry',
        'state' => 'setState',
        'zip' => 'setZip'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address' => 'getAddress',
        'city' => 'getCity',
        'country' => 'getCountry',
        'state' => 'getState',
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
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
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

        if (!is_null($this->container['address']) && (mb_strlen($this->container['address']) > 100)) {
            $invalidProperties[] = "invalid value for 'address', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['address']) && (mb_strlen($this->container['address']) < 0)) {
            $invalidProperties[] = "invalid value for 'address', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['city']) && (mb_strlen($this->container['city']) > 20)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['city']) && (mb_strlen($this->container['city']) < 0)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['country']) && (mb_strlen($this->container['country']) > 3)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['country']) && (mb_strlen($this->container['country']) < 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) > 20)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) < 0)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['zip']) && (mb_strlen($this->container['zip']) > 17)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be smaller than or equal to 17.";
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
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address Customer home address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        if (!is_null($address) && (mb_strlen($address) > 100)) {
            throw new \InvalidArgumentException('invalid length for $address when calling PaymentRequestLivingAddress., must be smaller than or equal to 100.');
        }
        if (!is_null($address) && (mb_strlen($address) < 0)) {
            throw new \InvalidArgumentException('invalid length for $address when calling PaymentRequestLivingAddress., must be bigger than or equal to 0.');
        }

        $this->container['address'] = $address;

        return $this;
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
     * @param string $city Customer city.
     *
     * @return $this
     */
    public function setCity($city)
    {
        if (!is_null($city) && (mb_strlen($city) > 20)) {
            throw new \InvalidArgumentException('invalid length for $city when calling PaymentRequestLivingAddress., must be smaller than or equal to 20.');
        }
        if (!is_null($city) && (mb_strlen($city) < 0)) {
            throw new \InvalidArgumentException('invalid length for $city when calling PaymentRequestLivingAddress., must be bigger than or equal to 0.');
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
     * @param string $country ISO 3166-1 code of country: 2 or 3 latin letters or numeric code.
     *
     * @return $this
     */
    public function setCountry($country)
    {
        if (!is_null($country) && (mb_strlen($country) > 3)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PaymentRequestLivingAddress., must be smaller than or equal to 3.');
        }
        if (!is_null($country) && (mb_strlen($country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PaymentRequestLivingAddress., must be bigger than or equal to 2.');
        }

        $this->container['country'] = $country;

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
     * @param string $state Living state or province.
     *
     * @return $this
     */
    public function setState($state)
    {
        if (!is_null($state) && (mb_strlen($state) > 20)) {
            throw new \InvalidArgumentException('invalid length for $state when calling PaymentRequestLivingAddress., must be smaller than or equal to 20.');
        }
        if (!is_null($state) && (mb_strlen($state) < 0)) {
            throw new \InvalidArgumentException('invalid length for $state when calling PaymentRequestLivingAddress., must be bigger than or equal to 0.');
        }

        $this->container['state'] = $state;

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
     * @param string $zip Customer postal code
     *
     * @return $this
     */
    public function setZip($zip)
    {
        if (!is_null($zip) && (mb_strlen($zip) > 17)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling PaymentRequestLivingAddress., must be smaller than or equal to 17.');
        }
        if (!is_null($zip) && (mb_strlen($zip) < 0)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling PaymentRequestLivingAddress., must be bigger than or equal to 0.');
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

