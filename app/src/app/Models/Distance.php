<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Location;
use App\Models\Team;

class Distance extends Model
{
    use Searchable;
    
    protected $fillable = [
        'owner_team_id',
        'from_location_id',
        'to_location_id',
        'distance',
    ];

    public function ownerTeam()
    {
        return $this->belongsTo(Team::class, 'owner_team_id');
    }

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }
}
