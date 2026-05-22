<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class SaTest extends TestCase
{
    public function test_saudi_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('ar_SA')->make();
        $this->assertNotEmpty($faker->name());
    }

    public function test_saudi_city_is_string(): void
    {
        $faker = SedkiyFaker::locale('ar_SA')->make();
        $this->assertIsString($faker->city());
    }

    public function test_saudi_phone_is_valid(): void
    {
        $faker = SedkiyFaker::locale('ar_SA')->make();
        $this->assertIsString($faker->phoneNumber());
        $this->assertIsString($faker->mobileNumber());
    }
}
