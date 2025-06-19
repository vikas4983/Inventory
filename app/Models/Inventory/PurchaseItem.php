<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'quantity', 'price', 'is_active'];
   
    public function scopeActive($query){
       return $query->latest();
    }


    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
