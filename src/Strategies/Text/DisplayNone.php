<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class DisplayNone implements TextStrategy
{
    public function muddle(string $string): string
    {
        $offset = random_int(strpos($string, '@') + 1, strrpos($string, '.'));
        $domain = Str::randomDomain();
        $hidden = "<b class='$domain'>$domain</b>";
        $style = "<style>.$domain {display: none}</style>";

        return substr_replace($string, $hidden, $offset, 0).$style;
    }

    public function unmuddle(string $string): string
    {
        return preg_replace('/<(b|style)[^>]*>[^<]+<\/(b|style)>/', '', $string);
    }
}
