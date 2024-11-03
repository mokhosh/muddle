<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Strategies\Concerns\PicksRandomSibling;

class Random implements TextStrategy
{
    use PicksRandomSibling;

    public function muddle(string $string): string
    {
        $strategy = static::getRandomSibling();

        return (new $strategy)->muddle($string);
    }

    public function unmuddle(string $string): string
    {
        return 'Not possible 😎';
    }
}
