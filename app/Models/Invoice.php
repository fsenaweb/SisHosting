<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'domain', 'domain_id', 'client', 'client_id', 'payment', 'amount', 'pay'
    ];
}
