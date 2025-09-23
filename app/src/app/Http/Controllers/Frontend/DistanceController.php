<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Distance;

class DistanceController extends Controller
{
    public function index()
    {
        return view('frontend.distance.index');
    }

    public function create()
    {
        return view('frontend.distance.create');
    }

    public function show($distanceId)
    {
        $distance = Distance::findOrFail($distanceId);
        return view('frontend.distance.show', ['distance' => $distance]);
    }

    public function edit($distanceId)
    {
        $distance = Distance::findOrFail($distanceId);
        return view('frontend.distance.edit', ['distance' => $distance]);
    }
}