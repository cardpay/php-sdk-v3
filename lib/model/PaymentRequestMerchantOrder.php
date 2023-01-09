<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestMerchantOrder implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestMerchantOrder';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cryptocurrency_indicator' => 'bool',
        'description' => 'string',
        'flights' => '\Cardpay\model\Flights',
        'id' => 'string',
        'items' => '\Cardpay\model\Item[]',
        'shipping_address' => '\Cardpay\model\ShippingAddress'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cryptocurrency_indicator' => null,
        'description' => null,
        'flights' => null,
        'id' => null,
        'items' => null,
        'shipping_address' => null
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
        'cryptocurrency_indicator' => 'cryptocurrency_indicator',
        'description' => 'description',
        'flights' => 'flights',
        'id' => 'id',
        'items' => 'items',
        'shipping_address' => 'shipping_address'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cryptocurrency_indicator' => 'setCryptocurrencyIndicator',
        'description' => 'setDescription',
        'flights' => 'setFlights',
        'id' => 'setId',
        'items' => 'setItems',
        'shipping_address' => 'setShippingAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cryptocurrency_indicator' => 'getCryptocurrencyIndicator',
        'description' => 'getDescription',
        'flights' => 'getFlights',
        'id' => 'getId',
        'items' => 'getItems',
        'shipping_address' => 'getShippingAddress'
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
        $this->container['cryptocurrency_indicator'] = isset($data['cryptocurrency_indicator']) ? $data['cryptocurrency_indicator'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['flights'] = isset($data['flights']) ? $data['flights'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['items'] = isset($data['items']) ? $data['items'] : null;
        $this->container['shipping_address'] = isset($data['shipping_address']) ? $data['shipping_address'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ((mb_strlen($this->container['description']) > 200)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 200.";
        }

        if ((mb_strlen($this->container['description']) < 1)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ((mb_strlen($this->container['id']) > 50)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['id']) < 1)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 1.";
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
     * Gets cryptocurrency_indicator
     *
     * @return bool
     */
    public function getCryptocurrencyIndicator()
    {
        return $this->container['cryptocurrency_indicator'];
    }

    /**
     * Sets cryptocurrency_indicator
     *
     * @param bool $cryptocurrency_indicator Indicator should be added if there will be cryptocurrency purchase in transaction
     *
     * @return $this
     */
    public function setCryptocurrencyIndicator($cryptocurrency_indicator)
    {
        $this->container['cryptocurrency_indicator'] = $cryptocurrency_indicator;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Description of product/service being sold
     *
     * @return $this
     */
    public function setDescription($description)
    {
        if ((mb_strlen($description) > 200)) {
            throw new \InvalidArgumentException('invalid length for $description when calling PaymentRequestMerchantOrder., must be smaller than or equal to 200.');
        }
        if ((mb_strlen($description) < 1)) {
            throw new \InvalidArgumentException('invalid length for $description when calling PaymentRequestMerchantOrder., must be bigger than or equal to 1.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets flights
     *
     * @return \Cardpay\model\Flights
     */
    public function getFlights()
    {
        return $this->container['flights'];
    }

    /**
     * Sets flights
     *
     * @param \Cardpay\model\Flights $flights Flights data *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setFlights($flights)
    {
        $this->container['flights'] = $flights;

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
     * @param string $id Order ID used by Merchant's shopping cart
     *
     * @return $this
     */
    public function setId($id)
    {
        if ((mb_strlen($id) > 50)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PaymentRequestMerchantOrder., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PaymentRequestMerchantOrder., must be bigger than or equal to 1.');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets items
     *
     * @return \Cardpay\model\Item[]
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \Cardpay\model\Item[] $items Array of items (in the shopping cart)
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets shipping_address
     *
     * @return \Cardpay\model\ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->container['shipping_address'];
    }

    /**
     * Sets shipping_address
     *
     * @param \Cardpay\model\ShippingAddress $shipping_address Shipping Address
     *
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->container['shipping_address'] = $shipping_address;

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

