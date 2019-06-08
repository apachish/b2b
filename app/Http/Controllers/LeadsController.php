<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function create()
    {
        return  view('leads.create');
    }
    public function store(StoreLead $request)
    {

    }
}
