<?php

namespace App\Services;
use App\Enums\ParserEnum;
use App\Interfaces\ParserInterface;
use App\Models\Location;

class LocationService {

    public function __construct(protected ParserInterface $parser){} 

    public function add(string $query){
        $data = collect(json_decode(
            $this->parser->parse(ParserEnum::LocationUrl, ['q' => $query])
        ))->first();
        
        $location = Location::create([
            'city' => $data->name,
            'country' => $data->country,
            'lon' => $data->lon,
            'lat' =>$data->lat,
        ]);

        return $location;
    }

}