<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ma;

use Faker\Provider\Base;

/**
 * Moroccan phone number provider following ITU-T numbering plan.
 */
class PhoneNumber extends Base
{
    /** @var string[] */
    protected static array $formats = [
        '+212 6## ## ## ##',
        '+212 5## ## ## ##',
        '+212 7## ## ## ##',
        '06## ## ## ##',
        '05## ## ## ##',
        '07## ## ## ##',
        '+212 6########',
        '+212 5########',
    ];

    /** @var string[] */
    protected static array $mobileFormats = [
        '+212 6## ## ## ##',
        '+212 7## ## ## ##',
        '06## ## ## ##',
        '07## ## ## ##',
    ];

    /** @var string[] */
    protected static array $tollFreeFormats = [
        '0800 ######',
        '0801 ######',
        '0802 ######',
    ];

    /** @var string */
    protected static string $countryCode = '+212';

    /**
     * Returns a random Moroccan phone number.
     *
     * @return string
     */
    public function phoneNumber(): string
    {
        return static::numerify(static::randomElement(static::$formats));
    }

    /**
     * Returns a random Moroccan mobile number.
     *
     * @return string
     */
    public function mobileNumber(): string
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }

    /**
     * Returns a random Moroccan toll-free number.
     *
     * @return string
     */
    public function tollFreeNumber(): string
    {
        return static::numerify(static::randomElement(static::$tollFreeFormats));
    }

    /**
     * Returns the country dialing code.
     *
     * @return string
     */
    public function countryCode(): string
    {
        return static::$countryCode;
    }
}
