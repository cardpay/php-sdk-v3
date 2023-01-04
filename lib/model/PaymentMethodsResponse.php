<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentMethodsResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentMethodsResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'brands' => 'string[]',
        'category' => 'string',
        'name' => 'string',
        'supported_payment_methods' => '\Cardpay\model\SupportedPaymentMethod[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'brands' => null,
        'category' => null,
        'name' => null,
        'supported_payment_methods' => null
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
        'brands' => 'brands',
        'category' => 'category',
        'name' => 'name',
        'supported_payment_methods' => 'supported_payment_methods'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brands' => 'setBrands',
        'category' => 'setCategory',
        'name' => 'setName',
        'supported_payment_methods' => 'setSupportedPaymentMethods'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brands' => 'getBrands',
        'category' => 'getCategory',
        'name' => 'getName',
        'supported_payment_methods' => 'getSupportedPaymentMethods'
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
        $this->container['brands'] = isset($data['brands']) ? $data['brands'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['supported_payment_methods'] = isset($data['supported_payment_methods']) ? $data['supported_payment_methods'] : null;
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
     * Gets brands
     *
     * @return string[]
     */
    public function getBrands()
    {
        return $this->container['brands'];
    }

    /**
     * Sets brands
     *
     * @param string[] $brands Available Card Brands, is presented only for 'BANKCARD' payment method
     *
     * @return $this
     */
    public function setBrands($brands)
    {
        $this->container['brands'] = $brands;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category Payment method category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->container['category'] = $category;

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
     * @param string $name Payment method name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets supported_payment_methods
     *
     * @return \Cardpay\model\SupportedPaymentMethod[]
     */
    public function getSupportedPaymentMethods()
    {
        return $this->container['supported_payment_methods'];
    }

    /**
     * Sets supported_payment_methods
     *
     * @param \Cardpay\model\SupportedPaymentMethod[] $supported_payment_methods Supported payment methods
     *
     * @return $this
     */
    public function setSupportedPaymentMethods($supported_payment_methods)
    {
        $this->container['supported_payment_methods'] = $supported_payment_methods;

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

