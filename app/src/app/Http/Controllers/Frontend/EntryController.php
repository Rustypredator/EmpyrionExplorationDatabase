<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index()
    {
        return view('frontend.entry.index');
    }

    public function create($parentId = null)
    {
        return view('frontend.entry.create', ['parentId' => $parentId]);
    }

    public function show($entryId)
    {
        $entry = Entry::findOrFail($entryId);
        return view('frontend.entry.show', ['entry' => $entry]);
    }

    public function edit($entryId)
    {
        $entry = Entry::findOrFail($entryId);
        return view('frontend.entry.edit', ['entry' => $entry]);
    }
}