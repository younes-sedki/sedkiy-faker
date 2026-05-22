<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class UsTest extends TestCase
{
    public function test_us_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('en_US')->make();
        $this->assertNotEmpty($faker->name());
    }

    public function test_us_phone_format(): void
    {
        $faker = SedkiyFaker::locale('en_US')->make();
        $phone = $faker->phoneNumber();
        $this->assertIsString($phone);
    }
}
