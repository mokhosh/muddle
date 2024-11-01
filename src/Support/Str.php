<?php

namespace Mokhosh\Muddle\Support;

class Str
{
    public static function entitize(string $string): string
    {
        return array_reduce(
            str_split($string),
            fn ($carry, $current) => $carry . static::entitizeChar($current),
            ''
        );
    }

    public static function entitizeChar(string $char): string
    {
        if (($ord = ord($char)) > 128) {
            return $char;
        }

        return match (rand(1, 3)) {
            1 => '&#' . $ord . ';',
            2 => '&#x' . dechex($ord) . ';',
            3 => $char,
        };
    }
}
