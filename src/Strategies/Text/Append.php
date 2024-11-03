<?php

namespace Mokhosh\Muddle\Strategies\Text;

use Mokhosh\Muddle\Contracts\TextStrategy;
use Mokhosh\Muddle\Support\Str;

class Append implements TextStrategy
{
    public function muddle(string $string): string
    {
        $id = Str::id();
        $username = substr($string, 0, strpos($string, '@'));
        $domain = substr($string, strpos($string, '@'));
        $script = <<<HTML
        </span><script>(function() {
            $id.innerText += "$domain"
        })()</script>
        HTML;

        return "<span id='$id'>".$username.$script;
    }

    public function unmuddle(string $string): string
    {
        preg_match('/innerText \+= "([^"]+)"/', $string, $domain);
        preg_match('/>([^<]+)<\/span>/', $string, $username);

        return $username[1].$domain[1];
    }
}
