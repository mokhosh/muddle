<?php

namespace Mokhosh\Muddle\Contracts;

interface TextStrategy
{
    public function muddle(string $string): string;
}
