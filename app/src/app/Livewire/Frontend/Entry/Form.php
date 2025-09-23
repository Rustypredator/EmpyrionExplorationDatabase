<?php

namespace App\Livewire\Frontend\Entry;

use Livewire\Component;
use App\Models\Entry;
use App\Models\Location;

class Form extends Component
{
    public $entry;
    public $possibleTypes = ['PoI', 'EnemySpawn', 'OreDeposit', 'Asteroid', 'Trader', 'Quest', 'Other'];
    public $possibleLocations;
    // Entry properties:
    public $location_id;
    public $type;
    public $name;
    public $x;
    public $y;
    public $z;
    public $description;

    public function mount($entry = null, $parentId = null)
    {
        if (is_null($entry)) {
            $this->entry = new Entry();
            // If a parentId is provided, set it:
            if (!is_null($parentId)) {
                $this->location_id = $parentId;
            }
        } else {
            $this->entry = $entry;
            // Load existing values into properties:
            $this->location_id = $this->entry->location_id;
            $this->type = $this->entry->type;
            $this->name = $this->entry->name;
            $this->x = $this->entry->x;
            $this->y = $this->entry->y;
            $this->z = $this->entry->z;
            $this->description = $this->entry->description;
        }
        
        // Fetch possible Locations:
        $this->possibleLocations = Location::where('owner_team_id', auth()->user()->currentTeam->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.entry.form');
    }

    public function save()
    {
        if (is_null($this->entry->owner_team_id)) {
            $this->entry->owner_team_id = auth()->user()->currentTeam->id;
        }
        // Update entry properties from component properties:
        $this->entry->location_id = $this->location_id;
        $this->entry->type = $this->type;
        $this->entry->name = $this->name;
        $this->entry->x = $this->x;
        $this->entry->y = $this->y;
        $this->entry->z = $this->z;
        $this->entry->description = $this->description;
        // Save everything
        if ($this->entry->save()) {
            session()->flash('message', 'Entry saved successfully.');
            return redirect()->route('frontend.entry.show', $this->entry);
        }
    }
}
