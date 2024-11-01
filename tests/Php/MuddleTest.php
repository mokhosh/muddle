<?php

use Mokhosh\Muddle\Muddle;
use Mokhosh\Muddle\Strategies\Link\UnsafePlain;
use Mokhosh\Muddle\Strategies\Text\UnsafePlain;

it('works with basic unsafe strategies', function () {
    $muddle = new Muddle(
        text: new UnsafePlain,
        link: new UnsafePlain,
    );

    expect($muddle->text('test@example.com'))
        ->toBe('test@example.com')
        ->and($muddle->link('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
