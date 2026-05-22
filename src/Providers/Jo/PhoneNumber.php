<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Jo;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+962 7# ### ####', '+962 6 ### ####', '+962 3 ### ####',
        '077 ### ####', '078 ### ####', '079 ### ####',
        '+962 7########', '07########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+962 7# ### ####', '077 ### ####', '078 ### ####', '079 ### ####',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+962 800 ## ####', '0800 ## ####'];
    protected static string $countryCode = '+962';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
