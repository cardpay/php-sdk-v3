<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class PayoutRequestCustomer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PayoutRequestCustomer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'document_type' => 'string',
        'email' => 'string',
        'first_name' => 'string',
        'full_name' => 'string',
        'id' => 'string',
        'identity' => 'string',
        'last_name' => 'string',
        'living_address' => '\Cardpay\model\PayoutRequestLivingAddress',
        'phone' => 'string',
        'tax_reason_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'document_type' => null,
        'email' => null,
        'first_name' => null,
        'full_name' => null,
        'id' => null,
        'identity' => null,
        'last_name' => null,
        'living_address' => null,
        'phone' => null,
        'tax_reason_code' => null
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
        'document_type' => 'document_type',
        'email' => 'email',
        'first_name' => 'first_name',
        'full_name' => 'full_name',
        'id' => 'id',
        'identity' => 'identity',
        'last_name' => 'last_name',
        'living_address' => 'living_address',
        'phone' => 'phone',
        'tax_reason_code' => 'tax_reason_code'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'document_type' => 'setDocumentType',
        'email' => 'setEmail',
        'first_name' => 'setFirstName',
        'full_name' => 'setFullName',
        'id' => 'setId',
        'identity' => 'setIdentity',
        'last_name' => 'setLastName',
        'living_address' => 'setLivingAddress',
        'phone' => 'setPhone',
        'tax_reason_code' => 'setTaxReasonCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'document_type' => 'getDocumentType',
        'email' => 'getEmail',
        'first_name' => 'getFirstName',
        'full_name' => 'getFullName',
        'id' => 'getId',
        'identity' => 'getIdentity',
        'last_name' => 'getLastName',
        'living_address' => 'getLivingAddress',
        'phone' => 'getPhone',
        'tax_reason_code' => 'getTaxReasonCode'
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
        $this->container['document_type'] = isset($data['document_type']) ? $data['document_type'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['full_name'] = isset($data['full_name']) ? $data['full_name'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['identity'] = isset($data['identity']) ? $data['identity'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['living_address'] = isset($data['living_address']) ? $data['living_address'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['tax_reason_code'] = isset($data['tax_reason_code']) ? $data['tax_reason_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['document_type']) && (mb_strlen($this->container['document_type']) > 10)) {
            $invalidProperties[] = "invalid value for 'document_type', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['document_type']) && (mb_strlen($this->container['document_type']) < 0)) {
            $invalidProperties[] = "invalid value for 'document_type', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 256)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) < 3)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) > 100)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) > 100)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['full_name']) && (mb_strlen($this->container['full_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'full_name', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) > 256)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['id']) && (mb_strlen($this->container['id']) < 0)) {
            $invalidProperties[] = "invalid value for 'id', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) > 100)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) > 18)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be smaller than or equal to 18.";
        }

        if (!is_null($this->container['phone']) && (mb_strlen($this->container['phone']) < 5)) {
            $invalidProperties[] = "invalid value for 'phone', the character length must be bigger than or equal to 5.";
        }

        if (!is_null($this->container['tax_reason_code']) && !preg_match("/^[0-9]{9}$/", $this->container['tax_reason_code'])) {
            $invalidProperties[] = "invalid value for 'tax_reason_code', must be conform to the pattern /^[0-9]{9}$/.";
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
     * @param string $document_type Customer document type *(mandatory for 'Latin America' methods only)* For 'Latin America' is required for methods where country = CO, PE
     *
     * @return $this
     */
    public function setDocumentType($document_type)
    {
        if (!is_null($document_type) && (mb_strlen($document_type) > 10)) {
            throw new \InvalidArgumentException('invalid length for $document_type when calling PayoutRequestCustomer., must be smaller than or equal to 10.');
        }
        if (!is_null($document_type) && (mb_strlen($document_type) < 0)) {
            throw new \InvalidArgumentException('invalid length for $document_type when calling PayoutRequestCustomer., must be bigger than or equal to 0.');
        }

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
     * @param string $email Customer e-mail address *(mandatory for 'Latin America' methods only)* For 'Latin America' is required for methods where country = CO
     *
     * @return $this
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (mb_strlen($email) > 256)) {
            throw new \InvalidArgumentException('invalid length for $email when calling PayoutRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($email) && (mb_strlen($email) < 3)) {
            throw new \InvalidArgumentException('invalid length for $email when calling PayoutRequestCustomer., must be bigger than or equal to 3.');
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
     * @param string $first_name Customer first name *(mandatory for 'Latin America' methods only)*
     *
     * @return $this
     */
    public function setFirstName($first_name)
    {
        if (!is_null($first_name) && (mb_strlen($first_name) > 100)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling PayoutRequestCustomer., must be smaller than or equal to 100.');
        }
        if (!is_null($first_name) && (mb_strlen($first_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling PayoutRequestCustomer., must be bigger than or equal to 0.');
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
     * @param string $full_name Customer full name. Mandatory for DIRECTBANKINGNGA methods only: For DIRECTBANKINGNGA: only for non NGN currency
     *
     * @return $this
     */
    public function setFullName($full_name)
    {
        if (!is_null($full_name) && (mb_strlen($full_name) > 100)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling PayoutRequestCustomer., must be smaller than or equal to 100.');
        }
        if (!is_null($full_name) && (mb_strlen($full_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $full_name when calling PayoutRequestCustomer., must be bigger than or equal to 0.');
        }

        $this->container['full_name'] = $full_name;

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
     * @param string $id Customer id *(mandatory for WEBMONEY method only)*
     *
     * @return $this
     */
    public function setId($id)
    {
        if (!is_null($id) && (mb_strlen($id) > 256)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PayoutRequestCustomer., must be smaller than or equal to 256.');
        }
        if (!is_null($id) && (mb_strlen($id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $id when calling PayoutRequestCustomer., must be bigger than or equal to 0.');
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
     * @param string $identity Customer identity  - Customer’s personal identification number: 'CPF' or 'CNPJ' for Brazil, 'DNI' for Argentina and ID for other countries.  For SPEI - Customer CPF or CURP
     *
     * @return $this
     */
    public function setIdentity($identity)
    {
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
     * @param string $last_name Customer last name *(mandatory for 'Latin America' methods only)* For 'Latin America' is required for methods where country = AR, BR, CO, MX, PE, UY
     *
     * @return $this
     */
    public function setLastName($last_name)
    {
        if (!is_null($last_name) && (mb_strlen($last_name) > 100)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling PayoutRequestCustomer., must be smaller than or equal to 100.');
        }
        if (!is_null($last_name) && (mb_strlen($last_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling PayoutRequestCustomer., must be bigger than or equal to 0.');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets living_address
     *
     * @return \Cardpay\model\PayoutRequestLivingAddress
     */
    public function getLivingAddress()
    {
        return $this->container['living_address'];
    }

    /**
     * Sets living_address
     *
     * @param \Cardpay\model\PayoutRequestLivingAddress $living_address Customer address *(mandatory for 'Latin America' methods only)* For 'Latin America' is required for methods where country = CO
     *
     * @return $this
     */
    public function setLivingAddress($living_address)
    {
        $this->container['living_address'] = $living_address;

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
     * @param string $phone Customer's phone number
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        if (!is_null($phone) && (mb_strlen($phone) > 18)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling PayoutRequestCustomer., must be smaller than or equal to 18.');
        }
        if (!is_null($phone) && (mb_strlen($phone) < 5)) {
            throw new \InvalidArgumentException('invalid length for $phone when calling PayoutRequestCustomer., must be bigger than or equal to 5.');
        }

        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets tax_reason_code
     *
     * @return string
     */
    public function getTaxReasonCode()
    {
        return $this->container['tax_reason_code'];
    }

    /**
     * Sets tax_reason_code
     *
     * @param string $tax_reason_code Customer's tax reason codeFor 'BANK131 back account mode' is required for methods where country = RU
     *
     * @return $this
     */
    public function setTaxReasonCode($tax_reason_code)
    {

        if (!is_null($tax_reason_code) && (!preg_match("/^[0-9]{9}$/", $tax_reason_code))) {
            throw new \InvalidArgumentException("invalid value for $tax_reason_code when calling PayoutRequestCustomer., must conform to the pattern /^[0-9]{9}$/.");
        }

        $this->container['tax_reason_code'] = $tax_reason_code;

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

