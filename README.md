<div align="center">
  <img src=".github/images/banner.png" alt="Sedkiy Faker Banner" width="100%" style="border-radius: 12px; margin-bottom: 20px;">

  <h1>Sedkiy Faker</h1>

  <p>A <a href="https://fakerphp.org/">FakerPHP</a> extension for culturally accurate, hyper-localized test data generation across 19 countries.</p>

  <p>
    <a href="https://packagist.org/packages/sedkiy/faker"><img src="https://img.shields.io/packagist/v/sedkiy/faker.svg?style=flat-square" alt="Latest Version on Packagist"></a>
    <a href="https://packagist.org/packages/sedkiy/faker"><img src="https://img.shields.io/packagist/dt/sedkiy/faker.svg?style=flat-square" alt="Total Downloads"></a>
    <a href="LICENSE.md"><img src="https://img.shields.io/packagist/l/sedkiy/faker.svg?style=flat-square" alt="License"></a>
    <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php" alt="PHP">
    <img src="https://img.shields.io/badge/Laravel-10%20%7C%2011%20%7C%2012-FF2D20?style=flat-square&logo=laravel" alt="Laravel">
  </p>
</div>

---

## Overview

Default FakerPHP locale fallbacks produce structurally invalid phone numbers, non-existent city names, and culturally incoherent data. Sedkiy Faker replaces these with:

- Real, curated city and region names per country
- Phone numbers that conform to ITU-T numbering plans and local prefix configurations
- Culturally correct honorifics, gender-specific surname rules, and localized email domains
- Automatic Laravel integration via service provider auto-discovery — no manual binding required

## Requirements

- PHP 8.1 or higher
- Composer
- Laravel 10, 11, or 12 *(optional)*

## Installation

```bash
composer require sedkiy/faker --dev
```

## Usage

### Standalone

```php
use Sedkiy\Faker\SedkiyFaker;

$faker = SedkiyFaker::locale('ar_MA')->make();

$faker->name();         // "Mr. Youssef Alami"
$faker->city();         // "Casablanca"
$faker->phoneNumber();  // "+212 6 12 34 56 78"
$faker->postCode();     // "20000"
$faker->freeEmail();    // "youssef.alami@menara.ma"
```

**Seeding** for reproducible output across test runs:

```php
$faker = SedkiyFaker::locale('de_DE')->seed(1337)->make();
```

**Custom providers** can be chained without losing localization:

```php
$faker = SedkiyFaker::locale('fr_FR')
    ->withProvider(\Faker\Provider\fr_FR\Text::class)
    ->make();
```

### Laravel

Set the locale in your `.env` file:

```env
SEDKIY_FAKER_LOCALE=ar_DZ
```

If omitted, the package falls back to `app.faker_locale` in `config/app.php`, then `en_US`.

The service provider automatically attaches the correct providers to Laravel's `fake()` helper. No other configuration is required.

```php
// database/factories/UserFactory.php

public function definition(): array
{
    return [
        'name'    => fake()->name(),
        'address' => fake()->streetAddress(),
        'phone'   => fake()->mobileNumber(),
        'email'   => fake()->freeEmail(),
    ];
}
```

To publish the configuration file:

```bash
php artisan vendor:publish --tag="sedkiy-faker-config"
```

## Supported Locales

### MENA Region

| Locale | Country | Providers |
|:---|:---|:---|
| `ar_MA` | Morocco | Person, Address, PhoneNumber, Internet |
| `ar_DZ` | Algeria | Person, Address, PhoneNumber, Internet |
| `ar_TN` | Tunisia | Person, Address, PhoneNumber, Internet |
| `ar_EG` | Egypt | Person, Address, PhoneNumber, Internet |
| `ar_LY` | Libya | Person, Address, PhoneNumber, Internet |
| `ar_SA` | Saudi Arabia | Person, Address, PhoneNumber, Internet |
| `ar_LB` | Lebanon | Person, Address, PhoneNumber, Internet |
| `ar_JO` | Jordan | Person, Address, PhoneNumber, Internet |

### Europe & North America

| Locale | Country | Providers |
|:---|:---|:---|
| `fr_FR` | France | Person, Address, PhoneNumber |
| `de_DE` | Germany | Person, Address, PhoneNumber |
| `es_ES` | Spain | Person, Address, PhoneNumber |
| `it_IT` | Italy | Person, Address, PhoneNumber |
| `pt_PT` | Portugal | Person, Address, PhoneNumber |
| `en_GB` | United Kingdom | Person, Address, PhoneNumber |
| `nl_NL` | Netherlands | Person, Address, PhoneNumber |
| `nl_BE` | Belgium | Person, Address, PhoneNumber |
| `pl_PL` | Poland | Person, Address, PhoneNumber |
| `ro_RO` | Romania | Person, Address, PhoneNumber |
| `en_US` | United States | Person, Address, PhoneNumber |

## Testing

Tests are written with [Pest PHP](https://pestphp.com/) and cover reproducibility, phone number format validation, postcode regex matching, and data integrity across all locales.

```bash
composer install
vendor/bin/pest
```

## Contributing

1. Fork the repository.
2. Adhere to PSR-12 — run `composer run php-cs-fixer` before committing.
3. New locale dictionaries must contain at least 30 real-world entries.
4. Add corresponding tests in `tests/Providers/`.
5. Submit a pull request.

## License

Released under the [MIT License](LICENSE.md).