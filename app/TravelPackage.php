<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'slug', 'location', 'nation', 'continent', 'about', 'featuredEvent', 'language', 'food', 'departureDate', 'arrivalDate', 'duration_day', 'duration_night', 'type', 'price', 'deleted_at'
    ];

    protected $hidden = [
        
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'travel_packages_id', 'id');
    }
}
