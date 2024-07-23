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

    public function getByLocation($location_id){
        $weather = $this->weatherRep->findByLocation($location_id);
        if(!$weather){
            $weather = $this->updateOrCreate($location_id);
        }
        return $weather;
    }

    public function updateOrCreate($location_id){
        $data = $this->getData($location_id);

        $weatherData = $this->prepareData($data);
        $weatherData['location_id'] = $location_id;

        return Weather::updateOrCreate($weatherData, ['location_id' => $location_id]);
    }

    public function getData($location_id){
        $location = Location::find($location_id);
        $args = ['lon' => $location->lon, 'lat' => $location->lat];
        
        $data = collect(json_decode(
            $this->parser->parse(ParserEnum::WeatherUrl, $args)
        ));
        return $data;
    }

    public function prepareData($data){
        return [
            'temp' => $data['main']->temp,
            'description' => $data['weather'][0]->description,
            'wind_speed' =>$data['wind']->speed,
            'pressure' => $data['main']->pressure,
            'humidity' => $data['main']->humidity,
            'timestamp' => $data['dt'],
        ];
    }

}