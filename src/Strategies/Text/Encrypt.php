<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class Encrypt implements TextStrategy
{
    public function muddle(string $string): string
    {
        $id = Str::id();
        $plain = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@._';
        $cipher = str_shuffle($plain);
        $script = <<<HTML
        </span><script>
        (function() {
            const plain = '$plain'
            const cipher = '$cipher'
            $id.innerText = $id.innerText.split('').map((letter) => plain[cipher.indexOf(letter)]).join('')
        })()
        </script>
        HTML;

        return "<span id='$id'>".strtr(
            $string,
            $plain,
            $cipher,
        ).$script;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/const plain = \'([^\']+)\'/', $string, $plain);
        preg_match('/const cipher = \'([^\']+)\'/', $string, $cipher);
        preg_match('/>([^<]+)<\/span>/', $string, $muddled);

        return strtr(
            $muddled[1],
            $cipher[1],
            $plain[1],
        );
    }
}
