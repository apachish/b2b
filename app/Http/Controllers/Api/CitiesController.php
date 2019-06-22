<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Resources\CityCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index(Request $request,$id_country,$id_state)
    {
        $cities = City::where('country_id',$id_country)->where('state_id',$id_state)->get();

        return new CityCollection($cities);
    }
}
