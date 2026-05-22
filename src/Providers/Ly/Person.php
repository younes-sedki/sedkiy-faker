<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ly;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohamed', 'Ahmed', 'Ali', 'Omar', 'Hassan', 'Hussein', 'Khaled',
        'Youssef', 'Muammar', 'Saleh', 'Taher', 'Fawzi', 'Nuri', 'Samir',
        'Abdulrahman', 'Mukhtar', 'Mansour', 'Miloud', 'Jamal', 'Faraj',
        'Suleiman', 'Ramadan', 'Emhemed', 'Miftah', 'Nasser', 'Aref',
        'Adel', 'Bashir', 'Lotfi', 'Hamad', 'Mustafa', 'Abdulsalam',
        'Idris', 'Fathi', 'Abubakr', 'Issa', 'Younis', 'Khalifa',
        'Hisham', 'Tariq',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Fatima', 'Aisha', 'Khadija', 'Maryam', 'Zahra', 'Hana', 'Nadia',
        'Salma', 'Widad', 'Asma', 'Najwa', 'Lubna', 'Houda', 'Siham',
        'Karima', 'Amina', 'Soumaya', 'Leila', 'Zeinab', 'Suad', 'Fawzia',
        'Mona', 'Mabrouka', 'Miriam', 'Huda', 'Nour', 'Wafa', 'Sabah',
        'Ruqayya', 'Dalal', 'Naima', 'Safia', 'Halima', 'Malika',
        'Samira', 'Basma', 'Marwa', 'Rana', 'Iman', 'Layla',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'El-Misrati', 'Ben Khalifa', 'El-Barasi', 'Treki', "Sha'ban",
        'El-Sherif', 'Bu Sidra', 'El-Haddad', 'El-Warfalli', 'Gharyani',
        'El-Gariani', 'Mukhtar', 'El-Zwawi', 'Jibril', 'El-Keib',
        'Bu Kraa', 'Fakhri', 'El-Obeidi', 'El-Hasi', 'Senussi',
        'El-Fitouri', 'Barka', 'El-Muntasir', 'El-Zawi', 'Zgaleh',
        'El-Maghrabi', 'Bouzid', 'El-Arabi', 'Tarhouni', 'El-Werfalli',
        'El-Jazwi', 'Belhadj', 'Gaddafi', 'El-Mabrouk', 'Saadi',
        'El-Turki', 'El-Hamali', 'El-Gadi', 'Swehli', 'Badi',
    ];

    /** @var string[] */
    protected static array $titleMale = ['Mr.', 'Dr.', 'Prof.', 'Haj'];
    /** @var string[] */
    protected static array $titleFemale = ['Mrs.', 'Ms.', 'Dr.', 'Prof.', 'Hajja'];
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
