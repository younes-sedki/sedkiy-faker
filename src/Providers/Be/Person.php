<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Be;

use Faker\Provider\Base;

/**
 * Belgian person name provider — bilingual NL+FR.
 */
class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Lars', 'Daan', 'Finn', 'Lukas', 'Sander', 'Ruben', 'Arno', 'Bert',
        'Stef', 'Wout', 'Niels', 'Pieter', 'Joris', 'Kobe', 'Arne', 'Lander',
        'Bram', 'Jarne', 'Senne', 'Antoine', 'Thomas', 'Nicolas', 'Maxime',
        'Romain', 'Guillaume', 'Julien', 'Clément', 'Alexandre', 'Pierre',
        'Arthur', 'Louis', 'Quentin', 'Sébastien', 'Florian', 'Noah',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Emma', 'Lotte', 'Noor', 'Fleur', 'Anouk', 'Lien', 'Hanne', 'Jolien',
        'Elien', 'Silke', 'Lana', 'Nathalie', 'Sofie', 'Femke', 'Inne',
        'Marie', 'Julie', 'Laura', 'Camille', 'Lucie', 'Charlotte', 'Manon',
        'Sophie', 'Clara', 'Alice', 'Pauline', 'Clémentine', 'Juliette',
        'Léa', 'Zoé', 'Olivia', 'Louise', 'Elena', 'Jade', 'Amélie',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'Peeters', 'Janssen', 'Maes', 'Jacobs', 'Mertens', 'Willems', 'Claes',
        'Goossens', 'Wouters', 'Hermans', 'Dupont', 'Lambert', 'Simon',
        'Lejeune', 'Renard', 'Charlier', 'Lefèbvre', 'Defays', 'Pirard',
        'Bastin', 'De Smedt', 'Vandenberghe', 'Martens', 'Van Damme',
        'Desmet', 'Leclercq', 'Dumont', 'Henrard', 'Collin', 'Noël',
        'Stevens', 'Pauwels', 'Michiels', 'Cools', 'Aerts', 'Bogaert',
        'Claessens', 'Devos', 'Geerts', 'Hendrickx',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Dhr.', 'M.', 'Dr.', 'Prof.'];
    /** @var string[] */
    protected static array $titleFemale = ['Mevr.', 'Mme', 'Dr.', 'Prof.'];
    /** @var string[] */
    protected static array $nameFormats = [
        '{{titleMale}} {{firstNameMale}} {{lastName}}', '{{firstNameMale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}', '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    /** @return string */
    public function name(?string $gender = null): string { if ($gender === 'male') { $format = static::randomElement(['{{titleMale}} {{firstNameMale}} {{lastName}}', '{{firstNameMale}} {{lastName}}']); } elseif ($gender === 'female') { $format = static::randomElement(['{{titleFemale}} {{firstNameFemale}} {{lastName}}', '{{firstNameFemale}} {{lastName}}']); } else { $format = static::randomElement(static::$nameFormats); } return $this->generator->parse($format); }
    /** @return string */
    public function firstNameMale(): string { return static::randomElement(static::$firstNameMale); }
    /** @return string */
    public function firstNameFemale(): string { return static::randomElement(static::$firstNameFemale); }
    /** @return string */
    public function firstName(?string $gender = null): string { if ($gender === 'male') { return $this->firstNameMale(); } if ($gender === 'female') { return $this->firstNameFemale(); } return static::randomElement(array_merge(static::$firstNameMale, static::$firstNameFemale)); }
    /** @return string */
    public function lastName(): string { return static::randomElement(static::$lastName); }
    /** @return string */
    public function titleMale(): string { return static::randomElement(static::$titleMale); }
    /** @return string */
    public function titleFemale(): string { return static::randomElement(static::$titleFemale); }
}
