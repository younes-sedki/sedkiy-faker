<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Jo;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Amman', 'Zarqa', 'Irbid', 'Russeifa', 'Aqaba', 'Madaba', 'Salt',
        'Karak', 'Mafraq', 'Jerash', 'Ajloun', 'Ramtha', 'Ar Ramtha',
        'Az-Zarqa', 'Sahab', 'Wadi Musa', 'Tafila', "Ma'an", 'Azraq', 'Samma',
        'Qatrana', 'Dhiban', 'Jarash', 'Kufranja', 'Ain Al Basha', 'Shobak',
        'Fuheis', 'Sweileh', 'Marj Al Hamam', 'Abu Alanda', 'Tabarbour',
    ];

    /** @var string[] */
    protected static array $streetPrefix = ['Sharia', 'Tariq', 'Hai', 'Midan'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Amman', 'Zarqa', 'Irbid', 'Balqa', 'Karak', 'Mafraq', 'Ajloun',
        'Jerash', 'Madaba', 'Aqaba', 'Tafila', "Ma'an",
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'King Abdullah II', 'King Hussein', 'Queen Rania', 'Al Medina Al Munawarah',
        'Mecca', 'Zahran', 'Rainbow', 'Al Kulliyah Al Ilmiyah', 'Al Urdon',
        'Wasfi Al Tal', 'Prince Hashim', 'Al Sharif Naser Ibn Jamil',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];
    protected static string $country = 'Jordan';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ' ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->city() . ' ' . $this->postCode(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetPrefix(): string { return static::randomElement(static::$streetPrefix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 999); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 29.2, 33.4); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 34.9, 39.3); }
}
