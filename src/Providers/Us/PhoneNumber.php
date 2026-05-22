<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Us;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+1 (###) ###-####', '(###) ###-####', '###-###-####',
        '+1 800 ### ####', '+1 888 ### ####', '1-###-###-####',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+1 (###) ###-####', '(###) ###-####', '###-###-####', '1-###-###-####'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+1 800 ### ####', '+1 888 ### ####', '800-###-####', '888-###-####'];
    protected static string $countryCode = '+1';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
