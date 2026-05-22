<?php

declare(strict_types=1);

namespace Sedkiy\Faker\Providers\Lb;

use Faker\Provider\Base;

class Internet extends Base
{
    /** @var string[] */
    protected static array $freeEmailDomains = [
        'gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com', 'live.com',
        'ogero.gov.lb', 'idm.net.lb', 'cyberia.net.lb', 'terranet.net.lb', 'mail.com',
    ];
    /** @var string[] */
    protected static array $tld = ['.lb', '.com.lb', '.net.lb', '.org.lb', '.edu.lb', '.com'];
    /** @var string[] */
    protected static array $localIsps = ['ogero.gov.lb', 'idm.net.lb', 'cyberia.net.lb', 'terranet.net.lb', 'wise.net.lb'];

    /** @return string */
    public function email(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }
    /** @return string */
    public function freeEmail(): string { return $this->userName() . '@' . static::randomElement(static::$freeEmailDomains); }
    /** @return string */
    public function domainName(): string { return strtolower(str_replace(' ', '', $this->generator->parse('{{lastName}}'))) . static::randomElement(static::$tld); }
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
