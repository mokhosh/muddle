<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;

class UnsafePlain implements LinkStrategy
{
    public function muddle(string $string): string
    {
        return sprintf(
            '<a href="mailto:%s">%s</a>',
            $string,
            $string,
        );
    }
}
