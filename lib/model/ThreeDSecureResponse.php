<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ThreeDSecureResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ThreeDSecureResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'card_enrollment' => 'string',
        'cardholder_info' => 'string',
        'cavv' => 'string',
        'cavv_algorithm' => 'string',
        'challenge_cancel' => 'string',
        'ds_transaction_id' => 'string',
        'eci' => 'string',
        'pa_res' => 'string',
        'protocol_version' => 'string',
        'status' => 'string',
        'status_reason' => 'string',
        'three_d_secure2_passed' => 'bool',
        'three_d_secure_flow' => 'string',
        'xid' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'card_enrollment' => null,
        'cardholder_info' => null,
        'cavv' => null,
        'cavv_algorithm' => null,
        'challenge_cancel' => null,
        'ds_transaction_id' => null,
        'eci' => null,
        'pa_res' => null,
        'protocol_version' => null,
        'status' => null,
        'status_reason' => null,
        'three_d_secure2_passed' => null,
        'three_d_secure_flow' => null,
        'xid' => null
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
        'card_enrollment' => 'card_enrollment',
        'cardholder_info' => 'cardholder_info',
        'cavv' => 'cavv',
        'cavv_algorithm' => 'cavv_algorithm',
        'challenge_cancel' => 'challenge_cancel',
        'ds_transaction_id' => 'ds_transaction_id',
        'eci' => 'eci',
        'pa_res' => 'pa_res',
        'protocol_version' => 'protocol_version',
        'status' => 'status',
        'status_reason' => 'status_reason',
        'three_d_secure2_passed' => 'three_d_secure2_passed',
        'three_d_secure_flow' => 'three_d_secure_flow',
        'xid' => 'xid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_enrollment' => 'setCardEnrollment',
        'cardholder_info' => 'setCardholderInfo',
        'cavv' => 'setCavv',
        'cavv_algorithm' => 'setCavvAlgorithm',
        'challenge_cancel' => 'setChallengeCancel',
        'ds_transaction_id' => 'setDsTransactionId',
        'eci' => 'setEci',
        'pa_res' => 'setPaRes',
        'protocol_version' => 'setProtocolVersion',
        'status' => 'setStatus',
        'status_reason' => 'setStatusReason',
        'three_d_secure2_passed' => 'setThreeDSecure2Passed',
        'three_d_secure_flow' => 'setThreeDSecureFlow',
        'xid' => 'setXid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_enrollment' => 'getCardEnrollment',
        'cardholder_info' => 'getCardholderInfo',
        'cavv' => 'getCavv',
        'cavv_algorithm' => 'getCavvAlgorithm',
        'challenge_cancel' => 'getChallengeCancel',
        'ds_transaction_id' => 'getDsTransactionId',
        'eci' => 'getEci',
        'pa_res' => 'getPaRes',
        'protocol_version' => 'getProtocolVersion',
        'status' => 'getStatus',
        'status_reason' => 'getStatusReason',
        'three_d_secure2_passed' => 'getThreeDSecure2Passed',
        'three_d_secure_flow' => 'getThreeDSecureFlow',
        'xid' => 'getXid'
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
        $this->container['card_enrollment'] = isset($data['card_enrollment']) ? $data['card_enrollment'] : null;
        $this->container['cardholder_info'] = isset($data['cardholder_info']) ? $data['cardholder_info'] : null;
        $this->container['cavv'] = isset($data['cavv']) ? $data['cavv'] : null;
        $this->container['cavv_algorithm'] = isset($data['cavv_algorithm']) ? $data['cavv_algorithm'] : null;
        $this->container['challenge_cancel'] = isset($data['challenge_cancel']) ? $data['challenge_cancel'] : null;
        $this->container['ds_transaction_id'] = isset($data['ds_transaction_id']) ? $data['ds_transaction_id'] : null;
        $this->container['eci'] = isset($data['eci']) ? $data['eci'] : null;
        $this->container['pa_res'] = isset($data['pa_res']) ? $data['pa_res'] : null;
        $this->container['protocol_version'] = isset($data['protocol_version']) ? $data['protocol_version'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['status_reason'] = isset($data['status_reason']) ? $data['status_reason'] : null;
        $this->container['three_d_secure2_passed'] = isset($data['three_d_secure2_passed']) ? $data['three_d_secure2_passed'] : null;
        $this->container['three_d_secure_flow'] = isset($data['three_d_secure_flow']) ? $data['three_d_secure_flow'] : null;
        $this->container['xid'] = isset($data['xid']) ? $data['xid'] : null;
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
     * Gets card_enrollment
     *
     * @return string
     */
    public function getCardEnrollment()
    {
        return $this->container['card_enrollment'];
    }

    /**
     * Sets card_enrollment
     *
     * @param string $card_enrollment Card enrollment in 3DS flow, possible values are: S - 3D Secure Skipped, N - 3D Secure not enrolled, Y - 3D Secure enrolled
     *
     * @return $this
     */
    public function setCardEnrollment($card_enrollment)
    {
        $this->container['card_enrollment'] = $card_enrollment;

        return $this;
    }

    /**
     * Gets cardholder_info
     *
     * @return string
     */
    public function getCardholderInfo()
    {
        return $this->container['cardholder_info'];
    }

    /**
     * Sets cardholder_info
     *
     * @param string $cardholder_info Text provided by the ACS/Issuer to Cardholder during a Frictionless transaction  by the ACS.
     *
     * @return $this
     */
    public function setCardholderInfo($cardholder_info)
    {
        $this->container['cardholder_info'] = $cardholder_info;

        return $this;
    }

    /**
     * Gets cavv
     *
     * @return string
     */
    public function getCavv()
    {
        return $this->container['cavv'];
    }

    /**
     * Sets cavv
     *
     * @param string $cavv Cardholder authentication verification value
     *
     * @return $this
     */
    public function setCavv($cavv)
    {
        $this->container['cavv'] = $cavv;

        return $this;
    }

    /**
     * Gets cavv_algorithm
     *
     * @return string
     */
    public function getCavvAlgorithm()
    {
        return $this->container['cavv_algorithm'];
    }

    /**
     * Sets cavv_algorithm
     *
     * @param string $cavv_algorithm CAVV algorithm
     *
     * @return $this
     */
    public function setCavvAlgorithm($cavv_algorithm)
    {
        $this->container['cavv_algorithm'] = $cavv_algorithm;

        return $this;
    }

    /**
     * Gets challenge_cancel
     *
     * @return string
     */
    public function getChallengeCancel()
    {
        return $this->container['challenge_cancel'];
    }

    /**
     * Sets challenge_cancel
     *
     * @param string $challenge_cancel Indicator informing that the authentication has been cancelled
     *
     * @return $this
     */
    public function setChallengeCancel($challenge_cancel)
    {
        $this->container['challenge_cancel'] = $challenge_cancel;

        return $this;
    }

    /**
     * Gets ds_transaction_id
     *
     * @return string
     */
    public function getDsTransactionId()
    {
        return $this->container['ds_transaction_id'];
    }

    /**
     * Sets ds_transaction_id
     *
     * @param string $ds_transaction_id Transaction Id
     *
     * @return $this
     */
    public function setDsTransactionId($ds_transaction_id)
    {
        $this->container['ds_transaction_id'] = $ds_transaction_id;

        return $this;
    }

    /**
     * Gets eci
     *
     * @return string
     */
    public function getEci()
    {
        return $this->container['eci'];
    }

    /**
     * Sets eci
     *
     * @param string $eci The electronic commerce indicator
     *
     * @return $this
     */
    public function setEci($eci)
    {
        $this->container['eci'] = $eci;

        return $this;
    }

    /**
     * Gets pa_res
     *
     * @return string
     */
    public function getPaRes()
    {
        return $this->container['pa_res'];
    }

    /**
     * Sets pa_res
     *
     * @param string $pa_res PaRes bank authentication result
     *
     * @return $this
     */
    public function setPaRes($pa_res)
    {
        $this->container['pa_res'] = $pa_res;

        return $this;
    }

    /**
     * Gets protocol_version
     *
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->container['protocol_version'];
    }

    /**
     * Sets protocol_version
     *
     * @param string $protocol_version Protocol version identifier
     *
     * @return $this
     */
    public function setProtocolVersion($protocol_version)
    {
        $this->container['protocol_version'] = $protocol_version;

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
     * @param string $status 3DS status (from PaRes for 3Ds 1.0, ARes message for 3Ds 2.0) (possible values Y,A,U,N)
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets status_reason
     *
     * @return string
     */
    public function getStatusReason()
    {
        return $this->container['status_reason'];
    }

    /**
     * Sets status_reason
     *
     * @param string $status_reason Provides information on why the Status field has the specified value
     *
     * @return $this
     */
    public function setStatusReason($status_reason)
    {
        $this->container['status_reason'] = $status_reason;

        return $this;
    }

    /**
     * Gets three_d_secure2_passed
     *
     * @return bool
     */
    public function getThreeDSecure2Passed()
    {
        return $this->container['three_d_secure2_passed'];
    }

    /**
     * Sets three_d_secure2_passed
     *
     * @param bool $three_d_secure2_passed Sign of trying to pass 3ds2
     *
     * @return $this
     */
    public function setThreeDSecure2Passed($three_d_secure2_passed)
    {
        $this->container['three_d_secure2_passed'] = $three_d_secure2_passed;

        return $this;
    }

    /**
     * Gets three_d_secure_flow
     *
     * @return string
     */
    public function getThreeDSecureFlow()
    {
        return $this->container['three_d_secure_flow'];
    }

    /**
     * Sets three_d_secure_flow
     *
     * @param string $three_d_secure_flow Possible values: 3DS1 - 3DS 1.0 flow, 3DS2C - 3DS 2.0 challenge flow, 3DS2F - 3DS 2.0 frictionless flow
     *
     * @return $this
     */
    public function setThreeDSecureFlow($three_d_secure_flow)
    {
        $this->container['three_d_secure_flow'] = $three_d_secure_flow;

        return $this;
    }

    /**
     * Gets xid
     *
     * @return string
     */
    public function getXid()
    {
        return $this->container['xid'];
    }

    /**
     * Sets xid
     *
     * @param string $xid Transaction Id in PaRes
     *
     * @return $this
     */
    public function setXid($xid)
    {
        $this->container['xid'] = $xid;

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

