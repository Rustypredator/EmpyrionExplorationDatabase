<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Entry;
use App\Models\Location;

class Search extends Component
{

    public $query = '';
    public $results = [];

    public function render()
    {
        if (strlen($this->query) < 3) {
            $this->results = [];
            return view('livewire.frontend.search');
        }
        $this->results = [];
        $this->results['locations'] = Location::search($this->query)->get();
        $this->results['entries'] = Entry::search($this->query)->get();
        // Show only results we own:
        $this->results['locations'] = $this->results['locations']->filter(function ($location) {
            return $location->owner_team_id == auth()->user()->current_team_id;
        });
        $this->results['entries'] = $this->results['entries']->filter(function ($entry) {
            return $entry->owner_team_id == auth()->user()->current_team_id;
        });
        return view('livewire.frontend.search');
    }
}
