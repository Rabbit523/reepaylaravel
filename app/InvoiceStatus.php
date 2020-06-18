<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoiceStatus extends Model
{
    protected $fillable = ['plan_id', 'is_default'];

    protected $table = 'invoice_statuses';

    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id', 'id');
    }
}
