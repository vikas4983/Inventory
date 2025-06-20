<?php

namespace App\Models\Inventory;

use App\Models\Inventory\Supplier;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_id', 'status_id', 'purchase_date', 'total', 'is_active'];

    public function scopeActive($query)
    {
        return $query;
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
