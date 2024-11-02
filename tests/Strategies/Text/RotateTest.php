<?php

use Mokhosh\Muddle\Strategies\Text\Rotate;

it('muddles text', function () {
    expect($muddled = (new Rotate)->muddle('test@example.com'))
        ->not->toBe('test@example.com')
        ->and((new Rotate)->unmuddle($muddled))
        ->toBe('test@example.com');
});
