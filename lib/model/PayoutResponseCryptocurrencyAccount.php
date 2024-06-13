<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PayoutResponseCryptocurrencyAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PayoutResponseCryptocurrencyAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'crypto_address' => 'string',
        'crypto_transaction_id' => 'string',
        'prc_amount' => 'float',
        'prc_currency' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'crypto_address' => null,
        'crypto_transaction_id' => null,
        'prc_amount' => null,
        'prc_currency' => null
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
        'crypto_address' => 'crypto_address',
        'crypto_transaction_id' => 'crypto_transaction_id',
        'prc_amount' => 'prc_amount',
        'prc_currency' => 'prc_currency'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'crypto_address' => 'setCryptoAddress',
        'crypto_transaction_id' => 'setCryptoTransactionId',
        'prc_amount' => 'setPrcAmount',
        'prc_currency' => 'setPrcCurrency'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'crypto_address' => 'getCryptoAddress',
        'crypto_transaction_id' => 'getCryptoTransactionId',
        'prc_amount' => 'getPrcAmount',
        'prc_currency' => 'getPrcCurrency'
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
        $this->container['crypto_address'] = isset($data['crypto_address']) ? $data['crypto_address'] : null;
        $this->container['crypto_transaction_id'] = isset($data['crypto_transaction_id']) ? $data['crypto_transaction_id'] : null;
        $this->container['prc_amount'] = isset($data['prc_amount']) ? $data['prc_amount'] : null;
        $this->container['prc_currency'] = isset($data['prc_currency']) ? $data['prc_currency'] : null;
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
     * Gets crypto_address
     *
     * @return string
     */
    public function getCryptoAddress()
    {
        return $this->container['crypto_address'];
    }

    /**
     * Sets crypto_address
     *
     * @param string $crypto_address Customer's bitcoin address can be used for payout
     *
     * @return $this
     */
    public function setCryptoAddress($crypto_address)
    {
        $this->container['crypto_address'] = $crypto_address;

        return $this;
    }

    /**
     * Gets crypto_transaction_id
     *
     * @return string
     */
    public function getCryptoTransactionId()
    {
        return $this->container['crypto_transaction_id'];
    }

    /**
     * Sets crypto_transaction_id
     *
     * @param string $crypto_transaction_id Id of created transaction in the bitcoin system
     *
     * @return $this
     */
    public function setCryptoTransactionId($crypto_transaction_id)
    {
        $this->container['crypto_transaction_id'] = $crypto_transaction_id;

        return $this;
    }

    /**
     * Gets prc_amount
     *
     * @return float
     */
    public function getPrcAmount()
    {
        return $this->container['prc_amount'];
    }

    /**
     * Sets prc_amount
     *
     * @param float $prc_amount Transaction amount
     *
     * @return $this
     */
    public function setPrcAmount($prc_amount)
    {
        $this->container['prc_amount'] = $prc_amount;

        return $this;
    }

    /**
     * Gets prc_currency
     *
     * @return string
     */
    public function getPrcCurrency()
    {
        return $this->container['prc_currency'];
    }

    /**
     * Sets prc_currency
     *
     * @param string $prc_currency Currency of transaction
     *
     * @return $this
     */
    public function setPrcCurrency($prc_currency)
    {
        $this->container['prc_currency'] = $prc_currency;

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

