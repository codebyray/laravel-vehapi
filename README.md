# Laravel Vehicle Information API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebyray/laravel-vehapi.svg?style=flat-square)](https://packagist.org/packages/codebyray/laravel-vehapi)
[![Build Status](https://img.shields.io/travis/codebyray/laravel-vehapi/master.svg?style=flat-square)](https://travis-ci.org/codebyray/laravel-vehapi)
[![Quality Score](https://img.shields.io/scrutinizer/g/codebyray/laravel-vehapi.svg?style=flat-square)](https://scrutinizer-ci.com/g/codebyray/laravel-vehapi)
[![Total Downloads](https://img.shields.io/packagist/dt/codebyray/laravel-vehapi.svg?style=flat-square)](https://packagist.org/packages/codebyray/laravel-vehapi)

Vehicle Information API is an API system for retrieving vehicle information to include, vehicle year, make, model, trim, transmission, engine and logos for vehicle makes. 
For more information on this service or to subscribe, please visit [Vehicle Information API](https://vehapi.com)

## Installation

You can install the package via composer:

```bash
composer require codebyray/laravel-vehapi
```

Then include the service provider within you `app/config/app.php`. 
> NOTE: If you're running Laravel 5.5+ this will be auto loaded for you.

``` php
'providers' => [
    Codebyray\LaravelVehapi\LaravelVehapiServiceProvider::class
];
```

Publish the config file (optional)
```bash
php artisan vendor:publish --provider="Codebyray\LaravelVehapi\LaravelVehapiServiceProvider" --tag="config"
```

## Setup .env file
Add your API token & API version to your .env file:
> NOTE: API version will default to v1, you DO NOT need to specify the version unless you are using a different 
> version of Vehicle Info API. API token is required. However, it can be entered in your .env file (recommended), or the published
> config file.

```dotenv
VEH_API_TOKEN=YOUR_VEH_API_TOKEN
VEH_API_VERSION=v1
```
## Usage

Let's get all the distinct years for all the makes available
```php
/**
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getAllYears($sort = 'asc');

// Returns associative array
// This will return all years from 1899-2022
$vehYears = LaravelVehapi::getAllYears($sort);

// Convert array to json format
$vehYears = json_encode(LaravelVehapi::getAllYears($sort));
```
Let's get all the distinct years for all the makes available
```php
/**
 * @param $minYear - required
 * @param $maxYear - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getYearsRange($minYear, $maxYear, $sort = 'asc');

// Returns associative array
$vehYears = LaravelVehapi::getYearsRange('2010', '2014', 'desc');

// Convert array to json format
$vehYears = json_encode(LaravelVehapi::getYearsRange('2010', '2014', 'desc'));
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dev@codebyray.com instead of using the issue tracker.

## Credits

- [RJ](https://github.com/codebyray)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
