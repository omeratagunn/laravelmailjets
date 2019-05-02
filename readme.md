# laravelmailjet

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require tyraelll/laravelmailjet
```

## Usage

If you do not run Laravel 5.5 (or higher), then add the service provider in config/app.php:

````
tyraelll\laravelmailjet\laravelmailjetServiceProvider::class,
````

Publish config file by calling artisan command.

````
php artisan vendor:publish --tag=laravelmailjet.config
````


Check out your config file in config/laravelmailjet.php

````
return [
    'MAILJET_KEY' => env("MAILJET_KEY"),
    'MAILJET_SECRET' => env("MAILJET_SECRET"),
    'ADMIN_MAIL' => env('ADMIN_MAIL'),
    'APP_NAME' => env('APP_NAME'),
];
````

ADMIN_MAIL represents the mail will sent by.

You can send;

````
use tyraelll\laravelmailjet\laravelmailjet;
$t = new laravelmailjet();
$t->view("mailtest"); // if you folder your mailing views, e.g "emails.mailtest"
// or you can use with data //
$t->viewWithData("mailtest", object/array $data); // data will rendered as $data in view. 
$t->subject("hello");
$t->name("Name of client");
$t->to("omratagn@gmail.com");
$t->send();
````
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing
Not there yet.
``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Ömer ATAGÜN][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tyraelll/laravelmailjet.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tyraelll/laravelmailjet.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tyraelll/laravelmailjet
[link-downloads]: https://packagist.org/packages/tyraelll/laravelmailjet
[link-author]: https://github.com/tyraelll
[link-contributors]: ../../contributors
