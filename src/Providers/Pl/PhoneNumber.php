<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pl;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+48 ### ### ###', '+48 800 ### ###', '+48 801 ### ###',
        '### ### ###', '+48 ## ### ## ##', '## ### ## ##',
        '+48 #########', '#########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+48 ### ### ###', '### ### ###', '+48 5## ### ###', '5## ### ###', '+48 6## ### ###', '6## ### ###', '+48 7## ### ###', '7## ### ###'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+48 800 ### ###', '800 ### ###'];
    protected static string $countryCode = '+48';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
