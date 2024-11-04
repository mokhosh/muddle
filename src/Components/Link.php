<?php

namespace Mokhosh\Muddle\Components;

use Illuminate\Support\Facades\App;
use Mokhosh\Muddle\Contracts\LinkStrategy;

class Link extends LinkComponent
{
    protected function strategy(): LinkStrategy
    {
        return App::make(LinkStrategy::class);
    }
}
