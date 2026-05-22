<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class DeTest extends TestCase
{
    public function test_german_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('de_DE')->make();
        $this->assertNotEmpty($faker->name());
    }

    public function test_german_address_format(): void
    {
        $faker = SedkiyFaker::locale('de_DE')->make();
        $address = $faker->address();
        $this->assertIsString($address);
        // German addresses are usually "Street Number, Postcode City"
        $this->assertMatchesRegularExpression('/^.+ \d+, \d{5} .+$/', $address);
    }
}
