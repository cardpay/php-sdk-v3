<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestPaymentData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestPaymentData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'authentication_request' => 'bool',
        'currency' => 'string',
        'dynamic_descriptor' => 'string',
        'encrypted_data' => 'string',
        'generate_token' => 'bool',
        'note' => 'string',
        'preauth' => 'bool',
        'trans_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'authentication_request' => null,
        'currency' => null,
        'dynamic_descriptor' => null,
        'encrypted_data' => null,
        'generate_token' => null,
        'note' => null,
        'preauth' => null,
        'trans_type' => null
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
        'amount' => 'amount',
        'authentication_request' => 'authentication_request',
        'currency' => 'currency',
        'dynamic_descriptor' => 'dynamic_descriptor',
        'encrypted_data' => 'encrypted_data',
        'generate_token' => 'generate_token',
        'note' => 'note',
        'preauth' => 'preauth',
        'trans_type' => 'trans_type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'authentication_request' => 'setAuthenticationRequest',
        'currency' => 'setCurrency',
        'dynamic_descriptor' => 'setDynamicDescriptor',
        'encrypted_data' => 'setEncryptedData',
        'generate_token' => 'setGenerateToken',
        'note' => 'setNote',
        'preauth' => 'setPreauth',
        'trans_type' => 'setTransType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'authentication_request' => 'getAuthenticationRequest',
        'currency' => 'getCurrency',
        'dynamic_descriptor' => 'getDynamicDescriptor',
        'encrypted_data' => 'getEncryptedData',
        'generate_token' => 'getGenerateToken',
        'note' => 'getNote',
        'preauth' => 'getPreauth',
        'trans_type' => 'getTransType'
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

    const TRANS_TYPE__01 = '01';
    const TRANS_TYPE__03 = '03';
    const TRANS_TYPE__10 = '10';
    const TRANS_TYPE__11 = '11';
    const TRANS_TYPE__28 = '28';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTransTypeAllowableValues()
    {
        return [
            self::TRANS_TYPE__01,
            self::TRANS_TYPE__03,
            self::TRANS_TYPE__10,
            self::TRANS_TYPE__11,
            self::TRANS_TYPE__28,
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['authentication_request'] = isset($data['authentication_request']) ? $data['authentication_request'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['dynamic_descriptor'] = isset($data['dynamic_descriptor']) ? $data['dynamic_descriptor'] : null;
        $this->container['encrypted_data'] = isset($data['encrypted_data']) ? $data['encrypted_data'] : null;
        $this->container['generate_token'] = isset($data['generate_token']) ? $data['generate_token'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['preauth'] = isset($data['preauth']) ? $data['preauth'] : null;
        $this->container['trans_type'] = isset($data['trans_type']) ? $data['trans_type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) > 25)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) < 0)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['encrypted_data']) && (mb_strlen($this->container['encrypted_data']) > 10000)) {
            $invalidProperties[] = "invalid value for 'encrypted_data', the character length must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['encrypted_data']) && (mb_strlen($this->container['encrypted_data']) < 0)) {
            $invalidProperties[] = "invalid value for 'encrypted_data', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) > 100)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) < 0)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getTransTypeAllowableValues();
        if (!is_null($this->container['trans_type']) && !in_array($this->container['trans_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'trans_type', must be one of '%s'",
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
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount The total transaction amount in selected currency with dot as a decimal separator, must be less than 100 millions If 'payment_method' = `BITCOIN` then minimum order amount is approximately 0.003 bitcoins or its equivalent. The exact value should be provided by the account manager.
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets authentication_request
     *
     * @return bool
     */
    public function getAuthenticationRequest()
    {
        return $this->container['authentication_request'];
    }

    /**
     * Sets authentication_request
     *
     * @param bool $authentication_request If set to `true`, amount must not be presented in request, no payment will be made, only cardholder authentication will be performed. Also can be used to generate token. *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setAuthenticationRequest($authentication_request)
    {
        $this->container['authentication_request'] = $authentication_request;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency [ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) currency code
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets dynamic_descriptor
     *
     * @return string
     */
    public function getDynamicDescriptor()
    {
        return $this->container['dynamic_descriptor'];
    }

    /**
     * Sets dynamic_descriptor
     *
     * @param string $dynamic_descriptor Short description of the service or product, must be enabled by CardPay manager to be used *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setDynamicDescriptor($dynamic_descriptor)
    {
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) > 25)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling PaymentRequestPaymentData., must be smaller than or equal to 25.');
        }
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) < 0)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling PaymentRequestPaymentData., must be bigger than or equal to 0.');
        }

        $this->container['dynamic_descriptor'] = $dynamic_descriptor;

        return $this;
    }

    /**
     * Gets encrypted_data
     *
     * @return string
     */
    public function getEncryptedData()
    {
        return $this->container['encrypted_data'];
    }

    /**
     * Sets encrypted_data
     *
     * @param string $encrypted_data The encrypted payment credentials encoded in base64. *(for APPLEPAY payment method only)*
     *
     * @return $this
     */
    public function setEncryptedData($encrypted_data)
    {
        if (!is_null($encrypted_data) && (mb_strlen($encrypted_data) > 10000)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_data when calling PaymentRequestPaymentData., must be smaller than or equal to 10000.');
        }
        if (!is_null($encrypted_data) && (mb_strlen($encrypted_data) < 0)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_data when calling PaymentRequestPaymentData., must be bigger than or equal to 0.');
        }

        $this->container['encrypted_data'] = $encrypted_data;

        return $this;
    }

    /**
     * Gets generate_token
     *
     * @return bool
     */
    public function getGenerateToken()
    {
        return $this->container['generate_token'];
    }

    /**
     * Sets generate_token
     *
     * @param bool $generate_token If set to `true`, token will be generated and returned in the response. Token can be generated only for successful transactions (not for declined transactions) *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->container['generate_token'] = $generate_token;

        return $this;
    }

    /**
     * Gets note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->container['note'];
    }

    /**
     * Sets note
     *
     * @param string $note Note about the transaction that will not be displayed to Customer
     *
     * @return $this
     */
    public function setNote($note)
    {
        if (!is_null($note) && (mb_strlen($note) > 100)) {
            throw new \InvalidArgumentException('invalid length for $note when calling PaymentRequestPaymentData., must be smaller than or equal to 100.');
        }
        if (!is_null($note) && (mb_strlen($note) < 0)) {
            throw new \InvalidArgumentException('invalid length for $note when calling PaymentRequestPaymentData., must be bigger than or equal to 0.');
        }

        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets preauth
     *
     * @return bool
     */
    public function getPreauth()
    {
        return $this->container['preauth'];
    }

    /**
     * Sets preauth
     *
     * @param bool $preauth If set to `true`, the amount will not be captured but only blocked. Payments with 'preauth' attribute will be captured automatically in 7 days from the time of creating the preauth transaction. *(for BANKCARD payment method only)*.
     *
     * @return $this
     */
    public function setPreauth($preauth)
    {
        $this->container['preauth'] = $preauth;

        return $this;
    }

    /**
     * Gets trans_type
     *
     * @return string
     */
    public function getTransType()
    {
        return $this->container['trans_type'];
    }

    /**
     * Sets trans_type
     *
     * @param string $trans_type trans_type
     *
     * @return $this
     */
    public function setTransType($trans_type)
    {
        $allowedValues = $this->getTransTypeAllowableValues();
        if (!is_null($trans_type) && !in_array($trans_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'trans_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['trans_type'] = $trans_type;

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

