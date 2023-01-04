<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PaymentRequestCustomer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestCustomer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'birth_date' => '\DateTime',
        'document_type' => 'string',
        'email' => 'string',
        'first_name' => 'string',
        'full_name' => 'string',
        'home_phone' => 'string',
        'id' => 'string',
        'identity' => 'string',
        'last_name' => 'string',
        'living_address' => '\Cardpay\model\PaymentRequestLivingAddress',
        'locale' => 'string',
        'phone' => 'string',
        'work_phone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'birth_date' => 'date-time',
        'document_type' => null,
        'email' => null,
        'first_name' => null,
        'full_name' => null,
        'home_phone' => null,
        'id' => null,
        'identity' => null,
        'last_name' => null,
        'living_address' => null,
        'locale' => null,
        'phone' => null,
        'work_phone' => null
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
        'birth_date' => 'birth_date',
        'document_type' => 'document_type',
        'email' => 'email',
        'first_name' => 'first_name',
        'full_name' => 'full_name',
        'home_phone' => 'home_phone',
        'id' => 'id',
        'identity' => 'identity',
        'last_name' => 'last_name',
        'living_address' => 'living_address',
        'locale' => 'locale',
        'phone' => 'phone',
        'work_phone' => 'work_phone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'birth_date' => 'setBirthDate',
        'document_type' => 'setDocumentType',
        'email' => 'setEmail',
        'first_name' => 'setFirstName',
        'full_name' => 'setFullName',
        'home_phone' => 'setHomePhone',
        'id' => 'setId',
        'identity' => 'setIdentity',
        'last_name' => 'setLastName',
        'living_address' => 'setLivingAddress',
        'locale' => 'setLocale',
        'phone' => 'setPhone',
        'work_phone' => 'setWorkPhone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'birth_date' => 'getBirthDate',
        'document_type' => 'getDocumentType',
        'email' => 'getEmail',
        'first_name' => 'getFirstName',
        'full_name' => 'getFullName',
        'home_phone' => 'getHomePhone',
        'id' => 'getId',
        'identity' => 'getIdentity',
        'last_name' => 'getLastName',
        'living_address' => 'getLivingAddress',
        'locale' => 'getLocale',
        'phone' => 'getPhone',
        'work_phone' => 'getWorkPhone'
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
        $this->container['birth_date'] = isset($data['birth_date']) ? $data['birth_date'] : null;
        $this->container['document_type'] = isset($data['document_type']) ? $data['document_type'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['full_name'] = isset($data['full_name']) ? $data['full_name'] : null;
        $this->container['home_phone'] = isset($data['home_phone']) ? $data['home_phone'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['identity'] = isset($data['identity']) ? $data['identity'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['living_address'] = isset($data['living_address']) ? $data['living_address'] : null;
        $this->container['locale'] = isset($data['locale']) ? $data['locale'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['work_phone'] = isset($data['work_phone']) ? $data['work_phone'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 256)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) < 3)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) > 256)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) > 256)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['home_phone']) && (mb_strlen($this->container['home_phone']) > 18)) {
            $invalidProperties[] = "invalid value for 'home_phone', the character length must be smaller than or equal to 18.";
        }

        if (!is_null($this->container['home_phone']) && (mb_strlen($this->container['home_phone']) < 8)) {
            $invalidProperties[] = "invalid value for 'home_phone', the character length must be bigger than or equal to 8.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) > 256)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) < 0)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['identity']) && (mb_strlen($this->container['identity']) > 256)) {
            $invalidProperties[] = "invalid value for 'identity', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['identity']) && (mb_strlen($this->container['identity']) < 0)) {
            $invalidProperties[] = "invalid value for 'identity', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) > 256)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) > 18)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 18.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) < 8)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be bigger than or equal to 8.";
        }

        if (!is_null($this->container['work_phone']) && (mb_strlen($this->container['work_phone']) > 18)) {
            $invalidProperties[] = "invalid value for 'work_phone', the character length must be smaller than or equal to 18.";
        }

        if (!is_null($this->container['work_phone']) && (mb_strlen($this->container['work_phone']) < 8)) {
            $invalidProperties[] = "invalid value for 'work_phone', the character length must be bigger than or equal to 8.";
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
     * Gets birth_date
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->container['birth_date'];
    }

    /**
     * Sets birth_date
     *
     * @param \DateTime $birth_date Customer birth date in format `YYYY-MM-DD`. For Zenith bank in DIRECTBANKINGNGA: Customer password in format date of birth. *(mandatory for DIRECTBANKINGNGA payment method only)*
     *
     * @return $this
     */
    public function setBirthDate($birth_date)
    {
        $this->container['birth_date'] = $birth_date;

        return $this;
    }

    /**
     * Gets document_type
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->container['document_type'];
    }

    /**
     * Sets document_type
     *
     * @param string $document_type Customer document type *(mandatory for 'PAGOEFECTIVO' methods only)*
     *
     * @return $this
     */
    public function setDocumentType($document_type)
    {
        $this->container['document_type'] = $document_type;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email Email address of Customer *(mandatory by default for BANKCARD, PAYPAL, 'Latin America', AIRTEL, MPESA, MTN, UGANDAMOBILE, VODAFONE, TIGO, DIRECTBANKINGNGA and AQRCODE payment methods only)*. Can be defined as optional by CardPay manager.
     *
     * @return $this
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (mb_strlen($email) > 256)) {
            throw new \InvalidArgumentException('invalid length for $email when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($email) && (mb_strlen($email) < 3)) {
            throw new \InvalidArgumentException('invalid length for $email when calling PaymentRequestCustomer., must be bigger than or equal to 3.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name Customer first name *(mandatory for 'PAGOEFECTIVO' payment methods only)*
     *
     * @return $this
     */
    public function setFirstName($first_name)
    {
        if (!is_null($first_name) && (mb_strlen($first_name) > 256)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($first_name) && (mb_strlen($first_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling PaymentRequestCustomer., must be bigger than or equal to 1.');
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets full_name
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->container['full_name'];
    }

    /**
     * Sets full_name
     *
     * @param string $full_name Customer full name *(mandatory for 'Latin America' payment methods only)*
     *
     * @return $this
     */
    public function setFullName($full_name)
    {
        if (!is_null($full_name) && (mb_strlen($full_name) > 256)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($full_name) && (mb_strlen($full_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling PaymentRequestCustomer., must be bigger than or equal to 1.');
        }

        $this->container['full_name'] = $full_name;

        return $this;
    }

    /**
     * Gets home_phone
     *
     * @return string
     */
    public function getHomePhone()
    {
        return $this->container['home_phone'];
    }

    /**
     * Sets home_phone
     *
     * @param string $home_phone The work phone number provided by the Cardholder. Required (if available), unless market or regional mandate restricts sending this information. Characters Format: string (10-18 symbols) country code + Subscriber number. Refer to ITU-E.164 for additional information on format and length.
     *
     * @return $this
     */
    public function setHomePhone($home_phone)
    {
        if (!is_null($home_phone) && (mb_strlen($home_phone) > 18)) {
            throw new \InvalidArgumentException('invalid length for $home_phone when calling PaymentRequestCustomer., must be smaller than or equal to 18.');
        }
        if (!is_null($home_phone) && (mb_strlen($home_phone) < 8)) {
            throw new \InvalidArgumentException('invalid length for $home_phone when calling PaymentRequestCustomer., must be bigger than or equal to 8.');
        }

        $this->container['home_phone'] = $home_phone;

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
     * @param string $id Customer ID in Merchant's system *(mandatory for WEBMONEY payment method only)*
     *
     * @return $this
     */
    public function setId($id)
    {
        if (!is_null($id) && (mb_strlen($id) > 256)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($id) && (mb_strlen($id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PaymentRequestCustomer., must be bigger than or equal to 0.');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets identity
     *
     * @return string
     */
    public function getIdentity()
    {
        return $this->container['identity'];
    }

    /**
     * Sets identity
     *
     * @param string $identity Customer identity string value
     *
     * @return $this
     */
    public function setIdentity($identity)
    {
        if (!is_null($identity) && (mb_strlen($identity) > 256)) {
            throw new \InvalidArgumentException('invalid length for $identity when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($identity) && (mb_strlen($identity) < 0)) {
            throw new \InvalidArgumentException('invalid length for $identity when calling PaymentRequestCustomer., must be bigger than or equal to 0.');
        }

        $this->container['identity'] = $identity;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name Customer last name *(mandatory for 'PAGOEFECTIVO' payment methods only)*
     *
     * @return $this
     */
    public function setLastName($last_name)
    {
        if (!is_null($last_name) && (mb_strlen($last_name) > 256)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling PaymentRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($last_name) && (mb_strlen($last_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling PaymentRequestCustomer., must be bigger than or equal to 1.');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets living_address
     *
     * @return \Cardpay\model\PaymentRequestLivingAddress
     */
    public function getLivingAddress()
    {
        return $this->container['living_address'];
    }

    /**
     * Sets living_address
     *
     * @param \Cardpay\model\PaymentRequestLivingAddress $living_address Customer address *(mandatory for 'Latin America' methods only)* For 'Latin America' is required for methods where country = CO
     *
     * @return $this
     */
    public function setLivingAddress($living_address)
    {
        $this->container['living_address'] = $living_address;

        return $this;
    }

    /**
     * Gets locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->container['locale'];
    }

    /**
     * Sets locale
     *
     * @param string $locale Preferred locale for the payment page ([ISO 639-1](https://en.wikipedia.org/wiki/ISO_639-1) language code). The default locale will be applied if the selected locale is not supported. Supported locales are: `ru`, `en`, `zh`, `ja`
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->container['locale'] = $locale;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone Customer phone number. Format: `+` sign and 10 or 11 digits, example: `+12345678901` Mandatory for DIRECTBANKINGNGA payment method. For other payment methods: optional by default, can be defined as mandatory by CardPay manager.
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        if (!is_null($phone) && (mb_strlen($phone) > 18)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling PaymentRequestCustomer., must be smaller than or equal to 18.');
        }
        if (!is_null($phone) && (mb_strlen($phone) < 8)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling PaymentRequestCustomer., must be bigger than or equal to 8.');
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets work_phone
     *
     * @return string
     */
    public function getWorkPhone()
    {
        return $this->container['work_phone'];
    }

    /**
     * Sets work_phone
     *
     * @param string $work_phone The home phone number provided by the Cardholder. Required (if available) unless market or regional mandate restricts sending this information. Characters Format: string (10-18 symbols) country code + Subscriber number. Refer to ITU-E.164 for additional information on format and length.
     *
     * @return $this
     */
    public function setWorkPhone($work_phone)
    {
        if (!is_null($work_phone) && (mb_strlen($work_phone) > 18)) {
            throw new \InvalidArgumentException('invalid length for $work_phone when calling PaymentRequestCustomer., must be smaller than or equal to 18.');
        }
        if (!is_null($work_phone) && (mb_strlen($work_phone) < 8)) {
            throw new \InvalidArgumentException('invalid length for $work_phone when calling PaymentRequestCustomer., must be bigger than or equal to 8.');
        }

        $this->container['work_phone'] = $work_phone;

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

