<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Sa;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Riyadh', 'Jeddah', 'Mecca', 'Medina', 'Dammam', 'Taif', 'Tabuk',
        'Buraidah', 'Khamis Mushait', 'Al Hufuf', 'Jubail', 'Yanbu', 'Abha',
        'Al Qatif', 'Unaizah', 'Hail', 'Al Bahah', 'Arar', 'Sakaka', 'Jizan',
        'Najran', 'Al Kharj', 'Dhahran', 'Al Mubarraz', 'Hafar Al-Batin',
        'Khobar', 'Ras Tanura', 'Al Jubail', 'Bisha', 'Qatif', 'Al Ahsa',
        'Wadi Al-Dawasir', 'Dawadmi', 'Afif', 'Sharurah',
    ];

    /** @var string[] */
    protected static array $streetPrefix = ['Tariq', 'Sharia', 'Hai', 'Midan'];
    /** @var string[] */
    protected static array $streetSuffix = ['Street', 'Road', 'District'];
    /** @var string[] */
    protected static array $state = [
        'Riyadh', 'Makkah', 'Al Madinah', 'Eastern Province', 'Asir', 'Tabuk',
        'Hail', 'Al Qassim', 'Jazan', 'Najran', 'Al Bahah', 'Al Jawf',
        'Northern Borders',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'King Fahd', 'King Abdulaziz', 'King Faisal', 'Prince Sultan',
        'Olaya', 'Tahlia', 'Al Amir Mohammed Ibn Abdulaziz', 'King Abdullah',
        'Prince Turki', 'Al Imam Saud', 'Al Thumama', 'Al Kharj',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];
    protected static string $country = 'Saudi Arabia';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ' ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->city() . ' ' . $this->postCode(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetPrefix(): string { return static::randomElement(static::$streetPrefix); }
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
    public function latitude(): float { return static::randomFloat(6, 16.3, 32.2); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 34.6, 55.7); }
}
