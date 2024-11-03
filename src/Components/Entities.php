<?php

namespace Mokhosh\Muddle\Components;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mokhosh\Muddle\Facades\Muddle;
use Mokhosh\Muddle\Strategies\Link;

class Entities extends Component
{
    public function __construct(
        public string $email,
        public string $title,
    ) {}

    public function render(): View|Htmlable|Closure|string
    {
        return Muddle::strategy(link: new Link\Entities)->link($this->email, $this->title);
    }
}
