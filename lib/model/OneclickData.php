<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class OneclickData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OneclickData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'contract_number' => 'string',
        'currency' => 'string',
        'dynamic_descriptor' => 'string',
        'filing' => '\Cardpay\model\RecurringRequestFiling',
        'generate_token' => 'bool',
        'initiator' => 'string',
        'network_trans_id' => 'string',
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
        'contract_number' => null,
        'currency' => null,
        'dynamic_descriptor' => null,
        'filing' => null,
        'generate_token' => null,
        'initiator' => null,
        'network_trans_id' => null,
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
        'contract_number' => 'contract_number',
        'currency' => 'currency',
        'dynamic_descriptor' => 'dynamic_descriptor',
        'filing' => 'filing',
        'generate_token' => 'generate_token',
        'initiator' => 'initiator',
        'network_trans_id' => 'network_trans_id',
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
        'contract_number' => 'setContractNumber',
        'currency' => 'setCurrency',
        'dynamic_descriptor' => 'setDynamicDescriptor',
        'filing' => 'setFiling',
        'generate_token' => 'setGenerateToken',
        'initiator' => 'setInitiator',
        'network_trans_id' => 'setNetworkTransId',
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
        'contract_number' => 'getContractNumber',
        'currency' => 'getCurrency',
        'dynamic_descriptor' => 'getDynamicDescriptor',
        'filing' => 'getFiling',
        'generate_token' => 'getGenerateToken',
        'initiator' => 'getInitiator',
        'network_trans_id' => 'getNetworkTransId',
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
        $this->container['contract_number'] = isset($data['contract_number']) ? $data['contract_number'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['dynamic_descriptor'] = isset($data['dynamic_descriptor']) ? $data['dynamic_descriptor'] : null;
        $this->container['filing'] = isset($data['filing']) ? $data['filing'] : null;
        $this->container['generate_token'] = isset($data['generate_token']) ? $data['generate_token'] : null;
        $this->container['initiator'] = isset($data['initiator']) ? $data['initiator'] : null;
        $this->container['network_trans_id'] = isset($data['network_trans_id']) ? $data['network_trans_id'] : null;
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

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) > 25)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['dynamic_descriptor']) && (mb_strlen($this->container['dynamic_descriptor']) < 0)) {
            $invalidProperties[] = "invalid value for 'dynamic_descriptor', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['initiator'] === null) {
            $invalidProperties[] = "'initiator' can't be null";
        }
        if (!preg_match("/mit|cit/", $this->container['initiator'])) {
            $invalidProperties[] = "invalid value for 'initiator', must be conform to the pattern /mit|cit/.";
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
     * @param float $amount The total transaction amount in selected currency with dot as a decimal separator, must be less than 10 billion
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets contract_number
     *
     * @return string
     */
    public function getContractNumber()
    {
        return $this->container['contract_number'];
    }

    /**
     * Sets contract_number
     *
     * @param string $contract_number Contract number between customer and merchant. Required for Mexican merchants for scheduled payments.
     *
     * @return $this
     */
    public function setContractNumber($contract_number)
    {
        $this->container['contract_number'] = $contract_number;

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
     * @param string $dynamic_descriptor Short description of the service or product, must be enabled by CardPay manager to be used.
     *
     * @return $this
     */
    public function setDynamicDescriptor($dynamic_descriptor)
    {
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) > 25)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling OneclickData., must be smaller than or equal to 25.');
        }
        if (!is_null($dynamic_descriptor) && (mb_strlen($dynamic_descriptor) < 0)) {
            throw new \InvalidArgumentException('invalid length for $dynamic_descriptor when calling OneclickData., must be bigger than or equal to 0.');
        }

        $this->container['dynamic_descriptor'] = $dynamic_descriptor;

        return $this;
    }

    /**
     * Gets filing
     *
     * @return \Cardpay\model\RecurringRequestFiling
     */
    public function getFiling()
    {
        return $this->container['filing'];
    }

    /**
     * Sets filing
     *
     * @param \Cardpay\model\RecurringRequestFiling $filing Filing data, should be send in all recurring requests besides first recurring request First recurring request should be send without filing attribute
     *
     * @return $this
     */
    public function setFiling($filing)
    {
        $this->container['filing'] = $filing;

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
     * @param bool $generate_token This attribute can be received only in first recurring request. If set to 'true', Card token will be generated and returned in GET response for all successful transactions (can't be generated for declined transactions). In all requests with filing_id card.token can't be generated.
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->container['generate_token'] = $generate_token;

        return $this;
    }

    /**
     * Gets initiator
     *
     * @return string
     */
    public function getInitiator()
    {
        return $this->container['initiator'];
    }

    /**
     * Sets initiator
     *
     * @param string $initiator Can be only 2 values - 'mit' (merchant initiated transaction), 'cit' (cardholder initiated transaction).
     *
     * @return $this
     */
    public function setInitiator($initiator)
    {

        if ((!preg_match("/mit|cit/", $initiator))) {
            throw new \InvalidArgumentException("invalid value for $initiator when calling OneclickData., must conform to the pattern /mit|cit/.");
        }

        $this->container['initiator'] = $initiator;

        return $this;
    }

    /**
     * Gets network_trans_id
     *
     * @return string
     */
    public function getNetworkTransId()
    {
        return $this->container['network_trans_id'];
    }

    /**
     * Sets network_trans_id
     *
     * @param string $network_trans_id Network Reference Number of original transaction
     *
     * @return $this
     */
    public function setNetworkTransId($network_trans_id)
    {
        $this->container['network_trans_id'] = $network_trans_id;

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
     * @param string $note Note about the recurring that will not be displayed to customer.
     *
     * @return $this
     */
    public function setNote($note)
    {
        if (!is_null($note) && (mb_strlen($note) > 100)) {
            throw new \InvalidArgumentException('invalid length for $note when calling OneclickData., must be smaller than or equal to 100.');
        }
        if (!is_null($note) && (mb_strlen($note) < 0)) {
            throw new \InvalidArgumentException('invalid length for $note when calling OneclickData., must be bigger than or equal to 0.');
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
     * @param bool $preauth This parameter allowed to be used only for first recurring payment. If set to 'true', the amount will not be captured but only blocked. One-click payments with 'preauth' attribute will be captured automatically in 7 days from the time of creating the preauth transaction. In continue recurring request (with 'filing_id') this parameter shouldn't be used.
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
            throw new \InvalidArgumentException("invalid value for $sca_exemption when calling OneclickData., must conform to the pattern /LOW_VALUE/.");
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
            throw new \InvalidArgumentException("invalid value for $three_ds_challenge_indicator when calling OneclickData., must conform to the pattern /01|04/.");
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

