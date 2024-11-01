<?php

namespace Mokhosh\Muddle;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Contracts\TextStrategy;

class Muddle
{
    public function __construct(
        protected TextStrategy $text,
        protected LinkStrategy $link,
    ) {}

    public function link(string $string): string
    {
        return $this->link->muddle($string);
    }

    public function text(string $string): string
    {
        return $this->text->muddle($string);
    }

    public function strategy(
        ?TextStrategy $text = null,
        ?LinkStrategy $link = null,
    ): static
    {
        $this->text = $text ?? $this->text;
        $this->link = $link ?? $this->link;

        return $this;
    }
}
