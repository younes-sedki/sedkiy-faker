<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ro;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'București', 'Cluj-Napoca', 'Timișoara', 'Iași', 'Constanța', 'Craiova',
        'Brașov', 'Galați', 'Ploiești', 'Oradea', 'Brăila', 'Arad', 'Bacău',
        'Pitești', 'Sibiu', 'Târgu Mureș', 'Baia Mare', 'Buzău', 'Satu Mare',
        'Râmnicu Vâlcea', 'Drobeta-Turnu Severin', 'Suceava', 'Piatra Neamț',
        'Deva', 'Reșița', 'Focșani', 'Alba Iulia', 'Tulcea', 'Slatina', 'Giurgiu',
        'Zalău', 'Sfântu Gheorghe', 'Botoșani', 'Vaslui', 'Călărași',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['Str.', 'Blvd.', 'Aleea', 'Piața', 'Calea', 'Intr.'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Alba', 'Arad', 'Argeș', 'Bacău', 'Bihor', 'Bistrița-Năsăud',
        'Botoșani', 'Brăila', 'Brașov', 'București', 'Buzău', 'Călărași',
        'Caraș-Severin', 'Cluj', 'Constanța', 'Covasna', 'Dâmbovița', 'Dolj',
        'Galați', 'Giurgiu', 'Gorj', 'Harghita', 'Hunedoara', 'Ialomița',
        'Iași', 'Ilfov', 'Maramureș', 'Mehedinți', 'Mureș', 'Neamț', 'Olt',
        'Prahova', 'Sălaj', 'Satu Mare', 'Sibiu', 'Suceava', 'Teleorman',
        'Timiș', 'Tulcea', 'Vâlcea', 'Vaslui', 'Vrancea',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['######'];
    /** @var string[] */
    protected static array $streetNames = [
        'Eminescu', 'Unirii', 'Victoriei', 'Republicii', 'Nicolae Bălcescu',
        'Independenței', 'Ștefan cel Mare', 'Avram Iancu', 'Decebal', 'Traian',
        'Libertății', '1 Mai',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetPrefix}} {{streetName}} nr. {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'România';

    /** @return string */
    public function city(): string { return static::randomElement(static::$city); }
    /** @return string */
    public function streetAddress(): string { return $this->streetPrefix() . ' ' . $this->streetName() . ' nr. ' . $this->buildingNumber() . ', ' . $this->postCode() . ' ' . $this->city(); }
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
    public function latitude(): float { return static::randomFloat(6, 43.6, 48.2); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 20.2, 29.7); }
}
