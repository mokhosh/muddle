<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;

/**
 * Warning: This won't prevent all bots. Don't use in production.
 */
class Comments implements TextStrategy
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
        $comment = "<!--$domain-->";

        return substr_replace($string, $comment, $offset, 0);
    }
}
