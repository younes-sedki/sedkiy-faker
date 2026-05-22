<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Sa;

use Faker\Provider\Base;

class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com',
        'stc.com.sa', 'mobily.com.sa', 'zain.com.sa', 'live.com',
        'icloud.com', 'mail.com',
    ];
    /** @var string[] */
    protected static array $tld = ['.sa', '.com.sa', '.net.sa', '.org.sa', '.gov.sa', '.edu.sa', '.com'];
    /** @var string[] */
    protected static array $localIsps = ['stc.com.sa', 'mobily.com.sa', 'zain.com.sa', 'go.com.sa', 'salam.sa'];

    /** @return string */
    public function email(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }
    /** @return string */
    public function freeEmail(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }
    /** @return string */
    public function domainName(): string { return strtolower(str_replace([' ', '-'], '', $this->generator->parse('{{lastName}}'))) . static::randomElement(static::$tld); }
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
