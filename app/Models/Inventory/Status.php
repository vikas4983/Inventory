<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
   protected $fillable = ['name', 'is_active'];

    public function scopeActive($query)
    {
        return  $query->latest();
    }
}
