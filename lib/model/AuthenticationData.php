<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class AuthenticationData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AuthenticationData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'created' => 'string',
        'currency' => 'string',
        'decline_code' => 'string',
        'decline_reason' => 'string',
        'id' => 'string',
        'installment_type' => 'string',
        'installments' => 'string',
        'invalid_data' => 'string[]',
        'recurring_data' => '\Cardpay\model\RecurringResponseRecurringData',
        'status' => 'string',
        'three_d_secure' => '\Cardpay\model\ThreeDSecureResponse',
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
        'created' => null,
        'currency' => null,
        'decline_code' => null,
        'decline_reason' => null,
        'id' => null,
        'installment_type' => null,
        'installments' => null,
        'invalid_data' => null,
        'recurring_data' => null,
        'status' => null,
        'three_d_secure' => null,
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
        'created' => 'created',
        'currency' => 'currency',
        'decline_code' => 'decline_code',
        'decline_reason' => 'decline_reason',
        'id' => 'id',
        'installment_type' => 'installment_type',
        'installments' => 'installments',
        'invalid_data' => 'invalid_data',
        'recurring_data' => 'recurring_data',
        'status' => 'status',
        'three_d_secure' => 'three_d_secure',
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
        'created' => 'setCreated',
        'currency' => 'setCurrency',
        'decline_code' => 'setDeclineCode',
        'decline_reason' => 'setDeclineReason',
        'id' => 'setId',
        'installment_type' => 'setInstallmentType',
        'installments' => 'setInstallments',
        'invalid_data' => 'setInvalidData',
        'recurring_data' => 'setRecurringData',
        'status' => 'setStatus',
        'three_d_secure' => 'setThreeDSecure',
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
        'created' => 'getCreated',
        'currency' => 'getCurrency',
        'decline_code' => 'getDeclineCode',
        'decline_reason' => 'getDeclineReason',
        'id' => 'getId',
        'installment_type' => 'getInstallmentType',
        'installments' => 'getInstallments',
        'invalid_data' => 'getInvalidData',
        'recurring_data' => 'getRecurringData',
        'status' => 'getStatus',
        'three_d_secure' => 'getThreeDSecure',
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

    const STATUS__NEW = 'NEW';
    const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    const STATUS_DECLINED = 'DECLINED';
    const STATUS_AUTHORIZED = 'AUTHORIZED';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_REFUNDED = 'REFUNDED';
    const STATUS_VOIDED = 'VOIDED';
    const STATUS_TERMINATED = 'TERMINATED';
    const STATUS_CHARGED_BACK = 'CHARGED_BACK';
    const STATUS_CHARGEBACK_RESOLVED = 'CHARGEBACK_RESOLVED';
    const STATUS_UNPAID = 'UNPAID';
    const STATUS_WAITING = 'WAITING';
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
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS__NEW,
            self::STATUS_IN_PROGRESS,
            self::STATUS_DECLINED,
            self::STATUS_AUTHORIZED,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED,
            self::STATUS_REFUNDED,
            self::STATUS_VOIDED,
            self::STATUS_TERMINATED,
            self::STATUS_CHARGED_BACK,
            self::STATUS_CHARGEBACK_RESOLVED,
            self::STATUS_UNPAID,
            self::STATUS_WAITING,
        ];
    }
    
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
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['decline_code'] = isset($data['decline_code']) ? $data['decline_code'] : null;
        $this->container['decline_reason'] = isset($data['decline_reason']) ? $data['decline_reason'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['installment_type'] = isset($data['installment_type']) ? $data['installment_type'] : null;
        $this->container['installments'] = isset($data['installments']) ? $data['installments'] : null;
        $this->container['invalid_data'] = isset($data['invalid_data']) ? $data['invalid_data'] : null;
        $this->container['recurring_data'] = isset($data['recurring_data']) ? $data['recurring_data'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['three_d_secure'] = isset($data['three_d_secure']) ? $data['three_d_secure'] : null;
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

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * @param float $amount Payment amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param string $created Time when this payment started in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (yyyy-MM-dd'T'HH:mm:ss'Z')
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

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
     * @param string $currency Payment currency code ([ISO 4217](https://en.wikipedia.org/wiki/ISO_4217) code)
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets decline_code
     *
     * @return string
     */
    public function getDeclineCode()
    {
        return $this->container['decline_code'];
    }

    /**
     * Sets decline_code
     *
     * @param string $decline_code Decline code (only in decline case)
     *
     * @return $this
     */
    public function setDeclineCode($decline_code)
    {
        $this->container['decline_code'] = $decline_code;

        return $this;
    }

    /**
     * Gets decline_reason
     *
     * @return string
     */
    public function getDeclineReason()
    {
        return $this->container['decline_reason'];
    }

    /**
     * Sets decline_reason
     *
     * @param string $decline_reason Bank's message about transaction decline reason (only in decline case)
     *
     * @return $this
     */
    public function setDeclineReason($decline_reason)
    {
        $this->container['decline_reason'] = $decline_reason;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Unlimit's payment id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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
     * @param string $installments Number of total installment payments.
     *
     * @return $this
     */
    public function setInstallments($installments)
    {
        $this->container['installments'] = $installments;

        return $this;
    }

    /**
     * Gets invalid_data
     *
     * @return string[]
     */
    public function getInvalidData()
    {
        return $this->container['invalid_data'];
    }

    /**
     * Sets invalid_data
     *
     * @param string[] $invalid_data List incorrect fields for decline
     *
     * @return $this
     */
    public function setInvalidData($invalid_data)
    {
        $this->container['invalid_data'] = $invalid_data;

        return $this;
    }

    /**
     * Gets recurring_data
     *
     * @return \Cardpay\model\RecurringResponseRecurringData
     */
    public function getRecurringData()
    {
        return $this->container['recurring_data'];
    }

    /**
     * Sets recurring_data
     *
     * @param \Cardpay\model\RecurringResponseRecurringData $recurring_data Recurring data
     *
     * @return $this
     */
    public function setRecurringData($recurring_data)
    {
        $this->container['recurring_data'] = $recurring_data;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Current payment status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets three_d_secure
     *
     * @return \Cardpay\model\ThreeDSecureResponse
     */
    public function getThreeDSecure()
    {
        return $this->container['three_d_secure'];
    }

    /**
     * Sets three_d_secure
     *
     * @param \Cardpay\model\ThreeDSecureResponse $three_d_secure 3D Secure results data
     *
     * @return $this
     */
    public function setThreeDSecure($three_d_secure)
    {
        $this->container['three_d_secure'] = $three_d_secure;

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

