<?php

namespace Mokhosh\Muddle\Components;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Strategies\Link;

class Hex extends LinkComponent
{
    protected function strategy(): LinkStrategy
    {
        return new Link\Hex;
    }
}
