<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'charge_id',
        'user_id',
        'amount',
        'currency',
        'status',
        'receipt_url',
        'payment_method',
        'failure_message',
    ];
}
