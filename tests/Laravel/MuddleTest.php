<?php

use Illuminate\Support\Facades\Config;
use Mokhosh\Muddle\Facades\Muddle;
use Mokhosh\Muddle\Strategies\Link;
use Mokhosh\Muddle\Strategies\Text;

it('works with basic unsafe strategies', function () {
    expect(Muddle::text('test@example.com'))
        ->toBe('test@example.com')
        ->and(Muddle::link('test@example.com'))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});

it('gets strategies from config', function () {
    Config::set('muddle.strategy.text', Text\Entities::class);
    Config::set('muddle.strategy.link', Link\Entities::class);

    expect($entitizedText = Muddle::text('test@example.com'))
        ->not->toBe('test@example.com')
        ->and((new Text\Entities)->unmuddle($entitizedText))
        ->toBe('test@example.com')
        ->and($entitizedLink = Muddle::link('test@example.com'))
        ->not->toBe('<a href="mailto:test@example.com">test@example.com</a>')
        ->and(html_entity_decode($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});

it('can change strategies on the fly', function () {
    $entitizedText = Muddle::strategy(text: new Text\Entities)->text('test@example.com');
    $entitizedLink = Muddle::strategy(link: new Link\Entities)->link('test@example.com');

    expect($entitizedText)
        ->not->toBe('test@example.com')
        ->and((new Text\Entities)->unmuddle($entitizedText))
        ->toBe('test@example.com')
        ->and($entitizedLink)
        ->not->toBe('<a href="mailto:test@example.com">test@example.com</a>')
        ->and(html_entity_decode($entitizedLink))
        ->toBe('<a href="mailto:test@example.com">test@example.com</a>');
});
