<?php

use Mokhosh\Muddle\Muddle;
use Mokhosh\Muddle\Strategies\Link;
use Mokhosh\Muddle\Strategies\Text;

it('works with basic unsafe strategies', function () {
    $muddle = new Muddle(
        text: new Text\Plain,
        link: new Link\Plain,
    );

    expect($muddle->text('test@example.com'))
        ->toBe('test@example.com')
        ->and($muddle->link('test@example.com', 'email'))
        ->toBe('<a href="mailto:test@example.com" data-attributes>email</a>');
});
