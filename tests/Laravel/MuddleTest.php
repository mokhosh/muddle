<?php

use Mokhosh\Muddle\Facades\Muddle;
use Mokhosh\Muddle\Strategies\Text;
use Mokhosh\Muddle\Strategies\Link;

it('works with basic unsafe strategies', function () {
    expect(Muddle::text('test@example.com'))
        ->toBe('test@example.com')
        ->and(Muddle::link('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});

it('can change strategies on the fly', function () {
    $entitizedText = Muddle::strategy(text: new Text\UnsafeEntities)->text('test@example.com');
    $entitizedLink = Muddle::strategy(link: new Link\UnsafeEntities)->link('test@example.com');

    expect($entitizedText)
        ->not->toBe('test@example.com')
        ->and(html_entity_decode($entitizedText))
        ->toBe('test@example.com')
        ->and($entitizedLink)
        ->not->toBe('<a href="mailto:test@example.com">test@example.com</a>')
        ->and(html_entity_decode($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
