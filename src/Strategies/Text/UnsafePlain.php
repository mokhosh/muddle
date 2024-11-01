<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;

class UnsafePlain implements TextStrategy
{
    public function muddle(string $string): string
    {
        return $string;
    }
}
