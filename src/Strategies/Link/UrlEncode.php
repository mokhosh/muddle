<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Attributes\Unsafe;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
#[Unsafe]
class UrlEncode implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $encoded = Str::urlEncode($string);

        return <<<HTML
        <a href="mailto:$encoded" data-attributes>$title</a>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        return urldecode($string);
    }
}
