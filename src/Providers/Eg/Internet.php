<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Eg;

use Faker\Provider\Base;

/**
 * Egyptian internet provider.
 */
class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'live.com',
        'mail.com', 'aol.com', 'icloud.com', 'protonmail.com', 'yandex.com',
    ];

    /** @var string[] */
    protected static array $tld = ['.eg', '.com.eg', '.net.eg', '.org.eg', '.edu.eg', '.com'];

    /** @var string[] */
    protected static array $localIsps = ['tedata.net.eg', 'etisalat.eg', 'vodafone.com.eg', 'orange.com.eg', 'we.com.eg'];

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
        $firstName = strtolower(str_replace([' ', '-'], '', $this->generator->parse('{{firstName}}')));
        $lastName = strtolower(str_replace([' ', '-'], '', $this->generator->parse('{{lastName}}')));
        return $firstName . static::randomElement(['.', '_', '']) . $lastName;
    }
}
