<?php

namespace App\Repositories\Interfaces;

use App\Models\Location;

interface WeatherRepositoryInterface {

    public function findByLocation($location_id);

}