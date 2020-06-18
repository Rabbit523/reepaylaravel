<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $fillable = [
        'user_id',
        'handler',
        'customer_handler'
    ];

    public function user() {
        $this->belongsTo('App\User');
    }
}
