<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'store_id',
        'reference',
        'gift',
        'notes',
        'total_amount',
        'cashier_code',

    ];
}
