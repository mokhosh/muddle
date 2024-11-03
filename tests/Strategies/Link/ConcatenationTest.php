<?php

use Mokhosh\Muddle\Strategies\Link\Concatenation;

it('muddles text', function () {
    expect($muddled = (new Concatenation)->muddle('test@example.com', 'email'))
        ->toBe("<script>document.write('<a href=\"mailto:'+'t'+'e'+'s'+'t'+'@'+'e'+'x'+'a'+'m'+'p'+'l'+'e'+'.'+'c'+'o'+'m'+'\">email</a>');</script>")
        ->and((new Concatenation)->unmuddle($muddled))
        ->toBe('<a href="mailto:test@example.com">email</a>');
});
