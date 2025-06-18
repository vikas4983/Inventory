<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_id', 'status_id', 'purchase_date', 'total', 'is_active'];

    public function scopeActive($query){
        return $query;
    }
}
