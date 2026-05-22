<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Fr;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg',
        'Montpellier', 'Bordeaux', 'Lille', 'Rennes', 'Reims', 'Le Havre',
        'Saint-Étienne', 'Toulon', 'Grenoble', 'Dijon', 'Angers', 'Nîmes',
        'Villeurbanne', 'Saint-Denis', 'Clermont-Ferrand', 'Brest', 'Le Mans',
        'Limoges', 'Amiens', 'Tours', 'Metz', 'Perpignan', 'Besançon',
        'Orléans', 'Rouen', 'Caen', 'Mulhouse', 'Nancy',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [
        'Rue', 'Avenue', 'Boulevard', 'Impasse', 'Allée', 'Chemin',
        'Place', 'Route', 'Voie', 'Passage', 'Cour', 'Villa', 'Square', 'Domaine',
    ];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Île-de-France', 'Auvergne-Rhône-Alpes', 'Bourgogne-Franche-Comté',
        'Bretagne', 'Centre-Val de Loire', 'Corse', 'Grand Est', 'Hauts-de-France',
        'Normandie', 'Nouvelle-Aquitaine', 'Occitanie', 'Pays de la Loire',
        "Provence-Alpes-Côte d'Azur",
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'de la Paix', 'Victor Hugo', 'de la République', 'Jean Jaurès',
        'Pasteur', 'Gambetta', 'du Général de Gaulle', 'Voltaire',
        'des Champs-Élysées', 'Saint-Germain', 'de Rivoli', 'Montmartre',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{postCode}} {{city}}',
        '{{streetPrefix}} {{streetName}}, {{postCode}} {{city}}',
    ];
    protected static string $country = 'France';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->buildingNumber() . ' ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->postCode() . ' ' . $this->city(); }
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
    public function latitude(): float { return static::randomFloat(6, 41.3, 51.1); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -5.1, 9.6); }
}
