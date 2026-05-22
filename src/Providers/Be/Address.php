<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Be;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Brussel', 'Bruxelles', 'Antwerpen', 'Gent', 'Charleroi', 'Liège',
        'Brugge', 'Namur', 'Leuven', 'Mons', 'Aalst', 'Mechelen', 'La Louvière',
        'Kortrijk', 'Hasselt', 'Sint-Niklaas', 'Tournai', 'Genk', 'Seraing',
        'Roeselare', 'Mouscron', 'Verviers', 'Beveren', 'Dendermonde', 'Turnhout',
        'Beringen', 'Dilbeek', 'Lommel', 'Wavre', 'Arlon', 'Ostende',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['Rue', 'Avenue', 'Boulevard', 'Place', 'Straat', 'Laan', 'Plein'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Antwerpen', 'Oost-Vlaanderen', 'West-Vlaanderen', 'Vlaams-Brabant',
        'Limburg', 'Hainaut', 'Liège', 'Luxembourg', 'Namur', 'Brabant Wallon',
        'Brussel Hoofdstedelijk Gewest',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['####'];
    /** @var string[] */
    protected static array $streetNames = [
        'de la Loi', 'Royale', 'Neuve', 'de Flandre', 'de Namur',
        'Kerk', 'Station', 'Markt', 'Nieuw', 'Hoog', 'de Bruxelles', 'Leopold',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetPrefix}} {{streetName}} {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'Belgique';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetPrefix() . ' ' . $this->streetName() . ' ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetPrefix(): string { return static::randomElement(static::$streetPrefix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 300); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 49.5, 51.5); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 2.5, 6.4); }
}
