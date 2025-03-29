<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'price',
        'wholesale_price',
        'description',
        'short_description',
        'ean',
        'mpn',
        'id_categories',
        'id_prestashop',
        'copy_featured',
        'copy_description',
        'copy_description_short',
        'scrape'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_prestashop', 'id_prestashop');
    }
}
