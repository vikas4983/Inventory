<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id', 'sale_date', 'total', 'is_active'];

    public function scopeActive($query){
        return $query->latest();
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
