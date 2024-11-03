<?php

use Mokhosh\Muddle\Strategies\Link\Plain;

it('doesnt muddle text', function () {
    expect($muddled = (new Plain)->muddle('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>')
        ->and((new Plain)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});

it('accepts link text', function () {
    expect($muddled = (new Plain)->muddle('test@example.com', 'email'))
        ->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Plain)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
