<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\De;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Berlin', 'Hamburg', 'München', 'Köln', 'Frankfurt am Main', 'Stuttgart',
        'Düsseldorf', 'Leipzig', 'Dortmund', 'Essen', 'Bremen', 'Dresden',
        'Hannover', 'Nürnberg', 'Duisburg', 'Bochum', 'Wuppertal', 'Bielefeld',
        'Bonn', 'Münster', 'Karlsruhe', 'Mannheim', 'Augsburg', 'Wiesbaden',
        'Gelsenkirchen', 'Mönchengladbach', 'Braunschweig', 'Kiel', 'Chemnitz',
        'Aachen', 'Freiburg', 'Heidelberg', 'Potsdam', 'Lübeck', 'Mainz',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [];
    /** @var string[] */
    protected static array $streetSuffix = [
        'Straße', 'Gasse', 'Weg', 'Platz', 'Allee', 'Ring', 'Damm', 'Ufer',
        'Chaussee', 'Steig', 'Berg', 'Brücke', 'Graben', 'Tor', 'Markt',
    ];
    /** @var string[] */
    protected static array $state = [
        'Baden-Württemberg', 'Bayern', 'Berlin', 'Brandenburg', 'Bremen',
        'Hamburg', 'Hessen', 'Mecklenburg-Vorpommern', 'Niedersachsen',
        'Nordrhein-Westfalen', 'Rheinland-Pfalz', 'Saarland', 'Sachsen',
        'Sachsen-Anhalt', 'Schleswig-Holstein', 'Thüringen',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Haupt', 'Berliner', 'Hamburger', 'Münchner', 'Goethe', 'Schiller',
        'Bach', 'Mozart', 'Beethoven', 'Linden', 'Kirch', 'Mühlen',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{streetName}}{{streetSuffix}} {{buildingNumber}}, {{postCode}} {{city}}',
    ];
    protected static string $country = 'Deutschland';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetName() . $this->streetSuffix() . ' ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetSuffix(): string { return static::randomElement(static::$streetSuffix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 200); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 47.3, 55.1); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 5.9, 15.0); }
}
