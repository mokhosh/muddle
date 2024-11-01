<?php

namespace Mokhosh\Muddle;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Contracts\TextStrategy;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MuddleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('muddle')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        App::singleton(TextStrategy::class, fn () => new (Config::get('muddle.strategy.text')));
        App::singleton(LinkStrategy::class, fn () => new (Config::get('muddle.strategy.link')));
    }
}
