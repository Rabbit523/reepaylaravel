<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    const STATUS_CANCELED = 0;
    const STATUS_OPEN = 1;
    const STATUS_PAID = 2;
    const STATUS_REFUNDED = 3;


    protected $fillable = [
        'handle',
        'status',
        'user_id',
        'subscription_id',
        'amount',
        'amount_ex_vat',
        'amount_vat',
        'currency',
        'created',
        'settled'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription', 'id', 'subscription_id');
    }

    public function status()
    {
        return $this->hasOne('App\InvoiceStatus', 'id', 'invoice_id');
    }
}
