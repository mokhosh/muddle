<?php

use Mokhosh\Muddle\Strategies\Link\Random;

it('muddles text', function () {
    expect($muddled = (new Random)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Random)->unmuddle($muddled))
        ->not->toBe('<a href="mailto:test@example.com">email</a>');
});
