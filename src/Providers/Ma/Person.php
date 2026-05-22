<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ma;

use Faker\Provider\Base;

/**
 * Moroccan person name provider with authentic Arabic/Amazigh names.
 */
class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Mohammed', 'Ahmed', 'Youssef', 'Hassan', 'Rachid', 'Karim',
        'Omar', 'Khalid', 'Saad', 'Tarik', 'Hamza', 'Anas', 'Soufiane',
        'Nabil', 'Ayoub', 'Mehdi', 'Bilal', 'Zakaria', 'Amine', 'Othmane',
        'Reda', 'Adil', 'Mourad', 'Hicham', 'Imrane', 'Marouane',
        'Abdelaziz', 'Abdelkarim', 'Abdellah', 'Nassim', 'Badr', 'Ismail',
        'Driss', 'Mustapha', 'Aziz', 'Abderrahim', 'Fouad', 'Taha',
        'Ilyas', 'Walid',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Fatima', 'Aisha', 'Khadija', 'Nadia', 'Laila', 'Houda',
        'Meryem', 'Salma', 'Zineb', 'Sanaa', 'Hajar', 'Imane', 'Siham',
        'Loubna', 'Amina', 'Hanane', 'Najat', 'Hafsa', 'Sara', 'Doha',
        'Ghita', 'Oumaima', 'Chaima', 'Nora', 'Widad', 'Soumaya',
        'Mouna', 'Yasmina', 'Kaoutar', 'Rhita', 'Ikram', 'Asmae',
        'Bouchra', 'Latifa', 'Samira', 'Nawal', 'Rajaa', 'Fatiha',
        'Meriem', 'Rim',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Benali', 'El Mansouri', 'Alaoui', 'Fassi', 'Chraibi', 'Benkirane',
        'El Amrani', 'Tazi', 'Kettani', 'Bennani', 'Berrada', 'Lahlou',
        'Sebti', 'Filali', 'Hamdouchi', 'Ouazzani', 'Ziani', 'Bousfiha',
        'El Khalfi', 'Bensouda', 'Cherradi', 'Bouazza', 'Belkadi', 'Mrani',
        'Cherkaoui', 'Bennis', 'El Ghazouani', 'Akchour', 'Bakkali', 'Taleb',
        'Idrissi', 'El Ouafi', 'Senhaji', 'Benhima', 'Mekouar', 'El Harti',
        'Boutaleb', 'Jaidi', 'Sqalli', 'El Moutawakkil',
    ];

    /** @var string[] */
    protected static array $titleMale = ['M.', 'Dr', 'Prof.', 'Si'];

    /** @var string[] */
    protected static array $titleFemale = ['Mme', 'Mlle', 'Dr', 'Prof.', 'Lalla'];

    /** @var string[] */
    protected static array $nameFormats = [
        '{{titleMale}} {{firstNameMale}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
    ];

    /**
     * Returns a random full name respecting gender formats.
     *
     * @param string|null $gender 'male', 'female', or null for random
     * @return string
     */
    public function name(?string $gender = null): string
    {
        if ($gender === 'male') {
            $format = static::randomElement([
                '{{titleMale}} {{firstNameMale}} {{lastName}}',
                '{{firstNameMale}} {{lastName}}',
            ]);
        } elseif ($gender === 'female') {
            $format = static::randomElement([
                '{{titleFemale}} {{firstNameFemale}} {{lastName}}',
                '{{firstNameFemale}} {{lastName}}',
            ]);
        } else {
            $format = static::randomElement(static::$nameFormats);
        }

        return $this->generator->parse($format);
    }

    /**
     * Returns a male first name.
     *
     * @return string
     */
    public function firstNameMale(): string
    {
        return static::randomElement(static::$firstNameMale);
    }

    /**
     * Returns a female first name.
     *
     * @return string
     */
    public function firstNameFemale(): string
    {
        return static::randomElement(static::$firstNameFemale);
    }

    /**
     * Returns a first name, optionally filtered by gender.
     *
     * @param string|null $gender 'male', 'female', or null for random
     * @return string
     */
    public function firstName(?string $gender = null): string
    {
        if ($gender === 'male') {
            return $this->firstNameMale();
        }

        if ($gender === 'female') {
            return $this->firstNameFemale();
        }

        return static::randomElement(
            array_merge(static::$firstNameMale, static::$firstNameFemale)
        );
    }

    /**
     * Returns a last name.
     *
     * @return string
     */
    public function lastName(): string
    {
        return static::randomElement(static::$lastName);
    }

    /**
     * Returns a male honorific title.
     *
     * @return string
     */
    public function titleMale(): string
    {
        return static::randomElement(static::$titleMale);
    }

    /**
     * Returns a female honorific title.
     *
     * @return string
     */
    public function titleFemale(): string
    {
        return static::randomElement(static::$titleFemale);
    }
}
