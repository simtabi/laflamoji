<p align="center">
    <img src="https://github.com/simtabi/laflamoji/raw/main/laflamoji.png" width="1280" title="Laflamoji">
</p>

# Laflamoji — Use Country Flags, and Emoji's in your Laravel Projects

A package to easily make use of country flags in your Laravel Blade views.

This package is using SVG flags provided by [flag-icon-css](https://github.com/lipis/flag-icon-css). All credits go to this project and all of its creators.

# Flags

Country flags in SVG format for your Laravel application. Uses
[lipis/flag-icons](https://github.com/lipis/flag-icons) icons under the
hood.


## Requirements

- PHP 8.0 or higher
- Laravel 8.0 or higher

## Installation

```bash
composer require simtabi/laflamoji
```

## Usage

While Blade Country Flags uses Blade Icons. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.
Flags can be used as self-closing Blade components which will be compiled to SVG flags:

### Directive

```php
// Render flag using default ratio:
@laflag('us')

// Tell what ratio to use, which classes, and attributes to add to the svg element:
@laflag('us:1x1', 'w-64', ['id' => 'flag-us'])

// Render emoji
@lamoji('us')
```

### Helper

```php
// Render flag using default ratio:
{{ laflamoji()->flag('us') }}

// Tell what ratio to use, which classes, and attributes to add to the svg element:
{{ laflamoji()->flag('us:1x1', 'w-64', ['id' => 'flag-us']) }}

// Render emoji
{{ laflamoji()->emoji('us') }}
```

## Configuration

Laflag also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `laflamoji.php` config file.
You may configure the default ratio to use, and default css classes to add:

```bash

# publish config files
php artisan vendor:publish --tag=laflamoji:config

# publish raw SVG files
php artisan vendor:publish --tag=laflamoji:assets

# publish view files
php artisan vendor:publish --tag=laflamoji:views
```

After publishing the raw SVG files, you can then use them in your views like:

```blade
<img src="{{ asset('vendor/laflamoji/flags/4x3/be.svg') }}" width="10"/>
<img src="{{ asset('vendor/laflamoji/twemoji/svg/1f1e6.svg) }}" width="10"/>
```
## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Credits

- [Blade Icons](https://github.com/blade-ui-kit/blade-icons) - Code and Idea.
- [Blade Country Flags](https://github.com/stijnvanouplines/blade-country-flags) - Code and Idea.
- [Flags](https://github.com/agatanga/flags) - Code and Idea.
- [flag-icon-css](https://github.com/lipis/flag-icon-css) - Wonderful SVG flags.
- [circle-flags](https://github.com/HatScripts/circle-flags) - Code and Idea.
- [JSila/Emoji-Images-PHP](https://github.com/JSila/Emoji-Images-PHP) - Code and Idea.
- [Avris/Twemoji](https://gitlab.com/Avris/Twemoji) - Code and Idea.
- [Astrotomic/php-twemoji](https://github.com/Astrotomic/php-twemoji) - Code and Idea.
- [flarum/emoji](https://packagist.org/packages/flarum/emoji) - Code and Idea.
- [spatie/emoji](https://github.com/spatie/emoji) - Code and Idea.
- [unicodeveloper/laravel-emoji](https://github.com/unicodeveloper/laravel-emoji) - Code and Idea.
- [urakozz/php-emoji-regex](https://github.com/urakozz/php-emoji-regex) - Code and Idea.
- [hidehalo/emoji](https://github.com/hidehalo/emoji) - Code and Idea.
- [heyupdate/emoji](https://github.com/heyupdate/emoji) - Code and Idea.

## License

Laflamoji is open-sourced software licensed under [the MIT license](LICENSE.md).
