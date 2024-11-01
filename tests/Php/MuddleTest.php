<?php

use Mokhosh\Muddle\Muddle;
use Mokhosh\Muddle\Strategies\Link\UnsafeLink;
use Mokhosh\Muddle\Strategies\Text\UnsafeText;

it('works with basic unsafe strategies', function () {
    $muddle = new Muddle(
        text: new UnsafeText,
        link: new UnsafeLink,
    );

    expect($muddle->text('test@example.com'))
        ->toBe('test@example.com')
        ->and($muddle->link('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
