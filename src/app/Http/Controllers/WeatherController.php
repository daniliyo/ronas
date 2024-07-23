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
use App\Repositories\Interfaces\LocationRepositoryInterface;

class WeatherController extends Controller
{

    public function __construct(
        protected WeatherService $weatherService,
        protected LocationService $locationService,
        protected LocationRepositoryInterface $locationRep,
    ){}

    public function index(Request $request){
        
        if(Cookie::has('location_id')){
            $weather = $this->weatherService->getByLocation(Cookie::get('location_id'));
            return view('weather', ['weather' => $weather]);
        }

        return view('weather');
    }

    public function search(PostRequest $request){

        list($city, $country) = explode(',', $request->input('location'));

        $location = $this->locationRep->findByCityAndCountry($city, $country);
            
        if(!$location){
            $location = $this->locationService->add($request->input('location'));    
        }

        return redirect()->route('weather.index')
                ->withCookie('location_id', $location->id, 1);
    }
}
