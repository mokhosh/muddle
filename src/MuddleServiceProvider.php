<?php

namespace Mokhosh\Muddle;

use Mokhosh\Muddle\Commands\MuddleCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MuddleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('muddle')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(MuddleCommand::class);
    }
}
