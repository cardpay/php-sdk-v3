<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class BrowserInfo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'BrowserInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'accept_header' => 'string',
        'color_depth' => 'int',
        'java_enabled' => 'bool',
        'java_script_enabled' => 'bool',
        'language' => 'string',
        'screen_height' => 'int',
        'screen_width' => 'int',
        'time_zone_offset' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'accept_header' => null,
        'color_depth' => 'int32',
        'java_enabled' => null,
        'java_script_enabled' => null,
        'language' => null,
        'screen_height' => 'int32',
        'screen_width' => 'int32',
        'time_zone_offset' => 'int32'
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
        'accept_header' => 'accept_header',
        'color_depth' => 'color_depth',
        'java_enabled' => 'java_enabled',
        'java_script_enabled' => 'java_script_enabled',
        'language' => 'language',
        'screen_height' => 'screen_height',
        'screen_width' => 'screen_width',
        'time_zone_offset' => 'time_zone_offset'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accept_header' => 'setAcceptHeader',
        'color_depth' => 'setColorDepth',
        'java_enabled' => 'setJavaEnabled',
        'java_script_enabled' => 'setJavaScriptEnabled',
        'language' => 'setLanguage',
        'screen_height' => 'setScreenHeight',
        'screen_width' => 'setScreenWidth',
        'time_zone_offset' => 'setTimeZoneOffset'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accept_header' => 'getAcceptHeader',
        'color_depth' => 'getColorDepth',
        'java_enabled' => 'getJavaEnabled',
        'java_script_enabled' => 'getJavaScriptEnabled',
        'language' => 'getLanguage',
        'screen_height' => 'getScreenHeight',
        'screen_width' => 'getScreenWidth',
        'time_zone_offset' => 'getTimeZoneOffset'
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
        $this->container['accept_header'] = isset($data['accept_header']) ? $data['accept_header'] : null;
        $this->container['color_depth'] = isset($data['color_depth']) ? $data['color_depth'] : null;
        $this->container['java_enabled'] = isset($data['java_enabled']) ? $data['java_enabled'] : null;
        $this->container['java_script_enabled'] = isset($data['java_script_enabled']) ? $data['java_script_enabled'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['screen_height'] = isset($data['screen_height']) ? $data['screen_height'] : null;
        $this->container['screen_width'] = isset($data['screen_width']) ? $data['screen_width'] : null;
        $this->container['time_zone_offset'] = isset($data['time_zone_offset']) ? $data['time_zone_offset'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['accept_header']) && (mb_strlen($this->container['accept_header']) > 2048)) {
            $invalidProperties[] = "invalid value for 'accept_header', the character length must be smaller than or equal to 2048.";
        }

        if (!is_null($this->container['accept_header']) && (mb_strlen($this->container['accept_header']) < 1)) {
            $invalidProperties[] = "invalid value for 'accept_header', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['color_depth']) && ($this->container['color_depth'] > 99)) {
            $invalidProperties[] = "invalid value for 'color_depth', must be smaller than or equal to 99.";
        }

        if (!is_null($this->container['color_depth']) && ($this->container['color_depth'] < 1)) {
            $invalidProperties[] = "invalid value for 'color_depth', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['language']) && (mb_strlen($this->container['language']) > 8)) {
            $invalidProperties[] = "invalid value for 'language', the character length must be smaller than or equal to 8.";
        }

        if (!is_null($this->container['language']) && (mb_strlen($this->container['language']) < 0)) {
            $invalidProperties[] = "invalid value for 'language', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['screen_height']) && ($this->container['screen_height'] > 999999)) {
            $invalidProperties[] = "invalid value for 'screen_height', must be smaller than or equal to 999999.";
        }

        if (!is_null($this->container['screen_height']) && ($this->container['screen_height'] < 1)) {
            $invalidProperties[] = "invalid value for 'screen_height', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['screen_width']) && ($this->container['screen_width'] > 999999)) {
            $invalidProperties[] = "invalid value for 'screen_width', must be smaller than or equal to 999999.";
        }

        if (!is_null($this->container['screen_width']) && ($this->container['screen_width'] < 1)) {
            $invalidProperties[] = "invalid value for 'screen_width', must be bigger than or equal to 1.";
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
     * Gets accept_header
     *
     * @return string
     */
    public function getAcceptHeader()
    {
        return $this->container['accept_header'];
    }

    /**
     * Sets accept_header
     *
     * @param string $accept_header Exact content of the HTTP accept headers as sent to the 3-D Secure 2 Requestor from the Cardholder's browser
     *
     * @return $this
     */
    public function setAcceptHeader($accept_header)
    {
        if (!is_null($accept_header) && (mb_strlen($accept_header) > 2048)) {
            throw new \InvalidArgumentException('invalid length for $accept_header when calling BrowserInfo., must be smaller than or equal to 2048.');
        }
        if (!is_null($accept_header) && (mb_strlen($accept_header) < 1)) {
            throw new \InvalidArgumentException('invalid length for $accept_header when calling BrowserInfo., must be bigger than or equal to 1.');
        }

        $this->container['accept_header'] = $accept_header;

        return $this;
    }

    /**
     * Gets color_depth
     *
     * @return int
     */
    public function getColorDepth()
    {
        return $this->container['color_depth'];
    }

    /**
     * Sets color_depth
     *
     * @param int $color_depth Value representing the bit depth of the colour palette for displaying images, in bits per pixel
     *
     * @return $this
     */
    public function setColorDepth($color_depth)
    {

        if (!is_null($color_depth) && ($color_depth > 99)) {
            throw new \InvalidArgumentException('invalid value for $color_depth when calling BrowserInfo., must be smaller than or equal to 99.');
        }
        if (!is_null($color_depth) && ($color_depth < 1)) {
            throw new \InvalidArgumentException('invalid value for $color_depth when calling BrowserInfo., must be bigger than or equal to 1.');
        }

        $this->container['color_depth'] = $color_depth;

        return $this;
    }

    /**
     * Gets java_enabled
     *
     * @return bool
     */
    public function getJavaEnabled()
    {
        return $this->container['java_enabled'];
    }

    /**
     * Sets java_enabled
     *
     * @param bool $java_enabled Boolean that represents the ability of the cardholder browser to execute Java
     *
     * @return $this
     */
    public function setJavaEnabled($java_enabled)
    {
        $this->container['java_enabled'] = $java_enabled;

        return $this;
    }

    /**
     * Gets java_script_enabled
     *
     * @return bool
     */
    public function getJavaScriptEnabled()
    {
        return $this->container['java_script_enabled'];
    }

    /**
     * Sets java_script_enabled
     *
     * @param bool $java_script_enabled Boolean that represents the ability of the cardholder browser to execute JavaScript
     *
     * @return $this
     */
    public function setJavaScriptEnabled($java_script_enabled)
    {
        $this->container['java_script_enabled'] = $java_script_enabled;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language Value representing the browser language as defined in IETF BCP47
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        if (!is_null($language) && (mb_strlen($language) > 8)) {
            throw new \InvalidArgumentException('invalid length for $language when calling BrowserInfo., must be smaller than or equal to 8.');
        }
        if (!is_null($language) && (mb_strlen($language) < 0)) {
            throw new \InvalidArgumentException('invalid length for $language when calling BrowserInfo., must be bigger than or equal to 0.');
        }

        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets screen_height
     *
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->container['screen_height'];
    }

    /**
     * Sets screen_height
     *
     * @param int $screen_height Total height of the Cardholder’s screen in pixels
     *
     * @return $this
     */
    public function setScreenHeight($screen_height)
    {

        if (!is_null($screen_height) && ($screen_height > 999999)) {
            throw new \InvalidArgumentException('invalid value for $screen_height when calling BrowserInfo., must be smaller than or equal to 999999.');
        }
        if (!is_null($screen_height) && ($screen_height < 1)) {
            throw new \InvalidArgumentException('invalid value for $screen_height when calling BrowserInfo., must be bigger than or equal to 1.');
        }

        $this->container['screen_height'] = $screen_height;

        return $this;
    }

    /**
     * Gets screen_width
     *
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->container['screen_width'];
    }

    /**
     * Sets screen_width
     *
     * @param int $screen_width Total width of the Cardholder's screen in pixels
     *
     * @return $this
     */
    public function setScreenWidth($screen_width)
    {

        if (!is_null($screen_width) && ($screen_width > 999999)) {
            throw new \InvalidArgumentException('invalid value for $screen_width when calling BrowserInfo., must be smaller than or equal to 999999.');
        }
        if (!is_null($screen_width) && ($screen_width < 1)) {
            throw new \InvalidArgumentException('invalid value for $screen_width when calling BrowserInfo., must be bigger than or equal to 1.');
        }

        $this->container['screen_width'] = $screen_width;

        return $this;
    }

    /**
     * Gets time_zone_offset
     *
     * @return int
     */
    public function getTimeZoneOffset()
    {
        return $this->container['time_zone_offset'];
    }

    /**
     * Sets time_zone_offset
     *
     * @param int $time_zone_offset Time-zone offset in minutes between UTC and the Cardholder browser local time
     *
     * @return $this
     */
    public function setTimeZoneOffset($time_zone_offset)
    {
        $this->container['time_zone_offset'] = $time_zone_offset;

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

