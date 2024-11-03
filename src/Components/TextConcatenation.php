<?php

namespace Mokhosh\Muddle\Components;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mokhosh\Muddle\Facades\Muddle;
use Mokhosh\Muddle\Strategies\Text\Concatenation;

class TextConcatenation extends Component
{
    public function __construct(
        public string $email,
    ) {}

    public function render(): View|Htmlable|Closure|string
    {
        return Muddle::strategy(new Concatenation)->text($this->email);
    }
}
