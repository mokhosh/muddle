<?php

use Mokhosh\Muddle\Strategies\Link\Hex;

it('muddles text', function () {
    expect($muddled = (new Hex)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Hex)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
