<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        return view('frontend.location.index');
    }

    public function create($parentId = null)
    {
        return view('frontend.location.create', ['parentId' => $parentId]);
    }

    public function show($locationId)
    {
        $location = Location::findOrFail($locationId);
        return view('frontend.location.show', ['location' => $location]);
    }

    public function edit($locationId)
    {
        $location = Location::findOrFail($locationId);
        return view('frontend.location.edit', ['location' => $location]);
    }
}