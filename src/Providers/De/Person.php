<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\De;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Alexander', 'Andreas', 'Christian', 'Daniel', 'David', 'Felix', 'Florian',
        'Georg', 'Hans', 'Jakob', 'Jan', 'Jonas', 'Julian', 'Klaus', 'Lars',
        'Lukas', 'Marco', 'Markus', 'Matthias', 'Michael', 'Patrick', 'Peter',
        'Philipp', 'Sebastian', 'Simon', 'Stefan', 'Thomas', 'Tim', 'Tobias',
        'Wolfgang', 'Ben', 'Leon', 'Paul', 'Finn', 'Elias',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Anna', 'Christina', 'Elisabeth', 'Emma', 'Eva', 'Hannah', 'Jana',
        'Jennifer', 'Julia', 'Katharina', 'Laura', 'Lena', 'Lisa', 'Maria',
        'Monika', 'Nicole', 'Sarah', 'Sophia', 'Stefanie', 'Susanne', 'Angela',
        'Birgit', 'Claudia', 'Daniela', 'Heike', 'Ines', 'Karin', 'Kirsten',
        'Melanie', 'Petra', 'Mia', 'Emilia', 'Marie', 'Lina', 'Clara',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Müller', 'Schmidt', 'Schneider', 'Fischer', 'Weber', 'Meyer', 'Wagner',
        'Becker', 'Schulz', 'Hoffmann', 'Schäfer', 'Koch', 'Bauer', 'Richter',
        'Klein', 'Wolf', 'Schröder', 'Neumann', 'Schwarz', 'Zimmermann',
        'Braun', 'Krüger', 'Hofmann', 'Hartmann', 'Lange', 'Schmitt', 'Werner',
        'Schmitz', 'Krause', 'Meier', 'Lehmann', 'Schmid', 'Schulze', 'Maier',
        'Köhler', 'Herrmann', 'König', 'Walter', 'Mayer', 'Huber',
    ];

    /** @var string[] */
    protected static array $titleMale = ['Herr', 'Dr.', 'Prof.', 'Prof. Dr.'];
    /** @var string[] */
    protected static array $titleFemale = ['Frau', 'Dr.', 'Prof.', 'Prof. Dr.'];
    /** @var string[] */
    protected static array $nameFormats = [
        '{{titleMale}} {{firstNameMale}} {{lastName}}', '{{firstNameMale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}', '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    /** @return string */
    public function name(?string $gender = null): string
    {
        if ($gender === 'male') { $format = static::randomElement(['{{titleMale}} {{firstNameMale}} {{lastName}}', '{{firstNameMale}} {{lastName}}']); }
        elseif ($gender === 'female') { $format = static::randomElement(['{{titleFemale}} {{firstNameFemale}} {{lastName}}', '{{firstNameFemale}} {{lastName}}']); }
        else { $format = static::randomElement(static::$nameFormats); }
        return $this->generator->parse($format);
    }
    /** @return string */
    public function firstNameMale(): string { return static::randomElement(static::$firstNameMale); }
    /** @return string */
    public function firstNameFemale(): string { return static::randomElement(static::$firstNameFemale); }
    /** @return string */
    public function firstName(?string $gender = null): string
    {
        if ($gender === 'male') { return $this->firstNameMale(); }
        if ($gender === 'female') { return $this->firstNameFemale(); }
        return static::randomElement(array_merge(static::$firstNameMale, static::$firstNameFemale));
    }
    /** @return string */
    public function lastName(): string { return static::randomElement(static::$lastName); }
    /** @return string */
    public function titleMale(): string { return static::randomElement(static::$titleMale); }
    /** @return string */
    public function titleFemale(): string { return static::randomElement(static::$titleFemale); }
}
