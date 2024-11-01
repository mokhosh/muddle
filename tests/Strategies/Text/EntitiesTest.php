<?php

use Mokhosh\Muddle\Strategies\Text\Entities;

it('muddles text', function () {
    expect($entitizedText = (new Entities)->muddle('test@example.com'))
        ->not->toBe('test@example.com')
        ->and(html_entity_decode($entitizedText))
        ->toBe('test@example.com');
});
