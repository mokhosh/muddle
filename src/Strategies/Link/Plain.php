<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Attributes\Unsafe;
use Mokhosh\Muddle\Contracts\LinkStrategy;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
#[Unsafe]
class Plain implements LinkStrategy
{
    public function muddle(string $string, ?string $title = null): string
    {
        return sprintf(
            '<a href="mailto:%s">%s</a>',
            $string,
            $title ?? $string,
        );
    }

    public function unmuddle(string $string): string
    {
        return $string;
    }
}
