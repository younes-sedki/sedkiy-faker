<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Dz;

use Faker\Provider\Base;

/**
 * Algerian internet provider with local domains and TLDs.
 */
class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'yahoo.fr', 'hotmail.com', 'outlook.com', 'live.fr',
        'yahoo.com', 'mail.com', 'hotmail.fr', 'caramail.com', 'gmx.com',
    ];

    /** @var string[] */
    protected static array $tld = ['.dz', '.com', '.net', '.org', '.com.dz'];

    /** @var string[] */
    protected static array $localIsps = [
        'djaweb.dz', 'algerie-telecom.dz', 'ooredoo.dz', 'mobilis.dz', 'djezzy.dz',
    ];

    /** @return string */
    public function email(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }

    /** @return string */
    public function freeEmail(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }

    /** @return string */
    public function domainName(): string { return strtolower($this->generator->parse('{{lastName}}')) . static::randomElement(static::$tld); }

    /** @return string */
    public function tld(): string { return static::randomElement(static::$tld); }

    /** @return string */
    public function safeEmail(): string { return $this->userName() . '@example.com'; }

    /** @return string */
    public function userName(): string
    {
        $firstName = strtolower(str_replace(' ', '', $this->generator->parse('{{firstName}}')));
        $lastName = strtolower(str_replace(' ', '', $this->generator->parse('{{lastName}}')));
        return $firstName . static::randomElement(['.', '_', '']) . $lastName;
    }
}
