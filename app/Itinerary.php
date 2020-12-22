<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerary extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'travel_packages_id','day', 'activities', 'deleted_at'
    ];

    protected $hidden = [
        
    ];

    public function travel_packages(){
        $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
