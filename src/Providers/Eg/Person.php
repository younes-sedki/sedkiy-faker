<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Eg;

use Faker\Provider\Base;

/**
 * Egyptian person name provider.
 */
class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohamed', 'Ahmed', 'Mahmoud', 'Omar', 'Ali', 'Hassan', 'Hussein',
        'Khaled', 'Youssef', 'Ibrahim', 'Tamer', 'Amr', 'Karim', 'Sherif',
        'Tarek', 'Ayman', 'Hossam', 'Essam', 'Walid', 'Samy', 'Maged',
        'Bassem', 'Ashraf', 'Wael', 'Adel', 'Mostafa', 'Osama', 'Alaa',
        'Hazem', 'Nader', 'Samir', 'Gamal', 'Fathy', 'Hany', 'Ramy',
        'Emad', 'Magdy', 'Hatem', 'Shady', 'Ehab',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Fatma', 'Nadia', 'Eman', 'Hend', 'Mona', 'Dina', 'Rania', 'Heba',
        'Sherine', 'Noha', 'Amira', 'Sara', 'Yasmine', 'Ola', 'Mai', 'Doaa',
        'Ghada', 'Samia', 'Nevine', 'Mariam', 'Reem', 'Lobna', 'Abeer',
        'Asmaa', 'Nour', 'Aya', 'Radwa', 'Shaimaa', 'Suzan', 'Enas',
        'Nagwa', 'Sahar', 'Laila', 'Sawsan', 'Manal', 'Naglaa', 'Hoda',
        'Salwa', 'Amal', 'Nahla',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'El-Sayed', 'Ibrahim', 'Hassan', 'Mohamed', 'Ali', 'Ahmed', 'Hussein',
        'Khalil', 'Mostafa', 'Nasser', 'El-Masry', 'Gomaa', 'Soliman', 'Kamel',
        'Farouk', 'Mansour', 'Rizk', 'Amin', 'El-Naggar', 'Osman',
        'Abdel-Aziz', 'El-Din', 'Shehata', 'Badawi', 'Fahmy', 'Moussa',
        'Barakat', 'Samir', 'Zaki', 'El-Ghandour', 'Helmy', 'Tawfik',
        'Ragab', 'Abdel-Fattah', 'Hamdy', 'Fouad', 'Ismail', 'Youssef',
        'Darwish', 'El-Sharkawy',
    ];

    /** @var string[] */
    protected static array $titleMale = ['Mr.', 'Dr.', 'Prof.', 'Eng.', 'Ustaz'];

    /** @var string[] */
    protected static array $titleFemale = ['Mrs.', 'Ms.', 'Dr.', 'Prof.', 'Ustaza'];

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
