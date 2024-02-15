<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PlanQuantity implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PlanQuantity';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'ending_quantity' => 'int',
        'price_per_unit' => 'float',
        'starting_quantity' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'ending_quantity' => 'int32',
        'price_per_unit' => null,
        'starting_quantity' => 'int32'
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
        'ending_quantity' => 'ending_quantity',
        'price_per_unit' => 'price_per_unit',
        'starting_quantity' => 'starting_quantity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ending_quantity' => 'setEndingQuantity',
        'price_per_unit' => 'setPricePerUnit',
        'starting_quantity' => 'setStartingQuantity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ending_quantity' => 'getEndingQuantity',
        'price_per_unit' => 'getPricePerUnit',
        'starting_quantity' => 'getStartingQuantity'
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
        $this->container['ending_quantity'] = isset($data['ending_quantity']) ? $data['ending_quantity'] : null;
        $this->container['price_per_unit'] = isset($data['price_per_unit']) ? $data['price_per_unit'] : null;
        $this->container['starting_quantity'] = isset($data['starting_quantity']) ? $data['starting_quantity'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['ending_quantity']) && ($this->container['ending_quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'ending_quantity', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['price_per_unit']) && ($this->container['price_per_unit'] < 0)) {
            $invalidProperties[] = "invalid value for 'price_per_unit', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['starting_quantity']) && ($this->container['starting_quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'starting_quantity', must be bigger than or equal to 1.";
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
     * Gets ending_quantity
     *
     * @return int
     */
    public function getEndingQuantity()
    {
        return $this->container['ending_quantity'];
    }

    /**
     * Sets ending_quantity
     *
     * @param int $ending_quantity Ending units quantity of the subscription. Mandatory if `pricing_model` is `TIERED` or `VOLUME`
     *
     * @return $this
     */
    public function setEndingQuantity($ending_quantity)
    {

        if (!is_null($ending_quantity) && ($ending_quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $ending_quantity when calling PlanQuantity., must be bigger than or equal to 1.');
        }

        $this->container['ending_quantity'] = $ending_quantity;

        return $this;
    }

    /**
     * Gets price_per_unit
     *
     * @return float
     */
    public function getPricePerUnit()
    {
        return $this->container['price_per_unit'];
    }

    /**
     * Sets price_per_unit
     *
     * @param float $price_per_unit Price depending units quantity. Mandatory if `pricing_model` is `TIERED` or `VOLUME`
     *
     * @return $this
     */
    public function setPricePerUnit($price_per_unit)
    {

        if (!is_null($price_per_unit) && ($price_per_unit < 0)) {
            throw new \InvalidArgumentException('invalid value for $price_per_unit when calling PlanQuantity., must be bigger than or equal to 0.');
        }

        $this->container['price_per_unit'] = $price_per_unit;

        return $this;
    }

    /**
     * Gets starting_quantity
     *
     * @return int
     */
    public function getStartingQuantity()
    {
        return $this->container['starting_quantity'];
    }

    /**
     * Sets starting_quantity
     *
     * @param int $starting_quantity Starting units quantity of the subscription. Mandatory if `pricing_model` is `TIERED` or `VOLUME`
     *
     * @return $this
     */
    public function setStartingQuantity($starting_quantity)
    {

        if (!is_null($starting_quantity) && ($starting_quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $starting_quantity when calling PlanQuantity., must be bigger than or equal to 1.');
        }

        $this->container['starting_quantity'] = $starting_quantity;

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

