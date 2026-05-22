<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\De;

use Faker\Provider\Base;

class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+49 ### #######', '+49 #### ######', '0### #######',
        '+49 800 #######', '01## #######', '+49 30 ########',
        '+49 89 ########', '030 ########',
    ];
    /** @var string[] */
    protected static array $mobileFormats = [
        '+49 15# ########', '+49 16# ########', '+49 17# ########',
        '015# ########', '016# ########', '017# ########',
    ];
    /** @var string[] */
    protected static array $tollFreeFormats = ['+49 800 #######', '0800 #######'];
    protected static string $countryCode = '+49';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
