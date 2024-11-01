<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;

class DisplayNone implements TextStrategy
{
    protected array $domains = [
        'gmail',
        'yahoo',
        'hotmail',
        'live',
        'outlook',
        'hey',
        'yandex',
    ];

    public function muddle(string $string): string
    {
        $offset = random_int(strpos($string, '@') + 1, strrpos($string, '.'));
        $domain = $this->domains[array_rand($this->domains)];
        $comment = "<b class='$domain'>$domain</b>";
        $style = "<style>.$domain {display: none}</style>";

        return substr_replace($string, $comment, $offset, 0).$style;
    }

    public function unmuddle(string $string): string
    {
        return preg_replace('/<(b|style)[^>]*>[^<]+<\/(b|style)>/', '', $string);
    }
}
