<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;

class LocationRepository implements LocationRepositoryInterface {
    public function findByCityAndCountry($city, $country){
        return Location::where('city', $city)
            ->where('country', $country)->first();
    }
}