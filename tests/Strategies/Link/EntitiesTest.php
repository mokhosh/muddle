<?php

use Mokhosh\Muddle\Strategies\Link\Entities;

it('muddles text', function () {
    expect($entitizedLink = (new Entities)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new Entities)->unmuddle($entitizedLink))
        ->toBe('<a href="mailto:test@example.com" data-attributes>email</a>');
});
