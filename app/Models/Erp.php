<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Erp extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'api_key',
        'database',
        'username',
        'password',
        'url',
        'is_main'
    ];
    public function shippings()
    {
        return $this->belongsToMany(Shipping::class, 'erp_shipping');
    }
}
