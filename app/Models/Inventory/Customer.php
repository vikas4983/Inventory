<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone','address','is_active'];

    public function scopeActive($query)
    {
        return $query->latest();
    }
}
