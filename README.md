# A collection of helper functions that I use across my projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-helpers)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-helpers/run-tests?label=tests)](https://github.com/ryangjchandler/laravel-helpers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-helpers/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/laravel-helpers/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-helpers.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-helpers)

This package includes some of the helper functions that I tend to use in all of my projects.

## Installation

You can install the package via composer:

```bash
composer require ryangjchandler/laravel-helpers
```

## Usage

### `user`

Returns the current user, or null depending on authentication status.

> This function assumes that your `User` model is found inside of `app/Models` and will not be registered if that class doesn't exist.

```php
$user = user();
```

### `selected`

Can be used to output a `selected` attribute conditionally.

```blade
<select>
    <option value="option" {{ selected($value === 'option') }}></option>
</select>
```

You can also change the attribute that is returned. This is useful when you want to use it on checkboxes.

```blade
<input type="checkbox" name="remember" {{ selected($remember, 'checked') }} />
```

### `authorize`

Identical to Laravel's `$this->authorize()` method provided by the `AuthorizesRequests` trait.

```php
public function index()
{
    authorize('viewAny', Post::class);
}
```

### `url_shorten`

Removes everything before `://` in a URL for use as link text.

```blade
<a href="{{ $url }}">{{ url_shorten($url) }}</a>
```

This is also available as a `Str::shortenUrl` method, applied via a macro.

```php
$shortened = Str::shortenUrl($url);
```

### `Request::collect()`

This behaves exactly the same as `Request::all()`, except it returns an instance of `\Illuminate\Support\Collection`.

```php
public function store(Request $request)
{
    $collection = $request->collect();
    $pluckedCollection = $request->collect('name', 'email', 'age');
}
```

### `@selected`

This is a Blade directive that uses the `selected` helper function.

```blade
<input type="checkbox" name="remember" @selected($remember, 'checked') />
```

### `@disabled`

This is a Blade directive that uses the `selected` helper function.

```blade
<select>
    <option @disabled($disabled)>Helpers</option>
</select>
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

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
