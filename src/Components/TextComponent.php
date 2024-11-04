<?php

namespace Mokhosh\Muddle\Components;

use Illuminate\View\Component;
use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Facades\Muddle;

abstract class TextComponent extends Component
{
    public function __construct(
        public string $email,
    ) {}

    public function render(): string
    {
        return Muddle::strategy(
            text: $this->strategy()
        )->text($this->email);
    }

    abstract protected function strategy(): TextStrategy;
}
