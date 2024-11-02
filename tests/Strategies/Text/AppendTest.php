<?php

use Mokhosh\Muddle\Strategies\Text\Append;

it('muddles text', function () {
    expect($muddled = (new Append)->muddle('test@example.com'))
        ->not->toBe('test')
        ->and((new Append)->unmuddle($muddled))
        ->toBe('test@example.com');
});
