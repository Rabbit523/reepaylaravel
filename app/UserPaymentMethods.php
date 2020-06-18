<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethods extends Model
{
    protected $fillable = [
        'user_id',
        'handler',
        'masked_card',
        'card_type',
        'exp_date'
    ];

    public function user() {
        $this->belongsTo('App\User');
    }
}
