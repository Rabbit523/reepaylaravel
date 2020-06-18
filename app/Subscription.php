<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    const STATUS_CANCELED = 0;
    const STATUS_PENDING = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_PAUSED = 3;

    protected $fillable = [
        'user_id',
        'plan_id',
        'card_id',
        'status',
        'subscription_id',
        'subscription_create',
        'trial_end',
        'next_invoice',
        'change_card_url'
    ];

    protected $casts = [
        'subscription_create' => 'datetime',
        'trial_end' => 'datetime',
        'next_invoice' => 'datetime'
    ];

    public function plan()
    {
        return $this->hasOne('App\Plan', 'id', 'plan_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function card()
    {
        return $this->hasOne('App\UserPaymentMethods', 'id', 'card_id');
    }
}
