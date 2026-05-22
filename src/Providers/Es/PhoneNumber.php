<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Es;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+34 6## ### ###', '+34 9## ### ###', '+34 800 ### ###',
        '6## ### ###', '9## ### ###', '+34 6########',
        '+34 9########', '6########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = ['+34 6## ### ###', '6## ### ###', '+34 6########', '6########'];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+34 800 ### ###', '800 ### ###'];
    protected static string $countryCode = '+34';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
