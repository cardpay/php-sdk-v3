<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
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
        'installment_amount' => 'float',
        'installment_type' => 'string',
        'installments' => 'string',
        'note' => 'string',
        'preauth' => 'bool',
        'sca_exemption' => 'string',
        'three_ds_challenge_indicator' => 'string',
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
        'installment_amount' => null,
        'installment_type' => null,
        'installments' => null,
        'note' => null,
        'preauth' => null,
        'sca_exemption' => null,
        'three_ds_challenge_indicator' => null,
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
        'installment_amount' => 'installment_amount',
        'installment_type' => 'installment_type',
        'installments' => 'installments',
        'note' => 'note',
        'preauth' => 'preauth',
        'sca_exemption' => 'sca_exemption',
        'three_ds_challenge_indicator' => 'three_ds_challenge_indicator',
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
        'installment_amount' => 'setInstallmentAmount',
        'installment_type' => 'setInstallmentType',
        'installments' => 'setInstallments',
        'note' => 'setNote',
        'preauth' => 'setPreauth',
        'sca_exemption' => 'setScaExemption',
        'three_ds_challenge_indicator' => 'setThreeDsChallengeIndicator',
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
        'installment_amount' => 'getInstallmentAmount',
        'installment_type' => 'getInstallmentType',
        'installments' => 'getInstallments',
        'note' => 'getNote',
        'preauth' => 'getPreauth',
        'sca_exemption' => 'getScaExemption',
        'three_ds_challenge_indicator' => 'getThreeDsChallengeIndicator',
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
        $this->container['installment_amount'] = isset($data['installment_amount']) ? $data['installment_amount'] : null;
        $this->container['installment_type'] = isset($data['installment_type']) ? $data['installment_type'] : null;
        $this->container['installments'] = isset($data['installments']) ? $data['installments'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['preauth'] = isset($data['preauth']) ? $data['preauth'] : null;
        $this->container['sca_exemption'] = isset($data['sca_exemption']) ? $data['sca_exemption'] : null;
        $this->container['three_ds_challenge_indicator'] = isset($data['three_ds_challenge_indicator']) ? $data['three_ds_challenge_indicator'] : null;
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

        if (!is_null($this->container['installment_type']) && !preg_match("/IF|MF_HOLD/", $this->container['installment_type'])) {
            $invalidProperties[] = "invalid value for 'installment_type', must be conform to the pattern /IF|MF_HOLD/.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) > 100)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['note']) && (mb_strlen($this->container['note']) < 0)) {
            $invalidProperties[] = "invalid value for 'note', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['sca_exemption']) && !preg_match("/LOW_VALUE/", $this->container['sca_exemption'])) {
            $invalidProperties[] = "invalid value for 'sca_exemption', must be conform to the pattern /LOW_VALUE/.";
        }

        if (!is_null($this->container['three_ds_challenge_indicator']) && !preg_match("/01|04/", $this->container['three_ds_challenge_indicator'])) {
            $invalidProperties[] = "invalid value for 'three_ds_challenge_indicator', must be conform to the pattern /01|04/.";
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
     * @param float $amount The total transaction amount in selected currency with dot as a decimal separator, must be less than 10 billion If 'payment_method' = `BITCOIN` then minimum order amount is approximately 0.003 bitcoins or its equivalent. The exact value should be provided by the account manager.
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
     * Gets installment_amount
     *
     * @return float
     */
    public function getInstallmentAmount()
    {
        return $this->container['installment_amount'];
    }

    /**
     * Sets installment_amount
     *
     * @param float $installment_amount Amount of 1 installment payment, should be less or equal to total amount of subscription, can have dot as a decimal separator. Mandatory for Payment Page Mode only.
     *
     * @return $this
     */
    public function setInstallmentAmount($installment_amount)
    {
        $this->container['installment_amount'] = $installment_amount;

        return $this;
    }

    /**
     * Gets installment_type
     *
     * @return string
     */
    public function getInstallmentType()
    {
        return $this->container['installment_type'];
    }

    /**
     * Sets installment_type
     *
     * @param string $installment_type Installment type, 2 possible values: `IF` - issuer financed `MF_HOLD' - merchant financed. For installment subscription with hold rest amount.
     *
     * @return $this
     */
    public function setInstallmentType($installment_type)
    {

        if (!is_null($installment_type) && (!preg_match("/IF|MF_HOLD/", $installment_type))) {
            throw new \InvalidArgumentException("invalid value for $installment_type when calling PaymentRequestPaymentData., must conform to the pattern /IF|MF_HOLD/.");
        }

        $this->container['installment_type'] = $installment_type;

        return $this;
    }

    /**
     * Gets installments
     *
     * @return string
     */
    public function getInstallments()
    {
        return $this->container['installments'];
    }

    /**
     * Sets installments
     *
     * @param string $installments Number of total installment payments, to be charged per defined interval. For installment subscription with installment_type = `MF_HOLD` can be 1-12. For installment subscription with installment_type = `IF` can be 1-99.
     *
     * @return $this
     */
    public function setInstallments($installments)
    {
        $this->container['installments'] = $installments;

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
     * Gets sca_exemption
     *
     * @return string
     */
    public function getScaExemption()
    {
        return $this->container['sca_exemption'];
    }

    /**
     * Sets sca_exemption
     *
     * @param string $sca_exemption Indicates the exemption type that you want to request for the transaction. Possible value: LOW_VALUE
     *
     * @return $this
     */
    public function setScaExemption($sca_exemption)
    {

        if (!is_null($sca_exemption) && (!preg_match("/LOW_VALUE/", $sca_exemption))) {
            throw new \InvalidArgumentException("invalid value for $sca_exemption when calling PaymentRequestPaymentData., must conform to the pattern /LOW_VALUE/.");
        }

        $this->container['sca_exemption'] = $sca_exemption;

        return $this;
    }

    /**
     * Gets three_ds_challenge_indicator
     *
     * @return string
     */
    public function getThreeDsChallengeIndicator()
    {
        return $this->container['three_ds_challenge_indicator'];
    }

    /**
     * Sets three_ds_challenge_indicator
     *
     * @param string $three_ds_challenge_indicator three_ds_challenge_indicator
     *
     * @return $this
     */
    public function setThreeDsChallengeIndicator($three_ds_challenge_indicator)
    {

        if (!is_null($three_ds_challenge_indicator) && (!preg_match("/01|04/", $three_ds_challenge_indicator))) {
            throw new \InvalidArgumentException("invalid value for $three_ds_challenge_indicator when calling PaymentRequestPaymentData., must conform to the pattern /01|04/.");
        }

        $this->container['three_ds_challenge_indicator'] = $three_ds_challenge_indicator;

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

