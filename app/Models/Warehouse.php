<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'tax', 'profit', 'quantity', 'from_erp','store_id', 'sync'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
