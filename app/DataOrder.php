<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id', 'travel_packages_id', 'title_order', 'first_name_order', 'last_name_order', 'phone_number_order', 'email_order'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
