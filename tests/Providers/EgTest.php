<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class EgTest extends TestCase
{
    public function test_egypt_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('ar_EG')->make();
        $this->assertNotEmpty($faker->name());
    }

    public function test_egypt_city_is_string(): void
    {
        $faker = SedkiyFaker::locale('ar_EG')->make();
        $this->assertIsString($faker->city());
    }

    public function test_egypt_phone_is_valid(): void
    {
        $faker = SedkiyFaker::locale('ar_EG')->make();
        $this->assertIsString($faker->phoneNumber());
        $this->assertIsString($faker->mobileNumber());
    }
}
