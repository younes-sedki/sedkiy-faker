<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Ma;

use Faker\Provider\Base;

/**
 * Moroccan internet provider with local email domains and TLDs.
 */
class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'yahoo.fr', 'hotmail.com', 'menara.ma', 'maroc.ma',
        'iam.ma', 'gmail.ma', 'outlook.com', 'live.fr', 'yahoo.com',
    ];

    /** @var string[] */
    protected static array $tld = ['.ma', '.com', '.net', '.org', '.co.ma'];

    /** @var string[] */
    protected static array $localIsps = [
        'iam.ma', 'inwi.ma', 'meditel.ma', 'orange.ma', 'maroctelecom.ma',
    ];

    /**
     * Returns a random email address.
     *
     * @return string
     */
    public function email(): string
    {
        return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains);
    }

    /**
     * Returns a random free email address.
     *
     * @return string
     */
    public function freeEmail(): string
    {
        return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains);
    }

    /**
     * Returns a random domain name.
     *
     * @return string
     */
    public function domainName(): string
    {
        return strtolower($this->generator->parse('{{lastName}}')) . static::randomElement(static::$tld);
    }

    /**
     * Returns a random TLD.
     *
     * @return string
     */
    public function tld(): string
    {
        return static::randomElement(static::$tld);
    }

    /**
     * Returns a safe email address using example.com.
     *
     * @return string
     */
    public function safeEmail(): string
    {
        return $this->userName() . '@example.com';
    }

    /**
     * Returns a random username based on Moroccan names.
     *
     * @return string
     */
    public function userName(): string
    {
        $firstName = strtolower(str_replace(' ', '', $this->generator->parse('{{firstName}}')));
        $lastName = strtolower(str_replace(' ', '', $this->generator->parse('{{lastName}}')));
        $separator = static::randomElement(['.', '_', '']);

        return $firstName . $separator . $lastName;
    }
}
