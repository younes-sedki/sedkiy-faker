<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Lb;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Karim', 'Ali', 'Hassan', 'Mohammed', 'Rami', 'Georges', 'Elie', 'Tony',
        'Pierre', 'Maroun', 'Nader', 'Tarek', 'Samer', 'Wael', 'Khaled', 'Jad',
        'Ghassan', 'Charbel', 'Rabih', 'Fadi', 'Bassel', 'Amer', 'Ziad', 'Samir',
        'Bilal', 'Nizar', 'Imad', 'Adel', 'Hasan', 'Walid', 'Michel', 'Antoine',
        'Ricardo', 'Joseph', 'Roy', 'Sarkis', 'Elias', 'Edmond', 'Fouad', 'Rafic',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Nadia', 'Rita', 'Maya', 'Layla', 'Rola', 'Carla', 'Mirna', 'Christine',
        'Joelle', 'Hana', 'Zeina', 'Tania', 'Lara', 'Dina', 'Sabine', 'Celine',
        'Nadine', 'Ghada', 'Rima', 'Rana', 'Samar', 'Rouba', 'Amal', 'Carine',
        'Sandra', 'Mireille', 'Nicole', 'Joumana', 'Elsa', 'Carmen', 'Claudia',
        'Pamela', 'Jessica', 'Marianne', 'Nour', 'Maria', 'Christelle', 'Lea',
        'Yasmine', 'Tracy',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Salam', 'Gemayel', 'Hariri', 'Nasrallah', 'Jumblatt', 'Frangieh',
        'Berri', 'Khoury', 'Haddad', 'Saad', 'Nasser', 'Khalil', 'Mourad',
        'Kassem', 'Abdallah', 'Tabbara', 'Makdisi', 'Rahhal', 'El Amine',
        'Chaoul', 'Abou Zeid', 'Fares', 'Lahoud', 'El Khoury', 'Barakat',
        'Hanna', 'Nassar', 'Geagea', 'Sleiman', 'Aoun', 'Maatouk', 'Rizk',
        'Sfeir', 'Najm', 'Chamoun', 'Assaf', 'Helou', 'Daher', 'Kanaan',
        'Skaff',
    ];

    /** @var string[] */
    protected static array $titleMale = ['Mr.', 'Dr.', 'Prof.', 'Eng.'];
    /** @var string[] */
    protected static array $titleFemale = ['Mrs.', 'Ms.', 'Dr.', 'Prof.'];
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
