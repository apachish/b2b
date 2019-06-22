<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\StateCollection;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{
    public function index(Request $request,$id_country)
    {
        $states = State::where('country_id',$id_country)->get();

        return new StateCollection($states);
    }
}
