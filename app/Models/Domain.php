<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'client_id', 'domain', 'plan_id', 'payment', 'day_invoice',
        'frequency', 'first_data_invoice', 'first_amount_invoice',
        'amount_invoice', 'information'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
