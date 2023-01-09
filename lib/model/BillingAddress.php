<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class BillingAddress implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'BillingAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'addr_line_1' => 'string',
        'addr_line_2' => 'string',
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
        'addr_line_1' => null,
        'addr_line_2' => null,
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
        'addr_line_1' => 'addr_line_1',
        'addr_line_2' => 'addr_line_2',
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
        'addr_line_1' => 'setAddrLine1',
        'addr_line_2' => 'setAddrLine2',
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
        'addr_line_1' => 'getAddrLine1',
        'addr_line_2' => 'getAddrLine2',
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
        $this->container['addr_line_1'] = isset($data['addr_line_1']) ? $data['addr_line_1'] : null;
        $this->container['addr_line_2'] = isset($data['addr_line_2']) ? $data['addr_line_2'] : null;
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

        if ($this->container['addr_line_1'] === null) {
            $invalidProperties[] = "'addr_line_1' can't be null";
        }
        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ((mb_strlen($this->container['city']) > 50)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['city']) < 0)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) > 40)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['state']) && (mb_strlen($this->container['state']) < 0)) {
            $invalidProperties[] = "invalid value for 'state', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['zip'] === null) {
            $invalidProperties[] = "'zip' can't be null";
        }
        if ((mb_strlen($this->container['zip']) > 12)) {
            $invalidProperties[] = "invalid value for 'zip', the character length must be smaller than or equal to 12.";
        }

        if ((mb_strlen($this->container['zip']) < 0)) {
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
     * Gets addr_line_1
     *
     * @return string
     */
    public function getAddrLine1()
    {
        return $this->container['addr_line_1'];
    }

    /**
     * Sets addr_line_1
     *
     * @param string $addr_line_1 First line of the street address or equivalent local portion of the Cardholder billing address associated with the card used for this purchase. Should include street and house number. May include whitespaces, hyphens, apostrophes, commas, quotes, dots, slashes and semicolons. Required (if available) unless market or regional mandate restricts sending this information. For recurring: field will be ignored if 'filing.id' is presented in request (continue one-click scenario) *Length: 0 - 50*
     *
     * @return $this
     */
    public function setAddrLine1($addr_line_1)
    {
        $this->container['addr_line_1'] = $addr_line_1;

        return $this;
    }

    /**
     * Gets addr_line_2
     *
     * @return string
     */
    public function getAddrLine2()
    {
        return $this->container['addr_line_2'];
    }

    /**
     * Sets addr_line_2
     *
     * @param string $addr_line_2 Second line of the street address or equivalent local portion of the Cardholder billing address associated with the card used for this purchase. Required (if available) unless market or regional mandate restricts sending this information. For recurring: field will be ignored if 'filing.id' is presented in request (continue one-click scenario) *Length: 0 - 50*
     *
     * @return $this
     */
    public function setAddrLine2($addr_line_2)
    {
        $this->container['addr_line_2'] = $addr_line_2;

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
     * @param string $city Billing city. May include whitespaces, hyphens, apostrophes, commas and dots
     *
     * @return $this
     */
    public function setCity($city)
    {
        if ((mb_strlen($city) > 50)) {
            throw new \InvalidArgumentException('invalid length for $city when calling BillingAddress., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($city) < 0)) {
            throw new \InvalidArgumentException('invalid length for $city when calling BillingAddress., must be bigger than or equal to 0.');
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
     * @param string $country [ISO 3166-1](https://en.wikipedia.org/wiki/ISO_3166-1) code of billing country: 2 or 3 latin letters or numeric code
     *
     * @return $this
     */
    public function setCountry($country)
    {
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
     * @param string $state The state or province of the billing address associated with the card being used for this purchase. It's recommended to send in following format: the country subdivision code defined in [ISO 3166-2](https://en.wikipedia.org/wiki/ISO_3166-2). May include whitespaces, hyphens, apostrophes, commas and dots
     *
     * @return $this
     */
    public function setState($state)
    {
        if (!is_null($state) && (mb_strlen($state) > 40)) {
            throw new \InvalidArgumentException('invalid length for $state when calling BillingAddress., must be smaller than or equal to 40.');
        }
        if (!is_null($state) && (mb_strlen($state) < 0)) {
            throw new \InvalidArgumentException('invalid length for $state when calling BillingAddress., must be bigger than or equal to 0.');
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
     * @param string $zip Billing postal code
     *
     * @return $this
     */
    public function setZip($zip)
    {
        if ((mb_strlen($zip) > 12)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling BillingAddress., must be smaller than or equal to 12.');
        }
        if ((mb_strlen($zip) < 0)) {
            throw new \InvalidArgumentException('invalid length for $zip when calling BillingAddress., must be bigger than or equal to 0.');
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

