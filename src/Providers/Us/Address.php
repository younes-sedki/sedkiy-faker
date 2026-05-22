<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Us;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia',
        'San Antonio', 'San Diego', 'Dallas', 'San Jose', 'Austin', 'Jacksonville',
        'Fort Worth', 'Columbus', 'Charlotte', 'Indianapolis', 'San Francisco',
        'Seattle', 'Denver', 'Nashville', 'Oklahoma City', 'El Paso',
        'Washington DC', 'Boston', 'Memphis', 'Louisville', 'Portland',
        'Las Vegas', 'Milwaukee', 'Albuquerque', 'Tucson', 'Fresno',
        'Mesa', 'Sacramento', 'Atlanta',
    ];
    /** @var string[] */
    protected static array $streetPrefix = [];
    /** @var string[] */
    protected static array $streetSuffix = [
        'Street', 'Avenue', 'Boulevard', 'Drive', 'Court', 'Place', 'Lane',
        'Road', 'Way', 'Circle', 'Terrace', 'Highway', 'Parkway', 'Trail', 'Loop',
    ];
    /** @var string[] */
    protected static array $state = [
        'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado',
        'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho',
        'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
        'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
        'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada',
        'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
        'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon',
        'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota',
        'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
        'West Virginia', 'Wisconsin', 'Wyoming',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####', '#####-####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Main', 'Second', 'Third', 'First', 'Fourth', 'Park', 'Fifth', 'Main',
        'Sixth', 'Oak', 'Seventh', 'Pine', 'Maple', 'Cedar', 'Eighth', 'Elm',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetName}} {{streetSuffix}}, {{city}} {{state}} {{postCode}}',
    ];
    protected static string $country = 'United States';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ' ' . $this->streetName() . ' ' . $this->streetSuffix() . ', ' . $this->city() . ', ' . $this->state() . ' ' . $this->postCode(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetSuffix(): string { return static::randomElement(static::$streetSuffix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 9999); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 24.5, 49.3); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -124.7, -66.9); }
}
