<?php

namespace App\Livewire\Frontend\Entry;

use Livewire\Component;
use App\Models\Entry;

class Table extends Component
{
    public $entries;

    public function render()
    {
        $this->entries = Entry::where('owner_team_id', auth()->user()->currentTeam->id)->get();
        return view('livewire.frontend.entry.table');
    }

    public function delete($entryId)
    {
        $entry = Entry::findOrFail($entryId);
        if ($entry->owner_team_id !== auth()->user()->currentTeam->id) {
            session()->flash('error', 'You do not have permission to delete this entry.');
            return;
        }
        $entry->delete();
        session()->flash('message', 'Entry deleted successfully.');
    }
}
