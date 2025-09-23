<?php

namespace App\Livewire\Frontend\Location;

use Livewire\Component;
use App\Models\Location;

class Table extends Component
{
    public $locations;

    public function render()
    {
        $this->locations = Location::where('owner_team_id', auth()->user()->currentTeam->id)->get();
        return view('livewire.frontend.location.table');
    }

    public function delete($locationId)
    {
        $location = Location::findOrFail($locationId);
        if ($location->owner_team_id !== auth()->user()->currentTeam->id) {
            session()->flash('error', 'You do not have permission to delete this location.');
            return;
        }
        $location->delete();
        session()->flash('message', 'Location deleted successfully.');
    }
}
