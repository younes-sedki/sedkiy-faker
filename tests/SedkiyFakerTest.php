<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;
use Sedkiy\Faker\SedkiyFakerServiceProvider;

class SedkiyFakerTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SedkiyFakerServiceProvider::class,
        ];
    }

    public function test_supported_locales_returns_19_items(): void
    {
        $locales = SedkiyFaker::supportedLocales();
        $this->assertCount(19, $locales);
        $this->assertContains('ar_MA', $locales);
        $this->assertContains('en_US', $locales);
    }

    public function test_locale_throws_on_unknown_locale(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Locale [xx_XX] not supported.');
        
        SedkiyFaker::locale('xx_XX');
    }

    public function test_seeded_generator_is_reproducible(): void
    {
        $faker1 = SedkiyFaker::locale('de_DE')->seed(1337)->make();
        $name1 = $faker1->name();
        $city1 = $faker1->city();

        $faker2 = SedkiyFaker::locale('de_DE')->seed(1337)->make();
        $name2 = $faker2->name();
        $city2 = $faker2->city();

        $this->assertSame($name1, $name2);
        $this->assertSame($city1, $city2);
    }

    public function test_all_locales_can_be_instantiated_without_error(): void
    {
        foreach (SedkiyFaker::supportedLocales() as $locale) {
            $faker = SedkiyFaker::locale($locale)->make();
            $this->assertIsString($faker->name());
            $this->assertIsString($faker->city());
            $this->assertIsString($faker->phoneNumber());
        }
    }

    public function test_factory_is_fluent_chainable(): void
    {
        $faker = SedkiyFaker::locale('fr_FR')
            ->seed(42)
            ->withProvider(\Faker\Provider\fr_FR\Text::class)
            ->make();

        $this->assertInstanceOf(\Faker\Generator::class, $faker);
        $this->assertIsString($faker->realText());
    }
}
