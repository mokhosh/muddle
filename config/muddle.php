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
        'text' => TextStrategy::class,
        'link' => LinkStrategy::class,
    ],

];
