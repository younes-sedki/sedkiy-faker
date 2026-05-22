<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ly;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+218 91 ### ####', '+218 92 ### ####', '+218 94 ### ####',
        '+218 21 ### ####', '091 ### ####', '092 ### ####',
        '094 ### ####', '021 ### ####',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+218 91 ### ####', '+218 92 ### ####', '+218 94 ### ####',
        '091 ### ####', '092 ### ####', '094 ### ####',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+218 800 ######', '0800 ######'];
    protected static string $countryCode = '+218';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
