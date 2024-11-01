<?php

namespace Mokhosh\Muddle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mokhosh\Muddle\Muddle
 */
class Muddle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mokhosh\Muddle\Muddle::class;
    }
}
