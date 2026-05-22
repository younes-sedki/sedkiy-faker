<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Jo;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohammed', 'Ahmad', 'Omar', 'Khalid', 'Bilal', 'Faris', 'Tariq',
        'Nasser', 'Rami', 'Samer', 'Haitham', 'Bassam', 'Zaid', 'Eyad',
        'Wissam', 'Amer', 'Baraa', 'Luay', 'Qusai', 'Yazan', 'Iyad', 'Raed',
        'Monther', 'Anas', 'Fadi', 'Khaled', 'Saif', 'Rayan', 'Adham', 'Aws',
        'Hamzeh', 'Mahmoud', 'Yousef', 'Ibrahim', 'Maher', 'Ayman', 'Moath',
        'Ali', 'Muhannad', 'Majed',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Rania', 'Sara', 'Nadia', 'Lana', 'Dima', 'Hana', 'Rana', 'Mona',
        'Alia', 'Sana', 'Reem', 'Leen', 'Joud', 'Shahd', 'Malak', 'Noor',
        'Ghada', 'Wafa', 'Abeer', 'Asma', 'Yara', 'Samar', 'Duaa', 'Heba',
        'Lujain', 'Dana', 'Farah', 'Lama', 'May', 'Rand', 'Tala', 'Mais',
        'Bayan', 'Haneen', 'Areej', 'Suha', 'Zeina', 'Nisreen', 'Iman', 'Dalal',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Al-Momani', 'Al-Haddadin', 'Al-Qudah', 'Bani Hani', 'Al-Mashaqba',
        'Al-Zoubi', 'Al-Rawashdeh', 'Al-Tarawneh', 'Al-Majali', 'Al-Faouri',
        'Bani Salameh', 'Al-Dabbas', 'Al-Nawaiseh', 'Al-Smadi', 'Al-Khateeb',
        'Al-Mufleh', 'Habahbeh', 'Al-Shawabkeh', 'Al-Nsour', 'Al-Khatib',
        'Abu-Rumman', 'Zureiqat', 'Fraihat', 'Al-Masri', 'Al-Rabi',
        'Al-Abbadi', 'Bani Issa', 'Al-Oran', 'Al-Khalidi', 'Al-Omari',
        'Al-Ajarmeh', 'Al-Bataineh', 'Al-Darawsheh', 'Al-Ghazawi', 'Al-Hayari',
        'Al-Jaradat', 'Al-Kafaween', 'Al-Louzi', 'Al-Muhtaseb', 'Al-Nahar',
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
