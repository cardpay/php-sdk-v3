<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PayoutRequestCardAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PayoutRequestCardAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'billing_address' => '\Cardpay\model\BillingAddress',
        'card' => '\Cardpay\model\PayoutRequestCard',
        'recipient_info' => 'string',
        'token' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'billing_address' => null,
        'card' => null,
        'recipient_info' => null,
        'token' => null
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
        'billing_address' => 'billing_address',
        'card' => 'card',
        'recipient_info' => 'recipient_info',
        'token' => 'token'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billing_address' => 'setBillingAddress',
        'card' => 'setCard',
        'recipient_info' => 'setRecipientInfo',
        'token' => 'setToken'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billing_address' => 'getBillingAddress',
        'card' => 'getCard',
        'recipient_info' => 'getRecipientInfo',
        'token' => 'getToken'
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
        $this->container['billing_address'] = isset($data['billing_address']) ? $data['billing_address'] : null;
        $this->container['card'] = isset($data['card']) ? $data['card'] : null;
        $this->container['recipient_info'] = isset($data['recipient_info']) ? $data['recipient_info'] : null;
        $this->container['token'] = isset($data['token']) ? $data['token'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['card'] === null) {
            $invalidProperties[] = "'card' can't be null";
        }
        if ($this->container['recipient_info'] === null) {
            $invalidProperties[] = "'recipient_info' can't be null";
        }
        if ((mb_strlen($this->container['recipient_info']) > 500)) {
            $invalidProperties[] = "invalid value for 'recipient_info', the character length must be smaller than or equal to 500.";
        }

        if ((mb_strlen($this->container['recipient_info']) < 0)) {
            $invalidProperties[] = "invalid value for 'recipient_info', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['token']) && (mb_strlen($this->container['token']) > 36)) {
            $invalidProperties[] = "invalid value for 'token', the character length must be smaller than or equal to 36.";
        }

        if (!is_null($this->container['token']) && (mb_strlen($this->container['token']) < 0)) {
            $invalidProperties[] = "invalid value for 'token', the character length must be bigger than or equal to 0.";
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
     * Gets billing_address
     *
     * @return \Cardpay\model\BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param \Cardpay\model\BillingAddress $billing_address Address for billing
     *
     * @return $this
     */
    public function setBillingAddress($billing_address)
    {
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets card
     *
     * @return \Cardpay\model\PayoutRequestCard
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Cardpay\model\PayoutRequestCard $card Represents a payout card data. Card section shouldn't be present if element `token` was presented.
     *
     * @return $this
     */
    public function setCard($card)
    {
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets recipient_info
     *
     * @return string
     */
    public function getRecipientInfo()
    {
        return $this->container['recipient_info'];
    }

    /**
     * Sets recipient_info
     *
     * @param string $recipient_info Property `recipient_info` may be required by Bank. In most cases it's Cardholder's name, contact CardPay manager for requirements. It must be omitted when property `token` is presented
     *
     * @return $this
     */
    public function setRecipientInfo($recipient_info)
    {
        if ((mb_strlen($recipient_info) > 500)) {
            throw new \InvalidArgumentException('invalid length for $recipient_info when calling PayoutRequestCardAccount., must be smaller than or equal to 500.');
        }
        if ((mb_strlen($recipient_info) < 0)) {
            throw new \InvalidArgumentException('invalid length for $recipient_info when calling PayoutRequestCardAccount., must be bigger than or equal to 0.');
        }

        $this->container['recipient_info'] = $recipient_info;

        return $this;
    }

    /**
     * Gets token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string $token Card token value, used instead of a card data
     *
     * @return $this
     */
    public function setToken($token)
    {
        if (!is_null($token) && (mb_strlen($token) > 36)) {
            throw new \InvalidArgumentException('invalid length for $token when calling PayoutRequestCardAccount., must be smaller than or equal to 36.');
        }
        if (!is_null($token) && (mb_strlen($token) < 0)) {
            throw new \InvalidArgumentException('invalid length for $token when calling PayoutRequestCardAccount., must be bigger than or equal to 0.');
        }

        $this->container['token'] = $token;

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

