<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

class Encrypt implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $id = Str::id();
        $plain = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@._';
        $cipher = Str::shuffle($plain);
        $encrypted = strtr('mailto:'.$string, $plain, $cipher);

        return <<<HTML
        <a id="$id" href="$encrypted" data-attributes>$title</a>
        <script>(() => {
            const plain = '$plain'
            const cipher = '$cipher'
            $id.href = $id.getAttribute('href').split('').map((letter) => plain[cipher.indexOf(letter)] ?? letter).join('')
        })()</script>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/const plain = \'([^\']+)\'/', $string, $plain);
        preg_match('/const cipher = \'([^\']+)\'/', $string, $cipher);
        preg_match('/href="([^"]+)"/', $string, $muddled);
        preg_match('/>([^<]+)<\/a>/', $string, $title);
        $decrypted = strtr($muddled[1], $cipher[1], $plain[1]);

        return <<<HTML
        <a href="$decrypted" data-attributes>$title[1]</a>
        HTML;
    }
}
