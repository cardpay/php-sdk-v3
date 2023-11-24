<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class ThreeDSecureData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ThreeDSecureData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'card_enrollment' => 'string',
        'cavv' => 'string',
        'cavv_algorithm' => 'string',
        'pa_res' => 'string',
        'status' => 'string',
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
        'cavv' => null,
        'cavv_algorithm' => null,
        'pa_res' => null,
        'status' => null,
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
        'cavv' => 'cavv',
        'cavv_algorithm' => 'cavv_algorithm',
        'pa_res' => 'pa_res',
        'status' => 'status',
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
        'cavv' => 'setCavv',
        'cavv_algorithm' => 'setCavvAlgorithm',
        'pa_res' => 'setPaRes',
        'status' => 'setStatus',
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
        'cavv' => 'getCavv',
        'cavv_algorithm' => 'getCavvAlgorithm',
        'pa_res' => 'getPaRes',
        'status' => 'getStatus',
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
        $this->container['cavv'] = isset($data['cavv']) ? $data['cavv'] : null;
        $this->container['cavv_algorithm'] = isset($data['cavv_algorithm']) ? $data['cavv_algorithm'] : null;
        $this->container['pa_res'] = isset($data['pa_res']) ? $data['pa_res'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
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

        if (!is_null($this->container['card_enrollment']) && !preg_match("/[SNY]/", $this->container['card_enrollment'])) {
            $invalidProperties[] = "invalid value for 'card_enrollment', must be conform to the pattern /[SNY]/.";
        }

        if (!is_null($this->container['status']) && !preg_match("/[YAU]/", $this->container['status'])) {
            $invalidProperties[] = "invalid value for 'status', must be conform to the pattern /[YAU]/.";
        }

        if (!is_null($this->container['three_d_secure_flow']) && !preg_match("/3DS1|3DS2C|3DS2F/", $this->container['three_d_secure_flow'])) {
            $invalidProperties[] = "invalid value for 'three_d_secure_flow', must be conform to the pattern /3DS1|3DS2C|3DS2F/.";
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

        if (!is_null($card_enrollment) && (!preg_match("/[SNY]/", $card_enrollment))) {
            throw new \InvalidArgumentException("invalid value for $card_enrollment when calling ThreeDSecureData., must conform to the pattern /[SNY]/.");
        }

        $this->container['card_enrollment'] = $card_enrollment;

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
     * @param string $status 3DS status (from PaRes for 3Ds 1.0, ARes message for 3Ds 2.0) (possible values Y,A,U)
     *
     * @return $this
     */
    public function setStatus($status)
    {

        if (!is_null($status) && (!preg_match("/[YAU]/", $status))) {
            throw new \InvalidArgumentException("invalid value for $status when calling ThreeDSecureData., must conform to the pattern /[YAU]/.");
        }

        $this->container['status'] = $status;

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

        if (!is_null($three_d_secure_flow) && (!preg_match("/3DS1|3DS2C|3DS2F/", $three_d_secure_flow))) {
            throw new \InvalidArgumentException("invalid value for $three_d_secure_flow when calling ThreeDSecureData., must conform to the pattern /3DS1|3DS2C|3DS2F/.");
        }

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

