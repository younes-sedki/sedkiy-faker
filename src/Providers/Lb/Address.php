<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Lb;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Beirut', 'Tripoli', 'Sidon', 'Tyre', 'Jounieh', 'Zahlé', 'Baalbek',
        'Byblos', 'Nabatiyeh', 'Aley', 'Beit Mery', 'Batroun', 'Jdeideh',
        'Sin El Fil', 'Bourj Hammoud', 'Bchamoun', 'Khalde', 'Damour', 'Jbeil',
        'Zgharta', 'Halba', 'Minieh', 'Akkar', 'Marjeyoun', 'Hasbaya',
        'Dekwaneh', 'Rabieh', 'Dbayeh', 'Hazmieh', 'Brummana', 'Bhamdoun',
    ];

    /** @var string[] */
    protected static array $streetPrefix = ['Rue', 'Avenue', 'Boulevard', 'Place', 'Corniche'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Beirut', 'Mount Lebanon', 'North Lebanon', 'South Lebanon',
        'Nabatieh', 'Bekaa', 'Akkar', 'Baalbek-Hermel',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['####', '#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Hamra', 'Bliss', 'Verdun', 'Achrafieh', 'Gemmayzeh', 'Mar Mikhael',
        'Badaro', 'Clemenceau', 'Maarad', 'Gouraud', 'Monot', 'Pasteur',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];
    protected static string $country = 'Lebanon';

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
    public function latitude(): float { return static::randomFloat(6, 33.0, 34.7); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 35.1, 36.6); }
}
