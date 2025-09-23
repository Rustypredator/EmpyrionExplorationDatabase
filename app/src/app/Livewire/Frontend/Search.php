<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Distance;
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
        $this->results['distances'] = Distance::search($this->query)->get();
        return view('livewire.frontend.search');
    }
}
