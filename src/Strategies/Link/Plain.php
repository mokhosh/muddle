<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
class Plain implements LinkStrategy
{
    public function muddle(string $string): string
    {
        return sprintf(
            '<a href="mailto:%s">%s</a>',
            $string,
            $string,
        );
    }
}
