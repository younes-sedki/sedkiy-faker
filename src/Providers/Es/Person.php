<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Es;

use Faker\Provider\Base;

class Person extends Base
{
    /** @var string[] */
    protected static array $firstNameMale = [
        'Antonio', 'Manuel', 'Francisco', 'Juan', 'José', 'Pedro', 'Miguel',
        'Álvaro', 'Carlos', 'David', 'Daniel', 'Pablo', 'Alejandro', 'Jorge',
        'Javier', 'Sergio', 'Fernando', 'Adrián', 'Iván', 'Roberto', 'Rafael',
        'Gonzalo', 'Enrique', 'Diego', 'Andrés', 'Alberto', 'Guillermo',
        'Rubén', 'Jaime', 'Ricardo', 'Marcos', 'Hugo', 'Ángel', 'Raúl', 'Víctor',
    ];
    /** @var string[] */
    protected static array $firstNameFemale = [
        'María', 'Carmen', 'Josefa', 'Isabel', 'Ana', 'Laura', 'Marta', 'Sara',
        'Cristina', 'Elena', 'Lucía', 'Pilar', 'Raquel', 'Patricia', 'Sonia',
        'Nuria', 'Beatriz', 'Alicia', 'Miriam', 'Natalia', 'Paula', 'Silvia',
        'Eva', 'Inés', 'Rosa', 'Lorena', 'Teresa', 'Sandra', 'Verónica',
        'Claudia', 'Sofía', 'Alba', 'Irene', 'Marina', 'Julia',
    ];
    /** @var string[] */
    protected static array $lastName = [
        'García', 'Martínez', 'López', 'González', 'Sánchez', 'Pérez',
        'Rodríguez', 'Fernández', 'Torres', 'Ramírez', 'Flores', 'Díaz',
        'Ruiz', 'Hernández', 'Jiménez', 'Moreno', 'Muñoz', 'Alonso',
        'Gutiérrez', 'Romero', 'Navarro', 'Ortega', 'Molina', 'Delgado',
        'Castro', 'Ortiz', 'Rubio', 'Ramos', 'Medina', 'Marín',
        'Iglesias', 'Santos', 'Castillo', 'Gil', 'Suárez', 'Vázquez',
        'Blanco', 'Domínguez', 'Herrero', 'Calvo',
    ];
    /** @var string[] */
    protected static array $titleMale = ['Sr.', 'Dr.', 'Prof.', 'D.'];
    /** @var string[] */
    protected static array $titleFemale = ['Sra.', 'Srta.', 'Dra.', 'Prof.', 'Dña.'];
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
