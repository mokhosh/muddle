<?php

use Mokhosh\Muddle\Strategies\Link\Entities;

it('muddles text', function () {
    expect($entitizedLink = (new Entities)->muddle('test@example.com'))
        ->not->toBe('<a href="mailto:test@example.com">test@example.com</a>')
        ->and(html_entity_decode($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});

it('accepts link text', function () {
    expect($entitizedLink = (new Entities)->muddle('test@example.com', 'email'))
        ->not->toBe('<a href="mailto:test@example.com">email</a>')
        ->and(html_entity_decode($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
