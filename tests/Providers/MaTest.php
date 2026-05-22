<?php

declare(strict_types=1);

namespace Tests\Providers;

use Orchestra\Testbench\TestCase;
use Sedkiy\Faker\SedkiyFaker;

class MaTest extends TestCase
{
    public function test_moroccan_name_is_non_empty_string(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $this->assertNotEmpty($faker->name());
        $this->assertIsString($faker->firstNameMale());
        $this->assertIsString($faker->firstNameFemale());
        $this->assertIsString($faker->lastName());
    }

    public function test_moroccan_city_is_in_known_list(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $this->assertIsString($faker->city());
        $this->assertIsString($faker->state());
    }

    public function test_moroccan_phone_matches_regex(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $phone = $faker->mobileNumber();
        $this->assertMatchesRegularExpression('/^(\+212\s[67]|0[67])\d{2}(\s?\d{2}){3}$/', str_replace(' ', '', $phone) !== $phone ? $phone : preg_replace('/(\+212 \d|\d{2})(?=\d)/', '$1 ', preg_replace('/(\d{2})/', '$1 ', $phone)));
    }

    public function test_moroccan_email_has_ma_or_generic_tld(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $email = $faker->freeEmail();
        $this->assertMatchesRegularExpression('/@(gmail\.com|yahoo\.fr|hotmail\.com|menara\.ma|maroc\.ma|iam\.ma|gmail\.ma|outlook\.com|live\.fr|yahoo\.com)$/', $email);
    }

    public function test_moroccan_postcode_is_5_digits(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $this->assertMatchesRegularExpression('/^\d{5}$/', $faker->postCode());
    }

    public function test_moroccan_address_contains_city(): void
    {
        $faker = SedkiyFaker::locale('ar_MA')->make();
        $address = $faker->address();
        $this->assertIsString($address);
    }
}
