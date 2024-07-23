<?php

namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Models\Location;
use App\Models\Weather;

class WeatherRepository implements WeatherRepositoryInterface 
{

    public function findByLocation($location_id){
        return Weather::where('location_id', $location_id)->first();
    }
}