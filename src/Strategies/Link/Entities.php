<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
class Entities implements LinkStrategy
{
    public function muddle(string $string): string
    {
        return sprintf(
            '<a href="%s%s">%s</a>',
            Str::entitize('mailto:'),
            $entitized = Str::entitize($string),
            $entitized,
        );
    }
}
