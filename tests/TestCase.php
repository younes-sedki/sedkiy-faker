<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Sedkiy\Faker\SedkiyFakerServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SedkiyFakerServiceProvider::class,
        ];
    }
}
