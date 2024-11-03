<?php

namespace Mokhosh\Muddle\Tests;

use Illuminate\Support\Facades\Config;
use Mokhosh\Muddle\MuddleServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Workbench\App\Providers\WorkbenchServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            MuddleServiceProvider::class,
            WorkbenchServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        Config::set('view.paths', [__DIR__.'/Views']);
    }
}
