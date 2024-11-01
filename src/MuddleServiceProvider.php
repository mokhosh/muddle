<?php

namespace Mokhosh\Muddle;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mokhosh\Muddle\Commands\MuddleCommand;

class MuddleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('muddle')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_muddle_table')
            ->hasCommand(MuddleCommand::class);
    }
}
