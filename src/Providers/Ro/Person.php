<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ro;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Alexandru', 'Andrei', 'Mihai', 'Cristian', 'Gabriel', 'Ionuț',
        'Florin', 'Bogdan', 'Radu', 'Cosmin', 'Lucian', 'Daniel', 'Marius',
        'Adrian', 'Ciprian', 'Cătălin', 'Silviu', 'Valentin', 'Ovidiu',
        'Alin', 'Dănuț', 'Vlad', 'Gelu', 'Sorin', 'Călin', 'Relu', 'Petre',
        'Teodor', 'Iulian', 'Constantin', 'Ștefan', 'Nicolae', 'Gheorghe',
        'Vasile', 'Ilie',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Maria', 'Elena', 'Ana', 'Ioana', 'Cristina', 'Andreea', 'Alexandra',
        'Gabriela', 'Mihaela', 'Laura', 'Raluca', 'Alina', 'Simona', 'Irina',
        'Denisa', 'Larisa', 'Roxana', 'Carmen', 'Luminița', 'Monica',
        'Nicoleta', 'Valentina', 'Florentina', 'Daniela', 'Ramona',
        'Adriana', 'Oana', 'Diana', 'Iulia', 'Loredana', 'Anca', 'Bianca',
        'Corina', 'Delia', 'Camelia',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'Pop', 'Popa', 'Ionescu', 'Popescu', 'Constantin', 'Dumitru', 'Stan',
        'Gheorghe', 'Stoica', 'Radu', 'Nistor', 'Marin', 'Tudor', 'Voicu',
        'Matei', 'Sandu', 'Grigore', 'Dinu', 'Pavel', 'Lupu', 'Moldovan',
        'Ungureanu', 'Neagu', 'Florea', 'Ene', 'Toma', 'Barbu', 'Vasile',
        'Sava', 'Cojocaru', 'Badea', 'Gavrilescu', 'Ilie', 'Ioniță',
        'Ciobanu', 'Iacob', 'Mocanu', 'Munteanu', 'Petrescu', 'Rotaru',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Dl', 'Dr.', 'Prof.', 'Ing.'];
    /** @var string[] */
    protected static array $titleFemale = ['Dna', 'Dra', 'Dr.', 'Prof.'];
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
