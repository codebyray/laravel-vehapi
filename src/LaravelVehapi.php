<?php

namespace Codebyray\LaravelVehapi;

use Illuminate\Support\Facades\Http;

class LaravelVehapi
{
    /**
     * @var string
     */
    private $vehApiToken;

    /**
     * @var string
     */
    private $vehApiVersion;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->vehApiToken = config('laravel-vehapi.veh_api_token', null);
        $this->vehApiVersion = config('laravel-vehapi.veh_api_version', null);
    }

    /**
     * Return all years available.
     *
     * @param string $sort
     *
     * @return mixed
     */
    public function getAllYears($sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/years/'.$sort), true);
    }

    /**
     * Return the range of years as supplied.
     *
     * @param int $minYear
     * @param int $maxYear
     * @param string $sort
     *
     * @return mixed
     */
    public function getYearsRange(int $minYear, int $maxYear, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/range/years/'.$minYear.'/'.$maxYear.'/'.$sort), true);
    }

    /**
     * Return all makes available.
     *
     * @param string $sort
     *
     * @return mixed
     */
    public function getAllMakes($sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/all/car/makes/'.$sort), true);
    }

    /**
     * Return the makes available for the year supplied.
     *
     * @param int $year
     * @param string $sort
     *
     * @return mixed
     */
    public function getMakesByYear(int $year, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/makes/'.$year.'/'.$sort), true);
    }

    /**
     * Return the range of years as supplied.
     *
     * @param int $minYear
     * @param int $maxYear
     * @param string $sort
     *
     * @return mixed
     */
    public function getMakesByYearsRange(int $minYear, int $maxYear, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/makes/in-range/'.$minYear.'/'.$maxYear.'/'.$sort), true);
    }

    /**
     * Return the models available for the make supplied.
     *
     * @param string $make
     * @param string $sort
     *
     * @return mixed
     */
    public function getAllModelsByMake(string $make, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/all/car/models/'.$make.'/'.$sort), true);
    }

    /**
     * Return the models available for the year & make supplied.
     *
     * @param int $year
     * @param string $make
     * @param string $sort
     *
     * @return mixed
     */
    public function getModelsByYearAndMake(int $year, string $make, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/models/'.$year.'/'.$make.'/'.$sort), true);
    }

    /**
     * Return the trims available for the year, make & model supplied.
     *
     * @param int $year
     * @param string $make
     * @param string $model
     *
     * @return mixed
     */
    public function getTrimsByYearMakeAndModel(int $year, string $make, string $model)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/trims/'.$year.'/'.$make.'/'.$model), true);
    }

    /**
     * Return the transmissions available for the year, make,model & trim supplied.
     *
     * @param int $year
     * @param string $make
     * @param string $model
     * @param string $trim
     *
     * @return mixed
     */
    public function getTransmissionsByYearMakeModelAndTrim(int $year, string $make, string $model, string $trim)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/transmissions/'.$year.'/'.$make.'/'.$model.'/'.$trim), true);
    }

    /**
     * Return engines available for the year, make, model & transmission supplied.
     *
     * @param int $year
     * @param string $make
     * @param string $model
     * @param string $trim
     * @param string $transmission
     *
     * @return mixed
     */
    public function getEnginesByYearMakeModelTrimAndTransmission(int $year, string $make, string $model, string $trim, string $transmission)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/engines/'.$year.'/'.$make.'/'.$model.'/'.$trim.'/'.$transmission), true);
    }

    /**
     * Return the logo for the make supplied.
     *
     * @param string $make
     *
     * @return mixed
     */
    public function getMakeLogo(string $make)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-logos/img/'.$make), true);
    }
}
