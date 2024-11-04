<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

class Hex implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $id = Str::id();
        $key = random_int(0, 255);
        $hexed = Str::hex('mailto:'.$string, $key);

        return <<<HTML
        <a id="$id" href="$hexed" data-attributes>$title</a>
        <script>(() => {
            const codes = $id.getAttribute('href').split(' ')
            $id.href = ''
            for (const code of codes) $id.href = $id.getAttribute('href') + String.fromCharCode(parseInt(code, 16) ^ $key)
        })()</script>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/ \^ (\d+)/', $string, $key);
        preg_match('/href="([^"]+)"/', $string, $hexed);
        preg_match('/>([^<]+)<\/a>/', $string, $title);
        $unhexed = Str::unhex($hexed[1], $key[1]);

        return <<<HTML
        <a href="$unhexed">$title[1]</a>
        HTML;
    }
}
