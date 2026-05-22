<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Eg;

use Faker\Provider\Base;

/**
 * Egyptian phone number provider.
 */
class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+20 10## ### ###', '+20 11## ### ###', '+20 12## ### ###',
        '+20 15## ### ###', '010## ### ###', '011## ### ###',
        '012## ### ###', '015## ### ###',
    ];

    /** @var string[] */
    protected static array $mobileFormats = [
        '+20 10## ### ###', '+20 11## ### ###', '+20 12## ### ###',
        '+20 15## ### ###', '010########', '011########',
    ];

    /** @var string[] */
    protected static array $tollFreeFormats = [
        '+20 800 ### ####', '0800 ### ####',
    ];

    protected static string $countryCode = '+20';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
