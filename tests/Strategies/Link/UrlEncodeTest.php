<?php

use Mokhosh\Muddle\Strategies\Link\UrlEncode;

it('muddles text', function () {
    expect($entitizedLink = (new UrlEncode)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and((new UrlEncode)->unmuddle($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
