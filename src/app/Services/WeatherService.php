<?php

namespace App\Services;
use App\Models\Weather;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\Interfaces\WeatherRepositoryInterface as WeatherRep;
use App\Interfaces\ParserInterface;
use App\Enums\ParserEnum;

class WeatherService {
    public function __construct(
        protected WeatherRep $weatherRep,
        protected ParserInterface $parser,
    ){}

    public function get(){

        $location = Location::find(Cookie::get('location_id'));

        $weather = $this->weatherRep->getWeatherByLocation($location);
        if(!$weather){
            $weather = $this->add();
        }
        return $weather;
    }

    public function add(){

        $location = Location::find(Cookie::get('location_id'));
        $args = ['lon' => $location->lon, 'lat' => $location->lat];

        
        $data = collect(json_decode(
            $this->parser->parse(ParserEnum::WeatherUrl, $args)
        ));
        
        $weather = Weather::create([
            'location_id' => $location->id,
            'temp' => $data['main']->temp,
            'description' => $data['weather'][0]->description,
            'wind_speed' =>$data['wind']->speed,
            'pressure' => $data['main']->pressure,
            'humidity' => $data['main']->humidity,
            'timestamp' => $data['dt'],
        ]);

        return $weather;
    }

}