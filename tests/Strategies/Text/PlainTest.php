<?php

use Mokhosh\Muddle\Strategies\Text\Plain;

it('doesnt muddle text', function () {
    expect((new Plain)->muddle('test@example.com'))
        ->toBe('test@example.com');
});
