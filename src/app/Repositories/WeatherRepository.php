<?php

namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Models\Location;
use App\Models\Weather;

class WeatherRepository implements WeatherRepositoryInterface 
{

    public function getWeatherByLocation(Location $location){
        return $location->weather;
    }
}