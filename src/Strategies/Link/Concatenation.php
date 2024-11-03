<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;

class Concatenation implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $concatenated = implode("'+'", str_split($string));

        return "<script>document.write('<a href=\"mailto:'+'".$concatenated."'+'\">$title</a>');</script>";
    }

    public function unmuddle(string $string): string
    {
        return str_replace(["<script>document.write('", "');</script>", "'", '+'], '', $string);
    }
}
