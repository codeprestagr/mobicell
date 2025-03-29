<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id_prestashop',
        'name',
        'sku',
        'url',
        'image',
        'description',
        'ean',
        'mpn',
        'price',
        'discount',
        'meta_description',
        'meta_title'
    ];
}
