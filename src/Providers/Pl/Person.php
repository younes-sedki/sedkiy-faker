<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pl;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Jakub', 'Piotr', 'Michał', 'Kamil', 'Marcin', 'Łukasz', 'Tomasz',
        'Bartosz', 'Paweł', 'Maciej', 'Grzegorz', 'Radosław', 'Krzysztof',
        'Marek', 'Dawid', 'Mateusz', 'Szymon', 'Karol', 'Wojciech', 'Rafał',
        'Andrzej', 'Adam', 'Arkadiusz', 'Dariusz', 'Sebastian', 'Dominik',
        'Filip', 'Hubert', 'Jan', 'Stanisław', 'Kacper', 'Igor', 'Mikołaj',
        'Antoni', 'Oliwier',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Anna', 'Katarzyna', 'Monika', 'Barbara', 'Magdalena', 'Agnieszka',
        'Małgorzata', 'Marta', 'Natalia', 'Karolina', 'Zofia', 'Aleksandra',
        'Julia', 'Paulina', 'Weronika', 'Kamila', 'Joanna', 'Ewelina',
        'Dominika', 'Martyna', 'Zuzanna', 'Maria', 'Ewa', 'Patrycja',
        'Klaudia', 'Kinga', 'Sandra', 'Adrianna', 'Justyna', 'Sylwia',
        'Maja', 'Alicja', 'Lena', 'Oliwia', 'Amelia',
    ];
    /** @var string[] */
    protected static array $lastNameMale = [
        'Nowak', 'Kowalski', 'Wiśniewski', 'Wójcik', 'Kowalczyk', 'Kamiński',
        'Lewandowski', 'Zieliński', 'Szymański', 'Woźniak', 'Dąbrowski',
        'Kozłowski', 'Jankowski', 'Mazur', 'Wojciechowski', 'Kwiatkowski',
        'Krawczyk', 'Kaczmarek', 'Piotrowski', 'Grabowski', 'Nowakowski',
        'Pawłowski', 'Michalski', 'Nowicki', 'Adamczyk', 'Dudek', 'Wieczorek',
        'Jabłoński', 'Olejniczak', 'Mazurek', 'Zając', 'Król', 'Górski',
        'Maciejewski', 'Stępień',
    ];
    /** @var string[] */
    protected static array $lastNameFemale = [
        'Nowak', 'Kowalska', 'Wiśniewska', 'Wójcik', 'Kowalczyk', 'Kamińska',
        'Lewandowska', 'Zielińska', 'Szymańska', 'Woźniak', 'Dąbrowska',
        'Kozłowska', 'Jankowska', 'Mazur', 'Wojciechowska', 'Kwiatkowska',
        'Krawczyk', 'Kaczmarek', 'Piotrowska', 'Grabowska', 'Nowakowska',
        'Pawłowska', 'Michalska', 'Nowicka', 'Adamczyk', 'Dudek', 'Wieczorek',
        'Jabłońska', 'Olejniczak', 'Mazurek', 'Zając', 'Król', 'Górska',
        'Maciejewska', 'Stępień',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Pan', 'Dr', 'Prof.', 'Inż.'];
    /** @var string[] */
    protected static array $titleFemale = ['Pani', 'Dr', 'Prof.', 'Inż.'];
    /** @var string[] */
    protected static array $nameFormats = [
        '{{titleMale}} {{firstNameMale}} {{lastNameMale}}', '{{firstNameMale}} {{lastNameMale}}',
        '{{firstNameFemale}} {{lastNameFemale}}', '{{titleFemale}} {{firstNameFemale}} {{lastNameFemale}}',
    ];

    /** @return string */
    public function name(?string $gender = null): string { if ($gender === 'male') { $format = static::randomElement(['{{titleMale}} {{firstNameMale}} {{lastNameMale}}', '{{firstNameMale}} {{lastNameMale}}']); } elseif ($gender === 'female') { $format = static::randomElement(['{{titleFemale}} {{firstNameFemale}} {{lastNameFemale}}', '{{firstNameFemale}} {{lastNameFemale}}']); } else { $format = static::randomElement(static::$nameFormats); } return $this->generator->parse($format); }
    /** @return string */
    public function firstNameMale(): string { return static::randomElement(static::$firstNameMale); }
    /** @return string */
    public function firstNameFemale(): string { return static::randomElement(static::$firstNameFemale); }
    /** @return string */
    public function firstName(?string $gender = null): string { if ($gender === 'male') { return $this->firstNameMale(); } if ($gender === 'female') { return $this->firstNameFemale(); } return static::randomElement(array_merge(static::$firstNameMale, static::$firstNameFemale)); }
    /** @return string */
    public function lastName(?string $gender = null): string { if ($gender === 'male') { return static::randomElement(static::$lastNameMale); } if ($gender === 'female') { return static::randomElement(static::$lastNameFemale); } return static::randomElement(array_merge(static::$lastNameMale, static::$lastNameFemale)); }
    /** @return string */
    public function titleMale(): string { return static::randomElement(static::$titleMale); }
    /** @return string */
    public function titleFemale(): string { return static::randomElement(static::$titleFemale); }
}
