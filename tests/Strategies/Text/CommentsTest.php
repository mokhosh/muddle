<?php

use Mokhosh\Muddle\Strategies\Text\Comments;

it('muddles text', function () {
    expect($muddled = (new Comments)->muddle('test@example.com'))
        ->toContain('<!--', '-->')
        ->and((new Comments)->unmuddle($muddled))
        ->toBe('test@example.com');
});
