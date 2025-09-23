<?php

namespace App\Livewire\Frontend\Entry;

use Livewire\Component;
use App\Models\Entry;

class CounterCard extends Component
{
    public $count;

    public function render()
    {
        $this->count = Entry::where('owner_team_id', auth()->user()->currentTeam->id)->count();
        return view('livewire.frontend.entry.counter-card');
    }
}
