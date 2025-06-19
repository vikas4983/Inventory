<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
   protected $fillable = ['sale_id', 'product_id', 'quantity', 'price', 'is_active'];
   
    public function scopeActive($query){
       return $query->latest();
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
