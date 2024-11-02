<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class Rotate implements TextStrategy
{
    public function muddle(string $string): string
    {
        $number = random_int(10000, 99999);
        $id = 'C'.$number;
        $rotated = Str::rotate($string, $number);
        $script = <<<HTML
        </span><script>
        (function() {
            const number = $number % 64
            const plain = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890@.';
            const cipher = plain.slice(number) + plain.slice(0, number);

            $id.innerText = $id.innerText.split('').map((letter) => plain[cipher.indexOf(letter)]).join('')
        })()
        </script>
        HTML;

        return "<span id='$id'>".$rotated.$script;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/const number = (\d+)/', $string, $number);
        preg_match('/>([^<]+)<\/span>/', $string, $rotated);

        return Str::rotate($rotated[1], -$number[1]);
    }
}
