<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Dz;

use Faker\Provider\Base;

/**
 * Algerian person name provider with authentic Arabic/Amazigh names.
 */
class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohamed', 'Ahmed', 'Youcef', 'Karim', 'Rachid', 'Hamza',
        'Mehdi', 'Sofiane', 'Bilal', 'Zakaria', 'Amine', 'Abdelkader',
        'Khaled', 'Tarek', 'Mourad', 'Hichem', 'Nabil', 'Salim',
        'Lyès', 'Anis', 'Réda', 'Lotfi', 'Kheireddine', 'Abdelmalek',
        'Djamel', 'Nadir', 'Samy', 'Ayoub', 'Adel', 'Fares',
        'Raouf', 'Farid', 'Yacine', 'Habib', 'Mokhtar', 'Nassim',
        'Brahim', 'Samir', 'Toufik', 'Hakim',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Fatima', 'Aisha', 'Khadija', 'Amina', 'Nadia', 'Houria',
        'Meriem', 'Samia', 'Yasmine', 'Djamila', 'Sabrina', 'Imane',
        'Sihem', 'Lylia', 'Wafa', 'Hanane', 'Ouafa', 'Karima',
        'Nabila', 'Asma', 'Rima', 'Sonia', 'Hafida', 'Halima',
        'Soumia', 'Malika', 'Farida', 'Zoulikha', 'Nacira', 'Chafia',
        'Lamia', 'Nawal', 'Safia', 'Nouria', 'Dalila', 'Latifa',
        'Soraya', 'Fella', 'Leila', 'Aicha',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Beloufa', 'Khelifi', 'Cherif', 'Benmoussa', 'Belkacem', 'Messaoudi',
        'Boudiaf', 'Belaidi', 'Ait Ahmed', 'Meziane', 'Boumediene', 'Taleb',
        'Saidani', 'Hadjadj', 'Zerrouki', 'Maamri', 'Boudjemaa', 'Belkacemi',
        'Oussalah', 'Haddad', 'Mekki', 'Benali', 'Ferhat', 'Boukhelif',
        'Kebir', 'Mazouz', 'Bouslah', 'Brahimi', 'Gherbi', 'Ziani',
        'Amrani', 'Bouzid', 'Charef', 'Djebbar', 'Fellahi', 'Guendouz',
        'Hamidou', 'Kaci', 'Lakhdar', 'Mouloud',
    ];

    /** @var string[] */
    protected static array $titleMale = ['M.', 'Dr', 'Prof.', 'Si'];

    /** @var string[] */
    protected static array $titleFemale = ['Mme', 'Mlle', 'Dr', 'Prof.'];

    /** @var string[] */
    protected static array $nameFormats = [
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    /** @return string */
    public function name(?string $gender = null): string
    {
        if ($gender === 'male') {
            $format = static::randomElement(['{{titleMale}} {{firstNameMale}} {{lastName}}', '{{firstNameMale}} {{lastName}}']);
        } elseif ($gender === 'female') {
            $format = static::randomElement(['{{titleFemale}} {{firstNameFemale}} {{lastName}}', '{{firstNameFemale}} {{lastName}}']);
        } else {
            $format = static::randomElement(static::$nameFormats);
        }
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
