<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Fr;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Pierre', 'Jean', 'Michel', 'Philippe', 'Alain', 'Nicolas', 'David',
        'Thomas', 'Laurent', 'Julien', 'Christophe', 'Sébastien', 'Antoine',
        'Maxime', 'Clément', 'Guillaume', 'Alexandre', 'Romain', 'François',
        'Éric', 'Stéphane', 'Jérôme', 'Vincent', 'Benoît', 'Damien',
        'Cédric', 'Mathieu', 'Olivier', 'Patrick', 'Thierry',
        'Raphaël', 'Hugo', 'Louis', 'Léo', 'Gabriel',
    ];

    /** @var string[] */
    protected static array $firstNameFemale = [
        'Marie', 'Isabelle', 'Nathalie', 'Véronique', 'Sandrine', 'Sophie',
        'Julie', 'Céline', 'Aurélie', 'Camille', 'Laure', 'Élise', 'Charlotte',
        'Lucie', 'Pauline', 'Marion', 'Alice', 'Inès', 'Manon', 'Léa',
        'Émilie', 'Claire', 'Anne', 'Christine', 'Catherine', 'Hélène',
        'Virginie', 'Corinne', 'Valérie', 'Sylvie', 'Chloé', 'Emma',
        'Jade', 'Louise', 'Ambre',
    ];

    /** @var string[] */
    protected static array $lastName = [
        'Martin', 'Bernard', 'Robert', 'Richard', 'Dupont', 'Moreau', 'Simon',
        'Laurent', 'Michel', 'Lefèvre', 'Leroy', 'Roux', 'David', 'Bertrand',
        'Morel', 'Fournier', 'Girard', 'Bonnet', 'Durand', 'Fontaine',
        'Thomas', 'Henry', 'Rousseau', 'Blanc', 'Garnier', 'Chevalier',
        'Lambert', 'Faure', 'Legrand', 'Barbier', 'Mercier', 'Picard',
        'Robin', 'Perrin', 'Lemaire', 'Marchand', 'Dubois', 'Petit',
        'Garcia', 'Boyer',
    ];

    /** @var string[] */
    protected static array $titleMale = ['M.', 'Dr', 'Prof.', 'Me'];
    /** @var string[] */
    protected static array $titleFemale = ['Mme', 'Mlle', 'Dr', 'Prof.', 'Me'];
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
