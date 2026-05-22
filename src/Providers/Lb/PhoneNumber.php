<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Lb;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+961 3 ### ###', '+961 7# ### ###', '+961 1 ### ###',
        '03 ### ###', '70 ### ###', '71 ### ###',
        '+961 76 ### ###', '+961 81 ### ###',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+961 3 ### ###', '+961 70 ### ###', '+961 71 ### ###',
        '03 ### ###', '70 ### ###', '71 ### ###',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+961 1 800 ###', '1 800 ###'];
    protected static string $countryCode = '+961';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
