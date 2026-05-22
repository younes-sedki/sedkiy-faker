<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Be;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+32 4## ### ###', '+32 2 ### ####', '+32 3 ### ####',
        '04## ### ###', '02 ### ####', '03 ### ####',
        '+32 4########', '04########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+32 4## ### ###', '04## ### ###', '+32 4########', '04########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+32 800 ## ###', '0800 ## ###'];
    protected static string $countryCode = '+32';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
