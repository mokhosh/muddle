<?php

namespace Mokhosh\Muddle\Components;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Strategies\Text;

class TextRotate extends TextComponent
{
    protected function strategy(): TextStrategy
    {
        return new Text\Rotate;
    }
}
