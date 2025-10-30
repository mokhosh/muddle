# Muddle: Obfuscate, Obscure, Confuse, Jumble, Complicate, Perplex

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mokhosh/muddle.svg?style=flat-square)](https://packagist.org/packages/mokhosh/muddle)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/muddle/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mokhosh/muddle/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mokhosh/muddle/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mokhosh/muddle/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mokhosh/muddle.svg?style=flat-square)](https://packagist.org/packages/mokhosh/muddle)

Please, don't just put plain raw emails on your web pages. Bots are going to scrape your pages and fill all of our inboxes with spam emails.

Obfuscate emails and strings in PHP and Laravel to keep those nasty bots away from finding your email or worse, your users' emails.

This package uses different strategies to obfuscate clickable and non-clickable emails, so you can choose what suits your needs best.

## Installation

You can install the package via composer:

```bash
composer require mokhosh/muddle
```

## Usage

In Laravel Projects:

```blade
{{-- instead of handing your emails to spammers like this: --}}
<a href="mailto:{{ $user->email }}">{{ $user->name }}</a>

{{-- do this: --}}
<x-muddle-link :email="$user->email" :title="$user->name" />

{{-- and we will confuscate the email in random ways to make it impossible for bots to steal your emails --}}

{{-- default strategy components based on config --}}
<x-muddle-link email="test@example.com" title="email" /> {{-- muddled email link --}}
<x-muddle-text email="test@example.com" /> {{-- muddled email text --}}

{{-- specific link strategy components --}}
<x-muddle-random email="test@example.com" title="email" /> {{-- picks a random strategy each time --}}
<x-muddle-append email="test@example.com" title="email" />
<x-muddle-concatenation email="test@example.com" title="email" />
<x-muddle-encrypt email="test@example.com" title="email" />
<x-muddle-entities email="test@example.com" title="email" />
<x-muddle-hex email="test@example.com" title="email" />
<x-muddle-rotate email="test@example.com" title="email" />

{{-- specific text strategy components --}}
<x-muddle-text-random email="test@example.com" /> {{-- picks a random strategy each time --}}
<x-muddle-text-append email="test@example.com" />
<x-muddle-text-concatenation email="test@example.com" />
<x-muddle-text-display-none email="test@example.com" />
<x-muddle-text-encrypt email="test@example.com" />
<x-muddle-text-entities email="test@example.com" />
<x-muddle-text-hex email="test@example.com" />
<x-muddle-text-rotate email="test@example.com" />
```

```php
use Mokhosh\Muddle\Facades\Muddle;
use Mokhosh\Muddle\Strategies\Text;
use Mokhosh\Muddle\Strategies\Link;

// default strategy
Muddle::text('test@example.com');
Muddle::link('test@example.com');

// specific strategy
Muddle::strategy(text: new Text\Encrypt)->text('test@example.com')
Muddle::strategy(link: new Link\Encrypt)->link('test@example.com');
```

In plain PHP Projects:

```php
use Mokhosh\Muddle\Muddle;
use Mokhosh\Muddle\Strategies\Text;
use Mokhosh\Muddle\Strategies\Link;

$muddle = new Muddle(
    text: new Text\Random,
    link: new Link\Random,
);

$muddle->link('test@example.com');
```

## Automatic Title Obfuscation

When using the `link` method or component, if the `email` and `title` attributes are identical (for example, `<x-muddle-link email="test@example.com" title="test@example.com" />`), the title will be automatically obfuscated using the text strategy. This prevents the email from being exposed in plain text.
Please note that this automatic behavior only applies for the default strategy. If you are using a specific strategy you will need to handle this scenario manually.

## Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="muddle-config"
```

This is the contents of the published config file:

```php
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
        'text' => \Mokhosh\Muddle\Strategies\Text\Random::class,
        'link' => \Mokhosh\Muddle\Strategies\Link\Random::class,
    ],

];
```

## Testing

```bash
composer test
```

## Todo

- [ ] Add Dusk tests
- [ ] Make loading components dynamic

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mo Khosh](https://github.com/mokhosh)
- [Joe Tannenbaum](https://github.com/joetannenbaum/obfuscate) for the inspiration.
- [Spencer Mortensen](https://spencermortensen.com/articles/email-obfuscation) for the information.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
