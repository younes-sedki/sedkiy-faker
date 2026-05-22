<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pt;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Lisboa', 'Porto', 'Amadora', 'Braga', 'Setúbal', 'Coimbra', 'Funchal',
        'Almada', 'Aveiro', 'Viseu', 'Guimarães', 'Évora', 'Leiria', 'Faro',
        'Barreiro', 'Cascais', 'Oeiras', 'Loures', 'Sintra', 'Vila Nova de Gaia',
        'Gondomar', 'Matosinhos', 'Odivelas', 'Seixal', 'Portimão', 'Barcelos',
        'Viana do Castelo', 'Santarém', 'Beja', 'Castelo Branco', 'Tomar',
        'Chaves', 'Guarda', 'Torres Vedras', 'Caldas da Rainha',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['Rua', 'Avenida', 'Praça', 'Largo', 'Travessa', 'Beco', 'Estrada', 'Calçada'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Aveiro', 'Beja', 'Braga', 'Bragança', 'Castelo Branco', 'Coimbra',
        'Évora', 'Faro', 'Guarda', 'Leiria', 'Lisboa', 'Portalegre', 'Porto',
        'Santarém', 'Setúbal', 'Viana do Castelo', 'Vila Real', 'Viseu',
        'Madeira', 'Açores',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['####-###'];
    /** @var string[] */
    protected static array $streetNames = [
        'da Liberdade', 'Augusta', 'do Comércio', 'da República', 'de Portugal',
        'dos Lusíadas', 'Camões', 'Garrett', 'do Infante', 'da Boavista',
        'de Santa Catarina', 'dos Clérigos',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetPrefix}} {{streetName}} {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'Portugal';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetPrefix() . ' ' . $this->streetName() . ' ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetPrefix(): string { return static::randomElement(static::$streetPrefix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 500); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 36.9, 42.2); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -9.5, -6.2); }
}
