<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'transactions_id', 'title_guest', 'first_name_guest', 'last_name_guest'
    ];

    protected $hidden = [
        
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

}
