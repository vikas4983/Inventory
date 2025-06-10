<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'sku',
        'barcode',
        'stock',
        'cost_price',
        'selling_price',
        'description',
    ];
}
