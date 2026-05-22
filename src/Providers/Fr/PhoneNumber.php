<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Fr;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+33 # ## ## ## ##', '0# ## ## ## ##', '+33 800 ### ###',
        '+33 6 ## ## ## ##', '+33 7 ## ## ## ##', '06 ## ## ## ##',
        '07 ## ## ## ##', '01 ## ## ## ##',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+33 6 ## ## ## ##', '+33 7 ## ## ## ##', '06 ## ## ## ##', '07 ## ## ## ##',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+33 800 ### ###', '0800 ### ###'];
    protected static string $countryCode = '+33';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
