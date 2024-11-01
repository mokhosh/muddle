<?php

use Mokhosh\Muddle\Strategies\Text\DisplayNone;

it('muddles text', function () {
    expect($muddled = (new DisplayNone)->muddle('test@example.com'))
        ->toContain('<b', '</b>', '<style>', '</style>')
        ->and(preg_replace('/<(b|style)[^>]*>[^<]+<\/(b|style)>/', '', $muddled))
        ->toBe('test@example.com');
});
