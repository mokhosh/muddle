<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Strategies\Concerns\PicksRandomSibling;

class Random implements LinkStrategy
{
    use PicksRandomSibling;

    public function muddle(string $string, string $title): string
    {
        $strategy = static::getRandomSibling();

        return (new $strategy)->muddle($string, $title);
    }

    public function unmuddle(string $string): string
    {
        return 'Not possible 😎';
    }
}
