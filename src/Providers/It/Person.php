<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\It;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Marco', 'Luca', 'Andrea', 'Matteo', 'Giovanni', 'Roberto', 'Antonio',
        'Paolo', 'Stefano', 'Alberto', 'Riccardo', 'Davide', 'Alessandro',
        'Francesco', 'Simone', 'Emanuele', 'Daniele', 'Lorenzo', 'Nicola',
        'Giuseppe', 'Claudio', 'Fabio', 'Massimo', 'Federico', 'Filippo',
        'Giorgio', 'Michele', 'Pietro', 'Salvatore', 'Enrico', 'Leonardo',
        'Giacomo', 'Tommaso', 'Gabriele', 'Edoardo',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Maria', 'Giulia', 'Anna', 'Francesca', 'Sara', 'Chiara', 'Valentina',
        'Laura', 'Marta', 'Elena', 'Federica', 'Silvia', 'Claudia', 'Paola',
        'Roberta', 'Elisa', 'Serena', 'Cristina', 'Alessandra', 'Martina',
        'Simona', 'Ilaria', 'Michela', 'Giada', 'Beatrice', 'Erica', 'Monica',
        'Isabella', 'Giovanna', 'Luisa', 'Sofia', 'Aurora', 'Arianna',
        'Alice', 'Camilla',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'Rossi', 'Ferrari', 'Russo', 'Bianchi', 'Esposito', 'Romano', 'Greco',
        'Ricci', 'Marino', 'Bruno', 'Gallo', 'Conti', 'De Luca', 'Mancini',
        'Costa', 'Giordano', 'Rizzo', 'Lombardi', 'Moretti', 'Barbieri',
        'Fontana', 'Santoro', 'Mariani', 'Rinaldi', 'Caruso', 'Ferrara',
        'Galli', 'Martini', 'Leone', 'Longo', 'Marchetti', 'Vitale',
        'Serra', 'Coppola', 'De Angelis', 'D\'Amico', 'Pellegrini',
        'Farina', 'Villa', 'Colombo',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Sig.', 'Dott.', 'Prof.', 'Ing.', 'Avv.'];
    /** @var string[] */
    protected static array $titleFemale = ['Sig.ra', 'Sig.na', 'Dott.ssa', 'Prof.ssa'];
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
    public function firstName(?string $gender = null): string { if ($gender === 'male') { return $this->firstNameMale(); } if ($gender === 'female') { return $this->firstNameFemale(); } return static::randomElement(array_merge(static::$firstNameMale, static::$firstNameFemale)); }
    /** @return string */
    public function lastName(): string { return static::randomElement(static::$lastName); }
    /** @return string */
    public function titleMale(): string { return static::randomElement(static::$titleMale); }
    /** @return string */
    public function titleFemale(): string { return static::randomElement(static::$titleFemale); }
}
