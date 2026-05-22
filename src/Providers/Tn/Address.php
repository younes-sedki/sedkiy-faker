<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Tn;

use Faker\Provider\Base;

/**
 * Tunisian address provider.
 */
class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Tunis', 'Sfax', 'Sousse', 'Kairouan', 'Bizerte', 'Gabès', 'Ariana',
        'Gafsa', 'Monastir', 'Ben Arous', 'Kasserine', 'Médenine', 'La Marsa',
        'Hammamet', 'Nabeul', 'Mahdia', 'Sidi Bouzid', 'Jendouba', 'Siliana',
        'Zaghouan', 'Béja', 'Le Kef', 'Tozeur', 'Kébili', 'Tataouine',
        'El Aouina', 'La Goulette', 'Carthage', 'Djerba', 'Zarzis',
        'Douz', 'Mateur', 'Menzel Bourguiba', 'Korba', 'Grombalia',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [
        'Rue', 'Avenue', 'Boulevard', 'Impasse', 'Place', 'Cité', 'Résidence',
    ];

    /** @var string[] */
    protected static array $streetSuffix = [];

    /** @var string[] */
    protected static array $state = [
        'Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan',
        'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse',
        'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid',
        'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili',
    ];

    /** @var string[] */
    protected static array $postCodeFormat = ['####'];

    /** @var string[] */
    protected static array $streetNames = [
        'Habib Bourguiba', 'de la Liberté', 'de France', 'Charles de Gaulle',
        'Ibn Khaldoun', 'de Carthage', 'de la République', 'Farhat Hached',
        'Hédi Chaker', 'Mohamed V', 'de Paris', 'du Japon',
    ];

    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}}, {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];

    protected static string $country = 'Tunisie';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ', ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->city() . ' ' . $this->postCode(); }
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
    public function latitude(): float { return static::randomFloat(6, 30.2, 37.5); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 7.5, 11.6); }
}
