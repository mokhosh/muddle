<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Attributes\Unsafe;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

/**
 * Warning: This won't prevent bots. Don't use in production.
 */
#[Unsafe]
class Entities implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $entitized = Str::entitize('mailto:'.$string);

        return <<<HTML
        <a href="$entitized" data-attributes>$title</a>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        return html_entity_decode($string);
    }
}
