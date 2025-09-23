<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Distance;
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
}
