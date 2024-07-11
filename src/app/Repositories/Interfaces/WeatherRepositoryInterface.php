<?php

namespace App\Repositories\Interfaces;

use App\Models\Location;

interface WeatherRepositoryInterface {

    public function getWeatherByLocation(Location $location);

}