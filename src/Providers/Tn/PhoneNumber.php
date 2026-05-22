<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Tn;

use Faker\Provider\Base;

/**
 * Tunisian phone number provider.
 */
class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+216 2# ### ###', '+216 5# ### ###', '+216 9# ### ###',
        '+216 7# ### ###', '2# ### ###', '5# ### ###',
        '9# ### ###', '7# ### ###',
    ];

    /** @var string[] */
    protected static array $mobileFormats = [
        '+216 2# ### ###', '+216 5# ### ###', '+216 9# ### ###',
        '2# ### ###', '5# ### ###', '9# ### ###',
    ];

    /** @var string[] */
    protected static array $tollFreeFormats = [
        '+216 80 ### ###', '80 ### ###',
    ];

    protected static string $countryCode = '+216';

    /** @return string */
    public function phoneNumber(): string { return static::numerify(static::randomElement(static::$formats)); }
    /** @return string */
    public function mobileNumber(): string { return static::numerify(static::randomElement(static::$mobileFormats)); }
    /** @return string */
    public function tollFreeNumber(): string { return static::numerify(static::randomElement(static::$tollFreeFormats)); }
    /** @return string */
    public function countryCode(): string { return static::$countryCode; }
}
