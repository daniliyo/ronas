<?php

namespace App\Enums;

enum ParserEnum:string {
    case LocationUrl = "http://api.openweathermap.org/geo/1.0/direct";
    case WeatherUrl = "https://api.openweathermap.org/data/2.5/weather";

    public function getArgs(array $args){
        
        $result = [];
        $result['appid'] = env("OPEN_WEATHER_MAP_API_KEY");

        return array_merge($args, $result);
    }
}