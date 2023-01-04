<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestCardAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestCardAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'billing_address' => '\Cardpay\model\BillingAddress',
        'card' => '\Cardpay\model\PaymentRequestCard',
        'encrypted_card_data' => 'string',
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
        'encrypted_card_data' => null,
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
        'encrypted_card_data' => 'encrypted_card_data',
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
        'encrypted_card_data' => 'setEncryptedCardData',
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
        'encrypted_card_data' => 'getEncryptedCardData',
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
        $this->container['encrypted_card_data'] = isset($data['encrypted_card_data']) ? $data['encrypted_card_data'] : null;
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

        if (!is_null($this->container['encrypted_card_data']) && (mb_strlen($this->container['encrypted_card_data']) > 1000)) {
            $invalidProperties[] = "invalid value for 'encrypted_card_data', the character length must be smaller than or equal to 1000.";
        }

        if (!is_null($this->container['encrypted_card_data']) && (mb_strlen($this->container['encrypted_card_data']) < 0)) {
            $invalidProperties[] = "invalid value for 'encrypted_card_data', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['recipient_info']) && (mb_strlen($this->container['recipient_info']) > 500)) {
            $invalidProperties[] = "invalid value for 'recipient_info', the character length must be smaller than or equal to 500.";
        }

        if (!is_null($this->container['recipient_info']) && (mb_strlen($this->container['recipient_info']) < 0)) {
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
     * @param \Cardpay\model\BillingAddress $billing_address Billing Address
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
     * @return \Cardpay\model\PaymentRequestCard
     */
    public function getCard()
    {
        return $this->container['card'];
    }

    /**
     * Sets card
     *
     * @param \Cardpay\model\PaymentRequestCard $card Represents a payment card data. Card section shouldn't be present if element 'token' was presented. Shouldn't be used in Payment Page mode. For recurring: all card elements should presented only for first recurring payment.
     *
     * @return $this
     */
    public function setCard($card)
    {
        $this->container['card'] = $card;

        return $this;
    }

    /**
     * Gets encrypted_card_data
     *
     * @return string
     */
    public function getEncryptedCardData()
    {
        return $this->container['encrypted_card_data'];
    }

    /**
     * Sets encrypted_card_data
     *
     * @param string $encrypted_card_data Encrypted card data. The field includes: pan, security_code, expiration. Only for Gateway mode.
     *
     * @return $this
     */
    public function setEncryptedCardData($encrypted_card_data)
    {
        if (!is_null($encrypted_card_data) && (mb_strlen($encrypted_card_data) > 1000)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_card_data when calling PaymentRequestCardAccount., must be smaller than or equal to 1000.');
        }
        if (!is_null($encrypted_card_data) && (mb_strlen($encrypted_card_data) < 0)) {
            throw new \InvalidArgumentException('invalid length for $encrypted_card_data when calling PaymentRequestCardAccount., must be bigger than or equal to 0.');
        }

        $this->container['encrypted_card_data'] = $encrypted_card_data;

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
     * @param string $recipient_info Recipient full name. Property `recipient_info` may be required by Bank. In most cases it's Cardholder's name, contact Unlimint manager for requirements. Mandatory only for money transfer operation.
     *
     * @return $this
     */
    public function setRecipientInfo($recipient_info)
    {
        if (!is_null($recipient_info) && (mb_strlen($recipient_info) > 500)) {
            throw new \InvalidArgumentException('invalid length for $recipient_info when calling PaymentRequestCardAccount., must be smaller than or equal to 500.');
        }
        if (!is_null($recipient_info) && (mb_strlen($recipient_info) < 0)) {
            throw new \InvalidArgumentException('invalid length for $recipient_info when calling PaymentRequestCardAccount., must be bigger than or equal to 0.');
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
     * @param string $token Card token value used instead of card information, except 'card.security_code' (it's mandatory). For payment: see PaymentRequestPaymentData for token generation. For recurring: this attribute is valid only for first recurring payment. It isn't valid for continue recurring payments (with filing id), see RecurringRequestRecurringData for token generation.
     *
     * @return $this
     */
    public function setToken($token)
    {
        if (!is_null($token) && (mb_strlen($token) > 36)) {
            throw new \InvalidArgumentException('invalid length for $token when calling PaymentRequestCardAccount., must be smaller than or equal to 36.');
        }
        if (!is_null($token) && (mb_strlen($token) < 0)) {
            throw new \InvalidArgumentException('invalid length for $token when calling PaymentRequestCardAccount., must be bigger than or equal to 0.');
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

