<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Pt;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+351 9## ### ###', '+351 2## ### ###', '+351 800 ### ###',
        '9## ### ###', '2## ### ###', '+351 9########',
        '9########', '2########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+351 9## ### ###', '9## ### ###', '+351 9########', '9########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+351 800 ### ###', '800 ### ###'];
    protected static string $countryCode = '+351';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
