<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentResponsePaymentData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentResponsePaymentData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'action_code' => 'string',
        'amount' => 'float',
        'arn' => 'string',
        'auth_code' => 'string',
        'created' => 'string',
        'currency' => 'string',
        'decline_code' => 'string',
        'decline_reason' => 'string',
        'id' => 'string',
        'installment_type' => 'string',
        'installments' => 'string',
        'invalid_data' => 'string[]',
        'is_3d' => 'bool',
        'note' => 'string',
        'rrn' => 'string',
        'status' => 'string',
        'trans_type' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'action_code' => null,
        'amount' => null,
        'arn' => null,
        'auth_code' => null,
        'created' => null,
        'currency' => null,
        'decline_code' => null,
        'decline_reason' => null,
        'id' => null,
        'installment_type' => null,
        'installments' => null,
        'invalid_data' => null,
        'is_3d' => null,
        'note' => null,
        'rrn' => null,
        'status' => null,
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
        'action_code' => 'action_code',
        'amount' => 'amount',
        'arn' => 'arn',
        'auth_code' => 'auth_code',
        'created' => 'created',
        'currency' => 'currency',
        'decline_code' => 'decline_code',
        'decline_reason' => 'decline_reason',
        'id' => 'id',
        'installment_type' => 'installment_type',
        'installments' => 'installments',
        'invalid_data' => 'invalid_data',
        'is_3d' => 'is_3d',
        'note' => 'note',
        'rrn' => 'rrn',
        'status' => 'status',
        'trans_type' => 'trans_type',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'action_code' => 'setActionCode',
        'amount' => 'setAmount',
        'arn' => 'setArn',
        'auth_code' => 'setAuthCode',
        'created' => 'setCreated',
        'currency' => 'setCurrency',
        'decline_code' => 'setDeclineCode',
        'decline_reason' => 'setDeclineReason',
        'id' => 'setId',
        'installment_type' => 'setInstallmentType',
        'installments' => 'setInstallments',
        'invalid_data' => 'setInvalidData',
        'is_3d' => 'setIs3d',
        'note' => 'setNote',
        'rrn' => 'setRrn',
        'status' => 'setStatus',
        'trans_type' => 'setTransType',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'action_code' => 'getActionCode',
        'amount' => 'getAmount',
        'arn' => 'getArn',
        'auth_code' => 'getAuthCode',
        'created' => 'getCreated',
        'currency' => 'getCurrency',
        'decline_code' => 'getDeclineCode',
        'decline_reason' => 'getDeclineReason',
        'id' => 'getId',
        'installment_type' => 'getInstallmentType',
        'installments' => 'getInstallments',
        'invalid_data' => 'getInvalidData',
        'is_3d' => 'getIs3d',
        'note' => 'getNote',
        'rrn' => 'getRrn',
        'status' => 'getStatus',
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
        $this->container['action_code'] = isset($data['action_code']) ? $data['action_code'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['arn'] = isset($data['arn']) ? $data['arn'] : null;
        $this->container['auth_code'] = isset($data['auth_code']) ? $data['auth_code'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['decline_code'] = isset($data['decline_code']) ? $data['decline_code'] : null;
        $this->container['decline_reason'] = isset($data['decline_reason']) ? $data['decline_reason'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['installment_type'] = isset($data['installment_type']) ? $data['installment_type'] : null;
        $this->container['installments'] = isset($data['installments']) ? $data['installments'] : null;
        $this->container['invalid_data'] = isset($data['invalid_data']) ? $data['invalid_data'] : null;
        $this->container['is_3d'] = isset($data['is_3d']) ? $data['is_3d'] : null;
        $this->container['note'] = isset($data['note']) ? $data['note'] : null;
        $this->container['rrn'] = isset($data['rrn']) ? $data['rrn'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
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
     * Gets action_code
     *
     * @return string
     */
    public function getActionCode()
    {
        return $this->container['action_code'];
    }

    /**
     * Sets action_code
     *
     * @param string $action_code Action code (only in decline case)
     *
     * @return $this
     */
    public function setActionCode($action_code)
    {
        $this->container['action_code'] = $action_code;

        return $this;
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
     * Gets arn
     *
     * @return string
     */
    public function getArn()
    {
        return $this->container['arn'];
    }

    /**
     * Sets arn
     *
     * @param string $arn ARN (Acquirer Reference Number), supplied by the acquiring financial institution, return only after receiving ARN from bank acquirer *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setArn($arn)
    {
        $this->container['arn'] = $arn;

        return $this;
    }

    /**
     * Gets auth_code
     *
     * @return string
     */
    public function getAuthCode()
    {
        return $this->container['auth_code'];
    }

    /**
     * Sets auth_code
     *
     * @param string $auth_code Authorization code, provided by bank *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setAuthCode($auth_code)
    {
        $this->container['auth_code'] = $auth_code;

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
     * @param string $id CardPay's payment id
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
     * @param string $installment_type Selected installment type
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
     * @param string $installments Number of total installment payments, to be charged
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
     * @param string[] $invalid_data Invalid card or billing data
     *
     * @return $this
     */
    public function setInvalidData($invalid_data)
    {
        $this->container['invalid_data'] = $invalid_data;

        return $this;
    }

    /**
     * Gets is_3d
     *
     * @return bool
     */
    public function getIs3d()
    {
        return $this->container['is_3d'];
    }

    /**
     * Sets is_3d
     *
     * @param bool $is_3d Was 3-D Secure authentication made or not *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setIs3d($is_3d)
    {
        $this->container['is_3d'] = $is_3d;

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
     * @param string $note Payment note
     *
     * @return $this
     */
    public function setNote($note)
    {
        $this->container['note'] = $note;

        return $this;
    }

    /**
     * Gets rrn
     *
     * @return string
     */
    public function getRrn()
    {
        return $this->container['rrn'];
    }

    /**
     * Sets rrn
     *
     * @param string $rrn RRN (Retrieval Reference Number), supplied by the acquiring financial institution *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setRrn($rrn)
    {
        $this->container['rrn'] = $rrn;

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
     * @param string $status Current payment status, *(mandatory for WEBMONEY and BITCOIN payment method only)*
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
     * @param string $type Payment type, can be PAYMENT, INSTALLMENT
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

