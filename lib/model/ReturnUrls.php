<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ReturnUrls implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ReturnUrls';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cancel_url' => 'string',
        'decline_url' => 'string',
        'inprocess_url' => 'string',
        'return_url' => 'string',
        'success_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cancel_url' => null,
        'decline_url' => null,
        'inprocess_url' => null,
        'return_url' => null,
        'success_url' => null
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
        'cancel_url' => 'cancel_url',
        'decline_url' => 'decline_url',
        'inprocess_url' => 'inprocess_url',
        'return_url' => 'return_url',
        'success_url' => 'success_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cancel_url' => 'setCancelUrl',
        'decline_url' => 'setDeclineUrl',
        'inprocess_url' => 'setInprocessUrl',
        'return_url' => 'setReturnUrl',
        'success_url' => 'setSuccessUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cancel_url' => 'getCancelUrl',
        'decline_url' => 'getDeclineUrl',
        'inprocess_url' => 'getInprocessUrl',
        'return_url' => 'getReturnUrl',
        'success_url' => 'getSuccessUrl'
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
        $this->container['cancel_url'] = isset($data['cancel_url']) ? $data['cancel_url'] : null;
        $this->container['decline_url'] = isset($data['decline_url']) ? $data['decline_url'] : null;
        $this->container['inprocess_url'] = isset($data['inprocess_url']) ? $data['inprocess_url'] : null;
        $this->container['return_url'] = isset($data['return_url']) ? $data['return_url'] : null;
        $this->container['success_url'] = isset($data['success_url']) ? $data['success_url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['cancel_url']) && (mb_strlen($this->container['cancel_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'cancel_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['cancel_url']) && (mb_strlen($this->container['cancel_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'cancel_url', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['decline_url']) && (mb_strlen($this->container['decline_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'decline_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['decline_url']) && (mb_strlen($this->container['decline_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'decline_url', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['inprocess_url']) && (mb_strlen($this->container['inprocess_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'inprocess_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['inprocess_url']) && (mb_strlen($this->container['inprocess_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'inprocess_url', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['return_url']) && (mb_strlen($this->container['return_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'return_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['return_url']) && (mb_strlen($this->container['return_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'return_url', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['success_url']) && (mb_strlen($this->container['success_url']) > 512)) {
            $invalidProperties[] = "invalid value for 'success_url', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['success_url']) && (mb_strlen($this->container['success_url']) < 0)) {
            $invalidProperties[] = "invalid value for 'success_url', the character length must be bigger than or equal to 0.";
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
     * Gets cancel_url
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->container['cancel_url'];
    }

    /**
     * Sets cancel_url
     *
     * @param string $cancel_url Overrides default cancel URL only
     *
     * @return $this
     */
    public function setCancelUrl($cancel_url)
    {
        if (!is_null($cancel_url) && (mb_strlen($cancel_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $cancel_url when calling ReturnUrls., must be smaller than or equal to 512.');
        }
        if (!is_null($cancel_url) && (mb_strlen($cancel_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $cancel_url when calling ReturnUrls., must be bigger than or equal to 0.');
        }

        $this->container['cancel_url'] = $cancel_url;

        return $this;
    }

    /**
     * Gets decline_url
     *
     * @return string
     */
    public function getDeclineUrl()
    {
        return $this->container['decline_url'];
    }

    /**
     * Sets decline_url
     *
     * @param string $decline_url Overrides default decline URL only
     *
     * @return $this
     */
    public function setDeclineUrl($decline_url)
    {
        if (!is_null($decline_url) && (mb_strlen($decline_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $decline_url when calling ReturnUrls., must be smaller than or equal to 512.');
        }
        if (!is_null($decline_url) && (mb_strlen($decline_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $decline_url when calling ReturnUrls., must be bigger than or equal to 0.');
        }

        $this->container['decline_url'] = $decline_url;

        return $this;
    }

    /**
     * Gets inprocess_url
     *
     * @return string
     */
    public function getInprocessUrl()
    {
        return $this->container['inprocess_url'];
    }

    /**
     * Sets inprocess_url
     *
     * @param string $inprocess_url Special URL for In process status of transaction
     *
     * @return $this
     */
    public function setInprocessUrl($inprocess_url)
    {
        if (!is_null($inprocess_url) && (mb_strlen($inprocess_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $inprocess_url when calling ReturnUrls., must be smaller than or equal to 512.');
        }
        if (!is_null($inprocess_url) && (mb_strlen($inprocess_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $inprocess_url when calling ReturnUrls., must be bigger than or equal to 0.');
        }

        $this->container['inprocess_url'] = $inprocess_url;

        return $this;
    }

    /**
     * Gets return_url
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->container['return_url'];
    }

    /**
     * Sets return_url
     *
     * @param string $return_url Overrides default success URL, decline URL, cancel URL (only in Payment page mode), in process URL. return_url can be used separately or together with other URL parameters.
     *
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        if (!is_null($return_url) && (mb_strlen($return_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $return_url when calling ReturnUrls., must be smaller than or equal to 512.');
        }
        if (!is_null($return_url) && (mb_strlen($return_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $return_url when calling ReturnUrls., must be bigger than or equal to 0.');
        }

        $this->container['return_url'] = $return_url;

        return $this;
    }

    /**
     * Gets success_url
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->container['success_url'];
    }

    /**
     * Sets success_url
     *
     * @param string $success_url Overrides default success URL only
     *
     * @return $this
     */
    public function setSuccessUrl($success_url)
    {
        if (!is_null($success_url) && (mb_strlen($success_url) > 512)) {
            throw new \InvalidArgumentException('invalid length for $success_url when calling ReturnUrls., must be smaller than or equal to 512.');
        }
        if (!is_null($success_url) && (mb_strlen($success_url) < 0)) {
            throw new \InvalidArgumentException('invalid length for $success_url when calling ReturnUrls., must be bigger than or equal to 0.');
        }

        $this->container['success_url'] = $success_url;

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

