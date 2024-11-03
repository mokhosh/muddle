<?php

use Mokhosh\Muddle\Strategies\Link\Rotate;

it('muddles text', function () {
    expect($muddled = (new Rotate)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Rotate)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
