<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Attributes\Unsafe;
use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
#[Unsafe]
class Entities implements TextStrategy
{
    public function muddle(string $string): string
    {
        return Str::entitize($string);
    }

    public function unmuddle(string $string): string
    {
        return html_entity_decode($string);
    }
}
