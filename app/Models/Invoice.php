<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'domain_id', 'date_payment', 'date_pay', 'amount', 'pay',
        'type_payment', 'day_invoice', 'frequency', 'first_data_invoice',
        'first_amount_invoice', 'amount_invoice'
    ];

    protected $dates = ['deleted_at'];

}
