<?php

namespace Mokhosh\Muddle\Strategies\Link;

use Mokhosh\Muddle\Contracts\LinkStrategy;
use Mokhosh\Muddle\Support\Str;

class Rotate implements LinkStrategy
{
    public function muddle(string $string, string $title): string
    {
        $number = random_int(10000, 99999);
        $id = Str::id(number: $number);
        $rotated = Str::rotate('mailto:'.$string, $number);

        return <<<HTML
        <a id="$id" href="$rotated" data-attributes>$title</a>
        <script>(() => {
            const number = $number % 64
            const plain = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890@.'
            const cipher = plain.slice(number) + plain.slice(0, number)

            $id.href = $id.getAttribute('href').split('').map((letter) => plain[cipher.indexOf(letter)] ?? letter).join('')
        })()</script>
        HTML;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/const number = (\d+)/', $string, $number);
        preg_match('/href="([^"]+)"/', $string, $rotated);
        preg_match('/>([^<]+)<\/a>/', $string, $title);
        $rotated = Str::rotate($rotated[1], -$number[1]);

        return <<<HTML
        <a href="$rotated" data-attributes>$title[1]</a>
        HTML;
    }
}
