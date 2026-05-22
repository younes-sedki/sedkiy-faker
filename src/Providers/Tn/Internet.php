<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Tn;

use Faker\Provider\Base;

/**
 * Tunisian internet provider.
 */
class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'yahoo.fr', 'hotmail.com', 'outlook.com', 'live.fr',
        'yahoo.com', 'topnet.tn', 'gnet.tn', 'planet.tn', 'hexabyte.tn',
    ];

    /** @var string[] */
    protected static array $tld = ['.tn', '.com.tn', '.org.tn', '.com', '.net'];

    /** @var string[] */
    protected static array $localIsps = ['topnet.tn', 'gnet.tn', 'planet.tn', 'hexabyte.tn', 'ooredoo.tn'];

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
