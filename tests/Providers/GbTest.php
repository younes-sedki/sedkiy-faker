<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class GbTest extends TestCase
{
    public function test_uk_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('en_GB')->make();
        $this->assertNotEmpty($faker->name());
    }

    public function test_uk_postcode_format(): void
    {
        $faker = SedkiyFaker::locale('en_GB')->make();
        $postcode = $faker->postCode();
        // Simple regex for UK postcode
        $this->assertMatchesRegularExpression('/^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z]{2}$/', $postcode);
    }
}
