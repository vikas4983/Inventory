<?php

namespace App\Models\Inventory;

use Illuminate\Container\Attributes\Cache;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'is_active'];

    public function scopeActive($query)
    {
        return $query;
    }
    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
    
}
