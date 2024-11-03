<?php

namespace Mokhosh\Muddle;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Mokhosh\Muddle\Components\TextConcatenation;
use Mokhosh\Muddle\Components\TextDisplayNone;
use Mokhosh\Muddle\Components\TextEncrypt;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Components\TextAppend;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MuddleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('muddle')
            ->hasConfigFile()
            ->hasViewComponents('muddle',
                TextAppend::class,
                TextConcatenation::class,
                TextDisplayNone::class,
                TextEncrypt::class,
            );
    }

    public function packageRegistered(): void
    {
        App::singleton(TextStrategy::class, fn () => new (Config::get('muddle.strategy.text')));
        App::singleton(LinkStrategy::class, fn () => new (Config::get('muddle.strategy.link')));
    }
}
