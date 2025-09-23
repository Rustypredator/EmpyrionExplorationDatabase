<?php

namespace App\Livewire\Frontend\Location;

use Livewire\Component;
use App\Models\Location;

class Form extends Component
{
    public $location;
    public $parentLocations;
    // Location properties:
    public $parent_id;
    public $type;
    public $name;
    public $x;
    public $y;
    public $z;
    public $description;

    public function mount($location = null, $parentId = null)
    {
        if (is_null($location)) {
            $this->location = new Location();
            // If a parentId is provided, set it:
            if (!is_null($parentId)) {
                $this->parent_id = $parentId;
            }
        } else {
            $this->location = $location;
            // Load existing values into properties:
            $this->parent_id = $this->location->parent_id;
            $this->type = $this->location->type;
            $this->name = $this->location->name;
            $this->x = $this->location->x;
            $this->y = $this->location->y;
            $this->z = $this->location->z;
            $this->description = $this->location->description;
        }
        // fetch possible parent locations:
        $this->parentLocations = Location::where('owner_team_id', auth()->user()->currentTeam->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.location.form');
    }

    public function save()
    {
        if (is_null($this->location->owner_team_id)) {
            $this->location->owner_team_id = auth()->user()->currentTeam->id;
        }
        // Update location properties from component properties:
        $this->location->parent_id = $this->parent_id;
        $this->location->type = $this->type;
        $this->location->name = $this->name;
        $this->location->x = $this->x;
        $this->location->y = $this->y;
        $this->location->z = $this->z;
        $this->location->description = $this->description;
        // Save everything
        if ($this->location->save()) {
            session()->flash('message', 'Location saved successfully.');
            return redirect()->route('frontend.location.show', $this->location);
        }
    }
}
