<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_prestashop',
    ];

    public function erps()
    {
        return $this->belongsToMany(Erp::class, 'erp_shipping');
    }
}
