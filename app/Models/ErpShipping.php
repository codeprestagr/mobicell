<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErpShipping extends Model
{
    use HasFactory;

    protected $table = 'erp_shipping';

    protected $fillable = ['erp_id', 'shipping_id'];

}
