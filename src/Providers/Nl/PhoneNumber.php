<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Nl;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+31 6 ## ## ## ##', '+31 20 ### ####', '+31 10 ### ####',
        '06 ## ## ## ##', '+31 800 #### ##', '020 ### ####',
        '010 ### ####', '+31 6########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+31 6 ## ## ## ##', '06 ## ## ## ##', '+31 6########', '06########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+31 800 #### ##', '0800 #### ##'];
    protected static string $countryCode = '+31';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
