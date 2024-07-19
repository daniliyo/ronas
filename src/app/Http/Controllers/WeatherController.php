<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Weather\PostRequest;
use App\Models\Location;
use App\Services\LocationService;
use App\Services\WeatherService;
use App\Services\Parser;
use App\Interfaces\ParserInterface;

class WeatherController extends Controller
{
    public function index(Request $request, WeatherService $weatherService){
        
        
        if(Cookie::has('location_id')){

            $weather = $weatherService->get();
            
            return view('weather', ['weather' => $weather]);
        }

        return view('weather');
    }

    public function search(PostRequest $request, LocationService $locationService){

        $city = explode(',', $request->input('location'))[0];
        $country = explode(',', $request->input('location'))[1];

        $location = Location::where('city', $city)
            ->where('country', $country)->first();
            
        if(!$location){
            $location = $locationService->add($request->input('location'));    
        }

        return redirect()->route('weather.index')
                ->withCookie('location_id', $location->id, 1);
    }
}
