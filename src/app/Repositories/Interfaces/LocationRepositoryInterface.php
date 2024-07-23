<?php

namespace App\Repositories\Interfaces;


interface LocationRepositoryInterface {
    public function findByCityAndCountry($city, $country);
}