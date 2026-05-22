<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Es;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza', 'Málaga',
        'Murcia', 'Palma', 'Las Palmas', 'Bilbao', 'Alicante', 'Córdoba',
        'Valladolid', 'Vigo', 'Gijón', "L'Hospitalet", 'La Coruña', 'Granada',
        'Vitoria', 'Elche', 'Oviedo', 'Badalona', 'Cartagena', 'Terrassa',
        'Jerez', 'Sabadell', 'Santa Cruz', 'Pamplona', 'Almería', 'Leganés',
        'San Sebastián', 'Santander', 'Burgos', 'Albacete', 'Castellón',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['Calle', 'Avenida', 'Plaza', 'Paseo', 'Carrer', 'Camino', 'Ronda', 'Travesía'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Andalucía', 'Aragón', 'Asturias', 'Baleares', 'Canarias', 'Cantabria',
        'Castilla-La Mancha', 'Castilla y León', 'Cataluña', 'Extremadura',
        'Galicia', 'La Rioja', 'Madrid', 'Murcia', 'Navarra', 'País Vasco', 'Valencia',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Mayor', 'Gran Vía', 'Alcalá', 'Serrano', 'Castellana', 'Real',
        'de la Constitución', 'del Sol', 'de España', 'de la Libertad',
        'San Fernando', 'del Carmen',
    ];
    /** @var string[] */
    protected static array $addressFormats = [
        '{{streetPrefix}} {{streetName}} {{buildingNumber}}, {{postCode}} {{city}}',
    ];
    protected static string $country = 'España';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetPrefix() . ' ' . $this->streetName() . ' ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
    /** @return string */
    public function streetName(): string { return static::randomElement(static::$streetNames); }
    /** @return string */
    public function streetPrefix(): string { return static::randomElement(static::$streetPrefix); }
    /** @return string */
    public function buildingNumber(): string { return (string) static::numberBetween(1, 200); }
    /** @return string */
    public function postCode(): string { return static::numerify(static::randomElement(static::$postCodeFormat)); }
    /** @return string */
    public function state(): string { return static::randomElement(static::$state); }
    /** @return string */
    public function country(): string { return static::$country; }
    /** @return string */
    public function address(): string { return $this->generator->parse(static::randomElement(static::$addressFormats)); }
    /** @return float */
    public function latitude(): float { return static::randomFloat(6, 36.0, 43.8); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, -9.3, 4.3); }
}
