<?php

namespace Mokhosh\Muddle\Support;

use Random\Randomizer;

/** @internal */
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

        return match ((new Randomizer)->getInt(1, 3)) {
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

    /**
     * Get a random offset within a string, optionally between the
     * first occurrence of `$start` and the last occurrence of `$end`
     */
    public static function randomOffset(string $string, ?string $start = null, ?string $end = null): int
    {
        $min = is_null($start) ? 0 : strpos($string, $start);
        $max = is_null($end) ? strlen($string) : strrpos($string, $end);

        return random_int($min, $max);
    }
}
