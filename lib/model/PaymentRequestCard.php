<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestCard implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestCard';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'acct_type' => 'string',
        'expiration' => 'string',
        'holder' => 'string',
        'pan' => 'string',
        'pin_code' => 'string',
        'security_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'acct_type' => null,
        'expiration' => null,
        'holder' => null,
        'pan' => null,
        'pin_code' => null,
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
        'acct_type' => 'acct_type',
        'expiration' => 'expiration',
        'holder' => 'holder',
        'pan' => 'pan',
        'pin_code' => 'pin_code',
        'security_code' => 'security_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'acct_type' => 'setAcctType',
        'expiration' => 'setExpiration',
        'holder' => 'setHolder',
        'pan' => 'setPan',
        'pin_code' => 'setPinCode',
        'security_code' => 'setSecurityCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'acct_type' => 'getAcctType',
        'expiration' => 'getExpiration',
        'holder' => 'getHolder',
        'pan' => 'getPan',
        'pin_code' => 'getPinCode',
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

    const ACCT_TYPE__01 = '01';
    const ACCT_TYPE__02 = '02';
    const ACCT_TYPE__03 = '03';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAcctTypeAllowableValues()
    {
        return [
            self::ACCT_TYPE__01,
            self::ACCT_TYPE__02,
            self::ACCT_TYPE__03,
        ];
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
        $this->container['acct_type'] = isset($data['acct_type']) ? $data['acct_type'] : null;
        $this->container['expiration'] = isset($data['expiration']) ? $data['expiration'] : null;
        $this->container['holder'] = isset($data['holder']) ? $data['holder'] : null;
        $this->container['pan'] = isset($data['pan']) ? $data['pan'] : null;
        $this->container['pin_code'] = isset($data['pin_code']) ? $data['pin_code'] : null;
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

        $allowedValues = $this->getAcctTypeAllowableValues();
        if (!is_null($this->container['acct_type']) && !in_array($this->container['acct_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'acct_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['expiration']) && !preg_match("/([0-9]{2}\/[0-9]{4})/", $this->container['expiration'])) {
            $invalidProperties[] = "invalid value for 'expiration', must be conform to the pattern /([0-9]{2}\/[0-9]{4})/.";
        }

        if (!is_null($this->container['holder']) && (mb_strlen($this->container['holder']) > 50)) {
            $invalidProperties[] = "invalid value for 'holder', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['holder']) && (mb_strlen($this->container['holder']) < 1)) {
            $invalidProperties[] = "invalid value for 'holder', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['pan']) && (mb_strlen($this->container['pan']) > 19)) {
            $invalidProperties[] = "invalid value for 'pan', the character length must be smaller than or equal to 19.";
        }

        if (!is_null($this->container['pan']) && (mb_strlen($this->container['pan']) < 13)) {
            $invalidProperties[] = "invalid value for 'pan', the character length must be bigger than or equal to 13.";
        }

        if (!is_null($this->container['pin_code']) && !preg_match("/^[0-9]{4}$/", $this->container['pin_code'])) {
            $invalidProperties[] = "invalid value for 'pin_code', must be conform to the pattern /^[0-9]{4}$/.";
        }

        if (!is_null($this->container['security_code']) && !preg_match("/[0-9]{3,4}/", $this->container['security_code'])) {
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
     * Gets acct_type
     *
     * @return string
     */
    public function getAcctType()
    {
        return $this->container['acct_type'];
    }

    /**
     * Sets acct_type
     *
     * @param string $acct_type acct_type
     *
     * @return $this
     */
    public function setAcctType($acct_type)
    {
        $allowedValues = $this->getAcctTypeAllowableValues();
        if (!is_null($acct_type) && !in_array($acct_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'acct_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['acct_type'] = $acct_type;

        return $this;
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

        if (!is_null($expiration) && (!preg_match("/([0-9]{2}\/[0-9]{4})/", $expiration))) {
            throw new \InvalidArgumentException("invalid value for $expiration when calling PaymentRequestCard., must conform to the pattern /([0-9]{2}\/[0-9]{4})/.");
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
        if (!is_null($holder) && (mb_strlen($holder) > 50)) {
            throw new \InvalidArgumentException('invalid length for $holder when calling PaymentRequestCard., must be smaller than or equal to 50.');
        }
        if (!is_null($holder) && (mb_strlen($holder) < 1)) {
            throw new \InvalidArgumentException('invalid length for $holder when calling PaymentRequestCard., must be bigger than or equal to 1.');
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
        if (!is_null($pan) && (mb_strlen($pan) > 19)) {
            throw new \InvalidArgumentException('invalid length for $pan when calling PaymentRequestCard., must be smaller than or equal to 19.');
        }
        if (!is_null($pan) && (mb_strlen($pan) < 13)) {
            throw new \InvalidArgumentException('invalid length for $pan when calling PaymentRequestCard., must be bigger than or equal to 13.');
        }

        $this->container['pan'] = $pan;

        return $this;
    }

    /**
     * Gets pin_code
     *
     * @return string
     */
    public function getPinCode()
    {
        return $this->container['pin_code'];
    }

    /**
     * Sets pin_code
     *
     * @param string $pin_code pin_code
     *
     * @return $this
     */
    public function setPinCode($pin_code)
    {

        if (!is_null($pin_code) && (!preg_match("/^[0-9]{4}$/", $pin_code))) {
            throw new \InvalidArgumentException("invalid value for $pin_code when calling PaymentRequestCard., must conform to the pattern /^[0-9]{4}$/.");
        }

        $this->container['pin_code'] = $pin_code;

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

        if (!is_null($security_code) && (!preg_match("/[0-9]{3,4}/", $security_code))) {
            throw new \InvalidArgumentException("invalid value for $security_code when calling PaymentRequestCard., must conform to the pattern /[0-9]{3,4}/.");
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

