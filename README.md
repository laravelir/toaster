- [![Starts](https://img.shields.io/github/stars/laravelir/toaster?style=flat&logo=github)](https://github.com/laravelir/toaster/forks)
- [![Forks](https://img.shields.io/github/forks/laravelir/toaster?style=flat&logo=github)](https://github.com/laravelir/toaster/stargazers)
  [![Total Downloads](https://img.shields.io/packagist/dt/laravelir/toaster.svg?style=flat-square)](https://packagist.org/laravelir/toaster)


# laravel Package

multi style (tabler) toast notification


### Installation

1. Run the command below to add this package:

```
composer require laravelir/toaster
```

2. Open your config/app.php and add the following to the arrays:

```php
Laravelir\Toaster\Providers\ToasterServiceProvider::class, // in providers
```

```php
Laravelir\Toaster\Facades\ToasterFacade::class, // in facades
```

3. Run the command below to install package:

```
php artisan toaster:install
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
