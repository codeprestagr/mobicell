<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'store_id',
        'user_id',
        'firstname',
        'lastname',
        'email',
        'address',
        'phone',
        'city',
        'postcode'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
