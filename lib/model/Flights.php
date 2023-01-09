<?php

/**
 * PHP SDK for Unlimint API v3. All rights reserved.
 */

namespace Cardpay\model;

use \ArrayAccess;
use \Cardpay\ObjectSerializer;

class Flights implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Flights';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'computerized_res_system' => 'string',
        'credit_reason_indicator' => 'string',
        'departure_date' => 'string',
        'flight' => '\Cardpay\model\Flight[]',
        'is_restricted' => 'bool',
        'origination_code' => 'string',
        'passenger_name' => 'string',
        'ticket_change_indicator' => 'string',
        'ticket_number' => 'string',
        'travel_agency_code' => 'string',
        'travel_agency_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'computerized_res_system' => null,
        'credit_reason_indicator' => null,
        'departure_date' => null,
        'flight' => null,
        'is_restricted' => null,
        'origination_code' => null,
        'passenger_name' => null,
        'ticket_change_indicator' => null,
        'ticket_number' => null,
        'travel_agency_code' => null,
        'travel_agency_name' => null
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
        'computerized_res_system' => 'computerized_res_system',
        'credit_reason_indicator' => 'credit_reason_indicator',
        'departure_date' => 'departure_date',
        'flight' => 'flight',
        'is_restricted' => 'is_restricted',
        'origination_code' => 'origination_code',
        'passenger_name' => 'passenger_name',
        'ticket_change_indicator' => 'ticket_change_indicator',
        'ticket_number' => 'ticket_number',
        'travel_agency_code' => 'travel_agency_code',
        'travel_agency_name' => 'travel_agency_name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'computerized_res_system' => 'setComputerizedResSystem',
        'credit_reason_indicator' => 'setCreditReasonIndicator',
        'departure_date' => 'setDepartureDate',
        'flight' => 'setFlight',
        'is_restricted' => 'setIsRestricted',
        'origination_code' => 'setOriginationCode',
        'passenger_name' => 'setPassengerName',
        'ticket_change_indicator' => 'setTicketChangeIndicator',
        'ticket_number' => 'setTicketNumber',
        'travel_agency_code' => 'setTravelAgencyCode',
        'travel_agency_name' => 'setTravelAgencyName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'computerized_res_system' => 'getComputerizedResSystem',
        'credit_reason_indicator' => 'getCreditReasonIndicator',
        'departure_date' => 'getDepartureDate',
        'flight' => 'getFlight',
        'is_restricted' => 'getIsRestricted',
        'origination_code' => 'getOriginationCode',
        'passenger_name' => 'getPassengerName',
        'ticket_change_indicator' => 'getTicketChangeIndicator',
        'ticket_number' => 'getTicketNumber',
        'travel_agency_code' => 'getTravelAgencyCode',
        'travel_agency_name' => 'getTravelAgencyName'
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
        $this->container['computerized_res_system'] = isset($data['computerized_res_system']) ? $data['computerized_res_system'] : null;
        $this->container['credit_reason_indicator'] = isset($data['credit_reason_indicator']) ? $data['credit_reason_indicator'] : null;
        $this->container['departure_date'] = isset($data['departure_date']) ? $data['departure_date'] : null;
        $this->container['flight'] = isset($data['flight']) ? $data['flight'] : null;
        $this->container['is_restricted'] = isset($data['is_restricted']) ? $data['is_restricted'] : null;
        $this->container['origination_code'] = isset($data['origination_code']) ? $data['origination_code'] : null;
        $this->container['passenger_name'] = isset($data['passenger_name']) ? $data['passenger_name'] : null;
        $this->container['ticket_change_indicator'] = isset($data['ticket_change_indicator']) ? $data['ticket_change_indicator'] : null;
        $this->container['ticket_number'] = isset($data['ticket_number']) ? $data['ticket_number'] : null;
        $this->container['travel_agency_code'] = isset($data['travel_agency_code']) ? $data['travel_agency_code'] : null;
        $this->container['travel_agency_name'] = isset($data['travel_agency_name']) ? $data['travel_agency_name'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['computerized_res_system']) && (mb_strlen($this->container['computerized_res_system']) > 4)) {
            $invalidProperties[] = "invalid value for 'computerized_res_system', the character length must be smaller than or equal to 4.";
        }

        if (!is_null($this->container['computerized_res_system']) && (mb_strlen($this->container['computerized_res_system']) < 0)) {
            $invalidProperties[] = "invalid value for 'computerized_res_system', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['credit_reason_indicator']) && (mb_strlen($this->container['credit_reason_indicator']) > 1)) {
            $invalidProperties[] = "invalid value for 'credit_reason_indicator', the character length must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['credit_reason_indicator']) && (mb_strlen($this->container['credit_reason_indicator']) < 1)) {
            $invalidProperties[] = "invalid value for 'credit_reason_indicator', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['origination_code']) && (mb_strlen($this->container['origination_code']) > 3)) {
            $invalidProperties[] = "invalid value for 'origination_code', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['origination_code']) && (mb_strlen($this->container['origination_code']) < 3)) {
            $invalidProperties[] = "invalid value for 'origination_code', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['passenger_name']) && (mb_strlen($this->container['passenger_name']) > 20)) {
            $invalidProperties[] = "invalid value for 'passenger_name', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['passenger_name']) && (mb_strlen($this->container['passenger_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'passenger_name', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['ticket_change_indicator']) && (mb_strlen($this->container['ticket_change_indicator']) > 1)) {
            $invalidProperties[] = "invalid value for 'ticket_change_indicator', the character length must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['ticket_change_indicator']) && (mb_strlen($this->container['ticket_change_indicator']) < 1)) {
            $invalidProperties[] = "invalid value for 'ticket_change_indicator', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['ticket_number']) && (mb_strlen($this->container['ticket_number']) > 15)) {
            $invalidProperties[] = "invalid value for 'ticket_number', the character length must be smaller than or equal to 15.";
        }

        if (!is_null($this->container['ticket_number']) && (mb_strlen($this->container['ticket_number']) < 0)) {
            $invalidProperties[] = "invalid value for 'ticket_number', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['travel_agency_code']) && (mb_strlen($this->container['travel_agency_code']) > 8)) {
            $invalidProperties[] = "invalid value for 'travel_agency_code', the character length must be smaller than or equal to 8.";
        }

        if (!is_null($this->container['travel_agency_code']) && (mb_strlen($this->container['travel_agency_code']) < 0)) {
            $invalidProperties[] = "invalid value for 'travel_agency_code', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['travel_agency_name']) && (mb_strlen($this->container['travel_agency_name']) > 25)) {
            $invalidProperties[] = "invalid value for 'travel_agency_name', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['travel_agency_name']) && (mb_strlen($this->container['travel_agency_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'travel_agency_name', the character length must be bigger than or equal to 0.";
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
     * Gets computerized_res_system
     *
     * @return string
     */
    public function getComputerizedResSystem()
    {
        return $this->container['computerized_res_system'];
    }

    /**
     * Sets computerized_res_system
     *
     * @param string $computerized_res_system Computerized reservation system code
     *
     * @return $this
     */
    public function setComputerizedResSystem($computerized_res_system)
    {
        if (!is_null($computerized_res_system) && (mb_strlen($computerized_res_system) > 4)) {
            throw new \InvalidArgumentException('invalid length for $computerized_res_system when calling Flights., must be smaller than or equal to 4.');
        }
        if (!is_null($computerized_res_system) && (mb_strlen($computerized_res_system) < 0)) {
            throw new \InvalidArgumentException('invalid length for $computerized_res_system when calling Flights., must be bigger than or equal to 0.');
        }

        $this->container['computerized_res_system'] = $computerized_res_system;

        return $this;
    }

    /**
     * Gets credit_reason_indicator
     *
     * @return string
     */
    public function getCreditReasonIndicator()
    {
        return $this->container['credit_reason_indicator'];
    }

    /**
     * Sets credit_reason_indicator
     *
     * @param string $credit_reason_indicator Credit reason indicator
     *
     * @return $this
     */
    public function setCreditReasonIndicator($credit_reason_indicator)
    {
        if (!is_null($credit_reason_indicator) && (mb_strlen($credit_reason_indicator) > 1)) {
            throw new \InvalidArgumentException('invalid length for $credit_reason_indicator when calling Flights., must be smaller than or equal to 1.');
        }
        if (!is_null($credit_reason_indicator) && (mb_strlen($credit_reason_indicator) < 1)) {
            throw new \InvalidArgumentException('invalid length for $credit_reason_indicator when calling Flights., must be bigger than or equal to 1.');
        }

        $this->container['credit_reason_indicator'] = $credit_reason_indicator;

        return $this;
    }

    /**
     * Gets departure_date
     *
     * @return string
     */
    public function getDepartureDate()
    {
        return $this->container['departure_date'];
    }

    /**
     * Sets departure_date
     *
     * @param string $departure_date Date of departure in format 'DD.MM.YYYY'
     *
     * @return $this
     */
    public function setDepartureDate($departure_date)
    {
        $this->container['departure_date'] = $departure_date;

        return $this;
    }

    /**
     * Gets flight
     *
     * @return \Cardpay\model\Flight[]
     */
    public function getFlight()
    {
        return $this->container['flight'];
    }

    /**
     * Sets flight
     *
     * @param \Cardpay\model\Flight[] $flight Information about particular flight legs, shouldn't have more than 4 flight subsections in one flights section.
     *
     * @return $this
     */
    public function setFlight($flight)
    {
        $this->container['flight'] = $flight;

        return $this;
    }

    /**
     * Gets is_restricted
     *
     * @return bool
     */
    public function getIsRestricted()
    {
        return $this->container['is_restricted'];
    }

    /**
     * Sets is_restricted
     *
     * @param bool $is_restricted Restricted ticket indicator
     *
     * @return $this
     */
    public function setIsRestricted($is_restricted)
    {
        $this->container['is_restricted'] = $is_restricted;

        return $this;
    }

    /**
     * Gets origination_code
     *
     * @return string
     */
    public function getOriginationCode()
    {
        return $this->container['origination_code'];
    }

    /**
     * Sets origination_code
     *
     * @param string $origination_code Code of airport of departure, IATA code
     *
     * @return $this
     */
    public function setOriginationCode($origination_code)
    {
        if (!is_null($origination_code) && (mb_strlen($origination_code) > 3)) {
            throw new \InvalidArgumentException('invalid length for $origination_code when calling Flights., must be smaller than or equal to 3.');
        }
        if (!is_null($origination_code) && (mb_strlen($origination_code) < 3)) {
            throw new \InvalidArgumentException('invalid length for $origination_code when calling Flights., must be bigger than or equal to 3.');
        }

        $this->container['origination_code'] = $origination_code;

        return $this;
    }

    /**
     * Gets passenger_name
     *
     * @return string
     */
    public function getPassengerName()
    {
        return $this->container['passenger_name'];
    }

    /**
     * Sets passenger_name
     *
     * @param string $passenger_name First and last name of a passenger
     *
     * @return $this
     */
    public function setPassengerName($passenger_name)
    {
        if (!is_null($passenger_name) && (mb_strlen($passenger_name) > 20)) {
            throw new \InvalidArgumentException('invalid length for $passenger_name when calling Flights., must be smaller than or equal to 20.');
        }
        if (!is_null($passenger_name) && (mb_strlen($passenger_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $passenger_name when calling Flights., must be bigger than or equal to 0.');
        }

        $this->container['passenger_name'] = $passenger_name;

        return $this;
    }

    /**
     * Gets ticket_change_indicator
     *
     * @return string
     */
    public function getTicketChangeIndicator()
    {
        return $this->container['ticket_change_indicator'];
    }

    /**
     * Sets ticket_change_indicator
     *
     * @param string $ticket_change_indicator Ticket change indicator
     *
     * @return $this
     */
    public function setTicketChangeIndicator($ticket_change_indicator)
    {
        if (!is_null($ticket_change_indicator) && (mb_strlen($ticket_change_indicator) > 1)) {
            throw new \InvalidArgumentException('invalid length for $ticket_change_indicator when calling Flights., must be smaller than or equal to 1.');
        }
        if (!is_null($ticket_change_indicator) && (mb_strlen($ticket_change_indicator) < 1)) {
            throw new \InvalidArgumentException('invalid length for $ticket_change_indicator when calling Flights., must be bigger than or equal to 1.');
        }

        $this->container['ticket_change_indicator'] = $ticket_change_indicator;

        return $this;
    }

    /**
     * Gets ticket_number
     *
     * @return string
     */
    public function getTicketNumber()
    {
        return $this->container['ticket_number'];
    }

    /**
     * Sets ticket_number
     *
     * @param string $ticket_number Ticket number
     *
     * @return $this
     */
    public function setTicketNumber($ticket_number)
    {
        if (!is_null($ticket_number) && (mb_strlen($ticket_number) > 15)) {
            throw new \InvalidArgumentException('invalid length for $ticket_number when calling Flights., must be smaller than or equal to 15.');
        }
        if (!is_null($ticket_number) && (mb_strlen($ticket_number) < 0)) {
            throw new \InvalidArgumentException('invalid length for $ticket_number when calling Flights., must be bigger than or equal to 0.');
        }

        $this->container['ticket_number'] = $ticket_number;

        return $this;
    }

    /**
     * Gets travel_agency_code
     *
     * @return string
     */
    public function getTravelAgencyCode()
    {
        return $this->container['travel_agency_code'];
    }

    /**
     * Sets travel_agency_code
     *
     * @param string $travel_agency_code Code of travel agency
     *
     * @return $this
     */
    public function setTravelAgencyCode($travel_agency_code)
    {
        if (!is_null($travel_agency_code) && (mb_strlen($travel_agency_code) > 8)) {
            throw new \InvalidArgumentException('invalid length for $travel_agency_code when calling Flights., must be smaller than or equal to 8.');
        }
        if (!is_null($travel_agency_code) && (mb_strlen($travel_agency_code) < 0)) {
            throw new \InvalidArgumentException('invalid length for $travel_agency_code when calling Flights., must be bigger than or equal to 0.');
        }

        $this->container['travel_agency_code'] = $travel_agency_code;

        return $this;
    }

    /**
     * Gets travel_agency_name
     *
     * @return string
     */
    public function getTravelAgencyName()
    {
        return $this->container['travel_agency_name'];
    }

    /**
     * Sets travel_agency_name
     *
     * @param string $travel_agency_name Name of travel agency using only latin alphabet
     *
     * @return $this
     */
    public function setTravelAgencyName($travel_agency_name)
    {
        if (!is_null($travel_agency_name) && (mb_strlen($travel_agency_name) > 25)) {
            throw new \InvalidArgumentException('invalid length for $travel_agency_name when calling Flights., must be smaller than or equal to 25.');
        }
        if (!is_null($travel_agency_name) && (mb_strlen($travel_agency_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $travel_agency_name when calling Flights., must be bigger than or equal to 0.');
        }

        $this->container['travel_agency_name'] = $travel_agency_name;

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

