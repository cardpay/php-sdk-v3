<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
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
        'card_brand' => 'string',
        'card_type' => 'string',
        'expiration' => 'string',
        'holder' => 'string',
        'issuer' => 'string',
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
        'card_brand' => null,
        'card_type' => null,
        'expiration' => null,
        'holder' => null,
        'issuer' => null,
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
        'card_brand' => 'card_brand',
        'card_type' => 'card_type',
        'expiration' => 'expiration',
        'holder' => 'holder',
        'issuer' => 'issuer',
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
        'card_brand' => 'setCardBrand',
        'card_type' => 'setCardType',
        'expiration' => 'setExpiration',
        'holder' => 'setHolder',
        'issuer' => 'setIssuer',
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
        'card_brand' => 'getCardBrand',
        'card_type' => 'getCardType',
        'expiration' => 'getExpiration',
        'holder' => 'getHolder',
        'issuer' => 'getIssuer',
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
    const CARD_TYPE_DEBIT = 'DEBIT';
    const CARD_TYPE_CREDIT = 'CREDIT';
    const CARD_TYPE_PREPAID = 'PREPAID';
    const CARD_TYPE_OTHER = 'OTHER';
    const CARD_TYPE_UNKNOWN = 'UNKNOWN';
    

    
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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCardTypeAllowableValues()
    {
        return [
            self::CARD_TYPE_DEBIT,
            self::CARD_TYPE_CREDIT,
            self::CARD_TYPE_PREPAID,
            self::CARD_TYPE_OTHER,
            self::CARD_TYPE_UNKNOWN,
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
        $this->container['card_brand'] = isset($data['card_brand']) ? $data['card_brand'] : null;
        $this->container['card_type'] = isset($data['card_type']) ? $data['card_type'] : null;
        $this->container['expiration'] = isset($data['expiration']) ? $data['expiration'] : null;
        $this->container['holder'] = isset($data['holder']) ? $data['holder'] : null;
        $this->container['issuer'] = isset($data['issuer']) ? $data['issuer'] : null;
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

        $allowedValues = $this->getCardTypeAllowableValues();
        if (!is_null($this->container['card_type']) && !in_array($this->container['card_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'card_type', must be one of '%s'",
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
     * Gets card_brand
     *
     * @return string
     */
    public function getCardBrand()
    {
        return $this->container['card_brand'];
    }

    /**
     * Sets card_brand
     *
     * @param string $card_brand Card brand
     *
     * @return $this
     */
    public function setCardBrand($card_brand)
    {
        $this->container['card_brand'] = $card_brand;

        return $this;
    }

    /**
     * Gets card_type
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->container['card_type'];
    }

    /**
     * Sets card_type
     *
     * @param string $card_type Card type
     *
     * @return $this
     */
    public function setCardType($card_type)
    {
        $allowedValues = $this->getCardTypeAllowableValues();
        if (!is_null($card_type) && !in_array($card_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'card_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['card_type'] = $card_type;

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
     * Gets issuer
     *
     * @return string
     */
    public function getIssuer()
    {
        return $this->container['issuer'];
    }

    /**
     * Sets issuer
     *
     * @param string $issuer Card issuer
     *
     * @return $this
     */
    public function setIssuer($issuer)
    {
        $this->container['issuer'] = $issuer;

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

