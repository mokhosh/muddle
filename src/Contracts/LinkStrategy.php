<?php

namespace Mokhosh\Muddle\Contracts;

interface LinkStrategy
{
    public function muddle(string $string, string $title): string;

    public function unmuddle(string $string): string;
}
