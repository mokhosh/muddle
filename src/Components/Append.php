<?php

namespace Mokhosh\Muddle\Components;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Strategies\Link;

class Append extends LinkComponent
{
    protected function strategy(): LinkStrategy
    {
        return new Link\Append;
    }
}
