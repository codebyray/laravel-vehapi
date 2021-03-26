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
     * @return mixed
     */
    public function getAllYears($sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/years/'.$sort), true);
    }

    /**
     * Return the range of years as supplied.
     *
     * @param $minYear
     * @param $maxYear
     * @param string $sort
     * @return mixed
     */
    public function getYearsRange($minYear, $maxYear, $sort = 'asc')
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/range/years/'.$minYear.'/'.$maxYear.'/'.$sort), true);
    }

    /**
     * Return all makes available.
     *
     * @return mixed
     */
    public function getAllMakes()
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/all/car/makes'), true);
    }

    /**
     * Return the makes available for the year supplied.
     *
     * @param $year
     * @return mixed
     */
    public function getMakesByYear($year)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/makes/'.$year), true);
    }

    /**
     * Return the range of years as supplied.
     *
     * @param $minYear
     * @param $maxYear
     * @return mixed
     */
    public function getMakesByYearsRange($minYear, $maxYear)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/makes/in-range/'.$minYear.'/'.$maxYear), true);
    }

    /**
     * Return the models available for the make supplied.
     *
     * @param $make
     * @return mixed
     */
    public function getAllModelsByMake($make)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/all/car/models/'.$make), true);
    }

    /**
     * Return the models available for the year & make supplied.
     *
     * @param $year
     * @param $make
     * @return mixed
     */
    public function getModelsByYearAndMake($year, $make)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/models/'.$year.'/'.$make), true);
    }

    /**
     * Return the trims available for the year, make & model supplied.
     *
     * @param $year
     * @param $make
     * @param $model
     * @return mixed
     */
    public function getTrimsByYearMakeAndModel($year, $make, $model)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/trims/'.$year.'/'.$make.'/'.$model), true);
    }

    /**
     * Return the transmissions available for the year, make,model & trim supplied.
     *
     * @param $year
     * @param $make
     * @param $model
     * @param $trim
     * @return mixed
     */
    public function getTransmissionsByYearMakeModelAndTrim($year, $make, $model, $trim)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/transmissions/'.$year.'/'.$make.'/'.$model.'/'.$trim), true);
    }

    /**
     * Return engines available for the year, make, model & transmission supplied.
     *
     * @param $year
     * @param $make
     * @param $model
     * @param $trim
     * @param $transmission
     * @return mixed
     */
    public function getEnginesByYearMakeModelTrimAndTransmission($year, $make, $model, $trim, $transmission)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-lists/get/car/engines/'.$year.'/'.$make.'/'.$model.'/'.$trim.'/'.$transmission), true);
    }

    /**
     * Return the logo for the make supplied.
     *
     * @param $make
     * @return mixed
     */
    public function getMakeLogo($make)
    {
        return json_decode(Http::withToken($this->vehApiToken)->get('https://vehapi.com/api/'.$this->vehApiVersion.'/car-logos/img/'.$make), true);
    }

}
