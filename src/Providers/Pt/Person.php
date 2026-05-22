<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pt;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'João', 'José', 'António', 'Francisco', 'Manuel', 'Pedro', 'Luís',
        'Carlos', 'Ricardo', 'Paulo', 'Marco', 'Rui', 'Nuno', 'Filipe',
        'Hugo', 'Tiago', 'André', 'Bruno', 'Miguel', 'Diogo', 'Rodrigo',
        'Rafael', 'Gonçalo', 'Henrique', 'Alexandre', 'Sérgio', 'Daniel',
        'Vasco', 'Álvaro', 'Duarte', 'Tomás', 'Bernardo', 'Gustavo',
        'Martim', 'Salvador',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'Maria', 'Ana', 'Isabel', 'Carla', 'Inês', 'Marta', 'Sónia', 'Sara',
        'Cátia', 'Joana', 'Filipa', 'Rita', 'Sandra', 'Patrícia', 'Catarina',
        'Alexandra', 'Susana', 'Margarida', 'Beatriz', 'Verónica', 'Sofia',
        'Raquel', 'Lúcia', 'Mónica', 'Paula', 'Teresa', 'Cristina', 'Vanessa',
        'Cláudia', 'Liliana', 'Leonor', 'Matilde', 'Carolina', 'Alice',
        'Francisca',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'Silva', 'Santos', 'Ferreira', 'Pereira', 'Oliveira', 'Costa',
        'Rodrigues', 'Martins', 'Jesus', 'Sousa', 'Fernandes', 'Gonçalves',
        'Gomes', 'Lopes', 'Marques', 'Alves', 'Almeida', 'Ribeiro', 'Pinto',
        'Carvalho', 'Teixeira', 'Moreira', 'Correia', 'Nunes', 'Mendes',
        'Cardoso', 'Melo', 'Rocha', 'Cunha', 'Pires', 'Monteiro', 'Vieira',
        'Coelho', 'Cruz', 'Ramos', 'Freitas', 'Barros', 'Matos', 'Fonseca',
        'Machado',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Sr.', 'Dr.', 'Prof.', 'Eng.'];
    /** @var string[] */
    protected static array $titleFemale = ['Sra.', 'Dra.', 'Prof.', 'Eng.'];
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
