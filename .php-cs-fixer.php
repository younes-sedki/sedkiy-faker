<?php

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'declare_strict_types' => true,
    'strict_param' => true,
])->setRiskyAllowed(true)->setFinder(
    PhpCsFixer\Finder::create()->in(__DIR__.'/src')->in(__DIR__.'/tests')
);
