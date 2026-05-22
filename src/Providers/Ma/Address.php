<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ma;

use Faker\Provider\Base;

/**
 * Moroccan address provider with authentic cities, regions, and street formats.
 */
class Address extends Base
{
    /** @var string[] */
    protected static array $city = [
        'Casablanca', 'Rabat', 'Fès', 'Marrakech', 'Agadir', 'Tanger',
        'Meknès', 'Oujda', 'Tétouan', 'Safi', 'El Jadida', 'Kénitra',
        'Nador', 'Beni Mellal', 'Errachidia', 'Laayoune', 'Dakhla',
        'Al Hoceima', 'Berkane', 'Guelmim', 'Taroudannt', 'Tiznit',
        'Ifrane', 'Azilal', 'Midelt', 'Ouarzazate', 'Khémisset', 'Settat',
        'Khénifra', 'Larache', 'Mohammedia', 'Salé', 'Temara', 'Taza',
        'Khouribga', 'Berrechid', 'Sidi Kacem', 'Taourirt', 'Chefchaouen',
        'Essaouira',
    ];

    /** @var string[] */
    protected static array $streetPrefix = [
        'Rue', 'Avenue', 'Boulevard', 'Derb', 'Hay', 'Quartier',
        'Lotissement', 'Résidence', 'Impasse', 'Passage',
    ];

    /** @var string[] */
    protected static array $streetSuffix = [];

    /** @var string[] */
    protected static array $state = [
        'Casablanca-Settat', 'Rabat-Salé-Kénitra', 'Fès-Meknès',
        'Marrakech-Safi', 'Souss-Massa', 'Tanger-Tétouan-Al Hoceima',
        'Oriental', 'Béni Mellal-Khénifra', 'Drâa-Tafilalet',
        'Guelmim-Oued Noun', 'Laâyoune-Sakia El Hamra',
        'Dakhla-Oued Ed-Dahab',
    ];

    /** @var string[] */
    protected static array $postCodeFormat = ['#####'];

    /** @var string[] */
    protected static array $streetNames = [
        'Mohammed V', 'Hassan II', 'Allal Ben Abdellah', 'Mohammed VI',
        'des FAR', 'Abdelkrim El Khattabi', 'Ibn Toumert', 'Zerktouni',
        'Moulay Youssef', 'Ghandi', 'de la Résistance', 'Oqba Ibn Nafii',
        'Tarik Ibn Ziad', 'Al Massira', 'Anfa', 'de Fès', 'de Marrakech',
        'Bir Anzarane', 'Moulay Ismail', 'Al Adarissa',
    ];

    /** @var string[] */
    protected static array $addressFormats = [
        '{{buildingNumber}}, {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{buildingNumber}} {{streetPrefix}} {{streetName}}, {{city}} {{postCode}}',
        '{{streetPrefix}} {{streetName}}, {{city}}',
    ];

    /** @var string */
    protected static string $country = 'Maroc';

    /**
     * Returns a random Moroccan city.
     *
     * @return string
     */
    public function city(): string
    {
        return static::randomElement(static::$city);
    }

    /**
     * Returns a full street address.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return $this->buildingNumber() . ', ' . $this->streetPrefix() . ' ' . $this->streetName() . ', ' . $this->city() . ' ' . $this->postCode();
    }

    /**
     * Returns a random street name.
     *
     * @return string
     */
    public function streetName(): string
    {
        return static::randomElement(static::$streetNames);
    }

    /**
     * Returns a random street prefix.
     *
     * @return string
     */
    public function streetPrefix(): string
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * Returns a random building number.
     *
     * @return string
     */
    public function buildingNumber(): string
    {
        return (string) static::numberBetween(1, 999);
    }

    /**
     * Returns a Moroccan postal code (5 digits).
     *
     * @return string
     */
    public function postCode(): string
    {
        return static::numerify(static::randomElement(static::$postCodeFormat));
    }

    /**
     * Returns a random Moroccan region.
     *
     * @return string
     */
    public function state(): string
    {
        return static::randomElement(static::$state);
    }

    /**
     * Returns the country name.
     *
     * @return string
     */
    public function country(): string
    {
        return static::$country;
    }

    /**
     * Returns a full formatted address.
     *
     * @return string
     */
    public function address(): string
    {
        $format = static::randomElement(static::$addressFormats);

        return $this->generator->parse($format);
    }

    /**
     * Returns a random latitude within Morocco's bounding box.
     *
     * @return float
     */
    public function latitude(): float
    {
        return static::randomFloat(6, 27.6, 35.9);
    }

    /**
     * Returns a random longitude within Morocco's bounding box.
     *
     * @return float
     */
    public function longitude(): float
    {
        return static::randomFloat(6, -13.2, -1.0);
    }
}
