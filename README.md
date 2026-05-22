<div align="center">
  <img src=".github/images/banner.png" alt="Sedkiy Faker Banner" width="100%" style="border-radius: 12px; margin-bottom: 20px;">

  <h1>Sedkiy Faker</h1>

  <p>A professional <a href="https://fakerphp.org/">FakerPHP</a> extension for generating culturally accurate, hyper-localized test data across 19 countries.</p>

  <p>
    <a href="https://packagist.org/packages/sedkiy/faker"><img src="https://img.shields.io/packagist/v/sedkiy/faker.svg?style=flat-square" alt="Latest Version on Packagist"></a>
    <a href="https://packagist.org/packages/sedkiy/faker"><img src="https://img.shields.io/packagist/dt/sedkiy/faker.svg?style=flat-square" alt="Total Downloads"></a>
    <a href="LICENSE.md"><img src="https://img.shields.io/packagist/l/sedkiy/faker.svg?style=flat-square" alt="License"></a>
    <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php" alt="PHP">
    <img src="https://img.shields.io/badge/Laravel-10%20%7C%2011%20%7C%2012-FF2D20?style=flat-square&logo=laravel" alt="Laravel">
  </p>
</div>

---

## Why Sedkiy Faker?

Standard FakerPHP locale fallbacks produce structurally invalid phone numbers, non-existent cities, and culturally mismatched data. Sedkiy Faker intercepts and fixes these issues at the container level.

| Standard FakerPHP Fallbacks | Sedkiy Faker Localized Engine |
| :--- | :--- |
| Structurally invalid phone formats | Real ITU-T compliant mobile and landline numbers |
| Non-existent / generic city names | Authentic city and region catalogs per territory |
| Culturally mismatched name honorifics | Gender and region-specific honors (e.g., `Si`, `Lalla`) |
| Complex setup and overriding issues | Zero-configuration auto-extension into Laravel |

---

## Requirements

* **PHP** 8.1 or higher
* **Composer**
* **Laravel** 10, 11, or 12 *(optional)*

---

## Installation

Install the package via Composer into your development dependencies:

```bash
composer require sedkiy/faker --dev
```

---

## Usage

### Standalone PHP Usage

Instantiate a localized generator manually using the fluent `SedkiyFaker` factory wrapper:

```php
use Sedkiy\Faker\SedkiyFaker;

// Create Moroccan-specific Faker instance
$faker = SedkiyFaker::locale('ar_MA')->make();

$faker->name();         // "Mr. Youssef Alami"
$faker->city();         // "Casablanca"
$faker->phoneNumber();  // "+212 6 12 34 56 78"
$faker->postCode();     // "20000"
$faker->freeEmail();    // "youssef.alami@menara.ma"
```

#### Seeding (Reproducible Outputs)
Set a seed value to ensure generated data remains reproducible across test runs:

```php
$faker = SedkiyFaker::locale('de_DE')->seed(1337)->make();
```

#### Chaining Custom Providers
Add extra custom providers seamlessly without losing country-specific features:

```php
$faker = SedkiyFaker::locale('fr_FR')
    ->withProvider(\Faker\Provider\fr_FR\Text::class)
    ->make();
```

---

### Laravel Integration (Zero Code Changes)

> [!IMPORTANT]
> **Zero Code Pollution:** There is absolutely no need to edit your existing Factory or Seeder files. Sedkiy Faker hooks directly into Laravel's native `fake()` helper and `$this->faker` property using container extenders.

To configure, simply specify your desired locale in your `.env` file:

```env
APP_FAKER_LOCALE=ar_MA
# Or use the package-specific override:
SEDKIY_FAKER_LOCALE=ar_MA
```

*(If omitted, the package falls back to `app.faker_locale` in `config/app.php`, then `en_US`.)*

Once configured, your standard Laravel factories will generate localized data automatically:

```php
// database/factories/UserFactory.php

public function definition(): array
{
    // These will now automatically generate culturally accurate data for ar_MA!
    return [
        'name'    => fake()->name(),         // e.g. "Youssef Alami"
        'address' => fake()->streetAddress(),// e.g. "Avenue Hassan II"
        'phone'   => fake()->phoneNumber(),  // e.g. "+212 6 12 34 56 78"
        'email'   => fake()->freeEmail(),    // e.g. "youssef@menara.ma"
    ];
}
```

#### Configuration File (Optional)
If you want to customize default settings, publish the configuration file:

```bash
php artisan vendor:publish --tag="sedkiy-faker-config"
```

---

## Supported Locales

### MENA Region

| Locale | Country | Available Providers |
| :--- | :--- | :--- |
| **`ar_MA`** | Morocco | Person, Address, PhoneNumber, Internet |
| **`ar_DZ`** | Algeria | Person, Address, PhoneNumber, Internet |
| **`ar_TN`** | Tunisia | Person, Address, PhoneNumber, Internet |
| **`ar_EG`** | Egypt | Person, Address, PhoneNumber, Internet |
| **`ar_LY`** | Libya | Person, Address, PhoneNumber, Internet |
| **`ar_SA`** | Saudi Arabia | Person, Address, PhoneNumber, Internet |
| **`ar_LB`** | Lebanon | Person, Address, PhoneNumber, Internet |
| **`ar_JO`** | Jordan | Person, Address, PhoneNumber, Internet |

### Europe & North America

| Locale | Country | Available Providers |
| :--- | :--- | :--- |
| **`fr_FR`** | France | Person, Address, PhoneNumber |
| **`de_DE`** | Germany | Person, Address, PhoneNumber |
| **`es_ES`** | Spain | Person, Address, PhoneNumber |
| **`it_IT`** | Italy | Person, Address, PhoneNumber |
| **`pt_PT`** | Portugal | Person, Address, PhoneNumber |
| **`en_GB`** | United Kingdom | Person, Address, PhoneNumber |
| **`nl_NL`** | Netherlands | Person, Address, PhoneNumber |
| **`nl_BE`** | Belgium | Person, Address, PhoneNumber |
| **`pl_PL`** | Poland | Person, Address, PhoneNumber |
| **`ro_RO`** | Romania | Person, Address, PhoneNumber |
| **`en_US`** | United States | Person, Address, PhoneNumber |

---

## Testing

Tests are written using [Pest PHP](https://pestphp.com/) and validate reproducibility, phone number format conforms to ITU-T plans, postcode regex compliance, and container extensions.

```bash
composer install
vendor/bin/pest
```

---

## Contributing

We welcome your contributions to extend coverage to more locales! Please follow this workflow:

1. **Fork the Repository** and create a feature branch.
2. **Adhere to Code Standards**: Check and format your changes with PHP CS Fixer (`composer run php-cs-fixer`).
3. **Data Integrity**: New locale dictionaries must contain at least 30 real-world entries.
4. **Testing**: Add corresponding test assertions inside `tests/Providers/`.
5. **Submit a Pull Request** describing your changes.

---

## License

This package is open-sourced software licensed under the [MIT License](LICENSE.md).