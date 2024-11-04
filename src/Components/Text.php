<?php

namespace Mokhosh\Muddle\Components;

use Illuminate\Support\Facades\App;
use Mokhosh\Muddle\Contracts\TextStrategy;

class Text extends TextComponent
{
    protected function strategy(): TextStrategy
    {
        return App::make(TextStrategy::class);
    }
}
