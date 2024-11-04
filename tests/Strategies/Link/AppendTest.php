<?php

use Mokhosh\Muddle\Strategies\Link\Append;

it('muddles text', function () {
    expect($muddled = (new Append)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test">email</a>')
        ->and((new Append)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com" data-attributes>email</a>');
});
