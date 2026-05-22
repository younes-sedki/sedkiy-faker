<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Gb;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'London', 'Birmingham', 'Leeds', 'Glasgow', 'Sheffield', 'Bradford',
        'Liverpool', 'Edinburgh', 'Manchester', 'Bristol', 'Wakefield', 'Cardiff',
        'Coventry', 'Nottingham', 'Leicester', 'Sunderland', 'Belfast', 'Brighton',
        'Hull', 'Plymouth', 'Derby', 'Newcastle upon Tyne', 'Stoke-on-Trent',
        'Southampton', 'Aberdeen', 'Oxford', 'Cambridge', 'York', 'Swansea',
        'Exeter', 'Bath', 'Canterbury', 'Norwich', 'Reading', 'Northampton',
    ];
    /** @var string[] */
    protected static array $streetPrefix = [];
    /** @var string[] */
    protected static array $streetSuffix = ['Street', 'Road', 'Lane', 'Avenue', 'Drive', 'Close', 'Way', 'Crescent', 'Terrace', 'Place', 'Gardens', 'Court', 'Grove', 'Hill', 'Mews'];
    /** @var string[] */
    protected static array $state = [
        'Greater London', 'West Midlands', 'West Yorkshire', 'Greater Manchester',
        'Merseyside', 'Hampshire', 'Surrey', 'Kent', 'Essex', 'Devon', 'Cornwall',
        'Norfolk', 'Suffolk', 'Oxfordshire', 'Buckinghamshire', 'Hertfordshire',
        'Cheshire', 'Lancashire', 'Cumbria', 'Northumberland', 'North Yorkshire',
        'South Yorkshire', 'Avon', 'Lothian', 'Strathclyde',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['??# #??', '??## #??', '?# #??', '?## #??'];
    /** @var string[] */
    protected static array $streetNames = [
        'High', 'Station', 'Church', 'Victoria', 'Park', 'London', 'Queen',
        'King', 'New', 'Mill', 'Bridge', 'Manor',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{buildingNumber}} {{streetName}} {{streetSuffix}}, {{city}} {{postCode}}'];
    protected static string $country = 'United Kingdom';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ' ' . $this->streetName() . ' ' . $this->streetSuffix() . ', ' . $this->city() . ' ' . $this->postCode(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetSuffix(): string { return static::randomElement(static::$streetSuffix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 200); }
    /**
     * Returns a UK post code (simplified format).
     * @return string
     */
    public function postCode(): string
    {
        $letters = 'ABCDEFGHIJKLMNOPRSTUVWYZ';
        $area = $letters[mt_rand(0, strlen($letters) - 1)] . $letters[mt_rand(0, strlen($letters) - 1)];
        $district = (string) mt_rand(1, 99);
        $sector = (string) mt_rand(0, 9);
        $unit = $letters[mt_rand(0, strlen($letters) - 1)] . $letters[mt_rand(0, strlen($letters) - 1)];
        return $area . $district . ' ' . $sector . $unit;
    }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->buildingNumber() . ' ' . $this->streetName() . ' ' . $this->streetSuffix() . ', ' . $this->city() . ' ' . $this->postCode(); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 49.9, 58.7); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -8.2, 1.8); }
}
