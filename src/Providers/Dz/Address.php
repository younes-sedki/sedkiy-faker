<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Dz;

use Faker\Provider\Base;

/**
 * Algerian address provider with authentic wilayas and cities.
 */
class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Alger', 'Oran', 'Constantine', 'Annaba', 'Blida', 'Batna',
        'Sétif', 'Sidi Bel Abbès', 'Biskra', 'Tébessa', 'El-Oued',
        'Skikda', 'Tiaret', 'Bejaïa', 'Tlemcen', 'Ouargla', 'Mostaganem',
        'Bordj Bou Arreridj', 'Médéa', 'Chlef', 'Relizane', 'Souk Ahras',
        "M'Sila", 'Jijel', 'Saïda', 'Laghouat', 'Mascara', 'Ghardaïa',
        'Adrar', 'Tamanrasset', 'Djelfa', 'Bouira', 'Tizi Ouzou',
        'Béchar', 'Khenchela', 'Ain Defla', 'Mila', 'Tissemsilt',
        'El Bayadh', 'Naâma',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [
        'Rue', 'Avenue', 'Boulevard', 'Cité', 'Hai', 'Lotissement',
        'Impasse', 'Place', 'Chemin',
    ];

    /** @var string[] */
    protected static array $streetSuffix = [];

    /** @var string[] */
    protected static array $state = [
        'Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Béjaïa',
        'Biskra', 'Béchar', 'Blida', 'Bouira', 'Tamanrasset', 'Tébessa',
        'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel',
        'Sétif', 'Saïda', 'Skikda', 'Sidi Bel Abbès', 'Annaba', 'Guelma',
        'Constantine', 'Médéa', "M'Sila", 'Mascara', 'Ouargla', 'Oran',
    ];

    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];

    /** @var string[] */
    protected static array $streetNames = [
        'Larbi Ben M\'Hidi', 'Didouche Mourad', 'Abane Ramdane', 'Emir Abdelkader',
        'Colonel Amirouche', 'Ben Boulaïd', 'Krim Belkacem', 'Hassiba Ben Bouali',
        'Zighoud Youcef', 'des Martyrs', 'du 1er Novembre', 'de la Palestine',
    ];

    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}}, {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];

    protected static string $country = 'Algérie';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }

    /** @return string */
    public function streetAddress(): string
    {
        return $this->buildingNumber() . ', ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->city() . ' ' . $this->postCode();
    }

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
    public function latitude(): float { return static::randomFloat(6, 18.9, 37.1); }

    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -8.7, 11.9); }
}
