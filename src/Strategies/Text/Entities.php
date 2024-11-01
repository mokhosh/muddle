<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
class Entities implements TextStrategy
{
    public function muddle(string $string): string
    {
        return Str::entitize($string);
    }
}
