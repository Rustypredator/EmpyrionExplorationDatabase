<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Team;
use App\Models\Location;

class Entry extends Model
{
    use Searchable;
    
    protected $fillable = [
        'owner_team_id',
        'location_id',
        'type',
        'name',
        'x',
        'y',
        'z',
        'description',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function ownerTeam()
    {
        return $this->belongsTo(Team::class, 'owner_team_id');
    }
}
