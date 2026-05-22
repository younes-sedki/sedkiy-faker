<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Dz;

use Faker\Provider\Base;

/**
 * Algerian phone number provider following ITU-T numbering plan.
 */
class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+213 5## ### ###', '+213 6## ### ###', '+213 7## ### ###',
        '05## ## ## ##', '06## ## ## ##', '07## ## ## ##',
        '+213 21 ## ## ##', '+213 31 ## ## ##',
    ];

    /** @var string[] */
    protected static array $mobileFormats = [
        '+213 5## ### ###', '+213 6## ### ###', '+213 7## ### ###',
        '05## ## ## ##', '06## ## ## ##', '07## ## ## ##',
    ];

    /** @var string[] */
    protected static array $tollFreeFormats = [
        '0800 ## ## ##', '0801 ## ## ##',
    ];

    protected static string $countryCode = '+213';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }

    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }

    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }

    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
