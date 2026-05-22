<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\It;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+39 3## ### ####', '+39 06 ### ####', '+39 02 ### ####',
        '3## ### ####', '06 ### ####', '02 ### ####',
        '+39 3########', '3########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+39 3## ### ####', '3## ### ####', '+39 3########', '3########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+39 800 ### ###', '800 ### ###'];
    protected static string $countryCode = '+39';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
