<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'email',
        'gemi_number',
        'vat_number',
        'doi',
        'address',
        'company',
        'business_activity',
        'phone',
        'city',
        'website',
        'postcode'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
