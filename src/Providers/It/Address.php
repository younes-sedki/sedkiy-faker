<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\It;

use Faker\Provider\Base;

class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Roma', 'Milano', 'Napoli', 'Torino', 'Palermo', 'Genova', 'Bologna',
        'Firenze', 'Bari', 'Catania', 'Venezia', 'Verona', 'Messina', 'Padova',
        'Trieste', 'Taranto', 'Brescia', 'Parma', 'Prato', 'Modena',
        'Reggio Calabria', 'Reggio Emilia', 'Perugia', 'Livorno', 'Ravenna',
        'Cagliari', 'Foggia', 'Rimini', 'Salerno', 'Ferrara', 'Sassari',
        'Siracusa', 'Pescara', 'Monza', 'Bergamo',
    ];
    /** @var string[] */
    protected static array $streetPrefix = ['Via', 'Viale', 'Piazza', 'Corso', 'Largo', 'Vicolo', 'Piazzale', 'Strada'];
    /** @var string[] */
    protected static array $streetSuffix = [];
    /** @var string[] */
    protected static array $state = [
        'Abruzzo', 'Basilicata', 'Calabria', 'Campania', 'Emilia-Romagna',
        'Friuli Venezia Giulia', 'Lazio', 'Liguria', 'Lombardia', 'Marche',
        'Molise', 'Piemonte', 'Puglia', 'Sardegna', 'Sicilia', 'Toscana',
        'Trentino-Alto Adige', 'Umbria', "Valle d'Aosta", 'Veneto',
    ];
    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];
    /** @var string[] */
    protected static array $streetNames = [
        'Roma', 'Garibaldi', 'Dante', 'Mazzini', 'Cavour', 'Verdi',
        'della Repubblica', 'Vittorio Emanuele', 'XX Settembre', 'della Libertà',
        'Nazionale', 'del Corso',
    ];
    /** @var string[] */
    protected static array $addressFormats = ['{{streetPrefix}} {{streetName}} {{buildingNumber}}, {{postCode}} {{city}}'];
    protected static string $country = 'Italia';

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
    public function latitude(): float { return static::randomFloat(6, 36.6, 47.1); }
    /** @return float */
    public function longitude(): float { return static::randomFloat(6, 6.6, 18.5); }
}
