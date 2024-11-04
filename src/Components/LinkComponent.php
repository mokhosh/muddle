<?php

namespace Mokhosh\Muddle\Components;

use Illuminate\View\Component;
use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Facades\Muddle;

abstract class LinkComponent extends Component
{
    public function __construct(
        public string $email,
        public string $title,
    ) {}

    public function render(): string
    {
        return str_replace(
            'data-attributes',
            '{{ $attributes }}',
            Muddle::strategy(
                link: $this->strategy()
            )->link($this->email, $this->title)
        );
    }

    protected abstract function strategy(): LinkStrategy;
}
