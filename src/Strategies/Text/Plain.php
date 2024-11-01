<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
class Plain implements TextStrategy
{
    public function muddle(string $string): string
    {
        return $string;
    }

    public function unmuddle(string $string): string
    {
        return $string;
    }
}
