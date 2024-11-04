<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

class Append implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $id = Str::id();
        $username = substr($string, 0, strpos($string, '@'));
        $domain = substr($string, strpos($string, '@'));

        return <<<HTML
        <a id="$id" href="mailto:$username" data-attributes>$title</a>
        <script>(() => {
            $id.href += '$domain'
        })()</script>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/href \+= \'([^\']+)\'/', $string, $domain);
        preg_match('/mailto:([^"]+)"/', $string, $username);
        preg_match('/>([^<]+)<\/a>/', $string, $title);

        return <<<HTML
        <a href="mailto:$username[1]$domain[1]" data-attributes>$title[1]</a>
        HTML;
    }
}
