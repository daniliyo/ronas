<?php

namespace App\Enums;

enum ParserEnum:string {
    case LocationUrl = "http://api.openweathermap.org/geo/1.0/direct";
    case WeatherUrl = "https://api.openweathermap.org/data/2.5/weather";

    public function getArgs(array $args){
        
        $result = [];
        $result['appid'] = "af1d5ebc755fb6a38d24261771c3f729";

        if($this === ParserEnum::LocationUrl){
            $result['q'] = $args['q'];
        } else if($this === ParserEnum::WeatherUrl){
            $result['lon'] = $args['lat'];
            $result['lat'] = $args['lon'];
        }

        return $result;

    }
}