<?php

namespace App\Livewire\Frontend\Distance;

use Livewire\Component;
use App\Models\Location;
use App\Models\Distance;

class Form extends Component
{
    public $distance;
    public $possibleLocations;
    // Distance properties:
    public $from_location_id;
    public $to_location_id;
    public $distance_value;

    public function mount($distance = null)
    {
        if (is_null($distance)) {
            $this->distance = new Distance();
        } else {
            $this->distance = $distance;
        }
        // Load existing values into properties:
        $this->from_location_id = $this->distance->from_location_id;
        $this->to_location_id = $this->distance->to_location_id;
        $this->distance_value = $this->distance->distance;
        // Fetch possible Locations:
        $this->possibleLocations = Location::where('owner_team_id', auth()->user()->currentTeam->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.distance.form');
    }

    public function save()
    {
        if (is_null($this->distance->owner_team_id)) {
            $this->distance->owner_team_id = auth()->user()->currentTeam->id;
        }
        // Update distance properties from component properties:
        $this->distance->from_location_id = $this->from_location_id;
        $this->distance->to_location_id = $this->to_location_id;
        $this->distance->distance = $this->distance_value;

        // Save everything
        if ($this->distance->save()) {
            session()->flash('message', 'Distance saved successfully.');
            return redirect()->route('frontend.locations');
        }
    }
}
