<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class AuthDataRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AuthDataRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'currency' => 'string',
        'dynamic_descriptor' => 'string',
        'generate_token' => 'bool',
        'installment_amount' => 'float',
        'installment_type' => 'string',
        'installments' => 'int[]',
        'note' => 'string',
        'recurring_data' => '\Cardpay\model\RecurringData',
        'sca_exemption' => 'string',
        'three_ds_challenge_indicator' => 'string',
        'trans_type' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'currency' => null,
        'dynamic_descriptor' => null,
        'generate_token' => null,
        'installment_amount' => null,
        'installment_type' => null,
        'installments' => 'int32',
        'note' => null,
        'recurring_data' => null,
        'sca_exemption' => null,
        'three_ds_challenge_indicator' => null,
        'trans_type' => null,
        'type' => null
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
        'currency' => 'currency',
        'dynamic_descriptor' => 'dynamic_descriptor',
        'generate_token' => 'generate_token',
        'installment_amount' => 'installment_amount',
        'installment_type' => 'installment_type',
        'installments' => 'installments',
        'note' => 'note',
        'recurring_data' => 'recurring_data',
        'sca_exemption' => 'sca_exemption',
        'three_ds_challenge_indicator' => 'three_ds_challenge_indicator',
        'trans_type' => 'trans_type',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'currency' => 'setCurrency',
        'dynamic_descriptor' => 'setDynamicDescriptor',
        'generate_token' => 'setGenerateToken',
        'installment_amount' => 'setInstallmentAmount',
        'installment_type' => 'setInstallmentType',
        'installments' => 'setInstallments',
        'note' => 'setNote',
        'recurring_data' => 'setRecurringData',
        'sca_exemption' => 'setScaExemption',
        'three_ds_challenge_indicator' => 'setThreeDsChallengeIndicator',
        'trans_type' => 'setTransType',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'currency' => 'getCurrency',
        'dynamic_descriptor' => 'getDynamicDescriptor',
        'generate_token' => 'getGenerateToken',
        'installment_amount' => 'getInstallmentAmount',
        'installment_type' => 'getInstallmentType',
        'installments' => 'getInstallments',
        'note' => 'getNote',
        'recurring_data' => 'getRecurringData',
        'sca_exemption' => 'getScaExemption',
        'three_ds_challenge_indicator' => 'getThreeDsChallengeIndicator',
        'trans_type' => 'getTransType',
        'type' => 'getType'
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

    const TYPE_AVS = 'AVS';
    const TYPE_THREE_DS_PA = 'THREE_DS_PA';
    const TYPE_THREE_DS_NPA = 'THREE_DS_NPA';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_AVS,
            self::TYPE_THREE_DS_PA,
            self::TYPE_THREE_DS_NPA,
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
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['dynamic_descriptor'] = isset($data['dynamic_descriptor']) ? $data['dynamic_descriptor'] : null;
        $this->container['generate_token'] = isset($data['generate_token']) ? $data['generate_token'] : null;
        $this->container['installment_amount'] = isset($data['installment_amount']) ? $data['installment_amount'] : null;
        $this->container['installment_type'] = isset($data['installment_type']) ? $data['installment_type'] : null;
        $this->container['installments'] = isset($data['installments']) ? $data['installments'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['recurring_data'] = isset($data['recurring_data']) ? $data['recurring_data'] : null;
        $this->container['sca_exemption'] = isset($data['sca_exemption']) ? $data['sca_exemption'] : null;
        $this->container['three_ds_challenge_indicator'] = isset($data['three_ds_challenge_indicator']) ? $data['three_ds_challenge_indicator'] : null;
        $this->container['trans_type'] = isset($data['trans_type']) ? $data['trans_type'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
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

        if (!is_null($this->container['installment_type']) && !preg_match("/^(IF|MF_HOLD)?$/", $this->container['installment_type'])) {
            $invalidProperties[] = "invalid value for 'installment_type', must be conform to the pattern /^(IF|MF_HOLD)?$/.";
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

        if (!is_null($this->container['trans_type']) && !preg_match("/01|03|10|11|28/", $this->container['trans_type'])) {
            $invalidProperties[] = "invalid value for 'trans_type', must be conform to the pattern /01|03|10|11|28/.";
        }

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
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
     * @param float $amount The total invoice amount in selected currency with dot as a decimal separator, must be less than 10 billion
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

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
     * @param string $dynamic_descriptor dynamic_descriptor
     *
     * @return $this
     */
    public function setDynamicDescriptor($dynamic_descriptor)
    {
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) > 25)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling AuthDataRequest., must be smaller than or equal to 25.');
        }
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) < 0)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling AuthDataRequest., must be bigger than or equal to 0.');
        }

        $this->container['dynamic_descriptor'] = $dynamic_descriptor;

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
     * @param bool $generate_token If set to `true`, token will be generated and returned in the response (callback). Token can be generated only for successful transactions (not for declined transactions) *(for BANKCARD payment method only)*
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
     * @param float $installment_amount Amount of 1 installment authentication, should be less or equal to total amount of subscription, can have dot as a decimal separator. Mandatory for Payment Page Mode only.
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

        if (!is_null($installment_type) && (!preg_match("/^(IF|MF_HOLD)?$/", $installment_type))) {
            throw new \InvalidArgumentException("invalid value for $installment_type when calling AuthDataRequest., must conform to the pattern /^(IF|MF_HOLD)?$/.");
        }

        $this->container['installment_type'] = $installment_type;

        return $this;
    }

    /**
     * Gets installments
     *
     * @return int[]
     */
    public function getInstallments()
    {
        return $this->container['installments'];
    }

    /**
     * Sets installments
     *
     * @param int[] $installments Number of total installment payments, to be charged per defined interval. For installment subscription with installment_type = `MF_HOLD` can be 1-12. For installment subscription with installment_type = `IF` can be 1-99.
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
     * @param string $note Note about the authentication, not shown to Customer
     *
     * @return $this
     */
    public function setNote($note)
    {
        if (!is_null($note) && (mb_strlen($note) > 100)) {
            throw new \InvalidArgumentException('invalid length for $note when calling AuthDataRequest., must be smaller than or equal to 100.');
        }
        if (!is_null($note) && (mb_strlen($note) < 0)) {
            throw new \InvalidArgumentException('invalid length for $note when calling AuthDataRequest., must be bigger than or equal to 0.');
        }

        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets recurring_data
     *
     * @return \Cardpay\model\RecurringData
     */
    public function getRecurringData()
    {
        return $this->container['recurring_data'];
    }

    /**
     * Sets recurring_data
     *
     * @param \Cardpay\model\RecurringData $recurring_data Recurring data
     *
     * @return $this
     */
    public function setRecurringData($recurring_data)
    {
        $this->container['recurring_data'] = $recurring_data;

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
     * @param string $sca_exemption Indicates the exemption type that you want to request for the authentication. Possible value: LOW_VALUE
     *
     * @return $this
     */
    public function setScaExemption($sca_exemption)
    {

        if (!is_null($sca_exemption) && (!preg_match("/LOW_VALUE/", $sca_exemption))) {
            throw new \InvalidArgumentException("invalid value for $sca_exemption when calling AuthDataRequest., must conform to the pattern /LOW_VALUE/.");
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
            throw new \InvalidArgumentException("invalid value for $three_ds_challenge_indicator when calling AuthDataRequest., must conform to the pattern /01|04/.");
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
     * @param string $trans_type Identifies the type of transaction being authenticated.
     *
     * @return $this
     */
    public function setTransType($trans_type)
    {

        if (!is_null($trans_type) && (!preg_match("/01|03|10|11|28/", $trans_type))) {
            throw new \InvalidArgumentException("invalid value for $trans_type when calling AuthDataRequest., must conform to the pattern /01|03|10|11|28/.");
        }

        $this->container['trans_type'] = $trans_type;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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

