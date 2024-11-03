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

    public static function rotate(string $string, int $number = 16): string
    {
        $number %= 64;
        $plain = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890@.';
        $cipher = substr($plain, $number).substr($plain, 0, $number);

        return strtr($string, $plain, $cipher);
    }

    public static function id(string $prefix = 'C', ?int $number = null): string
    {
        $number ??= (new Randomizer)->getInt(100_000, 999_999);

        return $prefix.$number;
    }

    /**
     * @param int $key Integer between 0 and 255
     */
    public static function hex(string $string, int $key = 64): string
    {
        $hexed = array_map(
            fn ($char) => dechex(ord($char) ^ $key),
            str_split($string),
        );

        return implode(' ', $hexed);
    }

    /**
     * @param int $key Integer between 0 and 255
     */
    public static function unhex(string $string, int $key = 64): string
    {
        $unhexed = array_map(
            fn ($char) => chr(intval($char, 16) ^ $key),
            explode(' ', $string),
        );

        return implode($unhexed);
    }

    public static function shuffle(string $string): string
    {
        return (new Randomizer)->shuffleBytes($string);
    }
}
