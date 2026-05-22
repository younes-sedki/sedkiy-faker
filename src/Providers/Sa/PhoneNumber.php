<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Sa;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+966 5# ### ####', '+966 1# ### ####', '+966 8## ### ###',
        '05# ### ####', '01# ### ####', '+966 5########',
        '+966 1########', '05########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+966 5# ### ####', '05# ### ####', '+966 5########', '05########',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+966 800 ### ####', '800 ### ####'];
    protected static string $countryCode = '+966';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
