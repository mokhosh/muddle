<?php

use Mokhosh\Muddle\Strategies\Link\Plain;

it('doesnt muddle text', function () {
    expect($muddled = (new Plain)->muddle('test@example.com', 'email'))
        ->toBe('<a href="mailto:test@example.com" data-attributes>email</a>')
        ->and((new Plain)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com" data-attributes>email</a>');
});
