<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Gb;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+44 7### ######', '+44 20 #### ####', '+44 121 ### ####',
        '+44 800 ### ####', '07### ######', '020 #### ####',
        '0121 ### ####', '0800 ### ####',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+44 7### ######', '07### ######', '+44 7#########', '07#########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+44 800 ### ####', '0800 ### ####'];
    protected static string $countryCode = '+44';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
