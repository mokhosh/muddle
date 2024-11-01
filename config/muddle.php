<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Strategy
    |--------------------------------------------------------------------------
    |
    | Set default strategies for obfuscating text and email links
    |
    */
    'strategy' => [
        'text' => \Mokhosh\Muddle\Strategies\Text\UnsafeText::class,
        'link' => \Mokhosh\Muddle\Strategies\Link\UnsafeLink::class,
    ],

];
