<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Tn;

use Faker\Provider\Base;

/**
 * Tunisian person name provider.
 */
class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohamed', 'Ahmed', 'Mehdi', 'Youssef', 'Khalil', 'Amine', 'Hamza',
        'Zied', 'Anis', 'Rami', 'Seif', 'Maher', 'Aymen', 'Walid', 'Bassem',
        'Ghassen', 'Oussema', 'Nidhal', 'Amir', 'Imed', 'Haythem', 'Skander',
        'Nizar', 'Selim', 'Chiheb', 'Montassar', 'Firas', 'Tarek', 'Bechir',
        'Houssem', 'Bilel', 'Hedi', 'Kamel', 'Lotfi', 'Riadh', 'Slim',
        'Sofien', 'Wissem', 'Yassine', 'Zouhair',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Fatma', 'Imen', 'Amira', 'Sana', 'Rania', 'Yosra', 'Nesrine', 'Donia',
        'Mariam', 'Soumaya', 'Rim', 'Hanen', 'Emna', 'Sirine', 'Rayen', 'Khaoula',
        'Olfa', 'Manel', 'Salma', 'Asma', 'Lobna', 'Lina', 'Chaima', 'Wafa',
        'Hela', 'Mabrouka', 'Abir', 'Jihen', 'Faten', 'Ahlem', 'Afef', 'Besma',
        'Cyrine', 'Dorsaf', 'Eya', 'Feriel', 'Hayet', 'Ines', 'Leila', 'Nour',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Ben Ali', 'Ben Salah', 'Trabelsi', 'Chaabane', 'Hamdi', 'Bouzid',
        'Gharbi', 'Maaref', 'Jlassi', 'Boukadida', 'Ayari', 'Ferjani', 'Saadi',
        'Kasmi', 'Rekik', 'Oueslati', 'Haddad', 'Mzali', 'Baccar', 'Dridi',
        'Sfaxi', 'Belhaj', 'Abidi', 'Mannai', 'Henchiri', 'Zouari', 'Elloumi',
        'Ferchichi', 'Karray', 'Amor', 'Beji', 'Cherni', 'Derbali', 'Essid',
        'Ghanmi', 'Hammami', 'Khelil', 'Laabidi', 'Mahjoub', 'Nefzi',
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
