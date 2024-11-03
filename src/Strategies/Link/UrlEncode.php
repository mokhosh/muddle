<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
class UrlEncode implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        return sprintf(
            '<a href="%s%s">%s</a>',
            'mailto:',
            Str::urlEncode($string),
            $title,
        );
    }

    public function unmuddle(string $string): string
    {
        return urldecode($string);
    }
}
