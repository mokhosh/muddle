<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;

class Concatenation implements TextStrategy
{
    public function muddle(string $string): string
    {
        $concatenated = implode("'+'", str_split($string));

        return "<script>document.write('".$concatenated."');</script>";
    }

    public function unmuddle(string $string): string
    {
        return str_replace(["<script>document.write('", "');</script>", "'", '+'], '', $string);
    }
}
