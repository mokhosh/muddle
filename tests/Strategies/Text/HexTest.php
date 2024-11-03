<?php

use Mokhosh\Muddle\Strategies\Text\Hex;

it('muddles text', function () {
    expect($muddled = (new Hex)->muddle('test@example.com'))
        ->not->toBe('test')
        ->and((new Hex)->unmuddle($muddled))
        ->toBe('test@example.com');
});
