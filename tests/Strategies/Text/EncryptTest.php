<?php

use Mokhosh\Muddle\Strategies\Text\Encrypt;

it('muddles text', function () {
    expect($muddled = (new Encrypt)->muddle('test@example.com'))
        ->not->toBe('test@example.com')
        ->and((new Encrypt)->unmuddle($muddled))
        ->toBe('test@example.com');
});
