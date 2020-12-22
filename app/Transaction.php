<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'travel_packages_id', 'adults', 'childs', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [
        
    ];

    public function data_order(){
        return $this->belongsTo(DataOrder::class, 'id', 'transactions_id');
    }

    public function transaction_detail(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
