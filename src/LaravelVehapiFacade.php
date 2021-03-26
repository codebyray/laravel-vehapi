<?php

namespace Codebyray\LaravelVehapi;

use Illuminate\Support\Facades\Facade;

class LaravelVehapiFacade extends Facade
{
    private $results;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-vehapi';
    }
}
