<?php

use Mokhosh\Muddle\Strategies\Text\Random;

it('muddles text', function () {
    expect($muddled = (new Random)->muddle('test@example.com'))
        ->not->toBe('test@example.com')
        ->and((new Random)->unmuddle($muddled))
        ->not->toBe('test@example.com');
});
