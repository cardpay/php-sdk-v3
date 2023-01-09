<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PayoutResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PayoutResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'card_account' => '\Cardpay\model\PayoutResponseCardAccount',
        'cryptocurrency_account' => '\Cardpay\model\PayoutResponseCryptocurrencyAccount',
        'customer' => '\Cardpay\model\PayoutResponseCustomer',
        'ewallet_account' => '\Cardpay\model\PayoutResponseEWalletAccount',
        'payment_data' => '\Cardpay\model\PayoutPaymentData',
        'payout_data' => '\Cardpay\model\PayoutResponsePayoutData',
        'payment_method' => 'string',
        'merchant_order' => '\Cardpay\model\TransactionResponseMerchantOrder'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'card_account' => null,
        'cryptocurrency_account' => null,
        'customer' => null,
        'ewallet_account' => null,
        'payment_data' => null,
        'payout_data' => null,
        'payment_method' => null,
        'merchant_order' => null
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
        'card_account' => 'card_account',
        'cryptocurrency_account' => 'cryptocurrency_account',
        'customer' => 'customer',
        'ewallet_account' => 'ewallet_account',
        'payment_data' => 'payment_data',
        'payout_data' => 'payout_data',
        'payment_method' => 'payment_method',
        'merchant_order' => 'merchant_order'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_account' => 'setCardAccount',
        'cryptocurrency_account' => 'setCryptocurrencyAccount',
        'customer' => 'setCustomer',
        'ewallet_account' => 'setEwalletAccount',
        'payment_data' => 'setPaymentData',
        'payout_data' => 'setPayoutData',
        'payment_method' => 'setPaymentMethod',
        'merchant_order' => 'setMerchantOrder'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_account' => 'getCardAccount',
        'cryptocurrency_account' => 'getCryptocurrencyAccount',
        'customer' => 'getCustomer',
        'ewallet_account' => 'getEwalletAccount',
        'payment_data' => 'getPaymentData',
        'payout_data' => 'getPayoutData',
        'payment_method' => 'getPaymentMethod',
        'merchant_order' => 'getMerchantOrder'
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
        $this->container['card_account'] = isset($data['card_account']) ? $data['card_account'] : null;
        $this->container['cryptocurrency_account'] = isset($data['cryptocurrency_account']) ? $data['cryptocurrency_account'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['ewallet_account'] = isset($data['ewallet_account']) ? $data['ewallet_account'] : null;
        $this->container['payment_data'] = isset($data['payment_data']) ? $data['payment_data'] : null;
        $this->container['payout_data'] = isset($data['payout_data']) ? $data['payout_data'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;
        $this->container['merchant_order'] = isset($data['merchant_order']) ? $data['merchant_order'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['payout_data'] === null) {
            $invalidProperties[] = "'payout_data' can't be null";
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
     * Gets card_account
     *
     * @return \Cardpay\model\PayoutResponseCardAccount
     */
    public function getCardAccount()
    {
        return $this->container['card_account'];
    }

    /**
     * Sets card_account
     *
     * @param \Cardpay\model\PayoutResponseCardAccount $card_account Card account data *(for BANKCARD method only)*
     *
     * @return $this
     */
    public function setCardAccount($card_account)
    {
        $this->container['card_account'] = $card_account;

        return $this;
    }

    /**
     * Gets cryptocurrency_account
     *
     * @return \Cardpay\model\PayoutResponseCryptocurrencyAccount
     */
    public function getCryptocurrencyAccount()
    {
        return $this->container['cryptocurrency_account'];
    }

    /**
     * Sets cryptocurrency_account
     *
     * @param \Cardpay\model\PayoutResponseCryptocurrencyAccount $cryptocurrency_account Cryptocurrency account data *(for BITCOIN method only)*
     *
     * @return $this
     */
    public function setCryptocurrencyAccount($cryptocurrency_account)
    {
        $this->container['cryptocurrency_account'] = $cryptocurrency_account;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Cardpay\model\PayoutResponseCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\PayoutResponseCustomer $customer Customer data
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
     * @return \Cardpay\model\PayoutResponseEWalletAccount
     */
    public function getEwalletAccount()
    {
        return $this->container['ewallet_account'];
    }

    /**
     * Sets ewallet_account
     *
     * @param \Cardpay\model\PayoutResponseEWalletAccount $ewallet_account eWallet account data *(for payout methods only)*
     *
     * @return $this
     */
    public function setEwalletAccount($ewallet_account)
    {
        $this->container['ewallet_account'] = $ewallet_account;

        return $this;
    }

    /**
     * Gets payment_data
     *
     * @return \Cardpay\model\PayoutPaymentData
     */
    public function getPaymentData()
    {
        return $this->container['payment_data'];
    }

    /**
     * Sets payment_data
     *
     * @param \Cardpay\model\PayoutPaymentData $payment_data Payment data
     *
     * @return $this
     */
    public function setPaymentData($payment_data)
    {
        $this->container['payment_data'] = $payment_data;

        return $this;
    }

    /**
     * Gets payout_data
     *
     * @return \Cardpay\model\PayoutResponsePayoutData
     */
    public function getPayoutData()
    {
        return $this->container['payout_data'];
    }

    /**
     * Sets payout_data
     *
     * @param \Cardpay\model\PayoutResponsePayoutData $payout_data Payout data
     *
     * @return $this
     */
    public function setPayoutData($payout_data)
    {
        $this->container['payout_data'] = $payout_data;

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

