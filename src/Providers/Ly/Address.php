<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ly;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Tripoli', 'Benghazi', 'Misrata', 'Tobruk', 'Zliten', 'Zawiya',
        'Ajdabiya', 'Sabha', 'Derna', 'Bayda', 'Sirte', 'Khoms', 'Zuwara',
        'Gharian', 'Zintan', 'Brak', 'Murzuq', 'Ghat', 'Awbari', 'Waddan',
        'Bani Walid', 'Tarhuna', 'Sabratha', 'Sorman', 'Yefren', 'Nalut',
        'Jalu', 'Hun', 'Dirj', 'El Abyar', 'Msallata', 'Shahat',
    ];

    /** @var string[] */
    protected static array $streetPrefix = ['Sharia', 'Zuqaq', 'Tariq', 'Midan', 'Hai'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Tripoli', 'Benghazi', 'Misrata', 'Cyrenaica', 'Fezzan',
        'Tripolitania', 'Jabal Al Akhdar', 'Jabal al Gharbi', 'Al Kufra',
        'Murzuq', 'Al Wahat', 'Al Butnan', 'Derna', 'Zawiya',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Omar Al Mukhtar', 'Al Fateh', 'Gamal Abdel Nasser', 'Al Jumhuriya',
        'Al Nasr', 'Al Salam', 'Al Wehda', 'Uqba Ibn Nafi', 'Al Quds',
        'Tarabulus', 'Al Istiklal', 'Al Corniche',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];
    protected static string $country = 'Libya';

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
    public function latitude(): float { return static::randomFloat(6, 19.5, 33.2); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 9.4, 25.2); }
}
