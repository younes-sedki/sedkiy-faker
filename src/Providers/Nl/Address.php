<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Nl;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Amsterdam', 'Rotterdam', 'Den Haag', 'Utrecht', 'Eindhoven', 'Tilburg',
        'Groningen', 'Almere', 'Breda', 'Nijmegen', 'Enschede', 'Apeldoorn',
        'Haarlem', 'Arnhem', 'Zaanstad', 'Amersfoort', "'s-Hertogenbosch",
        'Maastricht', 'Leiden', 'Dordrecht', 'Haarlemmermeer', 'Zoetermeer',
        'Zwolle', 'Delft', 'Deventer', 'Westland', 'Alkmaar', 'Venlo',
        'Emmen', 'Ede', 'Leeuwarden', 'Hilversum', 'Gouda', 'Oss', 'Roosendaal',
    ];
    /** @var string[] */
    protected static array $streetPrefix = [];
    /** @var string[] */
    protected static array $streetSuffix = ['straat', 'weg', 'laan', 'plein', 'gracht', 'kade', 'singel', 'pad', 'hof', 'dreef'];
    /** @var string[] */
    protected static array $state = [
        'Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen',
        'Limburg', 'Noord-Brabant', 'Noord-Holland', 'Overijssel', 'Utrecht',
        'Zeeland', 'Zuid-Holland',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#### ??'];
    /** @var string[] */
    protected static array $streetNames = [
        'Hoofd', 'Kerk', 'Dorps', 'Stations', 'Molen', 'Markt', 'School',
        'Haven', 'Park', 'Brink', 'Nieuw', 'Oud',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetName}}{{streetSuffix}} {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'Nederland';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetName() . $this->streetSuffix() . ' ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetSuffix(): string { return static::randomElement(static::$streetSuffix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 500); }
    /**
     * Returns a Dutch post code (#### XX format).
     * @return string
     */
    public function postCode(): string
    {
        $digits = str_pad((string) mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);
        $letters = 'ABCDEFGHJKLMNPRSTUVWXYZ';
        $l1 = $letters[mt_rand(0, strlen($letters) - 1)];
        $l2 = $letters[mt_rand(0, strlen($letters) - 1)];
        return $digits . ' ' . $l1 . $l2;
    }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->streetAddress(); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 50.7, 53.6); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 3.3, 7.2); }
}
