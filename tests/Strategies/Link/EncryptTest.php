<?php

use Mokhosh\Muddle\Strategies\Link\Encrypt;

it('muddles text', function () {
    expect($muddled = (new Encrypt)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Encrypt)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
