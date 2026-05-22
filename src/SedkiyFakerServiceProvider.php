<?php

declare(strict_types=1);

namespace Sedkiy\Faker;

use Illuminate\Support\ServiceProvider;
use Sedkiy\Faker\Providers\Ma;
use Sedkiy\Faker\Providers\Dz;
use Sedkiy\Faker\Providers\Tn;
use Sedkiy\Faker\Providers\Eg;
use Sedkiy\Faker\Providers\Ly;
use Sedkiy\Faker\Providers\Sa;
use Sedkiy\Faker\Providers\Lb;
use Sedkiy\Faker\Providers\Jo;
use Sedkiy\Faker\Providers\Fr;
use Sedkiy\Faker\Providers\De;
use Sedkiy\Faker\Providers\Es;
use Sedkiy\Faker\Providers\It;
use Sedkiy\Faker\Providers\Pt;
use Sedkiy\Faker\Providers\Gb;
use Sedkiy\Faker\Providers\Nl;
use Sedkiy\Faker\Providers\Be;
use Sedkiy\Faker\Providers\Pl;
use Sedkiy\Faker\Providers\Ro;
use Sedkiy\Faker\Providers\Us;

/**
 * Laravel Service Provider for SedkiyFaker.
 *
 * Auto-discovered via composer.json extra.laravel.providers.
 * Registers the SedkiyFaker singleton and binds locale-specific
 * providers to the default Faker generator.
 */
class SedkiyFakerServiceProvider extends ServiceProvider
{
    /**
     * Maps locale codes to their provider classes.
     *
     * @var array<string, list<class-string>>
     */
    public const LOCALE_PROVIDERS = [
        'ar_MA' => [Ma\Person::class, Ma\Address::class, Ma\PhoneNumber::class, Ma\Internet::class],
        'ar_DZ' => [Dz\Person::class, Dz\Address::class, Dz\PhoneNumber::class, Dz\Internet::class],
        'ar_TN' => [Tn\Person::class, Tn\Address::class, Tn\PhoneNumber::class, Tn\Internet::class],
        'ar_EG' => [Eg\Person::class, Eg\Address::class, Eg\PhoneNumber::class, Eg\Internet::class],
        'ar_LY' => [Ly\Person::class, Ly\Address::class, Ly\PhoneNumber::class, Ly\Internet::class],
        'ar_SA' => [Sa\Person::class, Sa\Address::class, Sa\PhoneNumber::class, Sa\Internet::class],
        'ar_LB' => [Lb\Person::class, Lb\Address::class, Lb\PhoneNumber::class, Lb\Internet::class],
        'ar_JO' => [Jo\Person::class, Jo\Address::class, Jo\PhoneNumber::class, Jo\Internet::class],
        'fr_FR' => [Fr\Person::class, Fr\Address::class, Fr\PhoneNumber::class],
        'de_DE' => [De\Person::class, De\Address::class, De\PhoneNumber::class],
        'es_ES' => [Es\Person::class, Es\Address::class, Es\PhoneNumber::class],
        'it_IT' => [It\Person::class, It\Address::class, It\PhoneNumber::class],
        'pt_PT' => [Pt\Person::class, Pt\Address::class, Pt\PhoneNumber::class],
        'en_GB' => [Gb\Person::class, Gb\Address::class, Gb\PhoneNumber::class],
        'nl_NL' => [Nl\Person::class, Nl\Address::class, Nl\PhoneNumber::class],
        'nl_BE' => [Be\Person::class, Be\Address::class, Be\PhoneNumber::class],
        'pl_PL' => [Pl\Person::class, Pl\Address::class, Pl\PhoneNumber::class],
        'ro_RO' => [Ro\Person::class, Ro\Address::class, Ro\PhoneNumber::class],
        'en_US' => [Us\Person::class, Us\Address::class, Us\PhoneNumber::class],
    ];

    /**
     * Register the SedkiyFaker singleton in the service container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sedkiy-faker.php', 'sedkiy-faker');

        $this->app->singleton(SedkiyFaker::class, function () {
            return SedkiyFaker::locale('en_US');
        });

        $this->app->alias(SedkiyFaker::class, 'sedkiy.faker');
    }

    /**
     * Boot the service provider — attach locale providers to the default Faker generator.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/sedkiy-faker.php' => config_path('sedkiy-faker.php'),
        ], 'sedkiy-faker-config');

        // Resolve the default locale
        $locale = config('sedkiy-faker.default_locale')
            ?? config('app.faker_locale')
            ?? 'en_US';

        // If this locale has providers, attach them to the default Faker generator
        if (isset(self::LOCALE_PROVIDERS[$locale]) && $this->app->bound(\Faker\Generator::class)) {
            $generator = $this->app->make(\Faker\Generator::class);

            foreach (self::LOCALE_PROVIDERS[$locale] as $providerClass) {
                $generator->addProvider(new $providerClass($generator));
            }
        }
    }
}
