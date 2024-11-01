<?php

namespace Mokhosh\Muddle\Support;

use Random\Randomizer;

class Str
{
    protected static array $domains = [
        'gmail',
        'yahoo',
        'hotmail',
        'live',
        'outlook',
        'hey',
        'yandex',
    ];

    public static function entitize(string $string): string
    {
        return array_reduce(
            str_split($string),
            fn ($carry, $current) => $carry.static::entitizeChar($current),
            ''
        );
    }

    public static function entitizeChar(string $char): string
    {
        if (($ord = ord($char)) > 128) {
            return $char;
        }

        return match (rand(1, 3)) {
            1 => '&#'.$ord.';',
            2 => '&#x'.dechex($ord).';',
            3 => $char,
        };
    }

    public static function randomDomain()
    {
        $keys = (new Randomizer)->pickArrayKeys(static::$domains, 1);

        return static::$domains[$keys[0]];
    }
}
