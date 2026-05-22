<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ro;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+40 7## ### ###', '+40 21 ### ####', '+40 31 ### ####',
        '07## ### ###', '021 ### ####', '031 ### ####',
        '+40 7########', '07########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+40 7## ### ###', '07## ### ###', '+40 7########', '07########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+40 800 ### ###', '0800 ### ###'];
    protected static string $countryCode = '+40';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
