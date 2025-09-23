<?php

namespace App\Livewire\Frontend\Distance;

use Livewire\Component;
use App\Models\Distance;

class CounterCard extends Component
{
    public $count;

    public function render()
    {
        $this->count = Distance::where('owner_team_id', auth()->user()->currentTeam->id)->count();
        return view('livewire.frontend.distance.counter-card');
    }
}
