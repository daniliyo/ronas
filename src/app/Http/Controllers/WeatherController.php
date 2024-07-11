<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Weather\PostRequest;
use App\Models\Location;

class WeatherController extends Controller
{
    public function index(Request $request){
        
        
        
        return view('weather');
    }

    public function search(PostRequest $request){

        $city = explode(',', $request->input('location'))[0];
        $country = explode(',', $request->input('location'))[1];

        $location = Location::where('city', $city)
            ->where('country', $country)->first();
            
        if($location){
            return redirect()->route('weather.index')
                ->withCookie('search', $location->id, 1);
        } else {
            return 123;
        }
    }
}
