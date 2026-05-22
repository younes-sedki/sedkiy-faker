<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pl;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Warszawa', 'Kraków', 'Łódź', 'Wrocław', 'Poznań', 'Gdańsk', 'Szczecin',
        'Bydgoszcz', 'Lublin', 'Katowice', 'Białystok', 'Gdynia', 'Częstochowa',
        'Radom', 'Sosnowiec', 'Toruń', 'Kielce', 'Gliwice', 'Zabrze', 'Bytom',
        'Bielsko-Biała', 'Olsztyn', 'Rzeszów', 'Ruda Śląska', 'Rybnik', 'Tychy',
        'Dąbrowa Górnicza', 'Opole', 'Elbląg', 'Płock', 'Gorzów Wielkopolski',
        'Wałbrzych', 'Włocławek', 'Tarnów', 'Chorzów',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['ul.', 'al.', 'pl.'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Dolnośląskie', 'Kujawsko-Pomorskie', 'Lubelskie', 'Lubuskie', 'Łódzkie',
        'Małopolskie', 'Mazowieckie', 'Opolskie', 'Podkarpackie', 'Podlaskie',
        'Pomorskie', 'Śląskie', 'Świętokrzyskie', 'Warmińsko-Mazurskie',
        'Wielkopolskie', 'Zachodniopomorskie',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['##-###'];
    /** @var string[] */
    protected static array $streetNames = [
        'Polna', 'Leśna', 'Słoneczna', 'Krótka', 'Szkolna', 'Ogrodowa',
        'Lipowa', 'Brzozowa', 'Łąkowa', 'Kwiatowa', 'Dworcowa', 'Kościuszki',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetPrefix}} {{streetName}} {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'Polska';

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
    public function latitude(): float { return static::randomFloat(6, 49.0, 54.8); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 14.1, 24.1); }
}
