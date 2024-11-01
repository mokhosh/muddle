<?php

use Mokhosh\Muddle\Strategies\Link\Plain;

it('doesnt muddle text', function () {
    expect((new Plain)->muddle('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
