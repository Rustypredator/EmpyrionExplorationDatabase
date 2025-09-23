<?php

namespace App\Livewire\Frontend\Location;

use Livewire\Component;
use App\Models\Location;

class CounterCard extends Component
{

    public $count;

    public function render()
    {
        $this->count = Location::where('owner_team_id', auth()->user()->currentTeam->id)->count();
        return view('livewire.frontend.location.counter-card');
    }
}
