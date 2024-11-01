<?php

namespace Mokhosh\Muddle\Tests;

use Mokhosh\Muddle\MuddleServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            MuddleServiceProvider::class,
        ];
    }
}
