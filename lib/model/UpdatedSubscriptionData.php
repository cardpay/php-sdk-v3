<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class UpdatedSubscriptionData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UpdatedSubscriptionData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'change_status_claim_id' => 'string',
        'details' => 'string',
        'filing' => '\Cardpay\model\RecurringResponseFiling',
        'id' => 'string',
        'is_executed' => 'bool',
        'next_payment_date' => '\DateTime',
        'plan' => '\Cardpay\model\Plan',
        'recurring_data' => '\Cardpay\model\UpdatedSubscriptionRecurringData',
        'remaining_amount' => 'float',
        'status' => 'string',
        'status_to' => 'string',
        'units' => 'int',
        'updated' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'change_status_claim_id' => null,
        'details' => null,
        'filing' => null,
        'id' => null,
        'is_executed' => null,
        'next_payment_date' => 'date-time',
        'plan' => null,
        'recurring_data' => null,
        'remaining_amount' => null,
        'status' => null,
        'status_to' => null,
        'units' => 'int32',
        'updated' => 'date-time'
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
        'change_status_claim_id' => 'change_status_claim_id',
        'details' => 'details',
        'filing' => 'filing',
        'id' => 'id',
        'is_executed' => 'is_executed',
        'next_payment_date' => 'next_payment_date',
        'plan' => 'plan',
        'recurring_data' => 'recurring_data',
        'remaining_amount' => 'remaining_amount',
        'status' => 'status',
        'status_to' => 'status_to',
        'units' => 'units',
        'updated' => 'updated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'change_status_claim_id' => 'setChangeStatusClaimId',
        'details' => 'setDetails',
        'filing' => 'setFiling',
        'id' => 'setId',
        'is_executed' => 'setIsExecuted',
        'next_payment_date' => 'setNextPaymentDate',
        'plan' => 'setPlan',
        'recurring_data' => 'setRecurringData',
        'remaining_amount' => 'setRemainingAmount',
        'status' => 'setStatus',
        'status_to' => 'setStatusTo',
        'units' => 'setUnits',
        'updated' => 'setUpdated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'change_status_claim_id' => 'getChangeStatusClaimId',
        'details' => 'getDetails',
        'filing' => 'getFiling',
        'id' => 'getId',
        'is_executed' => 'getIsExecuted',
        'next_payment_date' => 'getNextPaymentDate',
        'plan' => 'getPlan',
        'recurring_data' => 'getRecurringData',
        'remaining_amount' => 'getRemainingAmount',
        'status' => 'getStatus',
        'status_to' => 'getStatusTo',
        'units' => 'getUnits',
        'updated' => 'getUpdated'
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

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_PAST_DUE = 'PAST_DUE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CARD_EXPIRED = 'CARD_EXPIRED';
    const STATUS_ACTIVATION_FAILED = 'ACTIVATION_FAILED';
    const STATUS_TO_ACTIVE = 'ACTIVE';
    const STATUS_TO_INACTIVE = 'INACTIVE';
    const STATUS_TO_CANCELLED = 'CANCELLED';
    const STATUS_TO_PAST_DUE = 'PAST_DUE';
    const STATUS_TO_PENDING = 'PENDING';
    const STATUS_TO_COMPLETED = 'COMPLETED';
    const STATUS_TO_CARD_EXPIRED = 'CARD_EXPIRED';
    const STATUS_TO_ACTIVATION_FAILED = 'ACTIVATION_FAILED';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
            self::STATUS_CANCELLED,
            self::STATUS_PAST_DUE,
            self::STATUS_PENDING,
            self::STATUS_COMPLETED,
            self::STATUS_CARD_EXPIRED,
            self::STATUS_ACTIVATION_FAILED,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusToAllowableValues()
    {
        return [
            self::STATUS_TO_ACTIVE,
            self::STATUS_TO_INACTIVE,
            self::STATUS_TO_CANCELLED,
            self::STATUS_TO_PAST_DUE,
            self::STATUS_TO_PENDING,
            self::STATUS_TO_COMPLETED,
            self::STATUS_TO_CARD_EXPIRED,
            self::STATUS_TO_ACTIVATION_FAILED,
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
        $this->container['change_status_claim_id'] = isset($data['change_status_claim_id']) ? $data['change_status_claim_id'] : null;
        $this->container['details'] = isset($data['details']) ? $data['details'] : null;
        $this->container['filing'] = isset($data['filing']) ? $data['filing'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['is_executed'] = isset($data['is_executed']) ? $data['is_executed'] : null;
        $this->container['next_payment_date'] = isset($data['next_payment_date']) ? $data['next_payment_date'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['recurring_data'] = isset($data['recurring_data']) ? $data['recurring_data'] : null;
        $this->container['remaining_amount'] = isset($data['remaining_amount']) ? $data['remaining_amount'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['status_to'] = isset($data['status_to']) ? $data['status_to'] : null;
        $this->container['units'] = isset($data['units']) ? $data['units'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
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

        $allowedValues = $this->getStatusToAllowableValues();
        if (!is_null($this->container['status_to']) && !in_array($this->container['status_to'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status_to', must be one of '%s'",
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
     * Gets change_status_claim_id
     *
     * @return string
     */
    public function getChangeStatusClaimId()
    {
        return $this->container['change_status_claim_id'];
    }

    /**
     * Sets change_status_claim_id
     *
     * @param string $change_status_claim_id ID of claim; appears in case of request change was processed asynchronously and put in queue. Mandatory if request was put in queue.
     *
     * @return $this
     */
    public function setChangeStatusClaimId($change_status_claim_id)
    {
        $this->container['change_status_claim_id'] = $change_status_claim_id;

        return $this;
    }

    /**
     * Gets details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->container['details'];
    }

    /**
     * Sets details
     *
     * @param string $details Operation details, errors, etc.
     *
     * @return $this
     */
    public function setDetails($details)
    {
        $this->container['details'] = $details;

        return $this;
    }

    /**
     * Gets filing
     *
     * @return \Cardpay\model\RecurringResponseFiling
     */
    public function getFiling()
    {
        return $this->container['filing'];
    }

    /**
     * Sets filing
     *
     * @param \Cardpay\model\RecurringResponseFiling $filing Filing data
     *
     * @return $this
     */
    public function setFiling($filing)
    {
        $this->container['filing'] = $filing;

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
     * @param string $id ID of subscription
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets is_executed
     *
     * @return bool
     */
    public function getIsExecuted()
    {
        return $this->container['is_executed'];
    }

    /**
     * Sets is_executed
     *
     * @param bool $is_executed Status of operation
     *
     * @return $this
     */
    public function setIsExecuted($is_executed)
    {
        $this->container['is_executed'] = $is_executed;

        return $this;
    }

    /**
     * Gets next_payment_date
     *
     * @return \DateTime
     */
    public function getNextPaymentDate()
    {
        return $this->container['next_payment_date'];
    }

    /**
     * Sets next_payment_date
     *
     * @param \DateTime $next_payment_date next_payment_date
     *
     * @return $this
     */
    public function setNextPaymentDate($next_payment_date)
    {
        $this->container['next_payment_date'] = $next_payment_date;

        return $this;
    }

    /**
     * Gets plan
     *
     * @return \Cardpay\model\Plan
     */
    public function getPlan()
    {
        return $this->container['plan'];
    }

    /**
     * Sets plan
     *
     * @param \Cardpay\model\Plan $plan Plan data
     *
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->container['plan'] = $plan;

        return $this;
    }

    /**
     * Gets recurring_data
     *
     * @return \Cardpay\model\UpdatedSubscriptionRecurringData
     */
    public function getRecurringData()
    {
        return $this->container['recurring_data'];
    }

    /**
     * Sets recurring_data
     *
     * @param \Cardpay\model\UpdatedSubscriptionRecurringData $recurring_data Recurring data
     *
     * @return $this
     */
    public function setRecurringData($recurring_data)
    {
        $this->container['recurring_data'] = $recurring_data;

        return $this;
    }

    /**
     * Gets remaining_amount
     *
     * @return float
     */
    public function getRemainingAmount()
    {
        return $this->container['remaining_amount'];
    }

    /**
     * Sets remaining_amount
     *
     * @param float $remaining_amount The amount remained to be paid after repayment operation. Mandatory for `REPAYMENT` operation only
     *
     * @return $this
     */
    public function setRemainingAmount($remaining_amount)
    {
        $this->container['remaining_amount'] = $remaining_amount;

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
     * @param string $status Resulted status of subscription
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
     * Gets status_to
     *
     * @return string
     */
    public function getStatusTo()
    {
        return $this->container['status_to'];
    }

    /**
     * Sets status_to
     *
     * @param string $status_to Requested status of subscription. Mandatory for `CHANGE_STATUS` operation only.
     *
     * @return $this
     */
    public function setStatusTo($status_to)
    {
        $allowedValues = $this->getStatusToAllowableValues();
        if (!is_null($status_to) && !in_array($status_to, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status_to', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status_to'] = $status_to;

        return $this;
    }

    /**
     * Gets units
     *
     * @return int
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param int $units New quantity of subscription units
     *
     * @return $this
     */
    public function setUnits($units)
    {
        $this->container['units'] = $units;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime $updated If request is successful then date and time returned in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (format - yyyy-MM-dd'T'HH:mm:ss'Z').
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

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

