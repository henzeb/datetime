# DateTime

[![Latest Version on Packagist](https://img.shields.io/packagist/v/henzeb/datetime.svg?style=flat-square)](https://packagist.org/packages/henzeb/datetime)
[![Total Downloads](https://img.shields.io/packagist/dt/henzeb/datetime.svg?style=flat-square)](https://packagist.org/packages/henzeb/datetime)

This package is useful when creating a library or functionality that requires speed over functionality, 
but still being useful for testing needs.

Don't get me wrong, Carbon is a great package when it comes to modifying DateTime objects, I use it all the time. 
But it comes with a price. When you need a lot of its powers, you will see the overhead grow. Faster than using vanilla
`DateTime`.

If you don't want your library to be the bottleneck of someone else their code, but still want to be able to test with 
the ability of changing dates or times, you can use this package.

## Installation

Just install with the following command.

```bash
composer require henzeb/datetime
```

## Usage

```php
use Henzeb\DateTime\DateTime;
DateTime::now();
DateTime::now(new DateTimeZone(...));
DateTime::new('2022-04-25');

``` 
### Immutable DateTime
```php
use Henzeb\DateTime\DateTimeImmutable;
DateTimeImmutable::now();
DateTimeImmutable::now(new DateTimeZone(...));
DateTimeImmutable::new('2022-04-25');
``` 

Note: there is no convenient methods or functionality other than `new` and `now`, It's just vanilla `DateTime` 
or `DateTimeImmutable` with `timetravel` capabilities.

### Unit testing
Just like Carbon, this library has a static `setTestNow` method. You can pass a string or a DateTime object. 
When passing `null`, new DateTime objects will use current date/time again.

```php
use Henzeb\DateTime\DateTime;
DateTime::setTestNow('now'); // freezes time
DateTime::setTestNow('1999-01-01');
DateTime::setTestNow(new DateTime('1999-01-01'));
``` 

## Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email henzeberkheij@gmail.com instead of using the issue tracker.

## Credits

- [Henze Berkheij](https://github.com/henzeb)

## License

The GNU AGPLv. Please see [License File](LICENSE.md) for more information.
