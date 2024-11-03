<?php

namespace Mokhosh\Muddle\Facades;

use Illuminate\Support\Facades\Facade;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Contracts\TextStrategy;

/**
 * @see \Mokhosh\Muddle\Muddle
 *
 * @method static string link(string $email, string $title)
 * @method static string text(string $string)
 * @method static static strategy(?TextStrategy $text = null, ?LinkStrategy $link = null)
 */
class Muddle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mokhosh\Muddle\Muddle::class;
    }
}
