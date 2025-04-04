<?php

/**
 * PHP SDK for Unlimit API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class InvoiceGetResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InvoiceGetResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'customer' => '\Cardpay\model\InvoiceCustomer',
        'invoice_data' => '\Cardpay\model\InvoiceGetDataResponse',
        'invoice_url' => 'string',
        'merchant_order' => '\Cardpay\model\InvoiceMerchantOrder',
        'payment_data' => '\Cardpay\model\PaymentData[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'customer' => null,
        'invoice_data' => null,
        'invoice_url' => null,
        'merchant_order' => null,
        'payment_data' => null
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
        'customer' => 'customer',
        'invoice_data' => 'invoice_data',
        'invoice_url' => 'invoice_url',
        'merchant_order' => 'merchant_order',
        'payment_data' => 'payment_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'customer' => 'setCustomer',
        'invoice_data' => 'setInvoiceData',
        'invoice_url' => 'setInvoiceUrl',
        'merchant_order' => 'setMerchantOrder',
        'payment_data' => 'setPaymentData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'customer' => 'getCustomer',
        'invoice_data' => 'getInvoiceData',
        'invoice_url' => 'getInvoiceUrl',
        'merchant_order' => 'getMerchantOrder',
        'payment_data' => 'getPaymentData'
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
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['invoice_data'] = isset($data['invoice_data']) ? $data['invoice_data'] : null;
        $this->container['invoice_url'] = isset($data['invoice_url']) ? $data['invoice_url'] : null;
        $this->container['merchant_order'] = isset($data['merchant_order']) ? $data['merchant_order'] : null;
        $this->container['payment_data'] = isset($data['payment_data']) ? $data['payment_data'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['customer'] === null) {
            $invalidProperties[] = "'customer' can't be null";
        }
        if ($this->container['invoice_data'] === null) {
            $invalidProperties[] = "'invoice_data' can't be null";
        }
        if ($this->container['merchant_order'] === null) {
            $invalidProperties[] = "'merchant_order' can't be null";
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
     * Gets customer
     *
     * @return \Cardpay\model\InvoiceCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Cardpay\model\InvoiceCustomer $customer Customer data
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets invoice_data
     *
     * @return \Cardpay\model\InvoiceGetDataResponse
     */
    public function getInvoiceData()
    {
        return $this->container['invoice_data'];
    }

    /**
     * Sets invoice_data
     *
     * @param \Cardpay\model\InvoiceGetDataResponse $invoice_data Invoice data
     *
     * @return $this
     */
    public function setInvoiceData($invoice_data)
    {
        $this->container['invoice_data'] = $invoice_data;

        return $this;
    }

    /**
     * Gets invoice_url
     *
     * @return string
     */
    public function getInvoiceUrl()
    {
        return $this->container['invoice_url'];
    }

    /**
     * Sets invoice_url
     *
     * @param string $invoice_url Invoice URL
     *
     * @return $this
     */
    public function setInvoiceUrl($invoice_url)
    {
        $this->container['invoice_url'] = $invoice_url;

        return $this;
    }

    /**
     * Gets merchant_order
     *
     * @return \Cardpay\model\InvoiceMerchantOrder
     */
    public function getMerchantOrder()
    {
        return $this->container['merchant_order'];
    }

    /**
     * Sets merchant_order
     *
     * @param \Cardpay\model\InvoiceMerchantOrder $merchant_order Merchant order data
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
     * @return \Cardpay\model\PaymentData[]
     */
    public function getPaymentData()
    {
        return $this->container['payment_data'];
    }

    /**
     * Sets payment_data
     *
     * @param \Cardpay\model\PaymentData[] $payment_data payment_data
     *
     * @return $this
     */
    public function setPaymentData($payment_data)
    {
        $this->container['payment_data'] = $payment_data;

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

