# Laravel Vehicle Information API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebyray/laravel-vehapi.svg?style=flat-square)](https://packagist.org/packages/codebyray/laravel-vehapi)
[![Build Status](https://img.shields.io/travis/codebyray/laravel-vehapi/master.svg?style=flat-square)](https://travis-ci.org/codebyray/laravel-vehapi)
[![Quality Score](https://img.shields.io/scrutinizer/g/codebyray/laravel-vehapi.svg?style=flat-square)](https://scrutinizer-ci.com/g/codebyray/laravel-vehapi)
[![Total Downloads](https://img.shields.io/packagist/dt/codebyray/laravel-vehapi.svg?style=flat-square)](https://packagist.org/packages/codebyray/laravel-vehapi)

Vehicle Information API is an API system for retrieving vehicle information to include, vehicle year, make, model, trim, transmission, engine and logos for vehicle makes. 
For more information on this service or to subscribe, please visit [Vehicle Information API](https://vehapi.com)

> NOTE: This package currently only works to retrieve vehicle data from our API, it will not work to retrieve ANY data from our MOTO API endpoints. 
> We will be adding that ability in a future release.

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
 * @param int $minYear - required
 * @param int $maxYear - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getYearsRange(int $minYear, int $maxYear, $sort = 'asc');

// Returns associative array
$vehYears = LaravelVehapi::getYearsRange('2010', '2014', 'desc');

// Convert array to json format
$vehYears = json_encode(LaravelVehapi::getYearsRange('2010', '2014', 'desc'));
```

Let's get all the distinct makes available
```php
/**
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getAllMakes($sort = 'asc');

// Returns associative array
$vehMakes = LaravelVehapi::getAllMakes();

// Convert array to json format
$vehMakes = json_encode(LaravelVehapi::getAllMakes());
```

Let's get all the distinct makes available for a specific year
```php
/**
 * @param int $year - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getMakesByYear($year, $sort = 'asc');

// Returns associative array
$vehMakes = LaravelVehapi::getMakesByYear(2015);

// Convert array to json format
$vehMakes = json_encode(LaravelVehapi::getMakesByYear(2015));
```

Let's get all the distinct makes available for a specific year range
```php
/**
 * @param int $minYear - required
 * @param int $maxYear - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getMakesByYearsRange($minYear, $maxYear, $sort = 'asc');

// Returns associative array
$vehMakes = LaravelVehapi::getMakesByYear(2015);

// Convert array to json format
$vehMakes = json_encode(LaravelVehapi::getMakesByYear(2015));
```

Let's get all the models available for a specific make
```php
/**
 * @param string $make - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getAllModelsByMake($make, $sort = 'asc');

// Returns associative array
$vehModels = LaravelVehapi::getAllModelsByMake('Acura');

// Convert array to json format
$vehModels = json_encode(LaravelVehapi::getAllModelsByMake('Acura'));
```

Let's get all the models available for a specific year & make
```php
/**
 * @param int $year - required
 * @param string $make - required
 * @param string $sort - optional, defaults to 'asc'
 */
LaravelVehapi::getModelsByYearAndMake($year, $make, $sort = 'asc');

// Returns associative array
$vehModels = LaravelVehapi::getModelsByYearAndMake(2015, 'Acura');

// Convert array to json format
$vehModels = json_encode(LaravelVehapi::getModelsByYearAndMake(2015, 'Acura'));
```

Let's get all the trims levels available for a specific year, make & model
```php
/**
 * @param int $year - required
 * @param string $make - required
 * @param string $model - required
 */
LaravelVehapi::getTrimsByYearMakeAndModel($year, $make, $model);

// Returns associative array
$vehTrims = LaravelVehapi::getTrimsByYearMakeAndModel(2015, 'Acura', 'MDX');

// Convert array to json format
$vehTrims = json_encode(LaravelVehapi::getTrimsByYearMakeAndModel(2015, 'Acura', 'MDX'));
```

Let's get all the transmissions available for a specific year, make, model & trim
```php
/**
 * @param int $year - required
 * @param string $make - required
 * @param string $model - required
 * @param string $trim - required
 */
LaravelVehapi::getTransmissionsByYearMakeModelAndTrim($year, $make, $model, $trim);

// Returns associative array
$vehTransmissions = LaravelVehapi::getTransmissionsByYearMakeModelAndTrim(2015, 'Acura', 'MDX', 'FWD');

// Convert array to json format
$vehTransmissions = json_encode(LaravelVehapi::getTransmissionsByYearMakeModelAndTrim(2015, 'Acura', 'MDX', 'FWD'));
```

Let's get all the engines available for a specific year, make, model, trim & transmission
```php
/**
 * @param int $year - required
 * @param string $make - required
 * @param string $model - required
 * @param string $trim - required
 * @param string $transmission - required
 */
LaravelVehapi::getEnginesByYearMakeModelTrimAndTransmission($year, $make, $model, $trim, $transmission);

// Returns associative array
$vehEngines = LaravelVehapi::getEnginesByYearMakeModelTrimAndTransmission(2015, 'Acura', 'MDX', 'FWD', '6-Speed Automatic');

// Convert array to json format
$vehEngines = json_encode(LaravelVehapi::getEnginesByYearMakeModelTrimAndTransmission(2015, 'Acura', 'MDX', 'FWD', '6-Speed Automatic'));
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### API Documentation
For a complete list of available API endpoints, visit [API documentation](https://documenter.getpostman.com/view/185623/TVYM5c17)
### Security

If you discover any security related issues, please email dev@codebyray.com instead of using the issue tracker.

## Credits

- [CodebyRay](https://github.com/codebyray)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
