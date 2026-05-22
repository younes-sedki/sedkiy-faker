<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Gb;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Oliver', 'Harry', 'George', 'Noah', 'Jack', 'Charlie', 'Alfie',
        'Freddie', 'James', 'Archie', 'Oscar', 'Henry', 'William', 'Joshua',
        'Thomas', 'Ethan', 'Max', 'Lucas', 'Isaac', 'Edward', 'Arthur',
        'Alexander', 'Sebastian', 'Theodore', 'Leo', 'Finley', 'Jacob',
        'Logan', 'Samuel', 'Lewis', 'Daniel', 'Matthew', 'Benjamin',
        'Joseph', 'Harrison',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Olivia', 'Amelia', 'Isla', 'Ava', 'Freya', 'Poppy', 'Lily', 'Sophie',
        'Grace', 'Chloe', 'Isabelle', 'Ellie', 'Scarlett', 'Daisy', 'Mia',
        'Sienna', 'Ruby', 'Layla', 'Charlotte', 'Emily', 'Florence', 'Evie',
        'Rosie', 'Millie', 'Eva', 'Abigail', 'Alice', 'Zara', 'Imogen',
        'Harriet', 'Emma', 'Jessica', 'Phoebe', 'Ella', 'Eleanor',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'Smith', 'Jones', 'Williams', 'Brown', 'Taylor', 'Davies', 'Evans',
        'Wilson', 'Thomas', 'Roberts', 'Johnson', 'Lewis', 'Walker', 'Robinson',
        'Wood', 'Thompson', 'White', 'Watson', 'Jackson', 'Wright', 'Green',
        'Harris', 'Clarke', 'Turner', 'Edwards', 'James', 'Martin', 'Cooper',
        'Hill', 'Ward', 'Morris', 'Moore', 'Clark', 'King', 'Baker', 'Hall',
        'Lee', 'Allen', 'Young', 'Scott',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Mr', 'Dr', 'Prof', 'Sir'];
    /** @var string[] */
    protected static array $titleFemale = ['Mrs', 'Ms', 'Miss', 'Dr', 'Prof', 'Dame'];
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
    public function firstName(?string $gender = null): string { if ($gender === 'male') { return $this->firstNameMale(); } if ($gender === 'female') { return $this->firstNameFemale(); } return static::randomElement(array_merge(static::$firstNameMale, static::$firstNameFemale)); }
    /** @return string */
    public function lastName(): string { return static::randomElement(static::$lastName); }
    /** @return string */
    public function titleMale(): string { return static::randomElement(static::$titleMale); }
    /** @return string */
    public function titleFemale(): string { return static::randomElement(static::$titleFemale); }
}
