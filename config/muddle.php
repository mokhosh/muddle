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
        'text' => \Mokhosh\Muddle\Strategies\Text\UnsafePlain::class,
        'link' => \Mokhosh\Muddle\Strategies\Link\UnsafePlain::class,
    ],

];
