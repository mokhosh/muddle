<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class UnsafeEntities implements TextStrategy
{
    public function muddle(string $string): string
    {
        return Str::entitize($string);
    }
}
