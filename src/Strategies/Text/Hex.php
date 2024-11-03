<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class Hex implements TextStrategy
{
    public function muddle(string $string): string
    {
        $id = Str::id();
        $key = random_int(0, 255);
        $hexed = Str::hex($string, $key);
        $script = <<<HTML
        </span><script>(function() {
            const codes = $id.innerText.split(' ')
            $id.innerText = ''
            for (const code of codes) $id.innerText += String.fromCharCode(parseInt(code, 16) ^ $key)
        })()</script>
        HTML;

        return "<span id='$id'>".$hexed.$script;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/ \^ (\d+)/', $string, $key);
        preg_match('/>([^<]+)<\/span>/', $string, $hexed);

        return Str::unhex($hexed[1], $key[1]);
    }
}
