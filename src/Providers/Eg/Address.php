<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Eg;

use Faker\Provider\Base;

/**
 * Egyptian address provider.
 */
class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Cairo', 'Alexandria', 'Giza', 'Shubra El Kheima', 'Port Said', 'Suez',
        'Luxor', 'Aswan', 'Asyut', 'Ismailia', 'Faiyum', 'Zagazig', 'Tanta',
        'Mansoura', 'Damanhur', 'Minya', 'Hurghada', 'Sharm El Sheikh',
        'El Mahalla El Kubra', 'Sohag', 'Banha', 'Qena', 'Beni Suef', 'Damietta',
        'Kafr El Sheikh', 'Shibin El Kom', 'El Arish', 'Marsa Matruh', 'Kharga',
        'Ras Ghareb', '6th of October', 'New Cairo', 'Helwan', 'Obour',
        'Nasr City',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [
        'Sharia', 'Haret', 'Midan', 'Sikka', 'Tariq',
    ];

    /** @var string[] */
    protected static array $streetSuffix = ['Street', 'Road', 'Square'];

    /** @var string[] */
    protected static array $state = [
        'Cairo', 'Alexandria', 'Giza', 'Luxor', 'Aswan', 'South Sinai',
        'North Sinai', 'Red Sea', 'Suez', 'Ismailia', 'Port Said', 'Dakahlia',
        'Sharqia', 'Qalyubia', 'Monufia', 'Gharbia', 'Kafr El Sheikh',
        'Damietta', 'Beheira', 'Matruh', 'New Valley', 'Asyut', 'Sohag',
        'Qena', 'Beni Suef', 'Fayoum', 'Minya',
    ];

    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];

    /** @var string[] */
    protected static array $streetNames = [
        'Tahrir', 'Ramses', 'Salah Salem', 'Gamal Abdel Nasser', 'El Horreya',
        'Port Said', 'El Gomhoreya', 'Ahmed Orabi', 'El Thawra', 'El Nasr',
        'El Nil', 'Saad Zaghloul', 'Talaat Harb',
    ];

    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];

    protected static string $country = 'Egypt';

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
    public function latitude(): float { return static::randomFloat(6, 22.0, 31.7); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 24.7, 36.9); }
}
