<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Sa;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Abdullah', 'Mohammed', 'Abdul Rahman', 'Faisal', 'Sultan', 'Khalid',
        'Turki', 'Bandar', 'Majed', 'Fahad', 'Saud', 'Nasser', 'Waleed',
        'Talal', 'Naif', 'Abdulaziz', 'Bader', 'Mansour', 'Salman', 'Hamad',
        'Mishaal', 'Rayan', 'Mazen', 'Ziad', 'Osama', 'Nawaf', 'Raed',
        'Saad', 'Ibrahim', 'Tariq', 'Yousef', 'Abdulkarim', 'Badr', 'Adel',
        'Sami', 'Thamer', 'Anas', 'Fawaz', 'Ahmad', 'Hani',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Nora', 'Sara', 'Reem', 'Lama', 'Hessa', 'Maha', 'Hind', 'Latifa',
        'Abeer', 'Amal', 'Sheikha', 'Waad', 'Arwa', 'Munira', 'Dalal',
        'Haifa', 'Lulwa', 'Mona', 'Tahani', 'Sumayyah', 'Farah', 'Jana',
        'Shahad', 'Nouf', 'Deena', 'Ghada', 'Maisa', 'Wafa', 'Najla', 'Rana',
        'Lamia', 'Basma', 'Aseel', 'Joud', 'Rawan', 'Mashael', 'Lujain',
        'Atheer', 'Yara', 'Leen',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Al-Saud', 'Al-Rashid', 'Al-Zahrani', 'Al-Ghamdi', 'Al-Qahtani',
        'Al-Harbi', 'Al-Otaibi', 'Al-Shehri', 'Al-Malki', 'Al-Dosari',
        'Al-Mutairi', 'Al-Anzi', 'Al-Balawi', 'Al-Yami', 'Al-Subaie',
        'Al-Shahrani', 'Al-Jabri', 'Al-Ruwaili', 'Al-Enezi', 'Al-Shamrani',
        'Al-Faifi', 'Al-Asmari', 'Al-Khathami', 'Al-Bishi', 'Al-Asiri',
        'Al-Marri', 'Al-Salmi', 'Al-Hajri', 'Al-Dossary', 'Al-Ahmadi',
        'Al-Tamimi', 'Al-Ajmi', 'Al-Dawsari', 'Al-Thani', 'Al-Juhani',
        'Al-Khaldi', 'Al-Bugami', 'Al-Sulami', 'Al-Omari', 'Al-Hazmi',
    ];

    /** @var string[] */
    protected static array $titleMale = ['Mr.', 'Dr.', 'Prof.', 'Sheikh', 'Eng.'];
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
