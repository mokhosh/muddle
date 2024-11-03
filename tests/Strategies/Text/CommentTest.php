<?php

use Mokhosh\Muddle\Strategies\Text\Comment;

it('muddles text', function () {
    expect($muddled = (new Comment)->muddle('test@example.com'))
        ->toContain('<!--', '-->')
        ->and((new Comment)->unmuddle($muddled))
        ->toBe('test@example.com');
});
