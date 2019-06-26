<?php

/**
 * PHP SDK for Cardpay API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentCreationResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentCreationResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'redirect_url' => 'string',
        'pa_req' => 'string',
        'md' => 'string',
        'customer' => '\Cardpay\model\PaymentRequestCustomer',
        'payment_data' => '\Cardpay\model\PaymentResponsePaymentData',
        'card_account' => '\Cardpay\model\PaymentResponseCardAccount',
        'cryptocurrency_account' => '\Cardpay\model\PaymentResponseCryptocurrencyAccount',
        'ewallet_account' => '\Cardpay\model\TransactionResponseEWalletAccount'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'redirect_url' => null,
        'pa_req' => null,
        'md' => null,
        'customer' => null,
        'payment_data' => null,
        'card_account' => null,
        'cryptocurrency_account' => null,
        'ewallet_account' => null
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
        'redirect_url' => 'redirect_url',
        'pa_req' => 'PaReq',
        'md' => 'MD',
        'customer' => 'customer',
        'payment_data' => 'payment_data',
        'card_account' => 'card_account',
        'cryptocurrency_account' => 'cryptocurrency_account',
        'ewallet_account' => 'ewallet_account'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'redirect_url' => 'setRedirectUrl',
        'pa_req' => 'setPaReq',
        'md' => 'setMd',
        'customer' => 'setCustomer',
        'payment_data' => 'setPaymentData',
        'card_account' => 'setCardAccount',
        'cryptocurrency_account' => 'setCryptocurrencyAccount',
        'ewallet_account' => 'setEwalletAccount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'redirect_url' => 'getRedirectUrl',
        'pa_req' => 'getPaReq',
        'md' => 'getMd',
        'customer' => 'getCustomer',
        'payment_data' => 'getPaymentData',
        'card_account' => 'getCardAccount',
        'cryptocurrency_account' => 'getCryptocurrencyAccount',
        'ewallet_account' => 'getEwalletAccount'
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
        $this->container['redirect_url'] = isset($data['redirect_url']) ? $data['redirect_url'] : null;
        $this->container['pa_req'] = isset($data['pa_req']) ? $data['pa_req'] : null;
        $this->container['md'] = isset($data['md']) ? $data['md'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['payment_data'] = isset($data['payment_data']) ? $data['payment_data'] : null;
        $this->container['card_account'] = isset($data['card_account']) ? $data['card_account'] : null;
        $this->container['cryptocurrency_account'] = isset($data['cryptocurrency_account']) ? $data['cryptocurrency_account'] : null;
        $this->container['ewallet_account'] = isset($data['ewallet_account']) ? $data['ewallet_account'] : null;
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
     * Gets redirect_url
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->container['redirect_url'];
    }

    /**
     * Sets redirect_url
     *
     * @param string $redirect_url URL Customer should be redirected to
     *
     * @return $this
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->container['redirect_url'] = $redirect_url;

        return $this;
    }

    /**
     * Gets pa_req
     *
     * @return string
     */
    public function getPaReq()
    {
        return $this->container['pa_req'];
    }

    /**
     * Sets pa_req
     *
     * @param string $pa_req Bank authentication request
     *
     * @return $this
     */
    public function setPaReq($pa_req)
    {
        $this->container['pa_req'] = $pa_req;

        return $this;
    }

    /**
     * Gets md
     *
     * @return string
     */
    public function getMd()
    {
        return $this->container['md'];
    }

    /**
     * Sets md
     *
     * @param string $md Merchant Data
     *
     * @return $this
     */
    public function setMd($md)
    {
        $this->container['md'] = $md;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Cardpay\model\PaymentRequestCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\PaymentRequestCustomer $customer Customer data
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets payment_data
     *
     * @return \Cardpay\model\PaymentResponsePaymentData
     */
    public function getPaymentData()
    {
        return $this->container['payment_data'];
    }

    /**
     * Sets payment_data
     *
     * @param \Cardpay\model\PaymentResponsePaymentData $payment_data Payment data
     *
     * @return $this
     */
    public function setPaymentData($payment_data)
    {
        $this->container['payment_data'] = $payment_data;

        return $this;
    }

    /**
     * Gets card_account
     *
     * @return \Cardpay\model\PaymentResponseCardAccount
     */
    public function getCardAccount()
    {
        return $this->container['card_account'];
    }

    /**
     * Sets card_account
     *
     * @param \Cardpay\model\PaymentResponseCardAccount $card_account Card account data *(for BANKCARD payment method only)*
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
     * @return \Cardpay\model\PaymentResponseCryptocurrencyAccount
     */
    public function getCryptocurrencyAccount()
    {
        return $this->container['cryptocurrency_account'];
    }

    /**
     * Sets cryptocurrency_account
     *
     * @param \Cardpay\model\PaymentResponseCryptocurrencyAccount $cryptocurrency_account Cryptocurrency account data *(for BITCOIN payment method only)*
     *
     * @return $this
     */
    public function setCryptocurrencyAccount($cryptocurrency_account)
    {
        $this->container['cryptocurrency_account'] = $cryptocurrency_account;

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
     * @param \Cardpay\model\TransactionResponseEWalletAccount $ewallet_account eWallet account data *(for ALIPAY, QIWI, WEBMONEY, NETELLER, YANDEXMONEY, DIRECTBANKINGNGA, AQRCODE, AIRTEL, MPESA, MTN, UGANDAMOBILE, VODAFONE, TIGO and 'Latin America' payment methods only)*
     *
     * @return $this
     */
    public function setEwalletAccount($ewallet_account)
    {
        $this->container['ewallet_account'] = $ewallet_account;

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

