<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestEWalletAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestEWalletAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bank_code' => 'string',
        'creation_date' => 'string',
        'expiration_date' => 'string',
        'id' => 'string',
        'verification_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'bank_code' => null,
        'creation_date' => null,
        'expiration_date' => null,
        'id' => null,
        'verification_code' => null
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
        'bank_code' => 'bank_code',
        'creation_date' => 'creation_date',
        'expiration_date' => 'expiration_date',
        'id' => 'id',
        'verification_code' => 'verification_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bank_code' => 'setBankCode',
        'creation_date' => 'setCreationDate',
        'expiration_date' => 'setExpirationDate',
        'id' => 'setId',
        'verification_code' => 'setVerificationCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bank_code' => 'getBankCode',
        'creation_date' => 'getCreationDate',
        'expiration_date' => 'getExpirationDate',
        'id' => 'getId',
        'verification_code' => 'getVerificationCode'
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
        $this->container['bank_code'] = isset($data['bank_code']) ? $data['bank_code'] : null;
        $this->container['creation_date'] = isset($data['creation_date']) ? $data['creation_date'] : null;
        $this->container['expiration_date'] = isset($data['expiration_date']) ? $data['expiration_date'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['verification_code'] = isset($data['verification_code']) ? $data['verification_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['creation_date']) && !preg_match("/^[\\d{2,4}|\/?|\\.?]{2,10}$/", $this->container['creation_date'])) {
            $invalidProperties[] = "invalid value for 'creation_date', must be conform to the pattern /^[\\d{2,4}|\/?|\\.?]{2,10}$/.";
        }

        if (!is_null($this->container['expiration_date']) && !preg_match("/^[\\d{2,4}|\/?|\\.?]{2,10}$/", $this->container['expiration_date'])) {
            $invalidProperties[] = "invalid value for 'expiration_date', must be conform to the pattern /^[\\d{2,4}|\/?|\\.?]{2,10}$/.";
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
     * Gets bank_code
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->container['bank_code'];
    }

    /**
     * Sets bank_code
     *
     * @param string $bank_code Card issuer's code. For DIRECTBANKINGNGA: Customer bank code (3 digits). Mandatory for DIRECTBANKINGNGA payment method only.
     *
     * @return $this
     */
    public function setBankCode($bank_code)
    {
        $this->container['bank_code'] = $bank_code;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return string
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param string $creation_date Card creation date
     *
     * @return $this
     */
    public function setCreationDate($creation_date)
    {

        if (!is_null($creation_date) && (!preg_match("/^[\\d{2,4}|\/?|\\.?]{2,10}$/", $creation_date))) {
            throw new \InvalidArgumentException("invalid value for $creation_date when calling PaymentRequestEWalletAccount., must conform to the pattern /^[\\d{2,4}|\/?|\\.?]{2,10}$/.");
        }

        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets expiration_date
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->container['expiration_date'];
    }

    /**
     * Sets expiration_date
     *
     * @param string $expiration_date Account expiration date
     *
     * @return $this
     */
    public function setExpirationDate($expiration_date)
    {

        if (!is_null($expiration_date) && (!preg_match("/^[\\d{2,4}|\/?|\\.?]{2,10}$/", $expiration_date))) {
            throw new \InvalidArgumentException("invalid value for $expiration_date when calling PaymentRequestEWalletAccount., must conform to the pattern /^[\\d{2,4}|\/?|\\.?]{2,10}$/.");
        }

        $this->container['expiration_date'] = $expiration_date;

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
     * @param string $id For QIWI: Customer phone number (from 1 to 15 digits). For NETELLER: email address of Customer. For 'Latin America': Customer personal identification number: CPF or CNPJ for Brazil, DNI for Argentina and ID for other countries. For AIRTEL, MPESA, MTN, UGANDAMOBILE, VODAFONE and TIGO: phone number linked to Customer's mobile money account. For DIRECTBANKINGNGA: bank account number Mandatory for QIWI, NETELLER, 'Latin America', AIRTEL, MPESA, MTN, UGANDAMOBILE, VODAFONE, TIGO and DIRECTBANKINGNGA payment methods only.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets verification_code
     *
     * @return string
     */
    public function getVerificationCode()
    {
        return $this->container['verification_code'];
    }

    /**
     * Sets verification_code
     *
     * @param string $verification_code Provider security code. For NETELLER: member's 6 digits Secure Id or Google Authenticator OTP For VODAFONE: Customer voucher code (6 digits) For UBA bank in DIRECTBANKINGNGA: Customer BVN (bank verification number) number, 11 digits Mandatory for NETELLER, VODAFONE and DIRECTBANKINGNGA payment methods only.
     *
     * @return $this
     */
    public function setVerificationCode($verification_code)
    {
        $this->container['verification_code'] = $verification_code;

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

