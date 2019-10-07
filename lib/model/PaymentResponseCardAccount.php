<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentResponseCardAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentResponseCardAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'acct_type' => 'string',
        'expiration' => 'string',
        'holder' => 'string',
        'issuing_country_code' => 'string',
        'masked_pan' => 'string',
        'token' => 'string'
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
        'issuing_country_code' => null,
        'masked_pan' => null,
        'token' => null
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
        'issuing_country_code' => 'issuing_country_code',
        'masked_pan' => 'masked_pan',
        'token' => 'token'
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
        'issuing_country_code' => 'setIssuingCountryCode',
        'masked_pan' => 'setMaskedPan',
        'token' => 'setToken'
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
        'issuing_country_code' => 'getIssuingCountryCode',
        'masked_pan' => 'getMaskedPan',
        'token' => 'getToken'
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
        $this->container['issuing_country_code'] = isset($data['issuing_country_code']) ? $data['issuing_country_code'] : null;
        $this->container['masked_pan'] = isset($data['masked_pan']) ? $data['masked_pan'] : null;
        $this->container['token'] = isset($data['token']) ? $data['token'] : null;
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
     * @param string $expiration Customer’s card expiration date. Format: `mm/yyyy`
     *
     * @return $this
     */
    public function setExpiration($expiration)
    {
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
     * @param string $holder Customer's cardholder name. Any valid cardholder name. Not present by default, ask CardPay manager to enable it if needed.
     *
     * @return $this
     */
    public function setHolder($holder)
    {
        $this->container['holder'] = $holder;

        return $this;
    }

    /**
     * Gets issuing_country_code
     *
     * @return string
     */
    public function getIssuingCountryCode()
    {
        return $this->container['issuing_country_code'];
    }

    /**
     * Sets issuing_country_code
     *
     * @param string $issuing_country_code Country code of issuing card country
     *
     * @return $this
     */
    public function setIssuingCountryCode($issuing_country_code)
    {
        $this->container['issuing_country_code'] = $issuing_country_code;

        return $this;
    }

    /**
     * Gets masked_pan
     *
     * @return string
     */
    public function getMaskedPan()
    {
        return $this->container['masked_pan'];
    }

    /**
     * Sets masked_pan
     *
     * @param string $masked_pan Masked PAN (shows first 6 digits and 4 last digits)
     *
     * @return $this
     */
    public function setMaskedPan($masked_pan)
    {
        $this->container['masked_pan'] = $masked_pan;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token Generated card token value. Token can be returned only for successful transactions (not for declined transactions). For payment: PaymentResponsePaymentData, for recurring: RecurringResponseRecurringData.
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->container['token'] = $token;

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

