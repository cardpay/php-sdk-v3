<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class RefundCallback implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RefundCallback';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'callback_time' => 'string',
        'card_account' => '\Cardpay\model\RefundResponseCardAccount',
        'customer' => '\Cardpay\model\RefundResponseCustomer',
        'ewallet_account' => '\Cardpay\model\TransactionResponseEWalletAccount',
        'merchant_order' => '\Cardpay\model\TransactionResponseMerchantOrder',
        'payment_data' => '\Cardpay\model\RefundResponsePaymentData',
        'payment_method' => 'string',
        'refund_data' => '\Cardpay\model\RefundResponseRefundData'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'callback_time' => null,
        'card_account' => null,
        'customer' => null,
        'ewallet_account' => null,
        'merchant_order' => null,
        'payment_data' => null,
        'payment_method' => null,
        'refund_data' => null
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
        'callback_time' => 'callback_time',
        'card_account' => 'card_account',
        'customer' => 'customer',
        'ewallet_account' => 'ewallet_account',
        'merchant_order' => 'merchant_order',
        'payment_data' => 'payment_data',
        'payment_method' => 'payment_method',
        'refund_data' => 'refund_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'callback_time' => 'setCallbackTime',
        'card_account' => 'setCardAccount',
        'customer' => 'setCustomer',
        'ewallet_account' => 'setEwalletAccount',
        'merchant_order' => 'setMerchantOrder',
        'payment_data' => 'setPaymentData',
        'payment_method' => 'setPaymentMethod',
        'refund_data' => 'setRefundData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'callback_time' => 'getCallbackTime',
        'card_account' => 'getCardAccount',
        'customer' => 'getCustomer',
        'ewallet_account' => 'getEwalletAccount',
        'merchant_order' => 'getMerchantOrder',
        'payment_data' => 'getPaymentData',
        'payment_method' => 'getPaymentMethod',
        'refund_data' => 'getRefundData'
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
        $this->container['callback_time'] = isset($data['callback_time']) ? $data['callback_time'] : null;
        $this->container['card_account'] = isset($data['card_account']) ? $data['card_account'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['ewallet_account'] = isset($data['ewallet_account']) ? $data['ewallet_account'] : null;
        $this->container['merchant_order'] = isset($data['merchant_order']) ? $data['merchant_order'] : null;
        $this->container['payment_data'] = isset($data['payment_data']) ? $data['payment_data'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;
        $this->container['refund_data'] = isset($data['refund_data']) ? $data['refund_data'] : null;
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
     * Gets callback_time
     *
     * @return string
     */
    public function getCallbackTime()
    {
        return $this->container['callback_time'];
    }

    /**
     * Sets callback_time
     *
     * @param string $callback_time Date and time of created callback in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format
     *
     * @return $this
     */
    public function setCallbackTime($callback_time)
    {
        $this->container['callback_time'] = $callback_time;

        return $this;
    }

    /**
     * Gets card_account
     *
     * @return \Cardpay\model\RefundResponseCardAccount
     */
    public function getCardAccount()
    {
        return $this->container['card_account'];
    }

    /**
     * Sets card_account
     *
     * @param \Cardpay\model\RefundResponseCardAccount $card_account Card account data *(for BANKCARD payment method only)*
     *
     * @return $this
     */
    public function setCardAccount($card_account)
    {
        $this->container['card_account'] = $card_account;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Cardpay\model\RefundResponseCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\RefundResponseCustomer $customer Customer data
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets ewallet_account
     *
     * @return \Cardpay\model\TransactionResponseEWalletAccount
     */
    public function getEwalletAccount()
    {
        return $this->container['ewallet_account'];
    }

    /**
     * Sets ewallet_account
     *
     * @param \Cardpay\model\TransactionResponseEWalletAccount $ewallet_account eWallet account data *(for ALIPAY and QIWI payment methods only)*
     *
     * @return $this
     */
    public function setEwalletAccount($ewallet_account)
    {
        $this->container['ewallet_account'] = $ewallet_account;

        return $this;
    }

    /**
     * Gets merchant_order
     *
     * @return \Cardpay\model\TransactionResponseMerchantOrder
     */
    public function getMerchantOrder()
    {
        return $this->container['merchant_order'];
    }

    /**
     * Sets merchant_order
     *
     * @param \Cardpay\model\TransactionResponseMerchantOrder $merchant_order Merchant order data
     *
     * @return $this
     */
    public function setMerchantOrder($merchant_order)
    {
        $this->container['merchant_order'] = $merchant_order;

        return $this;
    }

    /**
     * Gets payment_data
     *
     * @return \Cardpay\model\RefundResponsePaymentData
     */
    public function getPaymentData()
    {
        return $this->container['payment_data'];
    }

    /**
     * Sets payment_data
     *
     * @param \Cardpay\model\RefundResponsePaymentData $payment_data Payment data
     *
     * @return $this
     */
    public function setPaymentData($payment_data)
    {
        $this->container['payment_data'] = $payment_data;

        return $this;
    }

    /**
     * Gets payment_method
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param string $payment_method Used payment method type name from payment methods list
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets refund_data
     *
     * @return \Cardpay\model\RefundResponseRefundData
     */
    public function getRefundData()
    {
        return $this->container['refund_data'];
    }

    /**
     * Sets refund_data
     *
     * @param \Cardpay\model\RefundResponseRefundData $refund_data Refund data
     *
     * @return $this
     */
    public function setRefundData($refund_data)
    {
        $this->container['refund_data'] = $refund_data;

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

