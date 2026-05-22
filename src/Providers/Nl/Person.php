<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Nl;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Lars', 'Daan', 'Sem', 'Finn', 'Luuk', 'Bram', 'Thijs', 'Mees',
        'Sander', 'Ruben', 'Tim', 'Joost', 'Pieter', 'Bas', 'Jeroen', 'Thomas',
        'Jens', 'Nick', 'Robin', 'Arjan', 'Mark', 'Niels', 'Rick', 'Stefan',
        'David', 'Tom', 'Bart', 'Dennis', 'Koen', 'Wouter', 'Jesse', 'Milan',
        'Liam', 'Noah', 'Lucas',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Emma', 'Sophie', 'Julia', 'Anna', 'Lotte', 'Lisa', 'Noor', 'Fleur',
        'Anouk', 'Vera', 'Iris', 'Laura', 'Eva', 'Amber', 'Roos', 'Sanne',
        'Hanna', 'Fenna', 'Lies', 'Maud', 'Marloes', 'Manon', 'Mirjam',
        'Femke', 'Inge', 'Sofie', 'Nathalie', 'Kim', 'Amy', 'Lena',
        'Tessa', 'Sara', 'Demi', 'Merel', 'Nina',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'De Jong', 'Jansen', 'De Vries', 'Van den Berg', 'Van Dijk', 'Bakker',
        'Janssen', 'Visser', 'Smit', 'Meijer', 'De Boer', 'Mulder', 'De Groot',
        'Bos', 'Vos', 'Peters', 'Hendriks', 'Van Leeuwen', 'Dekker', 'Brouwer',
        'Dijkstra', 'Peeters', 'Jacobs', 'Van der Berg', 'Kuipers', 'Vermeer',
        'De Wit', 'Hoekstra', 'Lans', 'Willems', 'Van der Linden', 'Postma',
        'Van der Meer', 'Kok', 'De Graaf', 'Van der Wal', 'Scholten',
        'Van den Broek', 'Groen', 'Van der Heijden',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Dhr.', 'Dr.', 'Prof.', 'Ir.', 'Mr.'];
    /** @var string[] */
    protected static array $titleFemale = ['Mevr.', 'Dr.', 'Prof.', 'Ir.', 'Mr.'];
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
