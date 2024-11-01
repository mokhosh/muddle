<?php

use Mokhosh\Muddle\Muddle;
use Mokhosh\Muddle\Strategies\Text;
use Mokhosh\Muddle\Strategies\Link;

it('works with basic unsafe strategies', function () {
    $muddle = new Muddle(
        text: new Text\UnsafePlain,
        link: new Link\UnsafePlain,
    );

    expect($muddle->text('test@example.com'))
        ->toBe('test@example.com')
        ->and($muddle->link('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
