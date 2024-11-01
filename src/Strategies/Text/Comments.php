<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent all bots. Don't use in production.
 */
class Comments implements TextStrategy
{
    public function muddle(string $string): string
    {
        $offset = Str::randomOffset($string, '@', '.');
        $domain = Str::randomDomain();
        $comment = "<!--$domain-->";

        return substr_replace($string, $comment, $offset, 0);
    }

    public function unmuddle(string $string): string
    {
        return strip_tags($string);
    }
}
