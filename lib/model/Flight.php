<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class Flight implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Flight';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'carrier_code' => 'string',
        'destination_code' => 'string',
        'fare_basis_code' => 'string',
        'index' => 'int',
        'number' => 'string',
        'service_class_code' => 'int',
        'stop_over_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'carrier_code' => null,
        'destination_code' => null,
        'fare_basis_code' => null,
        'index' => 'int32',
        'number' => null,
        'service_class_code' => 'int32',
        'stop_over_code' => null
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
        'carrier_code' => 'carrier_code',
        'destination_code' => 'destination_code',
        'fare_basis_code' => 'fare_basis_code',
        'index' => 'index',
        'number' => 'number',
        'service_class_code' => 'service_class_code',
        'stop_over_code' => 'stop_over_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'carrier_code' => 'setCarrierCode',
        'destination_code' => 'setDestinationCode',
        'fare_basis_code' => 'setFareBasisCode',
        'index' => 'setIndex',
        'number' => 'setNumber',
        'service_class_code' => 'setServiceClassCode',
        'stop_over_code' => 'setStopOverCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'carrier_code' => 'getCarrierCode',
        'destination_code' => 'getDestinationCode',
        'fare_basis_code' => 'getFareBasisCode',
        'index' => 'getIndex',
        'number' => 'getNumber',
        'service_class_code' => 'getServiceClassCode',
        'stop_over_code' => 'getStopOverCode'
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
        $this->container['carrier_code'] = isset($data['carrier_code']) ? $data['carrier_code'] : null;
        $this->container['destination_code'] = isset($data['destination_code']) ? $data['destination_code'] : null;
        $this->container['fare_basis_code'] = isset($data['fare_basis_code']) ? $data['fare_basis_code'] : null;
        $this->container['index'] = isset($data['index']) ? $data['index'] : null;
        $this->container['number'] = isset($data['number']) ? $data['number'] : null;
        $this->container['service_class_code'] = isset($data['service_class_code']) ? $data['service_class_code'] : null;
        $this->container['stop_over_code'] = isset($data['stop_over_code']) ? $data['stop_over_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['carrier_code']) && (mb_strlen($this->container['carrier_code']) > 2)) {
            $invalidProperties[] = "invalid value for 'carrier_code', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['carrier_code']) && (mb_strlen($this->container['carrier_code']) < 2)) {
            $invalidProperties[] = "invalid value for 'carrier_code', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['destination_code']) && (mb_strlen($this->container['destination_code']) > 3)) {
            $invalidProperties[] = "invalid value for 'destination_code', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['destination_code']) && (mb_strlen($this->container['destination_code']) < 3)) {
            $invalidProperties[] = "invalid value for 'destination_code', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['fare_basis_code']) && (mb_strlen($this->container['fare_basis_code']) > 6)) {
            $invalidProperties[] = "invalid value for 'fare_basis_code', the character length must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['fare_basis_code']) && (mb_strlen($this->container['fare_basis_code']) < 0)) {
            $invalidProperties[] = "invalid value for 'fare_basis_code', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['number']) && (mb_strlen($this->container['number']) > 5)) {
            $invalidProperties[] = "invalid value for 'number', the character length must be smaller than or equal to 5.";
        }

        if (!is_null($this->container['number']) && (mb_strlen($this->container['number']) < 0)) {
            $invalidProperties[] = "invalid value for 'number', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['stop_over_code']) && (mb_strlen($this->container['stop_over_code']) > 1)) {
            $invalidProperties[] = "invalid value for 'stop_over_code', the character length must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['stop_over_code']) && (mb_strlen($this->container['stop_over_code']) < 1)) {
            $invalidProperties[] = "invalid value for 'stop_over_code', the character length must be bigger than or equal to 1.";
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
     * Gets carrier_code
     *
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->container['carrier_code'];
    }

    /**
     * Sets carrier_code
     *
     * @param string $carrier_code Carrier code
     *
     * @return $this
     */
    public function setCarrierCode($carrier_code)
    {
        if (!is_null($carrier_code) && (mb_strlen($carrier_code) > 2)) {
            throw new \InvalidArgumentException('invalid length for $carrier_code when calling Flight., must be smaller than or equal to 2.');
        }
        if (!is_null($carrier_code) && (mb_strlen($carrier_code) < 2)) {
            throw new \InvalidArgumentException('invalid length for $carrier_code when calling Flight., must be bigger than or equal to 2.');
        }

        $this->container['carrier_code'] = $carrier_code;

        return $this;
    }

    /**
     * Gets destination_code
     *
     * @return string
     */
    public function getDestinationCode()
    {
        return $this->container['destination_code'];
    }

    /**
     * Sets destination_code
     *
     * @param string $destination_code Code of airport of destination, IATA code
     *
     * @return $this
     */
    public function setDestinationCode($destination_code)
    {
        if (!is_null($destination_code) && (mb_strlen($destination_code) > 3)) {
            throw new \InvalidArgumentException('invalid length for $destination_code when calling Flight., must be smaller than or equal to 3.');
        }
        if (!is_null($destination_code) && (mb_strlen($destination_code) < 3)) {
            throw new \InvalidArgumentException('invalid length for $destination_code when calling Flight., must be bigger than or equal to 3.');
        }

        $this->container['destination_code'] = $destination_code;

        return $this;
    }

    /**
     * Gets fare_basis_code
     *
     * @return string
     */
    public function getFareBasisCode()
    {
        return $this->container['fare_basis_code'];
    }

    /**
     * Sets fare_basis_code
     *
     * @param string $fare_basis_code Fare basis code
     *
     * @return $this
     */
    public function setFareBasisCode($fare_basis_code)
    {
        if (!is_null($fare_basis_code) && (mb_strlen($fare_basis_code) > 6)) {
            throw new \InvalidArgumentException('invalid length for $fare_basis_code when calling Flight., must be smaller than or equal to 6.');
        }
        if (!is_null($fare_basis_code) && (mb_strlen($fare_basis_code) < 0)) {
            throw new \InvalidArgumentException('invalid length for $fare_basis_code when calling Flight., must be bigger than or equal to 0.');
        }

        $this->container['fare_basis_code'] = $fare_basis_code;

        return $this;
    }

    /**
     * Gets index
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->container['index'];
    }

    /**
     * Sets index
     *
     * @param int $index Sequence number (index) of the flight, each index number must be unique in one flights section
     *
     * @return $this
     */
    public function setIndex($index)
    {
        $this->container['index'] = $index;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string $number IATA or ICAO flight number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        if (!is_null($number) && (mb_strlen($number) > 5)) {
            throw new \InvalidArgumentException('invalid length for $number when calling Flight., must be smaller than or equal to 5.');
        }
        if (!is_null($number) && (mb_strlen($number) < 0)) {
            throw new \InvalidArgumentException('invalid length for $number when calling Flight., must be bigger than or equal to 0.');
        }

        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets service_class_code
     *
     * @return int
     */
    public function getServiceClassCode()
    {
        return $this->container['service_class_code'];
    }

    /**
     * Sets service_class_code
     *
     * @param int $service_class_code Code of service class
     *
     * @return $this
     */
    public function setServiceClassCode($service_class_code)
    {
        $this->container['service_class_code'] = $service_class_code;

        return $this;
    }

    /**
     * Gets stop_over_code
     *
     * @return string
     */
    public function getStopOverCode()
    {
        return $this->container['stop_over_code'];
    }

    /**
     * Sets stop_over_code
     *
     * @param string $stop_over_code Stop over code
     *
     * @return $this
     */
    public function setStopOverCode($stop_over_code)
    {
        if (!is_null($stop_over_code) && (mb_strlen($stop_over_code) > 1)) {
            throw new \InvalidArgumentException('invalid length for $stop_over_code when calling Flight., must be smaller than or equal to 1.');
        }
        if (!is_null($stop_over_code) && (mb_strlen($stop_over_code) < 1)) {
            throw new \InvalidArgumentException('invalid length for $stop_over_code when calling Flight., must be bigger than or equal to 1.');
        }

        $this->container['stop_over_code'] = $stop_over_code;

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

