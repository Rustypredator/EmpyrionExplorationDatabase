<?php

namespace App\Livewire\Frontend\Distance;

use Livewire\Component;
use App\Models\Distance;

class Table extends Component
{
    public $distances;

    public function render()
    {
        $this->distances = Distance::where('owner_team_id', auth()->user()->currentTeam->id)->get();
        return view('livewire.frontend.distance.table');
    }

    public function delete($distanceId)
    {
        $distance = Distance::findOrFail($distanceId);
        if ($distance->owner_team_id !== auth()->user()->currentTeam->id) {
            session()->flash('error', 'You do not have permission to delete this distance.');
            return;
        }
        $distance->delete();
        session()->flash('message', 'Distance deleted successfully.');
    }
}
