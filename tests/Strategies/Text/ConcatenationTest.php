<?php

use Mokhosh\Muddle\Strategies\Text\Concatenation;

it('muddles text', function () {
    expect($muddled = (new Concatenation)->muddle('test@example.com'))
        ->toBe("<script>document.write('t'+'e'+'s'+'t'+'@'+'e'+'x'+'a'+'m'+'p'+'l'+'e'+'.'+'c'+'o'+'m');</script>")
        ->and((new Concatenation)->unmuddle($muddled))
        ->toBe('test@example.com');
});
