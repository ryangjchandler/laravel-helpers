<?php

namespace RyanChandler\LaravelHelpers\Tests;

use Orchestra\Testbench\TestCase as TestbenchTestCase;
use RyanChandler\LaravelHelpers\LaravelHelpersServiceProvider;

class TestCase extends TestbenchTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelHelpersServiceProvider::class,
        ];
    }
}
