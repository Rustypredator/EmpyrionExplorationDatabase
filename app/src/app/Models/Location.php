<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Entry;
use App\Models\Location;

class Location extends Model
{
    use Searchable;
    
    protected $fillable = [
        'owner_team_id',
        'parent_id',
        'type',
        'name',
        'x',
        'y',
        'z',
        'description',
    ];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    public function entries()
    {
        return $this->hasMany(Entry::class, 'location_id');
    }

    public function getNeighborsAttribute()
    {
        $neighbors = collect();

        // Get neighbors based on type
        if ($this->type == 'system') {
            $neighbors = Location::where('type', 'system')->where('id', '!=', $this->id)->where('owner_team_id', $this->owner_team_id)->get();
            // TODO: Remove any that are > 110 LY away
        } else if ($this->type == 'sector') {
            $neighbors = Location::where('type', 'sector')->where('parent_id', $this->parent_id)->where('id', '!=', $this->id)->where('owner_team_id', $this->owner_team_id)->get();
        } else if ($this->type == 'planet') {
            $neighbors = Location::where('type', 'planet')->where('parent_id', $this->parent_id)->where('id', '!=', $this->id)->where('owner_team_id', $this->owner_team_id)->get();
        }

        return $neighbors;
    }

    public function distanceTo(Location $location): String
    {
        // If either location is missing coordinates, return 'Missing Coords'.
        if (is_null($this->x) || is_null($this->y) || is_null($this->z) ||
            is_null($location->x) || is_null($location->y) || is_null($location->z)) {
            return 'Missing Coords';
        }

        // Calculate distance using vector calculation for the coordinates.
        $dx = $this->x - $location->x;
        $dy = $this->y - $location->y;
        $dz = $this->z - $location->z;

        $distance = sqrt($dx * $dx + $dy * $dy + $dz * $dz);
        return number_format($distance, 1) . ' LY';
    }
}
