<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'domain_id', 'date_payment', 'amount', 'pay',
        'type_payment', 'day_invoice', 'frequency', 'first_data_invoice',
        'first_amount_invoice', 'amount_invoice'
    ];
}
