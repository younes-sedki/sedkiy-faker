<?php

declare(strict_types=1);

namespace Sedkiy\Faker;

use Faker\Factory;
use Faker\Generator;
use InvalidArgumentException;

/**
 * SedkiyFaker — Fluent factory for locale-specific Faker generators.
 *
 * Usage:
 *   $faker = SedkiyFaker::locale('ar_MA')->make();
 *   $faker = SedkiyFaker::locale('de_DE')->seed(42)->make();
 */
class SedkiyFaker
{
    /**
     * Map of supported locale codes to their base Faker locale and provider classes.
     *
     * @var array<string, array{base: string, providers: list<class-string>}>
     */
    private const LOCALE_MAP = [
        'ar_MA' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Ma\Person::class,
                Providers\Ma\Address::class,
                Providers\Ma\PhoneNumber::class,
                Providers\Ma\Internet::class,
            ],
        ],
        'ar_DZ' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Dz\Person::class,
                Providers\Dz\Address::class,
                Providers\Dz\PhoneNumber::class,
                Providers\Dz\Internet::class,
            ],
        ],
        'ar_TN' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Tn\Person::class,
                Providers\Tn\Address::class,
                Providers\Tn\PhoneNumber::class,
                Providers\Tn\Internet::class,
            ],
        ],
        'ar_EG' => [
            'base' => 'ar_EG',
            'providers' => [
                Providers\Eg\Person::class,
                Providers\Eg\Address::class,
                Providers\Eg\PhoneNumber::class,
                Providers\Eg\Internet::class,
            ],
        ],
        'ar_LY' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Ly\Person::class,
                Providers\Ly\Address::class,
                Providers\Ly\PhoneNumber::class,
                Providers\Ly\Internet::class,
            ],
        ],
        'ar_SA' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Sa\Person::class,
                Providers\Sa\Address::class,
                Providers\Sa\PhoneNumber::class,
                Providers\Sa\Internet::class,
            ],
        ],
        'ar_LB' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Lb\Person::class,
                Providers\Lb\Address::class,
                Providers\Lb\PhoneNumber::class,
                Providers\Lb\Internet::class,
            ],
        ],
        'ar_JO' => [
            'base' => 'ar_SA',
            'providers' => [
                Providers\Jo\Person::class,
                Providers\Jo\Address::class,
                Providers\Jo\PhoneNumber::class,
                Providers\Jo\Internet::class,
            ],
        ],
        'fr_FR' => [
            'base' => 'fr_FR',
            'providers' => [
                Providers\Fr\Person::class,
                Providers\Fr\Address::class,
                Providers\Fr\PhoneNumber::class,
            ],
        ],
        'de_DE' => [
            'base' => 'de_DE',
            'providers' => [
                Providers\De\Person::class,
                Providers\De\Address::class,
                Providers\De\PhoneNumber::class,
            ],
        ],
        'es_ES' => [
            'base' => 'es_ES',
            'providers' => [
                Providers\Es\Person::class,
                Providers\Es\Address::class,
                Providers\Es\PhoneNumber::class,
            ],
        ],
        'it_IT' => [
            'base' => 'it_IT',
            'providers' => [
                Providers\It\Person::class,
                Providers\It\Address::class,
                Providers\It\PhoneNumber::class,
            ],
        ],
        'pt_PT' => [
            'base' => 'pt_PT',
            'providers' => [
                Providers\Pt\Person::class,
                Providers\Pt\Address::class,
                Providers\Pt\PhoneNumber::class,
            ],
        ],
        'en_GB' => [
            'base' => 'en_GB',
            'providers' => [
                Providers\Gb\Person::class,
                Providers\Gb\Address::class,
                Providers\Gb\PhoneNumber::class,
            ],
        ],
        'nl_NL' => [
            'base' => 'nl_NL',
            'providers' => [
                Providers\Nl\Person::class,
                Providers\Nl\Address::class,
                Providers\Nl\PhoneNumber::class,
            ],
        ],
        'nl_BE' => [
            'base' => 'nl_BE',
            'providers' => [
                Providers\Be\Person::class,
                Providers\Be\Address::class,
                Providers\Be\PhoneNumber::class,
            ],
        ],
        'pl_PL' => [
            'base' => 'pl_PL',
            'providers' => [
                Providers\Pl\Person::class,
                Providers\Pl\Address::class,
                Providers\Pl\PhoneNumber::class,
            ],
        ],
        'ro_RO' => [
            'base' => 'ro_RO',
            'providers' => [
                Providers\Ro\Person::class,
                Providers\Ro\Address::class,
                Providers\Ro\PhoneNumber::class,
            ],
        ],
        'en_US' => [
            'base' => 'en_US',
            'providers' => [
                Providers\Us\Person::class,
                Providers\Us\Address::class,
                Providers\Us\PhoneNumber::class,
            ],
        ],
    ];

    /** @var string The locale code */
    private string $locale;

    /** @var int|null Optional seed for reproducibility */
    private ?int $seed = null;

    /** @var list<class-string> Extra provider classes to attach */
    private array $extraProviders = [];

    /**
     * @param string $locale A supported locale code (e.g. 'ar_MA')
     */
    private function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    /**
     * Create a new SedkiyFaker builder for the given locale.
     *
     * @param string $locale A supported locale code
     * @return static
     * @throws InvalidArgumentException If the locale is not supported
     */
    public static function locale(string $locale): static
    {
        if (!isset(self::LOCALE_MAP[$locale])) {
            $supported = implode(', ', array_keys(self::LOCALE_MAP));
            throw new InvalidArgumentException(
                "Locale [{$locale}] not supported. Supported: {$supported}"
            );
        }

        return new static($locale);
    }

    /**
     * Set a seed for reproducible fake data generation.
     *
     * @param int $seed The seed value
     * @return $this
     */
    public function seed(int $seed): static
    {
        $this->seed = $seed;

        return $this;
    }

    /**
     * Attach an extra custom provider class to the generator.
     *
     * @param class-string $providerClass Fully qualified class name of the provider
     * @return $this
     */
    public function withProvider(string $providerClass): static
    {
        $this->extraProviders[] = $providerClass;

        return $this;
    }

    /**
     * Build and return the configured Faker\Generator instance.
     *
     * @return Generator
     */
    public function make(): Generator
    {
        $config = self::LOCALE_MAP[$this->locale];
        $generator = Factory::create($config['base']);

        // Add locale-specific providers
        foreach ($config['providers'] as $providerClass) {
            $generator->addProvider(new $providerClass($generator));
        }

        // Add any extra custom providers
        foreach ($this->extraProviders as $providerClass) {
            $generator->addProvider(new $providerClass($generator));
        }

        // Apply seed if set
        if ($this->seed !== null) {
            $generator->seed($this->seed);
        }

        return $generator;
    }

    /**
     * Return the list of all supported locale codes.
     *
     * @return list<string>
     */
    public static function supportedLocales(): array
    {
        return array_keys(self::LOCALE_MAP);
    }
}
