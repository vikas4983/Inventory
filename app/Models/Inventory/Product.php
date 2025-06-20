<?php

namespace App\Models\Inventory;

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
        'is_active',
    ];
    public function scopeActive($query)
    {
        return $query;
    }
}
