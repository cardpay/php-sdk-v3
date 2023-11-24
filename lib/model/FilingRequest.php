<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class FilingRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'FilingRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'request' => '\Cardpay\model\Request',
        'card_account' => '\Cardpay\model\PaymentRequestCardAccount',
        'customer' => '\Cardpay\model\RecurringCustomer',
        'merchant_order' => '\Cardpay\model\FilingRequestMerchantOrder',
        'payment_method' => 'string',
        'recurring_data' => '\Cardpay\model\FilingRecurringData',
        'return_urls' => '\Cardpay\model\ReturnUrls',
        'subscription_data' => '\Cardpay\model\FilingRequestSubscriptionData',
        'three_d_secure' => '\Cardpay\model\ThreeDSecureData'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'request' => null,
        'card_account' => null,
        'customer' => null,
        'merchant_order' => null,
        'payment_method' => null,
        'recurring_data' => null,
        'return_urls' => null,
        'subscription_data' => null,
        'three_d_secure' => null
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
        'request' => 'request',
        'card_account' => 'card_account',
        'customer' => 'customer',
        'merchant_order' => 'merchant_order',
        'payment_method' => 'payment_method',
        'recurring_data' => 'recurring_data',
        'return_urls' => 'return_urls',
        'subscription_data' => 'subscription_data',
        'three_d_secure' => 'three_d_secure'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'request' => 'setRequest',
        'card_account' => 'setCardAccount',
        'customer' => 'setCustomer',
        'merchant_order' => 'setMerchantOrder',
        'payment_method' => 'setPaymentMethod',
        'recurring_data' => 'setRecurringData',
        'return_urls' => 'setReturnUrls',
        'subscription_data' => 'setSubscriptionData',
        'three_d_secure' => 'setThreeDSecure'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'request' => 'getRequest',
        'card_account' => 'getCardAccount',
        'customer' => 'getCustomer',
        'merchant_order' => 'getMerchantOrder',
        'payment_method' => 'getPaymentMethod',
        'recurring_data' => 'getRecurringData',
        'return_urls' => 'getReturnUrls',
        'subscription_data' => 'getSubscriptionData',
        'three_d_secure' => 'getThreeDSecure'
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
        $this->container['request'] = isset($data['request']) ? $data['request'] : null;
        $this->container['card_account'] = isset($data['card_account']) ? $data['card_account'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['merchant_order'] = isset($data['merchant_order']) ? $data['merchant_order'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;
        $this->container['recurring_data'] = isset($data['recurring_data']) ? $data['recurring_data'] : null;
        $this->container['return_urls'] = isset($data['return_urls']) ? $data['return_urls'] : null;
        $this->container['subscription_data'] = isset($data['subscription_data']) ? $data['subscription_data'] : null;
        $this->container['three_d_secure'] = isset($data['three_d_secure']) ? $data['three_d_secure'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['request'] === null) {
            $invalidProperties[] = "'request' can't be null";
        }
        if ($this->container['payment_method'] === null) {
            $invalidProperties[] = "'payment_method' can't be null";
        }
        if ((mb_strlen($this->container['payment_method']) > 50)) {
            $invalidProperties[] = "invalid value for 'payment_method', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['payment_method']) < 1)) {
            $invalidProperties[] = "invalid value for 'payment_method', the character length must be bigger than or equal to 1.";
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
     * Gets request
     *
     * @return \Cardpay\model\Request
     */
    public function getRequest()
    {
        return $this->container['request'];
    }

    /**
     * Sets request
     *
     * @param \Cardpay\model\Request $request Request
     *
     * @return $this
     */
    public function setRequest($request)
    {
        $this->container['request'] = $request;

        return $this;
    }

    /**
     * Gets card_account
     *
     * @return \Cardpay\model\PaymentRequestCardAccount
     */
    public function getCardAccount()
    {
        return $this->container['card_account'];
    }

    /**
     * Sets card_account
     *
     * @param \Cardpay\model\PaymentRequestCardAccount $card_account Card account
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
     * @return \Cardpay\model\RecurringCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\RecurringCustomer $customer Customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets merchant_order
     *
     * @return \Cardpay\model\FilingRequestMerchantOrder
     */
    public function getMerchantOrder()
    {
        return $this->container['merchant_order'];
    }

    /**
     * Sets merchant_order
     *
     * @param \Cardpay\model\FilingRequestMerchantOrder $merchant_order Merchant order
     *
     * @return $this
     */
    public function setMerchantOrder($merchant_order)
    {
        $this->container['merchant_order'] = $merchant_order;

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
     * @param string $payment_method Used payment method type name from payment methods list\"
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        if ((mb_strlen($payment_method) > 50)) {
            throw new \InvalidArgumentException('invalid length for $payment_method when calling FilingRequest., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($payment_method) < 1)) {
            throw new \InvalidArgumentException('invalid length for $payment_method when calling FilingRequest., must be bigger than or equal to 1.');
        }

        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets recurring_data
     *
     * @return \Cardpay\model\FilingRecurringData
     */
    public function getRecurringData()
    {
        return $this->container['recurring_data'];
    }

    /**
     * Sets recurring_data
     *
     * @param \Cardpay\model\FilingRecurringData $recurring_data Recurring data
     *
     * @return $this
     */
    public function setRecurringData($recurring_data)
    {
        $this->container['recurring_data'] = $recurring_data;

        return $this;
    }

    /**
     * Gets return_urls
     *
     * @return \Cardpay\model\ReturnUrls
     */
    public function getReturnUrls()
    {
        return $this->container['return_urls'];
    }

    /**
     * Sets return_urls
     *
     * @param \Cardpay\model\ReturnUrls $return_urls Return URLs
     *
     * @return $this
     */
    public function setReturnUrls($return_urls)
    {
        $this->container['return_urls'] = $return_urls;

        return $this;
    }

    /**
     * Gets subscription_data
     *
     * @return \Cardpay\model\FilingRequestSubscriptionData
     */
    public function getSubscriptionData()
    {
        return $this->container['subscription_data'];
    }

    /**
     * Sets subscription_data
     *
     * @param \Cardpay\model\FilingRequestSubscriptionData $subscription_data Subscription data
     *
     * @return $this
     */
    public function setSubscriptionData($subscription_data)
    {
        $this->container['subscription_data'] = $subscription_data;

        return $this;
    }

    /**
     * Gets three_d_secure
     *
     * @return \Cardpay\model\ThreeDSecureData
     */
    public function getThreeDSecure()
    {
        return $this->container['three_d_secure'];
    }

    /**
     * Sets three_d_secure
     *
     * @param \Cardpay\model\ThreeDSecureData $three_d_secure three_d_secure
     *
     * @return $this
     */
    public function setThreeDSecure($three_d_secure)
    {
        $this->container['three_d_secure'] = $three_d_secure;

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

